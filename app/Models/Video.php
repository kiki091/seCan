<?php

namespace App\Models;
use App\Models\BaseModel as Model;

class Video extends Model
{
	
	protected $table = 'video';
	protected $fillable = [
		'thumbnail',
		'youtube_url',
		'category_id',
		'doctor_id',
		'publish_date',
		'created_at',
		'updated_at',
	];
    public $timestamps = false;


	public function translations()
	{
		return $this->hasMany(\App\Models\VideoTran::class,'video_id','id');
	}

    /**
     * @return mixed
     */
    public function translation()
    {
    	
    	return $this->belongsTo(\App\Models\VideoTran::class,'id','video_id')
            ->where('locale', '=' , $this->getCurrentLocalize());
    }

    /**
     * @return mixed
     */
    public function doctor()
    {
    	
    	return $this->belongsTo(\App\Models\Doctor::class,'doctor_id','id');
    }

    /**
     * @return mixed
     */
    public function category()
    {
    	
    	return $this->belongsTo(\App\Models\Category::class,'category_id','id');
    }
}