<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasnodsRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masnods_request', function (Blueprint $table) {
            $table->increments('id');
            $table->text('request_description');
            $table->string('category');
            $table->string('attachments')->nullable($value = true);
            $table->string('masnod_status');
            $table->string('request_status');
            $table->date('request_date')->nullable($value = true);
            $table->integer('value')->nullable($value = true);
            $table->integer('c_value')->nullable($value = true);
            $table->string('pickup_method')->nullable($value = true);
            $table->boolean('critical')->nullable($value = true)->default(0);
            $table->text('delivery_attachment')->nullable($value = true);
            $table->timestamps();
            $table->integer('masnod_id')->unsigned();
            $table->foreign('masnod_id')->references('id')->on('masnods');
            $table->integer('vmasnod_id')->nullable($value = true);
            $table->integer('sand_id')->nullable($value = true);
            $table->integer('vsand_id')->nullable($value = true);
            $table->integer('vmasnod_2')->nullable($value = true);
            $table->text('masnod_message')->nullable($value = true);
            $table->integer('escalate')->nullable($value = true)->default(0);
            $table->date('delivery_date')->nullable($value = true);
            $table->integer('charge')->default(0);
            // $table->integer('valid')->nullable($value = true);
            // $table->string('admin_message')->nullable($value = true);
            // $table->string('sand_message')->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masnods_request');
    }
}
