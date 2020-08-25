<?php

namespace App\Services;

use App\menu;

class MenuServices
{
    public static function getMenuwithCategory($restoId)
        {
            $menuItems = Menu::where('resto_id',$restoId)
        ->get()
        ->groupBy('Category.name');

        return $menuItems;
        }
}