<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubsModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('subs_modules')) {
            Schema::create('subs_modules', function (Blueprint $table) {
                $table->increments('ID');
                $table->timestamps();
                $table->string('Name')->nullable(false);
                $table->string('Slug')->nullable(false);
                $table->integer('ModuleID')->nullable(false);
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
        Schema::dropIfExists('subs_modules');
    }
}
