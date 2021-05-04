<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBotListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('bot_lists')) {
            Schema::create('bot_lists', function (Blueprint $table) {
                $table->increments('ID');
                $table->string('BotID')->nullable(false);
                $table->boolean('isDev')->nullable(false);
                $table->string('DefaultPrefix')->nullable(false);
                $table->string('OauthToken')->nullable(false);
                $table->string('YouTubeToken');
                $table->string('website_token');
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
        Schema::dropIfExists('bot_lists');
    }
}
