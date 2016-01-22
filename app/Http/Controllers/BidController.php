<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bid;
use App\Art;
use Auth;

use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BidController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    protected function validator($data)
    {
        return Validator::make($data, [
            'amount' => 'required|Numeric'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, Request $request)
    {
        $validation = $this->validator($request->all());

        $bids = Art::findOrFail($id)->bids()->get();
        $lower = false;
        foreach($bids as $bid)
        {
            //check if bid is higher than all other bids on this item
            if($bid->price >= $request->input('amount'))
            {
                $lower = true;
            }
        

        }
        //if bid isn't higher, run exception
        if($lower)
        {
            return redirect()->back()->withErrors(['er is reeds hoger geboden op deze veiling']);
        } else {
            //else make bid
            $bid = new Bid;
            $bid->user_id = Auth::user()->id;
            $bid->art_id = $id;
            $bid->price = $request->input('amount');
            $bid->save();
            return redirect()->back()->withSuccess('succesvol geboden!');
        }
        
    }

    public function myBids()
    {
        //get all your bids
        $bids = Bid::where('user_id', Auth::user()->id)->groupBy('art_id')->get();
        $auctions = collect([]);
        foreach($bids as $bid)
        {
            $auction = $bid->art;
            $auctions->push($auction);
        }

        $data['auctions'] = $auctions;
        return View('User.my-bids')->with($data);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
