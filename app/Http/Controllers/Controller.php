<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Session;
use App\Style;


abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    	$lang = Session::get('locale');
        if ($lang != null)
        {
        	\App::setLocale($lang);	
        } 

        // $data = [];
        $styles = Style::all();
        Session::put('footerStyle', $styles);
        // view()->share('footerStyle', $styles);
    }
}
