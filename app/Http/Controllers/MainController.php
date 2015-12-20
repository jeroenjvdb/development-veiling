<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FAQ;
use App\Art;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
