<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            HeightBallsTableSeeder::class,
            ModulesListsTableSeeder::class,
            ReactionRolesTableSeeder::class,
            BotActivityTableSeeder::class,
            TwitchLiveTableSeeder::class,
        ]);
    }
}
