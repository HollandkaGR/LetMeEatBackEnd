<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id')->unsigned();
            $table->boolean('isActive')->default(false);
            $table->string('name');
            $table->string('indexImage')->nullable();
            $table->integer('city')->unsigned();
            $table->json('open_hours')->nullable();
            $table->text('description')->nullable();
            $table->boolean('showMessage')->default(false);
            $table->integer('deliveryTime')->unsigned()->default(60);
            $table->integer('minimumOrder')->unsigned()->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
