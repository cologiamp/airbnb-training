<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	//Index/home page.
    public function index() 
    {
    	return view('index');
    }


    //About Page.
    public function about() 
    {
    	
    }
}
