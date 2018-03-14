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
            $table->date('birthday');
            $table->enum('gender', ['male', 'female', 'not informed']);
            $table->binary('profile_picture');
            $table->string('experience', 1024);
            $table->string('url', 512);
            $table->string('expectation', 1024);
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
