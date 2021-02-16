<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class order_details extends Model
{

    protected $guarded = [];
    public function details()
    {
        return $this->belongsTo(Order::class,'order_id');
    }
    public function MenuOrderDetails()
    {
        return $this->belongsTo(Menus::class,'menu_id');
    }
    public function TableOrderDetails()
    {
        return $this->belongsTo(Restaurant::class,'table_id');
    }
}
