<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwitchLiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twitch_live', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('ServerID')->nullable(false);
            $table->string('ChannelID')->nullable(false);
            $table->string('UserID')->nullable(false);
            $table->boolean('isLive')->nullable(false)->default(false);
            $table->boolean('CustomMessage')->nullable(true);
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
        Schema::dropIfExists('twitch_live');
    }
}
