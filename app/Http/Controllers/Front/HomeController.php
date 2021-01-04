<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Bridge\Banner as BannerServices;
use App\Services\Bridge\News as NewsServices;

use Response;
use Validator;

class HomeController extends Controller
{
    /**
     * init service
     * @return true
     **/
    protected $response;
    protected $newsManager;
    protected $bannerManager;

	public function __construct(BannerServices $bannerManager, NewsServices $newsManager) 
	{
        $this->newsManager = $newsManager;
        $this->bannerManager = $bannerManager;

    }
    
    public function index(Request $request)
    {
        $data['home_sliders'] = $this->bannerManager->getHomeSlide($request->all());
        $data['home_news'] = $this->newsManager->getHomeData(['limit'=> '3', 'order_by'=> 'publish_date']);
        
        return view('front.pages.home', $data);
    }
}