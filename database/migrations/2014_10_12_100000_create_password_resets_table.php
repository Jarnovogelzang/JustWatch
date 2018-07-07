<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PasswordReset', function (Blueprint $table) {
            $table->string('stringEmail')->index();
            $table->string('stringToken');

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
        Schema::dropIfExists('PasswordReset');
    }
}
