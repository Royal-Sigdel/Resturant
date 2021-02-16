<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;
use App\order_details;

class Order extends Model
{
    protected $guarded = [];

    /*protected $casts = [

        'order_details' => 'array',
    ];
*/
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class,'resto_id');
    }
    public function order_details(){
        return $this->hasMany(order_details::class,'order_id','id');
    }
}
