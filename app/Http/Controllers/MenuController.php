<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\menu;
use App\Category;
use App\Rules\RestoCategoryValidation;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function saveMenuItem(Request $request)
    {
        $postData = $this->validate($request,[
            'restoId' => 'required|numeric',
            'price' => 'required|numeric',
            'item' => 'required',
            'description' => 'required',
            'category' => ['required', new RestoCategoryValidation(request('restoId'))],
            
            ]);
 
            //$category = DB::table('categories')->where('resto_id', $postData['restoId'])->where('name',$postData['item'])->first()->get();
             //$category_ids=Category::getcategoryid($postData['restoId'],$postData['category']);
            
             $conditions = [
                'resto_id' => $postData['restoId'],
                'name' => $postData['category'],
            ];
            //dd($conditions);
    
            $category = Category::where($conditions)
                ->first();
            print_r($category);

            $data = [
                'name' => $postData['item'],
                'price' => $postData['price'],
                'resto_id' => $postData['restoId'],
                'description' => $postData['description'],
                'category_id'=>$category->id,
            ];
            print_r($data);
    
            $menu = $category->menus()->create($data);
      return response()->json($menu, 201);

    }
}