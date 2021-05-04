<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactionsRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('reactions_roles')) {
            Schema::create('reactions_roles', function (Blueprint $table) {
                $table->increments('ID');
                $table->string('ServerID')->nullable(false);
                $table->string('ChannelID')->nullable(false);
                $table->string('MessageID')->nullable(false);
                $table->string('RoleID')->nullable(false);
                $table->string('Emoji')->nullable(false);
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
        Schema::dropIfExists('reactions_roles');
    }
}
