<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Bridge\News as NewsServices;

use Response;
use Validator;

class NewsController extends Controller
{
    /**
     * init service
     * @return true
     **/
    protected $newsManager;
	public function __construct(NewsServices $newsManager) 
	{
        $this->newsManager = $newsManager;

    }
    
    public function index(Request $request)
    {
        $data['news'] = $this->newsManager->getHomeData($request->all());
        return view('front.pages.news', $data);
    }
    
    public function category($categorySlug)
    {
        if(is_null($categorySlug))
            return abort(404);

        $data['news'] = $this->newsManager->getHomeData(['category_slug' => $categorySlug]);

        if(empty($data['news']))
            return abort(404);

        $data['category_name'] = $categorySlug;
        return view('front.pages.news', $data);
    }
    
    public function detail($slug)
    {
        $data['detail'] = $this->newsManager->getHomeDetail(['slug' => $slug]);
        
        if(empty($data['detail']))
            return abort(404);
        
        $data['related'] = $this->newsManager->getHomeData([
            'related_slug' => $slug,
            'category_id' => $data['detail']['category_id'], 
            'limit' => '3', 
            'order_type' => 'desc'
        ]);
        $data['prev'] = $this->newsManager->getHomeDetail([
            'related_slug' => $slug,
            'category_id' => $data['detail']['category_id'], 
            'limit' => '1', 
            'order_type' => 'asc'

        ]);
        $data['next'] = $this->newsManager->getHomeDetail([
            'related_slug' => $slug,
            'category_id' => $data['detail']['category_id'], 
            'limit' => '1', 
            'order_type' => 'desc'

        ]);
        
        return view('front.pages.news-detail',$data);
    }
}