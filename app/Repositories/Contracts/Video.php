<?php

namespace App\Repositories\Contracts;


interface Video
{
    
    /**
     * @param $params
     * @return mixed
     */
    public function getFrontData($params);
    
    /**
     * @param $params
     * @return mixed
     */
    public function getFrontDetail($params);

}