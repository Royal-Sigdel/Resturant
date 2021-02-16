<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MenuServices;
use App\Services\RestoService;
use App\Services\OrderServices;

class HomeController extends Controller
{
    /**
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
    public function index(MenuServices $service,RestoService $restoservice)
    {
        $restoId = 1;
        $menus = $service->getMenuwithCategory($restoId);
        $restos = $restoservice->userRestoAndTables();

        return view('home', compact('menus','restoId','restos'));
    }
}
 