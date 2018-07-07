<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User', function (Blueprint $table) {
            $table->increments('intId');

            $table->string('stringName');
            $table->string('stringEmail')->unique();
            $table->string('stringPassword');
            $table->rememberToken();

            $table->string('stringCountry');
            $table->string('stringZipCode');
            $table->integer('intHouseNumber');

            $table->date('dateBirthDate');
            $table->string('stringTelephoneNumber');

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
        Schema::dropIfExists('User');
    }
}
