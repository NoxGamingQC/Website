<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServersConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('servers_config')) {
            Schema::create('servers_config', function (Blueprint $table) {
                $table->increments('ID');
                $table->string('ServerID')->nullable(false);
                $table->string('Prefix')->nullable(false)->default('!');
                $table->string('TimeoutRoleID')->nullable(true);
                $table->timestamps();
                $table->boolean('avatar')->nullable(true);
                $table->boolean('commands')->nullable(true);
                $table->boolean('giveaway')->nullable(true);
                $table->boolean('help')->nullable(true);
                $table->boolean('info')->nullable(true);
                $table->boolean('invite')->nullable(true);
                $table->boolean('links')->nullable(true);
                $table->boolean('lmgtfy')->nullable(true);
                $table->boolean('miscs')->nullable(true);
                $table->boolean('music')->nullable(true);
                $table->boolean('ping')->nullable(true);
                $table->boolean('pokemon')->nullable(true);
                $table->boolean('reaction_roles')->nullable(true);
                $table->boolean('roles')->nullable(true);
                $table->boolean('server_info')->nullable(true);
                $table->boolean('subs_perks')->nullable(true);
                $table->boolean('timeout')->nullable(true);
                $table->boolean('twitch_commands')->nullable(true);
                $table->boolean('user_info')->nullable(true);
                $table->boolean('warframe')->nullable(true);
                $table->boolean('warning')->nullable(true);
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
        Schema::dropIfExists('servers_config');
    }
}
