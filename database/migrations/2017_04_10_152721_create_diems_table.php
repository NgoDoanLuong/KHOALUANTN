<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('diems',function(Blueprint $table){
        $table->increments('id');
        $table->integer('diemdanhgia');
        $table->integer('tieuchi_id')->unsigned();
        $table->foreign('tieuchi_id')->references('id')->on('tieuchis')->onDelete('cascade');
        $table->integer('monhoc_id')->unsigned();
        $table->foreign('monhoc_id')->references('id')->on('monhocs')->onDelete('cascade');
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
        Schema::dropIfExists('diems');
    }
}
