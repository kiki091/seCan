<?php

namespace App\Repositories\Implementation;

use App\Models\News as NewsModel;
use App\Models\NewsTran as NewsTranModel;
use App\Services\Api\Response as ResponseService;
use App\Repositories\Contracts\News as NewsInterface;
use App\Services\Transformation\News as NewsTransformation;
use Carbon\Carbon;
use DB;
use LaravelLocalization;

class News implements NewsInterface
{
    protected $newsModel;
    protected $newsTranModel;
    protected $newsTransform;
    protected $message;
    protected $lastInsertId;
    protected $response;

    function __construct(NewsModel $newsModel, NewsTranModel $newsTranModel, NewsTransformation $newsTransform,  
    ResponseService $response)
    {

        $this->response = $response;
        $this->newsModel = $newsModel;
        $this->newsTranModel = $newsTranModel;
        $this->newsTransform = $newsTransform;
    }

    /** 
     * get data
     * @param $data
     * @return array
     */

    public function getHomeData($params)
    {
        try {
            //code...

            return $this->newsTransform->getHomeData($this->newsManager($params));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /** 
     * get data
     * @param $data
     * @return array
     */

    public function getHomeDetail($params)
    {
        try {
            //code...

            return $this->newsTransform->getHomeDetail($this->newsManager($params, 'asc', 'array', true));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /** 
     * get data
     * @param $data
     * @return array
     */

    public function getDataCms($params)
    {
        try {
            //code...

            return $this->newsTransform->getDataCms($this->newsManager($params));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /** 
     * get data
     * @param $data
     * @return array
     */

    public function editDataCms($requestId)
    {
        try {
            //code...
            $data = $this->newsTransform->getSingleDataCms($this->newsManager(['id' => $requestId], 'asc', 'array', true));
            return $this->response->setResponse('Success get data', true, $data);
            
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /** 
     * get data
     * @param $data
     * @return array
     */

    public function storeDataCms($params)
    {
        try {
            //code...
            DB::beginTransaction();

            if(isset($params['id'])) {
                $store = $this->newsModel->find($params['id']);
                $store->updated_at = Carbon::now();
                
            } else {
                $store = $this->newsModel;
                $store->created_at = Carbon::now();
                $store->publish_date = Carbon::now();
                $store->slug = isset($params['title']['id']) ? str_slug($params['title']['id']) : '';
            }
            
            $store->category_id = isset($params['category_id']) ? $params['category_id'] : '';
            $store->doctor_id = isset($params['doctor_id']) ? $params['doctor_id'] : NULL;
            
            if(isset($params['image']) && !empty($params['image']))
                $store->image = strtolower(str_replace(' ', '_', $params['image']->getClientOriginalName()));
            else
                $store->image = isset($params['old_image']) ? $params['old_image'] : '';
            
            if(isset($params['thumbnail']) && !empty($params['thumbnail']))
                $store->thumbnail = strtolower(str_replace(' ', '_', $params['thumbnail']->getClientOriginalName()));
            else
                $store->thumbnail = isset($params['old_thumbnail']) ? $params['old_thumbnail'] : '';
            
            if(isset($params['home_thumbnail']) && !empty($params['home_thumbnail']))
                $store->home_thumbnail = strtolower(str_replace(' ', '_', $params['home_thumbnail']->getClientOriginalName()));
            else
                $store->home_thumbnail = isset($params['old_home_thumbnail']) ? $params['old_home_thumbnail'] : '';
            
            if($store->save()) {
                
                if($this->storeDataTranslationCms($params, $store->id)) {

                    if($this->imageUploader($params)) {
                        DB::commit();
                        return $this->response->setResponse('Success save data', true);
                    }

                    DB::rollBack();
                    return $this->response->setResponse($this->message, false);
                }
                
                DB::rollBack();
                return $this->response->setResponse($this->message, false);
                    
            }
                
            DB::rollBack();
            return $this->response->setResponse($this->message, false);
            
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            $this->message = $e->getMessage();
        }
    }

    /** 
     * get data
     * @param $data
     * @return array
     */

    protected function storeDataTranslationCms($params, $newsId)
    {
        try {
            //code...

            if(isset($params['id'])) {

                $this->newsTranModel->where('news_id', $params['id'])->delete();
            }

            $transData = [];

            $suportLocale = LaravelLocalization::getSupportedLocales();

            foreach($suportLocale as $key=> $locale) {
                $transData[$key] = [
                    'locale' => $key,
                    'news_id' => isset($params['id']) ? $params['id'] : $newsId,
                    'title' => isset($params['title'][$key]) ? $params['title'][$key] : '',
                    'content' => isset($params['content'][$key]) ? $params['content'][$key] : '',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }

            if($this->newsTranModel->insert($transData))
                return true;

            return false;

        } catch (\Exception $e) {
            
            $this->message = $e->getMessage();
            return false;
        }
    }

    protected function imageUploader($params)
    {
        try {
            //code...

            if (isset($params['thumbnail']) && !empty($params['thumbnail'])) {
                if ($params['thumbnail']->isValid()) {
                    
                    $thumbnail = strtolower(str_replace(' ', '_', $params['thumbnail']->getClientOriginalName()));
                    
                    if (!$params['thumbnail']->move('./' . NEWS_DIR, $thumbnail)) {
                        
                        $this->message = 'failed upload thumbnail';
                        return false;
                    }
                }
                else {
                    $this->message = $params['thumbnail']->getErrorMessage();
                    return false;
                }
            }

            if (isset($params['image']) && !empty($params['image'])) {
                if ($params['image']->isValid()) {
                    
                    $image = strtolower(str_replace(' ', '_', $params['image']->getClientOriginalName()));
                    
                    if (!$params['image']->move('./' . NEWS_DIR, $image)) {
                        
                        $this->message = 'failed upload image';
                        return false;
                    }
                }
                else {
                    $this->message = $params['image']->getErrorMessage();
                    return false;
                }
            }

            if (isset($params['home_thumbnail']) && !empty($params['home_thumbnail'])) {
                if ($params['home_thumbnail']->isValid()) {
                    
                    $home_thumbnail = strtolower(str_replace(' ', '_', $params['home_thumbnail']->getClientOriginalName()));
                    
                    if (!$params['home_thumbnail']->move('./' . NEWS_DIR, $home_thumbnail)) {
                        
                        $this->message = 'failed upload home thumbnail';
                        return false;
                    }
                }
                else {
                    $this->message = $params['home_thumbnail']->getErrorMessage();
                    return false;
                }
            }
    
            return true;

        } catch (\Exception $e) {
            
            $this->message = $e->getMessage();
            return false;
        }
        
    }

    /** 
     * delete data
     * @param $data
     * @return array
     */

    public function deleteDataCms($params)
    {
        try {

            //code...

            DB::beginTransaction();

            $model = $this->newsModel->find($params['id']);

            if($model) {
                $model->delete();
                $this->newsTranModel->where('news_id', $params['id'])->delete();

                DB::commit();
                return $this->response->setResponse('Success delete data', true);
            }

            DB::rollBack();
            return $this->response->setResponse($this->message, false);
            
        } catch (\Exception $e) {
            DB::rollBack();
            $this->message = $e->getMessage();
        }
    }

    /**
     * Get All CarRental
     * Warning: this function doesn't redis cache
     * @param array $params
     * @return array
     */
    protected function newsManager($params = array(), $orderType = 'desc', $returnType = 'array', $returnSingle = false)
    {
        try {
            
            //code...
            $el = NewsModel::with(['translation', 'translations', 'category', 'category.translation', 'doctor']);

            if(isset($params['category_slug'])) {
                $el->whereHas('category', function($q) use($params) {
                    $q->where('slug', $params['category_slug']);
                });
            }
            
            if(isset($params['slug']))
                $el->where('slug',$params['slug']);
                
            if(isset($params['doctor_id']))
                $el->where('doctor_id',$params['doctor_id']);
            
            if(isset($params['related_slug']))
                $el->where('slug','!==', $params['related_slug']);

            if(isset($params['category_id']))
                $el->where('category_id',$params['category_id']);
            
            if(isset($params['id']))
                $el->where('id',$params['id']);

            if(isset($params['limit']))
                $el->take($params['limit']);

            if(isset($params['order_by'])) {
                $el
                ->orderBy($params['order_by'], (isset($params['order_type']) ? $params['order_type'] : $orderType));
            } 
            else if(isset($params['order_type'])) {
                $el->orderBy('publish_date', $params['order_type']);
            } else {
                $el
                ->orderBy('publish_date', (isset($params['order_type']) ? $params['order_type'] : $orderType));
            }
            
            if(!$el->count())
                return array();

            switch ($returnType) {
                case 'array':
                    if(!$returnSingle) {
                        return $el
                        ->get()->toArray();
                    } else {
                        return $el
                        ->first()->toArray();
                    }
                    break;
            }

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

}