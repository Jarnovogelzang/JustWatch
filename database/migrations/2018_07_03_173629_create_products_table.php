<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('Product', function (Blueprint $table) {
      $table->increments('intId');
      $table->integer('intAliId');

      $table->string('stringTitle');
      $table->text('stringDescription');
      $table->float('floatPrice');
      $table->integer('intClicks');

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
  public function down() {
    Schema::dropIfExists('Product');
  }
}
