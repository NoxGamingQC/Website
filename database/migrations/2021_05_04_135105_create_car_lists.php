<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('car_lists')) {
            Schema::create('car_lists', function (Blueprint $table) {
                $table->increments('id');
                $table->string('brand')->nullable(false);
                $table->string('model')->nullable(false);
                $table->string('year')->nullable(false);
                $table->string('carID')->nullable(false);
                $table->string('engine')->nullable(false);
                $table->integer('weight')->nullable(true);
                $table->string('licensePlate')->nullable(true);
                $table->string('transmission')->nullable(false);
                $table->boolean('status')->nullable(false);
                $table->string('Description')->nullable(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_lists');
    }
}
