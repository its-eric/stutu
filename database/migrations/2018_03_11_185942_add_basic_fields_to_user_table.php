<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBasicFieldsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'student', 'tutor']);
            $table->date('birthday')->nullable();
            $table->enum('gender', ['male', 'female', 'not informed'])->nullable();
            $table->binary('profile_picture')->nullable();
            $table->string('experience', 1024)->nullable();
            $table->string('url', 512)->nullable();
            $table->string('expectation', 1024)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'birthday', 'gender', 'profile_picture', 'experience', 'url', 'expectation']);
        });
    }
}
