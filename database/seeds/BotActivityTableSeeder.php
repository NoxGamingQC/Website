<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BotActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bot_activity')->insert([
            [
                'Activity' => 'help | noxgamingqc.ca',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | ¯\_(ツ)_/¯',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | discord.gg/Gkd2ud9uet',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | OwO',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | (づ｡◕‿◕｡)づ',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | (ﾉ≧∇≦)ﾉ ﾐ ┸━┸',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | (≧∇≦)/',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | o(≧∇≦o)',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | UwU',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | ( ˘▽˘)っ☕',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | O.o',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | twitch.tv/noxgamingqc',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | ( ◠‿◠ )',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | ʕ•̫͡•ʕ•̫͡•ʔ•̫͡•ʔ•̫͡•ʕ•̫͡•ʔ•̫͡•ʕ•̫͡•ʕ•̫͡•ʔ•̫͡•ʔ•̫͡•ʕ•̫͡•ʔ•̫͡•ʔ',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | ･゜ﾟ･:.｡..｡.:･\'(ﾟ▽ﾟ)\'･:.｡. .｡.:･゜ﾟ･',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | ヾ(＠⌒ー⌒＠)ノ',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Activity' => 'help | ( ͡° ͜ʖ ͡°)',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ]
        ]);
    }
}
