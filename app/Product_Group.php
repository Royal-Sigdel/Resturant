<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Group extends Model
{
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
