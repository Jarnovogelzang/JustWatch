<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOrderTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('ProductOrder', function (Blueprint $table) {
      $table->increments('id');

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
    Schema::dropIfExists('ProductOrder');
  }
}
