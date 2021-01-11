<?php

namespace App\Services\Transformation;
use LaravelLocalization;
use Carbon\Carbon;

class News
{
    public function getHomeData ($params)
    {
        return array_map(function($params) {

            return [
                
                'slug' => isset($params['slug']) ? $params['slug'] : '',
                'publish_date' => isset($params['publish_date']) ? Carbon::parse($params['publish_date'])->format('d/m/Y') : '',
                'thumbnail_url' => isset($params['thumbnail']) ? asset(NEWS_DIR.$params['thumbnail']) : '',
                'home_thumbnail_url' => isset($params['home_thumbnail']) ? asset(NEWS_DIR.$params['home_thumbnail']) : '',
                'image_url' => isset($params['image']) ? asset(NEWS_DIR.$params['image']) : '',
                'title' => isset($params['translation']['title']) ? $params['translation']['title'] : '',
                'content' => isset($params['translation']['content']) ? str_limit($params['translation']['content'], 150) : '',
                'category' => isset($params['category']['translation']['title']) ? $params['category']['translation']['title'] : '',
                'category_slug' => isset($params['category']['slug']) ? $params['category']['slug'] : '',
            ];

        }, $params);
    }

    public function getHomeDetail ($params)
    {
        if(empty($params))
            return [];

        return [

            'id' => isset($params['id']) ? $params['id'] : '',
            'slug' => isset($params['slug']) ? $params['slug'] : '',
            'publish_date' => isset($params['publish_date']) ? Carbon::parse($params['publish_date'])->format('d/m/Y') : '',
            'home_thumbnail_url' => isset($params['home_thumbnail']) ? asset(NEWS_DIR.$params['home_thumbnail']) : '',
            'image_url' => isset($params['image']) ? asset(NEWS_DIR.$params['image']) : '',
            'title' => isset($params['translation']['title']) ? $params['translation']['title'] : '',
            'content' => isset($params['translation']['content']) ? $params['translation']['content'] : '',
            'category' => isset($params['category']['translation']['title']) ? $params['category']['translation']['title'] : '',
            'category_id' => isset($params['category']['id']) ? $params['category']['id'] : '',
            'category_slug' => isset($params['category']['slug']) ? $params['category']['slug'] : '',
        ];
    }

    public function getDataCms ($params)
    {
        return array_map(function($params) {

            return [
                
                'id' => isset($params['id']) ? $params['id'] : '',
                'home_thumbnail_url' => isset($params['home_thumbnail']) ? asset(NEWS_DIR.$params['home_thumbnail']) : '',
                'publish_date' => isset($params['publish_date']) ? $params['publish_date'] : '',
                'title' => isset($params['translation']['title']) ? $params['translation']['title'] : '',
                'category' => isset($params['category']['translation']['title']) ? $params['category']['translation']['title'] : '',
            ];

        }, $params);
    }
    
    public function getSingleDataCms ($params)
    {
        return [
            'id' => isset($params['id']) ? $params['id'] : '',
            'image' => isset($params['image']) ? $params['image'] : '',
            'thumbnail' => isset($params['thumbnail']) ? $params['thumbnail'] : '',
            'thumbnail_url' => isset($params['thumbnail']) ? asset(NEWS_DIR.$params['thumbnail']) : '',
            'home_thumbnail' => isset($params['home_thumbnail']) ? $params['home_thumbnail'] : '',
            'home_thumbnail_url' => isset($params['home_thumbnail']) ? asset(NEWS_DIR.$params['home_thumbnail']) : '',
            'image_url' => isset($params['image']) ? asset(NEWS_DIR.$params['image']) : '',
            'category_id' => isset($params['category_id']) ? $params['category_id'] : '',
            'doctor_id' => isset($params['doctor_id']) ? $params['doctor_id'] : '',
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
            $return['content'][$tran['locale']] = $tran['content'];
        }
        return $return;
    }
}