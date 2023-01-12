<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMtBusiness extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_business', function (Blueprint $table) {
            $table->increments('id');
            $table->string('alias', 225);
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('coordinates_id');
            $table->string('display_phone', 30);
            $table->float('distance', 225);
            $table->string('image_url');
            $table->boolean('is_closed')->default('true');
            $table->string('name', 225);
            $table->string('phone', 50);
            $table->integer('price');
            $table->integer('rating');
            $table->integer('review_count');
            $table->unsignedBigInteger('transactions_id');
            $table->string('url');
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
