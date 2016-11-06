<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->boolean('is_correct');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });

        Schema::table('questions', function (Blueprint $table) {
            $table->float('points');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->float('points');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->float('points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_user');
        
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('points');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('points');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('points');
        });

    }
}
