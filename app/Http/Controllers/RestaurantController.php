<?php

namespace App\Http\Controllers;

use App\Services\RestoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index(RestoService $restoservice){

        $restos = $restoservice->userRestoAndTables();
        return view('resto.resto-index',compact('restos'));
    }

   public function store(Request $request){
       $postdata = $this->validate($request,[
           'name' => 'required|unique:restaurants|min:3',
           'location' => 'required|min:3',
           'tables' => 'required|integer',
       ]);

       $resto = Auth::User()->restaurants()->create($postdata);

       return response()->json($resto,201);
   }
}
