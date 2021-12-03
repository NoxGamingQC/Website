<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ModulesListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules_lists')->insert([
            [
                'Slug' => 'Music',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Slug' => 'Bot',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Slug' => 'Info',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Slug' => 'Pokemon',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Slug' => 'Warframe',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Slug' => 'Twitch',
                'isActiveDefault' => false,
                'Maintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Slug' => 'Roles',
                'isActiveDefault' => false,
                'Maintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Slug' => 'Miscs',
                'isActiveDefault' => false,
                'Maintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Slug' => 'Giveaways',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Slug' => 'Links',
                'isActiveDefault' => false,
                'Maintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Slug' => 'Management',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Slug' => 'Ranking',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
        ]);
    }
}
