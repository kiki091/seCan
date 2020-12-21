<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Response;
use Validator;

class NewsController extends Controller
{
	public function __construct() 
	{

    }
    
    public function index(Request $request)
    {
        return view('front.pages.news');
    }
}