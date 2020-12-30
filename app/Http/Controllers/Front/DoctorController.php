<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Response;
use Validator;

class DoctorController extends Controller
{
	public function __construct() 
	{

    }
    
    public function index(Request $request)
    {
        return view('front.pages.doctor');
    }
    
    public function article(Request $request)
    {
        return view('front.pages.doctor-article');
    }
    
    public function video(Request $request)
    {
        return view('front.pages.doctor-video');
    }
}