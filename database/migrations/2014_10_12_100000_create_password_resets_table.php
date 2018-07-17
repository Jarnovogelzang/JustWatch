<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration {
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('PasswordReset');
  }

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('PasswordReset', function (Blueprint $table) {
      $table->string('stringEmail')->index();
      $table->string('stringToken');

      $table->date('dateCreatedAt')->nullable();
      $table->date('dateUpdatedAt')->nullable();
      $table->date('dateDeletedAt')->nullable();
    });
  }
}
