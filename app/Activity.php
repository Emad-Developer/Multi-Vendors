<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['activity_id','activity_name' , 'activity_img'];


    // activity belongsToMany seller
    public function sellers()
    {
        return $this->belongsToMany('App\Seller');
    }
        
}
