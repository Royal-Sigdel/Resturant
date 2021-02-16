<?php

namespace App\Services;

use App\Product;

class MenuServices
{
    public static function getMenuwithCategory($restoId)
        {
            $menuItems = Product::where('resto_id',$restoId)
        ->get()
        ->groupBy('Product_Group.sgroup_code');

        return $menuItems;
        }
}