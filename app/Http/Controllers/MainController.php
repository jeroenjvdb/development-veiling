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

use Mail;



class MainController extends Controller
{
    public function dashboard()
    {
        $auctions = Art::take(3)->get();

        $data['auctions'] = $auctions;
    	return View('home')->with($data);
    }

    public function FAQ()
    {
    	$FAQ = FAQ::all();

    	$data['FAQ'] = $FAQ;
    	return View('FAQ')->with($data);
    }

    public function contact(Art $auction)
    {
        if(!$auction->id)
        {
            $allAuctions = Art::where('processed', '0')->get();
            $data['allAuctions'] = $allAuctions;
        } else
        {
            $data['auction'] = $auction;
        }
        return View('Main.contact')->with($data);
    }

    public function postContact(Request $request)
    {
        $auction = Art::findorfail($request->input('auction'))->first();
        $auctionEmail = $auction->user->email;

        $data['receiver'] = $auctionEmail;
        $data['sender'] = $request->input('email');
        $data['question'] = $request->input('question');
        // send mail to owner of art
        Mail::send('emails.question', $data,
                    function($message) use ($data) {
                        $message->to($data['receiver'])
                              ->subject('I have a question about your auction');
                    });

        return redirect()->route('home');

    }

    public function setLocale($lang)
    {
        //change language
        Session::put('locale', $lang);
            App::setLocale($lang);
            echo Lang::getLocale();

            return redirect()->back();
    }
}
