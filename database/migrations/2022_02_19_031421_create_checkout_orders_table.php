<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout_orders', function (Blueprint $table) {
            $table->id();
            $table->String('id_checkout');
            $table->String('bill_id');
            $table->String('product_id');
            $table->String('product_name');
            $table->String('soluong');
            $table->String('toltal_price');
            $table->String('payment');
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
        Schema::dropIfExists('checkout_orders');
    }
}
