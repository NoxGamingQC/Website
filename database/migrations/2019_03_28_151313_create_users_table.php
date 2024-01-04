<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable(false);
                $table->string('firstname')->nullable(true);
                $table->string('lastname')->nullable(true);
                $table->string('birthdate')->nullable(true);
                $table->integer('gender')->nullable(true);
                $table->boolean('is_firstname_showned')->nullable(false)->default(false);
                $table->boolean('is_lastname_showned')->nullable(false)->default(false);
                $table->boolean('is_birthdate_showned')->nullable(false)->default(false);
                $table->boolean('is_age_showned')->nullable(false)->default(false);
                $table->boolean('is_gender_showned')->nullable(false)->default(false);
                $table->string('email')->nullable(false);
                $table->string('password')->nullable(false);
                $table->boolean('is_management')->nullable(false)->default(false);
                $table->boolean('is_premium')->nullable(false)->default(false);
                $table->string('remember_token')->nullable(true);
                $table->string('discord')->nullable(true);
                $table->boolean('is_verified')->nullable(true);
                $table->string('language')->nullable(true);
                $table->string('premium_type')->nullable(true);
                $table->boolean('mfa_enabled')->nullable(true);
                $table->string('badges')->nullable(true);
                $table->string('avatar_url')->nullable(true);
                $table->string('discord_email')->nullable(true);
                $table->string('country')->nullable(true);
                $table->string('theme')->nullable(true);
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
        Schema::dropIfExists('users');
    }
}
