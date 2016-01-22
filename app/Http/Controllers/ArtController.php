<?php

namespace App\Http\Controllers;

use App\Art;
use App\Style;
use App\Watchlist;
use App\Sold;
use App\Picture;
use Auth;

use Validator;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    protected function validation($data)
    {
        return Validator::make($data, [
            'title'             => 'required|max:255',
            'date_of_creation'  => 'required|min:1000|max:2030|numeric',
            'width'             => 'required|alpha_num',
            'height'            => 'required|alpha_num',
            'depth'             => 'alpha_num',
            'description'       => 'required',
            'condition'         => 'required',
            'est_low_price'     => 'required|numeric',
            'est_high_price'    => 'required|numeric',
            'end_datetime'      => 'required|date',
            'buyout'            => 'numeric',
            'TermsAgree'        => 'required|accepted',
            'color'             => 'required',
            'artist'            => 'required',
            'artwork'           => 'required|image',
            'signature'         => 'required|image',
            'optional_image'    => 'image'
        ]);    
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $styles = Style::all();
        $styleArray = [];
        $styleArray[0] = 'select a style';
        foreach($styles as $style)
        {
            $styleArray[$style->id] = $style->name;
        }
        $data = ['styleArray' => $styleArray];
        return View('Art.create')->with($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $this->validation($request->all());

        if($validation->fails())
        {
            return redirect()->back()->withInput()->withErrors($validation);
        }

        if(!($request->file('artwork')->isValid() || $request->file('signature')->isValid()))
        {
            return redirect()->back()
                                ->withInput()
                                ->withErrors(['there went something wrong while uploading the pictures.']);
        }

        $auction = new Art;

        $auction->fill($request->all());
        $auction->slug = $this->slugify($request->input('title'));
        $auction->description_nl = $request->input('description');
        $auction->description_en = $request->input('description');

        $auction->condition_nl = $request->input('condition');
        $auction->condition_en = $request->input('condition');


        $auction->user_id   = 1;
        $auction->artist_id = 1;
        $auction->style_id  = 1;


        $auction->save();
        //store the images
        $this->storeImage($auction, $request->file('artwork'), true);
        $this->storeImage($auction, $request->file('signature'), false);
        //store optional image if is set
        if($request->file('optional_image'))
        {
            $this->storeImage($auction, $request->file('optional_image'), false);
        }

        return redirect()->route('art.index')->withSuccess('successfully made a new auction');
    }

    protected function storeImage(Art $art, $img, $isMaster)
    {
        $destinationPath   = "auction/img/";
        $extension         = $img->getClientOriginalExtension();
        $fileName          = rand(11111,99999).'.'.$extension; // renameing image random name
        //fullpath = path to picture + filename + extension
        $fullPath          = $destinationPath . $fileName;   
        $img->move($destinationPath , $fileName); 

        $picture            = new Picture;

        $picture->url       = '/' . $fullPath;
        $picture->art_id    = $art->id;
        $picture->isMaster  = $isMaster;

        $picture->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Art $auction)
    {
        //create all necessary time formats
        $end_datetime = Carbon::createFromFormat('Y-m-d H:i:s' ,$auction->end_datetime, 'Europe/Brussels');
        //array for all the time formats
        $toGo = [];
        $toGo['months'] = $end_datetime->diffInMonths();
        $daysToGo = $end_datetime->subMonths($toGo['months']);
        $toGo['days'] = $daysToGo->diffInDays();
        $hoursToGo = $daysToGo->subDays($toGo['days']);

        $toGo['hours'] = $hoursToGo->diffInHours();
        $minutesToGo = $hoursToGo->subHours($toGo['hours']);
        $toGo['minutes'] = $minutesToGo->diffInMinutes();

        $auction->toGo = $toGo;

        $data['auction'] = $auction;
        return View('Art.detail')->with($data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function myAuctions()
    {
        $active = Art::where('user_id', Auth::user()->id)->
                        where('processed', '0')->
                        where('sold', '0')->get();
        $sold = Art::where('user_id', Auth::user()->id)->
                        where('processed', '1')->
                        where('sold', '1')->get();
        $expired = Art::where('user_id', Auth::user()->id)->
                        where('processed', '1')->
                        where('sold', '0')->get();
        $allAuctions = Art::where('user_id', Auth::user()->id)->get();
        //pending = no bids, but not over yet
        $pending = collect([]);
        
        
        foreach($allAuctions as $auction)
        {

            if(!count($auction->bids) && $auction->processed == '0')
            {
                $pending->push($auction);
            }
        }
       

        $data['pending'] = $pending;
        $data['active'] = $active;
        $data['expired'] = $expired;
        $data['sold'] = $sold;
        return View('Art.myAuctions')->with($data);
    }

    public function buyNow($id)
    {
        $art = Art::findorfail($id);
        if($art->sold()->count() > 0)
        {
            return redirect()->back()->withErrors(['this item was already sold']);
        }

        $buyer = Auth::user();
        $sold = new Sold;
        $sold->art_id = $art->id;
        $sold->buyer_id = $buyer->id;
        $sold->save();

        $art->sold = 1;
        $art->save();

        $data['art'] = $art;

        return View('Art.bought')->with($data);
    }

    

    protected function highest_bid($bids)
    {
        $highest = 0;
        foreach($bids as $bid)
        {
            if($bid->price > $highest)
            {
                $highest = $bid->price;
            }
        }
        return $highest;
    }

    //make slugs
    protected function slugify($text)
    { 
      // replace non letter or digits by -
      $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

      // trim
      $text = trim($text, '-');

      // transliterate
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

      // lowercase
      $text = strtolower($text);

      // remove unwanted characters
      $text = preg_replace('~[^-\w]+~', '', $text);

      $text = $text . '-' . str_random(5);

      if (empty($text))
      {
        return 'n-a';
      }

      return $text;
    }
}
