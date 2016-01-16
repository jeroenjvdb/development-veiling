<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Art;
use Carbon\Carbon;
use App\FAQ;

class ShowAuctionsController extends Controller
{
    public function listArt(Request $request, $sort = 'new', $class = null, $filter = null)
    {
    	// select the auctions
    	$auctions = Art::selectRaw('art.*, max(bids.price) AS highest_bid, count(bids.art_id) AS `count`')->
                        groupBy('art.id')->
                        leftJoin('bids', 'art.id', '=', 'bids.art_id')->
                        where('art.processed', '0');

        // get the auction filters
        $auctions = $this->add_filters($auctions, $sort, $class, $filter);
        $auctions = $auctions->paginate(9);
        if(!(isset($auctions) ||$auctions->first()->id))
        {
            $auctions = [];
        }
        // $data = [];
        $data['auctions'] = $auctions;
        $data['sort'] = $sort;
        return View('Art.index')->with($data);
    }

    public function postSearch(Request $request)
    {
        $query = $request->input('search');
        $route = [];
        return redirect()->route('art.search', ['query' => $query]);
    }

    public function search(Request $request, $search, $sort = 'new', $class = null, $filter = null)
    {

        // $search = $request->input('search');
        if($search == "")
        {
            return redirect()->route('home')->withErrors(['please fill in the searchbox']);
        }

        $FAQ = FAQ::where('question', 'like', '%'. $search .'%')->
                        orwhere('answer', 'like', '%' . $search . '%')->get();

        $artOutput = Art::selectRaw('art.*, max(bids.price) as highest_bid, count(bids.art_id) AS `count`')->leftJoin('bids', 'bids.art_id','=', 'art.id')
                            ->groupBy('art.id')
                            ->where(function($query) use ($search){
                                $query->where('description_nl', 'like', '%' . $search . '%')
                                        ->orWhere('description_en', 'like', '%' . $search . '%')
                                        ->orWhere('title', 'like', '%' . $search . '%');
                            })
                            ->where('art.processed', '0');


        // var_dump($searchOutput)
        //add auction filters
        $auctions = $this->add_filters($artOutput, $sort, $class, $filter);
        $auctions = $auctions->groupBy('bids.art_id')->paginate(9);
        

        // $data = [];
        $data['search'] = $search;
        $data['FAQ'] = $FAQ;
        $data['art'] = $auctions;
        $data['sort'] = $sort;
        $data['route'] = 'art.search';


        return View('search')->with($data);
    }

    protected function add_filters($auctions, $sort, $class, $filter)
    {
        switch ($sort) {
            case 'soonest':
                $auctions = $auctions->orderBy('end_datetime', 'asc');
                break;
            case 'latest':
                $auctions = $auctions->orderBy('end_datetime', 'desc');
                break;
            case 'popular':
                $auctions = $auctions->
                   orderBy('count','DESC');
                break;
            default:
                $auctions = $auctions->orderBy('created_at', 'desc');
                break;

        }

        
        
        //select the filter you want to use
        switch ($class) {
            case 'era':
                $auctions = $this->era_filter($filter, $auctions);
                break;
            case 'price':
                $auctions = $this->price_filter($filter, $auctions);
                break;
            case 'style':
                $auctions = $this->style_filter($filter, $auctions);
        }

        return $auctions;
    }

    protected function price_filter($filter, $auctions)
    {
    	//filter between 2 amounts, default is everything above zero (everything)
		switch ($filter) {
			case '5000':
				$auctions = $auctions->havingRaw('MAX( bids.price ) < 5000');
				break;
			case '10000':
				$auctions = $auctions->
								havingRaw('(
									MAX( bids.price ) > 5000
									AND MAX( bids.price ) < 10000
									)');
				break;	
			case '25000':
				$auctions = $auctions->
								havingRaw('(
									MAX( bids.price ) > 10000
									AND MAX( bids.price ) < 25000
									)');
				break;
			case '50000':
				$auctions = $auctions->
								havingRaw('(
									MAX( bids.price ) > 25000
									AND MAX( bids.price ) < 50000
									)');
				break;
			case '100000':
				$auctions = $auctions->
								havingRaw('(
									MAX( bids.price ) > 50000
									AND MAX( bids.price ) < 100000
									)');
				break;
			case 'plus':
				$auctions = $auctions->havingRaw('MAX( bids.price ) > 100000');
				break;
			default:
				$auctions = $auctions->havingRaw('MAX (bids.price) > 0');
				break;
		}

    	return $auctions;
    }

    protected function era_filter($filter, $auctions)
    {
    	//filter on a time period
    	switch ($filter) {
			case 'pre-war':
				$auctions->Where('art.date_of_creation', '<', 1940);
				break;
			case '40-50':
				$auctions->Where('art.date_of_creation', '>', 1939)
							->Where('art.date_of_creation', '<', 1960);
				break;
			case '60-80':
				$auctions->Where('art.date_of_creation', '>', 1959)
							->Where('art.date_of_creation', '<', 1990);
				break;
			case '90':
				$auctions->Where('art.date_of_creation', '>', 1989);
				break;
		}
    	return $auctions;
    }

    protected function style_filter($filter, $auctions)
    {
    	//filter on a style
    	$newAuctions = $auctions->where('style_id', $filter);
    	return $newAuctions;

    }
}
