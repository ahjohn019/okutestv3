<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistOrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_org', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('artist_id')->unsigned();
          $table->foreign('artist_id')->references('id')->on('artists');

          $table->integer('org_id')->unsigned();
          $table->foreign('org_id')->references('id')->on('organizations');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist_org');
    }
}
