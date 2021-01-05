<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Bridge\Banner as BannerServices;
use App\Services\Bridge\News as NewsServices;
use App\Services\Bridge\Video as VideoServices;
use App\Services\Bridge\Contact as ContactServices;
use App\Services\Api\Response as ResponseService;

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
    protected $videoManager;
    protected $contactManager;

    public function __construct(
        BannerServices $bannerManager, 
        NewsServices $newsManager, 
        VideoServices $videoManager, 
        ContactServices $contactManager,
        ResponseService $response) 
	{
        $this->response = $response;
        $this->newsManager = $newsManager;
        $this->bannerManager = $bannerManager;
        $this->videoManager = $videoManager;
        $this->contactManager = $contactManager;

    }
    
    public function index(Request $request)
    {
        $data['home_sliders'] = $this->bannerManager->getHomeSlide($request->all());
        $data['home_news'] = $this->newsManager->getHomeData(['limit'=> '3', 'order_by'=> 'publish_date']);
        $data['home_video'] = $this->videoManager->getFrontData(['limit' => '3', 'order_type' => 'desc']);
        
        return view('front.pages.home', $data);
    }

    public function storeContact(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), $this->validationStore($request));

        if ($validator->fails()) {
            //TODO: case fail
            return $this->response->setResponseErrorFormValidation($validator->messages(), false);

        } else {
            //TODO: case pass
            return $this->contactManager->storeContact($request->except(['_token']));
        }
    }

    public function storeSubscribe(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), $this->validationStoreSubscribe($request));

        if ($validator->fails()) {
            //TODO: case fail
            return $this->response->setResponseErrorFormValidation($validator->messages(), false);

        } else {
            //TODO: case pass
            return $this->contactManager->storeSubscribe($request->except(['_token']));
        }
    }

    protected function validationStore($request = array())
    {
        $rules = [
            'fullname' => 'required',
            'email' => 'required',
            'message' => 'required',
        ];

        return $rules;

    }

    protected function validationStoreSubscribe($request = array())
    {
        $rules = [
            'fullname' => 'required',
            'email' => 'required'
        ];

        return $rules;

    }
}