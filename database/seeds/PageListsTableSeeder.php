<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PageListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_lists')->insert([
            [
                'slug' => 'noxbot_dashboard',
                'inMaintenance' => true,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'noxbot',
                'inMaintenance' => true,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'games',
                'inMaintenance' => true,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'youtube',
                'inMaintenance' => true,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'commands',
                'inMaintenance' => true,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'profile_show',
                'inMaintenance' => true,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'projects',
                'inMaintenance' => true,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'profile_edit',
                'inMaintenance' => true,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'bot_activities',
                'inMaintenance' => true,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'modules',
                'inMaintenance' => true,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'users',
                'inMaintenance' => true,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'about_me',
                'inMaintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'twitch',
                'inMaintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'contact_us',
                'inMaintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'logs',
                'inMaintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'management',
                'inMaintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'login',
                'inMaintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'slug' => 'todolist',
                'inMaintenance' => true,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
        ]);
    }
}
