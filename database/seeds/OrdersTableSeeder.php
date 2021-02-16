<?php

use Illuminate\Database\Seeder;
use App\Order;
use App\order_details;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   for($i=0;$i<=20;$i++){
        $order = Order::create([
            'resto_id' => 1,
            'user_id' => 1,
            'amount'  => 200,
            'isComplete' => 0,
            'complete_at' => '2020-09-03 12:45:15:000',
            'Customer_Name' => 'Royal Sigdel',
            'Customer_Address' => 'Sankhamul, Kathmandu, Nepal',
            'Customer_phone_no' => 9852052258
        ]);
        $order = Order::create([
            'resto_id' => 1,
            'user_id' => 1,
            'amount'  => 500,
            'isComplete' => 0,
            'complete_at' => '2020-09-03 12:45:15:000',
            'Customer_Name' => 'Kshitiz Dahal',
            'Customer_Address' => 'Kalanki, Sunsari, Nepal',
            'Customer_phone_no' => 9852052258
        ]);
        }

    }
}