<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;
use App\Services\MenuServices;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /*
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
        
       
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MenuServices $services)
    {
        $restoId = 1;
        $menus = $services->getMenuwithCategory($restoId);
        //dd($categories);
        return view('home',compact('menus','restoId'));
    }
}
