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
        if (!Schema::hasTable('modules_lists')) {
            Schema::create('modules_lists', function (Blueprint $table) {
                $table->increments('id');
                $table->string('slug')->nullable(false);
                $table->boolean('is_maintenance')->nullable(false)->default(false);
                $table->boolean('is_active_default')->nullable(false)->default(true);
                $table->boolean('module_icon')->nullable(true);
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
        Schema::dropIfExists('modules_lists');
    }
}
