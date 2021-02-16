<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_Group;
use App\Rules\RestoCategoryValidation;
use App\Services\MenuServices;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller

{

    public function index($no){
        $restoId = $no;
        $service = new MenuServices;
        $menus = $service->getMenuwithCategory($restoId);

        return view('menu.menu-index',compact('menus','restoId'));

      }
    public function saveMenuItem(Request $request)
       {
          

          $postData = $this->validate($request,[
            'restoId' => 'required|numeric',
            'price' => 'required|numeric',
            'item' => 'required',
            'description' => 'required',
            'category' => ['required', new RestoCategoryValidation(request('restoId'))],
            
            ]);
            
             
            //print_r($postData['restoId']);

            //$category = DB::table('categories')->where('resto_id', $postData['restoId'])->where('name',$postData['item'])->first()->get();
             //$category_ids=Category::getcategoryid($postData['restoId'],$postData['category']);
            //die;
             $conditions = [
                'resto_id' => $postData['restoId'],
                'sgroup_code' => $postData['category'],
            ];
            //dd($conditions);
    
            $category = Product_Group::where($conditions)
                ->first();
            //print_r($category);

            $data = [
                'sprod_code' => $postData['item'],
                'nMRP_Rate' => $postData['price'],
                'resto_id' => (int)$postData['restoId'],
                'description' => $postData['description'],
                'category_id'=>$category->id,
            ];
            
            //print_r($data);
    
            $menu = $category->menus()->create($data);
      return response()->json($menu, 201);

    }
    public function getRestoMenu()
    { 
      
      $menuItems = Product::all();
      //print_r($menuItems);
      return response()->json($menuItems,200);
    }
  
}