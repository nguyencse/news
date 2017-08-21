<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoaitinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaitins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_theloai')->unsigned();
            $table->foreign('id_theloai')->references('id')->on('theloais');
            $table->string('ten');
            $table->string('tenkhongdau');
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
        Schema::dropIfExists('loaitins');
    }
}
