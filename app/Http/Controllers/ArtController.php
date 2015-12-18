<?php

namespace App\Http\Controllers;

use App\Art;
use App\Style;
use App\Watchlist;
use Auth;

use Validator;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $art = Art::all();

        $data = [];
        $data['auctions'] = $art;

        return View('Art.index')->with($data);
    }


    protected function validation($data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'year' => 'required|min:1000|max:2030|numeric',
            'width' => 'required|alpha_num',
            'height' => 'required|alpha_num',
            'depth' => 'alpha_num',
            'description' => 'required',
            'condition' => 'required',
            'est_low_price' => 'required|numeric',
            'est_high_price' => 'required|numeric',
            'end_datetime' => 'required|date',
            'buyout' => 'numeric',
            'TermsAgree' => 'required|accepted',
            'color' => 'required',
            'artist' => 'required'
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
            // var_dump($style->name);
            $styleArray[$style->id] = $style->name;
        }
        // var_dump($styleArray);
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
        // var_dump($request->all());
        $validation = $this->validation($request->all());
        if($validation->fails())
        {
            return redirect()->back()->withInput()->withErrors($validation);
        }
        $auction = new Art;
        $auction->fill($request->all());
        $auction->description_nl = $request->input('description');
        $auction->description_en = $request->input('description');

        $auction->condition_nl = $request->input('condition');
        $auction->condition_en = $request->input('condition');


        $auction->user_id = 1;
        $auction->artist_id = 1;
        $auction->style_id = 1;


        $auction->save();
        // echo '</br>';
        // var_dump($auction);

        return redirect()->route('art.index')->withSuccess('successfully made a new auction');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];
        $auction = Art::findorfail($id);
        // var_dump($auction);
        $data['auction'] = $auction;

        
        // var_dump($auction->myWatchlist());
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
        $data = [];
        $data['pending'] = null;
        $data['refused'] = null;
        $data['active'] = null;
        $data['expired'] = null;
        $data['sold'] = null;

        return View('Art.myAuctions')->with($data);
    }
}
