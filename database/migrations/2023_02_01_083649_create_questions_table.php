<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();   /*ایدی*/
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title');   /*عنوان*/
            $table->string('grade');  /*مقطع تحصیلی*/
            $table->string('base');   /*پایه*/
            $table->string('discipline'); /*رشته*/
            $table->string('level');   /*سطح سختی*/
            $table->string('turn'); /*نوبت*/
            $table->bigInteger('price');  /*قیمت*/
            $table->string('description')->nullable();
            $table->string('file1_path');
            $table->string('file2_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
