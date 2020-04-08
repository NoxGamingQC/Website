<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games_list', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Game')->nullable(false);
            $table->text('Console')->nullable(false);
            $table->string('Date')->nullable(false);
            $table->string('CoverURL')->nullable(false);
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
        Schema::dropIfExists('games_list');
    }
}
