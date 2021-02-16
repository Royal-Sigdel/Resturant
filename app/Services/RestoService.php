<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\table_list;
use App\user;



class RestoService

{
    public function userRestoAndTables()
    {
        return Auth::user()->table_list()->get();
    }
}



