<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLopmonhocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('lopmonhocs', function (Blueprint $table) {
          $table->increments('id');
          $table->text('tenmonhoc');
          $table->string('mamonhoc');
          $table->string('magiangvien');
          $table->integer('hocky_id')->unsigned();
          $table->foreign('hocky_id')->references('id')->on('hockys')->onDelete('cascade');
          $table->integer('giangvien_id')->unsigned();
          $table->foreign('giangvien_id')->references('id')->on('giangviens')->onDelete('cascade');
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
        Schema::dropIfExists('lopmonhocs');
    }
}
