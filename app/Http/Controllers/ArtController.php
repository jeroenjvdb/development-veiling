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
            'title'             => 'required|max:255',
            'year'              => 'required|min:1000|max:2030|numeric',
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
        if(!($request->file('artwork')->isValid() || $request->file('signature')->isValid()))
        {
            return redirect()->back()->withInput()->withErrors(['there went something wrong while uploading the pictures.']);
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

        $this->storeImage($auction, $request->file('artwork'), true);
        $this->storeImage($auction, $request->file('signature'), false);
        if($request->file('optional_image'))
        {
            $this->storeImage($auction, $request->file('optional_image'), false);
        }
        // echo '</br>';
        // var_dump($auction);

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
        // $competitor->thumbnail      = '/' . $thumbnailPath;
        // $competitor->ip             = $request->getClientIp();
        // $competitor->is_deleted     = 0;
        // //voor wanneer ik thumbnails wil maken
        // $pic = $request->file('duvel');

        // //make a thumbnail for the same pic with a height of 100
        // $picSize            = getimagesize($pic);
        // $width              = $picSize[0];
        // $height             = $picSize[1];
        // $newHeight          = 100;
        // //change the width depending on the height of the pic
        // $newWidth           = $newHeight * ($width/$height);
        // $image              = imagecreatefromjpeg($pic);
        // $thumbnail          = imagecreatetruecolor($newWidth, $newHeight);
        // //make the pic ($image) smaller and move it to $thumbnail
        // $newImage           = imagecopyresampled($thumbnail, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        // //the path where to put the thumbnail
        // $thumbnailPath      = $destinationPath . 'thumbnail/' . $fileName;
        // imagejpeg($thumbnail, $thumbnailPath);
        // uploading file to given path
        //make the competitor object for the database

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

    public function buyNow($id)
    {
        $art = Art::findorfail($id);
        var_dump($art->sold()->count());
        if($art->sold()->count() > 0)
        {
            return redirect()->back()->withErrors(['this item was already sold']);
        }
        $buyer = Auth::user();
        $sold = new Sold;
        $sold->art_id = $art->id;
        $sold->buyer_id = $buyer->id;
        $sold->save();

        $data = [];
        $data['art'] = $art;

        return View('Art.bought')->with($data);
    }

    public function search(Request $request)
    {
        $data = [];
                
        $search = $request->input('search');
        if($search == "")
        {
            return redirect()->route('home')->withErrors(['please fill in the searchbox']);
        }

        $data['query'] = $search;

        $artOutput = Art::where('description_nl', 'like', '%' . $search . '%')->get();
        // var_dump($searchOutput);

        $data['art'] = $artOutput;

        return View('Main.search')->with($data);
    }
}
