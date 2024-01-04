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
                $table->increments('id');
                $table->string('server_id')->nullable(false);
                $table->string('channel_id')->nullable(false);
                $table->string('message_id')->nullable(false);
                $table->string('role_id')->nullable(false);
                $table->string('emoji')->nullable(false);
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
