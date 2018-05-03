<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

	public function index(){
		return view('pages/index');
	}

    public function about(){
    	$light = 22;
    	return view('pages/about')->with('light',$light);
    }


public function services(){

    	return view('pages/services');
    }

}