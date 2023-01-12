<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address1', 225);
            $table->string('address2', 225);
            $table->string('address3', 225);
            $table->string('city', 30);
            $table->string('country', 5);
            $table->json('display_address')->nullable();
            $table->string('state',5);
            $table->string('zip_code',10);
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
        //
    }
}
