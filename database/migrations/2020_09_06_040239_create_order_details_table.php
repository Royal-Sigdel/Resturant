<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->Integer('order_id')->unsigned();
            $table->Integer('table_id')->unsigned();
            $table->index('table_id');
            $table->foreign('table_id')->references('no')->on('table_lists')->onDelete('cascade');
            $table->Integer('menu_id');
            $table->foreign('order_id')->references('sgroup')->on('products')->onDelete('cascade');
            $table->index('order_id');
            $table->Integer('Quantity');
            $table->string('Item_Name');
            $table->string('Item_Price');
            $table->string('Item_Category_Id');
            //$table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
