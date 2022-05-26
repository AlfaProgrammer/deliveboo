<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllergenPlateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allergen_plate', function (Blueprint $table) {
            $table->unsignedBigInteger('plate_id');
            $table->unsignedBigInteger('allergen_id');

            $table->foreign('plate_id')->references('id')->on('plates')->onDelete('cascade');
            $table->foreign('allergen_id')->references('id')->on('allergens')->onDelete('cascade');

            $table->primary(['plate_id', 'allergen_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allergen_plate');
    }
}
