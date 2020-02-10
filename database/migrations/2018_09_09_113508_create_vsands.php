<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVsands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vsands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('social_id')->unique();
            $table->string('name');
            $table->string('governorate');
            $table->string('address');
//            $table->string('social_id_front_photo')->default('front.jpg');
//            $table->string('social_id_back_photo')->default('back.jpg');
//            $table->string('status');
//            $table->string('avatar')->default('default.jpg');
            $table->string('telephone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('vsands');
    }
}
