<?php

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
                'Name' => 'Music',
            ],
            [
                'Slug' => 'Bot',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'Name' => 'Bot Commands',
            ],
            [
                'Slug' => 'Info',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'Name' => 'Info',
            ],
            [
                'Slug' => 'Pokemon',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'Name' => 'Pokémon',
            ],
            [
                'Slug' => 'Warframe',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'Name' => 'Warframe',
            ],
            [
                'Slug' => 'Twitch',
                'isActiveDefault' => false,
                'Maintenance' => false,
                'Name' => 'Twitch',
            ],
            [
                'Slug' => 'Roles',
                'isActiveDefault' => false,
                'Maintenance' => false,
                'Name' => 'Roles',
            ],
            [
                'Slug' => 'Miscs',
                'isActiveDefault' => false,
                'Maintenance' => false,
                'Name' => 'Miscs',
            ],
            [
                'Slug' => 'Giveaways',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'Name' => 'Giveaways',
            ],
            [
                'Slug' => 'Links',
                'isActiveDefault' => false,
                'Maintenance' => false,
                'Name' => 'Links',
            ],
            [
                'Slug' => 'Management',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'Name' => 'Management',
            ],
            [
                'Slug' => 'Ranking',
                'isActiveDefault' => true,
                'Maintenance' => false,
                'Name' => 'Ranking',
            ],
        ]);
    }
}
