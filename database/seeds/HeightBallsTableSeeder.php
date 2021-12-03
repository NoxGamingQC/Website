<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class HeightBallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('8balls')->insert([
            [
                'Text' => 'It is certain.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'It is decidedly so.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Without a doubt.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Yes definitely.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'You may rely on it.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'As I see it, yes.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Most likely.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Outlook good.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Yes.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Signs point to yes.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Reply hazy try again.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Ask again later.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Better not tell you now.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Cannot predict now.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Concentrate and ask again.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Don\'t count on it.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'My reply is no.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'My sources say no.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Outlook not so good.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
            [
                'Text' => 'Very doubtful.',
                'created_at' => new Carbon(today()),
                'updated_at' => new Carbon(today())
            ],
        ]);
    }
}
