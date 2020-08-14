<?php

namespace App\Services;

use App\menu;

class MenuServices
{
    public static function getMenuwithCategory(array $restoIDs)
        {
            $categories = Menu::whereIn('resto_id',$restoIDs)
        ->get()
        ->groupBy('Category.name');

        return $categories;
        }
}