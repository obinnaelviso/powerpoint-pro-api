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
        Schema::create('request_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('name');
            $table->string('category');
            $table->string('sub_category')->nullable();
            $table->string('topic');
            $table->unsignedSmallInteger('slides');
            $table->unsignedSmallInteger('duration');
            $table->string('phone');
            $table->string('email');
            $table->string('location')->nullable();
            $table->string('need')->nullable();
            $table->unsignedInteger('amount');
            $table->foreignId('status_id');
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
        Schema::dropIfExists('request_forms');
    }
};
