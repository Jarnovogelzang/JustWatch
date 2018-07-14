<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCodesTable extends Migration {
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('DiscountCode');
  }

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('DiscountCode', function (Blueprint $table) {
      $table->increments('intId');

      $table->string('stringDiscountCode');

      $table->enum('enumDiscountType', ['DISCOUNT_AMOUNT', 'DISCOUNT_PERCENTAGE']);
      $table->float('floatDiscount');

      $table->date('dateCreatedAt')->nullable();
      $table->date('dateUpdatedAt')->nullable();
      $table->date('dateDeletedAt')->nullable();
    });
  }
}
