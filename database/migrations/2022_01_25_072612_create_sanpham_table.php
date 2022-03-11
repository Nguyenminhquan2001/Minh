<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->String('Tensanpham');
            $table->String('Masp');
            $table->String('Danhmuc');
            $table->String('Giasp');
            $table->String('GiaKM');
            $table->String('Mota'); 
            $table->String('Anhsp');
            $table->String('Status');
          
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
        Schema::dropIfExists('sanpham');
    }
}
