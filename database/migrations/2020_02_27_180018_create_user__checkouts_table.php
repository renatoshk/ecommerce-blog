<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user__checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->integer('zip_code');
            $table->integer('phone_number');
            $table->string('additional_information');
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user__checkouts');
    }
}
