<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('resto_id');
            $table->unsignedInteger('user_id');
            $table->float('amount', '8', 2);
            $table->boolean('isComplete')->default(0);
            $table->timestamp('complete_at')->nullable();
            $table->string('Customer_Name')->nullable();
            $table->string('Customer_Address')->nullable();
            $table->bigInteger('Customer_phone_no')->nullable();
            $table->timestamps();

            $table->index('resto_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
