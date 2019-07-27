<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_industria')->unsigned();
            $table->string('nome');
            $table->float('preço');
            $table->integer('quantidade');
            $table->timestamps();
        });
        Schema::table('produtos', function($table){
            $table->foreign('id_industria')->references('id')->on('industrias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
