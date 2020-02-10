<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('social_id')->unique();
            $table->string('name');
            $table->string('governorate');
            $table->string('address');
            $table->double('lat')->nullable($value = true);
            $table->double('lng')->nullable($value = true);
//            $table->string('social_id_front_photo')->default('front.jpg');
//            $table->string('social_id_back_photo')->default('back.jpg');
//            $table->string('status');
//            $table->string('avatar')->default('default.jpg');
            $table->string('telephone')->unique();
            $table->string('email')->unique();
            $table->integer('valid')->nullable($value = true);
            $table->text('message')->nullable($value = true);
            $table->string('password');
            $table->integer('pocket')->default(0);
//            $table->string('admin_message')->nullable($value = true);
            // $table->string('charge')->nullable($value = true);
            // $table->integer('remain')->nullable($value = true);
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
        Schema::dropIfExists('sands');
    }
}
