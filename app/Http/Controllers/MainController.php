<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FAQ;

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
}
