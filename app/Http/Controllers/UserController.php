<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bid;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'create']);
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

    public function overview()
    {
        // $data = [];
        $user = Auth::user();
        $data['user'] = $user;

        return View('User.overview')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('User.create');

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

    public function myBids()
    {
        $bids = Bid::where('user_id', Auth::user()->id)->groupBy('art_id')->get();
        $auctions = collect([]);
        // echo '<pre>';
        foreach($bids as $bid)
        {
            $auction = $bid->art;
            // var_dump($auction);
            $auctions->push($auction);
        }

        // var_dump($auctions);
        // dd();
        // $data=[];
        $data['auctions'] = $auctions;
        return View('User.my-bids')->with($data);
    }
}
