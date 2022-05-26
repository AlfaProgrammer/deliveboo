<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('name', 30);
            $table->string('surname', 50);
            $table->string('email', 50);
            $table->string('phone_number', 20);
            $table->string('address', 80);
            $table->string('house_number', 10);
            $table->string('city', 30);
            $table->unsignedInteger('cap');
            $table->float('total_price', 5, 2)->default(0);
            
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
        Schema::dropIfExists('orders');
    }
}
