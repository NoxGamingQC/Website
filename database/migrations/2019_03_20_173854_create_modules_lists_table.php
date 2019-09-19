<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules_lists', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Slug')->nullable(false);
            $table->boolean('Maintenance')->nullable(false)->default(false);
            $table->boolean('isActiveDefault')->nullable(false)->default(true);
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
        Schema::dropIfExists('modules_lists');
    }
}
