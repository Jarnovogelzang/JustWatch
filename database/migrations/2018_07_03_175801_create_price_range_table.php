<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceRangeTable extends Migration {
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('PriceRange');
  }

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
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
}
