<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\order_details;
use App\Order;
use App\Restaurant;

class OrderServices
{

    
    public function orderanddetails($id){
        $orders = order::where('resto_id',$id)->get();
        foreach($orders as $order){

        return order_details::whereIn('order_id',$order->findOrfail($order->id))->get();
         
        //dd($customer_detail);
        }
        
        
    }

}
    //return order_details::where('order_id',$id)->get();