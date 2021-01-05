<?php

namespace App\Repositories\Implementation;

use App\Models\Video as VideoModel;
use App\Models\VideoTran as VideoTranModel;
use App\Services\Api\Response as ResponseService;
use App\Repositories\Contracts\Video as VideoInterface;
use App\Services\Transformation\Video as VideoTransformation;
use Carbon\Carbon;
use DB;
use LaravelLocalization;

class Video implements VideoInterface
{
    protected $videoModel;
    protected $videoTranModel;
    protected $videoTransform;
    protected $message;
    protected $lastInsertId;
    protected $response;

    function __construct(VideoModel $videoModel, VideoTranModel $videoTranModel, VideoTransformation $videoTransform,  
    ResponseService $response)
    {

        $this->response = $response;
        $this->videoModel = $videoModel;
        $this->videoTranModel = $videoTranModel;
        $this->videoTransform = $videoTransform;
    }
    
    /** 
     * get data
     * @param $data
     * @return array
     */

    public function getFrontData($params)
    {
        try {
            //code...

            return $this->videoTransform->getFrontData($this->videoManager($params));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    /** 
     * get data
     * @param $data
     * @return array
     */

    public function getFrontDetail($params)
    {
        try {
            //code...

            return $this->videoTransform->getFrontDetail($this->videoManager($params, 'asc', 'array', true));
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

            return $this->videoTransform->getListDataCms($this->videoManager($params));
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
            $data = $this->videoTransform->getSingleDataCms($this->videoManager(['id' => $requestId], 'asc', 'array', true));
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
                $store = $this->videoModel->find($params['id']);
            } else {
                $store = $this->videoModel;
                $store->slug = isset($params['title']['id']) ? str_slug($params['title']['id']) : str_slug($params['title']['en']);
            }
            
            $store->created_at = Carbon::now();
            
            if($store->save()) {
                
                if($this->storeDataTranslationCms($params, $store->id)) {

                    DB::commit();
                    return $this->response->setResponse('Success save data', true);
                }
                
                DB::rollBack();
                return $this->response->setResponse($this->message, false);
                    
            }
                
            DB::rollBack();
            return $this->response->setResponse($this->message, false);
            
        } catch (\Exception $e) {
            DB::rollBack();
            $this->message = $e->getMessage();
        }
    }

    /** 
     * get data
     * @param $data
     * @return array
     */

    protected function storeDataTranslationCms($params, $categoryId)
    {
        try {
            //code...

            if(isset($params['id'])) {

                $this->videoTranModel->where('category_id', $params['id'])->delete();
            }

            $transData = [];

            $suportLocale = LaravelLocalization::getSupportedLocales();

            foreach($suportLocale as $key=> $locale) {
                $transData[$key] = [
                    'locale' => $key,
                    'category_id' => isset($params['id']) ? $params['id'] : $categoryId,
                    'title' => isset($params['title'][$key]) ? $params['title'][$key] : '',
                    'created_at' => Carbon::now()
                ];
            }

            if($this->videoTranModel->insert($transData))
                return true;

            return false;

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

            $model = $this->videoModel->find($params['id']);

            if($model) {
                $model->delete();
                $this->videoTranModel->where('category_id', $params['id'])->delete();

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
    protected function videoManager($params = array(), $orderType = 'asc', $returnType = 'array', $returnSingle = false)
    {
        try {

            //code...
            $el = $this->videoModel->with(['translation', 'translations', 'category', 'category.translation']);

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