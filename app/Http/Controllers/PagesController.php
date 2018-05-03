<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

	function index(){
		return view('pages/index');
	}

    function about(){
    	$light = 22;
    	return view('pages/about')->with('light','$light');
    }


function services(){

    	return view('pages/services');
    }

}