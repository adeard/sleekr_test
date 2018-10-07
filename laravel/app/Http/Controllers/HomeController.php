<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Libraries\Assets;

class HomeController extends Controller
{

    public function index()
	{
		$css_assets = [
			'bootstrap'
		];

		$js_assets = [
            'jquery',
            'bootstrap'
            
		];

		$this->data['css_assets'] 	= Assets::load('css', $css_assets);
		$this->data['js_assets'] 	= Assets::load('js', $js_assets);
		$this->data['title']		= 'Home';

	    return view('main_layout')->with('data', $this->data)
								  ->nest('content', 'home', array('data' => $this->data));
	}

}
