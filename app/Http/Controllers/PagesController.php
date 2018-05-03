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
		$data = array(
			'title'=>'Services',
			'services'=>['Programming','web design',
			'computing', 'flushing', 'fantastic']);
    	return view('pages/services')->with($data);
    }

}