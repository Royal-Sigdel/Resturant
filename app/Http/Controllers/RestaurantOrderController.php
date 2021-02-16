<?php

namespace App\Http\Controllers;

use App\Order;
use App\order_details;
use Illuminate\Http\Request;
use App\table_list;
use App\Product;
use App\Services\OrderServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RestaurantOrderController extends Controller
{
    public function index($no)
    {    
        //dd('orders');
        $resto = table_list::where('no',$no)->get();
        //$id = $resto[0]->no;

        if(!$resto){
            abort(404, 'The restaurant you are looking for is not present');
        }

        $orders = Order::where('resto_id',$no)
        ->orderBy('isComplete')
        ->orderBydesc('created_at')
        ->paginate(20);
        
        return view('orders.order-index')
        ->with('orders',$orders)
        ->with('resto',$resto);

    }
    public function add($no){
        $resto = table_list::where('no',$no)->get();
        $id = $resto[0]->no;
        return view('orders.order-add')
        ->with('id',$id);
    }
    public function store(Request $request)
    {  
        $postdata = $this->validate($request,[
            'resto_id' => 'required:exists:restaurants,id',
            'order_data' => 'required|array'
        ]);
        $itemIds = $postdata['order_data']['OrderIds'];
        
        try{
            DB::beginTransaction();
            $orderTotal = 0;

            foreach($itemIds as $id){
                
                    $length = count($itemIds);
                    $details = $postdata['order_data']['orderDetails'];
                    $orderTotal = 0;
                    for($i=0;$i<$length;$i++){
                    $orderTotal += $details[$i]['nMRP_Rate']*$details[$i]['Quantity'];
                    }

                }
            $order = Order::create([
                'resto_id'=>$postdata['resto_id'],
                'user_id'=>Auth::user()->id,
                'amount'=>$orderTotal,
                'isComplete'=>0,
                'customer_name'=>$postdata['order_data']['customerDetail']['name'],
                'Customer_phone_no'=>$postdata['order_data']['customerDetail']['phone'],
                'Customer_Address'=>$postdata['order_data']['customerDetail']['Address']

            ]);
            
            $length = count($itemIds);
            $details = $postdata['order_data']['orderDetails'];
            for($i=0;$i<$length;$i++){
                order_details::create([
                    'order_id'=>$order->id,
                    'menu_id'=>$details[$i]['sgroup'],
                    'table_id'=>$details[$i]['resto_id'],
                    'Item_Name'=>$details[$i]['sprod_code'],
                    'Item_Price' => $details[$i]['nMRP_Rate']*$details[$i]['Quantity'],
                    'Item_Category_Id' => $details[$i]['category_id'],
                    'Quantity'=>$details[$i]['Quantity']
                ]); 
            }
            
            DB::commit();
               
        }catch(\Exception $e){
            logger($e->getMessage());
            DB::rollBack();
            return response()->json(['message'=>$e->getMessage()],500);
            }
        //logger($orderTotal);
        return response()->json($order,201);
    }
    public function complete(Request $request){
         $postdata = $this->validate($request,[
            'order_id' => ['required','exists:orders,sgroup'],
         ]);
         $order = order::find($postdata['order_id']);
         
         $order->isComplete = 1;
         $order->save();
         
         return response()->json($order,201);
    }
    public function Remove(Request $request){
        $postdata = $this->validate($request,[
           'order_id' => ['required','exists:orders,id'],
        ]);
        order::where('id',$postdata['order_id']);

        return response()->json('',201);
   }


}
