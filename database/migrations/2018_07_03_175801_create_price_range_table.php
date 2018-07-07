<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceRangeTable extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PriceRange', function (Blueprint $table) {
            $table->increments('intId');

            $table->float('floatPriceLow');
            $table->float('floatPriceHigh');
            $table->float('floatPriceActual');

            $table->date('dateCreatedAt')->nullable();
            $table->date('dateUpdatedAt')->nullable();
            $table->date('dateDeletedAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PriceRange');
    }
}
