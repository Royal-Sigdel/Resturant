<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class table_list extends Model
{
    protected $guarded = [];

    protected $appends = ['slug', 'ordersSlug'];

    public function owner()
    {
        $this->belongsTo(User::class,'owner_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'resto_id');
    }

    public function getSlugAttribute(){

        return route('restos.menu', $this->no);
    }

    public function getOrdersSlugAttribute(){

        return route('restos.order', $this->no);
    }
}
