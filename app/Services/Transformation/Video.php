<?php

namespace App\Services\Transformation;
use LaravelLocalization;
use Carbon\Carbon;

class Video
{
    public function getFrontData ($params)
    {
        return array_map(function($params) {

            return [

                'id' => isset($params['id']) ? $params['id'] : '',
                'slug' => isset($params['slug']) ? $params['slug'] : '',
                'thumbnail_url' => isset($params['thumbnail']) ? asset(VIDEO_DIR.$params['thumbnail']) : '',
                'home_thumbnail_url' => isset($params['home_thumbnail']) ? asset(VIDEO_DIR.$params['home_thumbnail']) : '',
                'youtube_url' => isset($params['youtube_url']) ? $params['youtube_url'] : '',
                'title' => isset($params['translation']['title']) ? $params['translation']['title'] : '',
                'category' => isset($params['category']['translation']['title']) ? $params['category']['translation']['title'] : '',
            ];

        }, $params);
    }

    public function getFrontDetail ($params)
    {
        if(empty($params))
            return [];
            
        return [

            'id' => isset($params['id']) ? $params['id'] : '',
            'slug' => isset($params['slug']) ? $params['slug'] : '',
            'thumbnail_url' => isset($params['thumbnail']) ? asset(VIDEO_DIR.$params['thumbnail']) : '',
            'home_thumbnail_url' => isset($params['home_thumbnail']) ? asset(VIDEO_DIR.$params['home_thumbnail']) : '',
            'youtube_url' => isset($params['youtube_url']) ? $params['youtube_url'] : '',
            'publish_date' => isset($params['publish_date']) ? Carbon::parse($params['publish_date'])->format('d/m/Y') : '',
            'title' => isset($params['translation']['title']) ? $params['translation']['title'] : '',
            'category' => isset($params['category']['translation']['title']) ? $params['category']['translation']['title'] : '',
            'category_id' => isset($params['category_id']) ? $params['category_id'] : '',
            'doctor_id' => isset($params['doctor_id']) ? $params['doctor_id'] : '',
        ];
    }

    public function getDataCms ($params)
    {
        return array_map(function($params) {

            return [
                
                'id' => isset($params['id']) ? $params['id'] : '',
                'title' => isset($params['translation']['title']) ? $params['translation']['title'] : '',
            ];

        }, $params);
    }

    public function getSingleDataCms ($params)
    {
        return [
            'id' => isset($params['id']) ? $params['id'] : '',
            'translations' => isset($params['translations']) ? $this->setDataTranslations($params['translations']) : []
        ];
    }

    /**
     * Set Data Translations
     * @param $params
     * @return array
     */
    protected function setDataTranslations($params)
    {
        $return = [];
        foreach ($params as $tran) {
            $return['title'][$tran['locale']] = $tran['title'];
        }
        return $return;
    }
}