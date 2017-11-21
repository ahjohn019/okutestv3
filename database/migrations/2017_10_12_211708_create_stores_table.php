<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('storeName');
            $table->string('storeDesc');
            $table->string('storeAddress');
            $table->string('image') ->default('store.png');
            $table->string('storeRepresentative1');
            $table->string('representativeNum1');
            $table->string('representativeEmail1');
            $table->string('storeRepresentative2');
            $table->string('representativeNum2');
            $table->string('representativeEmail2');
            $table->string('status') ->default('Active');
            $table->string('orgID');
            $table->integer('merchantID')->unsigned();
            $table->foreign('merchantID')->references('merchantID')->on('merchant');
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
        Schema::dropIfExists('stores');
    }
}
