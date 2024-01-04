<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscordUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('discord_users')) {
            Schema::create('discord_users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('server_id')->nullable(false);
                $table->string('discord_id')->nullable(false);
                $table->integer('experiences')->nullable(false)->default(false);
                $table->boolean('is_active')->nullable(false)->default(true);
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
        Schema::dropIfExists('discord_users');
    }
}
