<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration {
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('Category');
  }

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('Category', function (Blueprint $table) {
      $table->increments('intId');

      $table->string('stringTitle');
      $table->integer('intClicks');

      $table->date('dateCreatedAt')->nullable();
      $table->date('dateUpdatedAt')->nullable();
      $table->date('dateDeletedAt');
    });
  }
}
