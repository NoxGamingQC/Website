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
                'Slug' => 'music',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'help',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'user_info',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'server_info',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'ping',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'info',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'pokemon',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'warframe',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'warning',
                'isActiveDefault' => false
            ],
            [
                'Slug' => 'lmgtfy',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'timeout',
                'isActiveDefault' => false
            ],
            [
                'Slug' => 'twitch_commands',
                'isActiveDefault' => false
            ],
            [
                'Slug' => 'roles',
                'isActiveDefault' => false
            ],
            [
                'Slug' => 'miscs',
                'isActiveDefault' => false
            ],
            [
                'Slug' => 'giveaway',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'invite',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'links',
                'isActiveDefault' => false
            ],
            [
                'Slug' => 'avatar',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'commands',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'subs_perks',
                'isActiveDefault' => true
            ],
            [
                'Slug' => 'reaction_roles',
                'isActiveDefault' => true
            ]
        ]);
    }
}
