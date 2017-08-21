<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTintucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintucs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('tieude');
            $table->text('tieudekhongdau');
            $table->text('tomtat');
            $table->longText('noidung');
            $table->string('hinh');
            $table->integer('noibat')->default(0);
            $table->integer('soluotxem')->default(0);
            $table->integer('id_loaitin')->unsigned();
            $table->foreign('id_loaitin')->references('id')->on('loaitins');
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
        Schema::dropIfExists('tintucs');
    }
}
