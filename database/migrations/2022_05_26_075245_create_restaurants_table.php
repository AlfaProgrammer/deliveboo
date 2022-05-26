<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // id tabella relazionata
            $table->string('name', 100);
            $table->string('slug', 150)->unique();
            $table->string('address', 80);
            $table->unsignedInteger('cap');
            $table->string('city', 30);
            $table->text('info')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            // assegnazione foregn key 
            $table->foreign('user_id')->references('id')->on('users');
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
