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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(false);
            $table->string('Firstname')->nullable(true);
            $table->string('Lastname')->nullable(true);
            $table->string('Birthdate')->nullable(true);
            $table->boolean('Gender')->nullable(true);
            $table->boolean('isFirstnameShowned')->nullable(false)->default(false);
            $table->boolean('isLastnameShowned')->nullable(false)->default(false);
            $table->boolean('isBirthdateShowned')->nullable(false)->default(false);
            $table->boolean('isAgeShowned')->nullable(false)->default(false);
            $table->boolean('isGenderShowned')->nullable(false)->default(false);
            $table->string('email')->nullable(false);
            $table->string('password')->nullable(false);
            $table->boolean('isAdmin')->nullable(false)->default(false);
            $table->boolean('isModerator')->nullable(false)->default(false);
            $table->boolean('isDev')->nullable(false)->default(false);
            $table->boolean('isPremium')->nullable(false)->default(false);
            $table->string('remember_token')->nullable(true);
            $table->string('DiscordID')->nullable(true);
            $table->string('DiscordName')->nullable(true);
            $table->boolean('isVerified')->nullable(true);
            $table->string('Language')->nullable(true);
            $table->string('PremiumType')->nullable(true);
            $table->boolean('mfa_enabled')->nullable(true);
            $table->string('Badges')->nullable(true);
            $table->string('AvatarURL')->nullable(true);
            $table->string('Discriminator')->nullable(true);
            $table->string('DiscordEmail')->nullable(true);
            $table->string('Country')->nullable(true);
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
        Schema::dropIfExists('users');
    }
}
