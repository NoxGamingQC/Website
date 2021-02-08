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
                'Maintenance' => false
            ],
            [
                'Slug' => 'Bot',
                'isActiveDefault' => true,
                'Maintenance' => false
            ],
            [
                'Slug' => 'Info',
                'isActiveDefault' => true,
                'Maintenance' => false
            ],
            [
                'Slug' => 'Pokemon',
                'isActiveDefault' => true,
                'Maintenance' => false
            ],
            [
                'Slug' => 'Warframe',
                'isActiveDefault' => true,
                'Maintenance' => false
            ],
            [
                'Slug' => 'Twitch',
                'isActiveDefault' => false,
                'Maintenance' => false
            ],
            [
                'Slug' => 'Roles',
                'isActiveDefault' => false,
                'Maintenance' => false
            ],
            [
                'Slug' => 'Miscs',
                'isActiveDefault' => false,
                'Maintenance' => false
            ],
            [
                'Slug' => 'Giveaways',
                'isActiveDefault' => true,
                'Maintenance' => false
            ],
            [
                'Slug' => 'Links',
                'isActiveDefault' => false,
                'Maintenance' => false
            ],
            [
                'Slug' => 'Management',
                'isActiveDefault' => true,
                'Maintenance' => false
            ],
            [
                'Slug' => 'Ranking',
                'isActiveDefault' => true,
                'Maintenance' => false
            ],
        ]);
    }
}
