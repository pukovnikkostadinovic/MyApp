<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function about(){

    	return view('pages/about');
    }


function services(){

    	return view('pages/services');
    }
}