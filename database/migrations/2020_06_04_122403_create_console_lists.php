<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsoleLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('console_lists')) {
            Schema::create('console_lists', function (Blueprint $table) {
                $table->increments('id');
                $table->text('Console')->nullable(false);
                $table->text('Description')->nullable(false);
                $table->string('Date')->nullable(false);
                $table->string('Picture')->nullable(false);
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
        Schema::dropIfExists('console_lists');
    }
}
