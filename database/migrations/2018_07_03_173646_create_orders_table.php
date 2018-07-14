<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('Order');
  }

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('Order', function (Blueprint $table) {
      $table->increments('intId');

      $table->integer('intUserId');
      $table->boolean('boolIsPaid');

      $table->date('dateCreatedAt')->nullable();
$table->date('dateUpdatedAt')->nullable();
$table->date('dateDeletedAt')->nullable();
    });
  }
}
