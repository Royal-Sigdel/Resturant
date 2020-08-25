<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\menu;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
    /*public static function getcategoryid($resto_id,$category){
        $query = DB::select("select id from categories where resto_id = ".$resto_id."  and name ='".$category."'");
        return $query;
        }
     */   
}
