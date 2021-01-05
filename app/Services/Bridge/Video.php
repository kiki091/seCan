<?php

namespace App\Services\Bridge;

use App\Repositories\Contracts\Video as VideoInterface;

class Video {

    /**
     * @var Video Interface
     */
    protected $videoManager;

    public function __construct(VideoInterface $videoManager)
    {
        $this->videoManager = $videoManager;
    }
    
    /**
     * @param $params
     * @return mixed
     */
    public function getFrontData($params = array())
    {
        return $this->videoManager->getFrontData($params);
    }
    
    /**
     * @param $params
     * @return mixed
     */
    public function getFrontDetail($params = array())
    {
        return $this->videoManager->getFrontDetail($params);
    }

}