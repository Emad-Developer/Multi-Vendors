<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    protected $fillable = [
        'sellerName', 'storeName' , 'activity_id' ,  'email' , 'storeAddress', 'city' , 'storePhone' , 'storeImage'
    ];

    // seller belongToMany activity
    public function activities()
    {
        return $this->belongsToMany('App\Activity');
    }
}
