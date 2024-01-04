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
                $table->increments('id');
                $table->string('bot_id')->nullable(false);
                $table->boolean('is_dev')->nullable(false);
                $table->string('default_prefix')->nullable(false);
                $table->string('oauth_token')->nullable(false);
                $table->string('youtube_token');
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
