<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('server_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('UserID')->nullable(false);
            $table->string('ServerID')->nullable(false);
            $table->boolean('isOwner')->nullable(false);
            $table->string('Permissions')->nullable(false);
            $table->string('Icon')->nullable(false);
            $table->string('Name')->nullable(false);
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
        Schema::dropIfExists('server_list');
    }
}
