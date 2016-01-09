<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FAQ;
use App\Art;
use App;
use Lang; 
use Session;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Auction;



class MainController extends Controller
{
    public function dashboard()
    {
    	return View('home');
    }

    public function FAQ()
    {
    	$FAQ = FAQ::all();

    	$data = [];
    	$data['FAQ'] = $FAQ;

    	return View('FAQ')->with($data);
    }

    public function contact($auction = False)
    {
        if(!$auction)
        {

        }
    }

    public function setLocale($lang)
    {
        Session::put('locale', $lang);
            App::setLocale($lang);
            echo Lang::getLocale();

            return redirect()->back();
    }
}
