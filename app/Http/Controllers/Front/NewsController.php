<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Bridge\Tag as TagServices;
use App\Services\Bridge\News as NewsServices;

use Response;
use Validator;

class NewsController extends Controller
{
    /**
     * init service
     * @return true
     **/
    protected $tagManager;
    protected $newsManager;
    
	public function __construct(
        TagServices $tagManager,
        NewsServices $newsManager) 
	{
        parent::__construct();
        $this->tagManager = $tagManager;
        $this->newsManager = $newsManager;

    }
    
    public function index(Request $request)
    {   
        $data['tags'] = $this->tagManager->getFrontData(['type'=> 'news']);
        $data['news'] = $this->newsManager->getHomeData($request->all());
        // dd($data);
        return view('front.pages.news', $data);
    }
    
    public function tag($tagSlug)
    {
        if(is_null($tagSlug))
            return abort(404);

        $data['tags'] = $this->tagManager->getFrontData(['type'=> 'news']);
        $data['news'] = $this->newsManager->getHomeData(['tag_slug' => $tagSlug]);

        if(empty($data['news']))
            return abort(404);

        $data['category_name'] = $tagSlug;
        return view('front.pages.news', $data);
    }
    
    public function category($categorySlug)
    {
        if(is_null($categorySlug))
            return abort(404);

        $data['tags'] = $this->tagManager->getFrontData(['type'=> 'news']);
        $data['news'] = $this->newsManager->getHomeData(['category_slug' => $categorySlug]);

        if(empty($data['news']))
            return abort(404);

        $data['category_name'] = $categorySlug;
        return view('front.pages.news', $data);
    }
    
    public function detail($slug)
    {
        $data['tags'] = $this->tagManager->getFrontData(['type'=> 'news']);
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