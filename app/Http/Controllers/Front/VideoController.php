<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Bridge\Video as VideoServices;

use Response;
use Validator;

class VideoController extends Controller
{
    /**
     * init service
     * @return true
     **/
    protected $videoManager;

	public function __construct(VideoServices $videoManager) 
	{
        parent::__construct();
        $this->videoManager = $videoManager;

    }
    
    public function index(Request $request)
    {
        $data['video'] = $this->videoManager->getFrontData($request->all());
        
        return view('front.pages.video', $data);
    }
    
    public function category($categorySlug)
    {
        if(is_null($categorySlug))
            return abort(404);

        $data['video'] = $this->videoManager->getFrontData(['category_slug' => $categorySlug]);

        if(empty($data['video']))
            return abort(404);

        $data['category_name'] = $categorySlug;
        return view('front.pages.video', $data);
    }
    
    public function detail($slug)
    {
        $data['detail'] = $this->videoManager->getFrontDetail(['slug' => $slug]);
        
        // if(empty($data['detail']))
        //     return abort(404);

        $data['related'] = $this->videoManager->getFrontData([
            'related_slug' => $slug,
            'category_id' => $data['detail']['category_id'], 
            'limit' => '3', 
            'order_type' => 'desc'
        ]);
        $data['prev'] = $this->videoManager->getFrontDetail([
            'related_slug' => $slug,
            'category_id' => $data['detail']['category_id'], 
            'limit' => '1', 
            'order_type' => 'asc'

        ]);
        $data['next'] = $this->videoManager->getFrontDetail([
            'related_slug' => $slug,
            'category_id' => $data['detail']['category_id'], 
            'limit' => '1', 
            'order_type' => 'desc'

        ]);

        return view('front.pages.video-detail', $data);
    }
}