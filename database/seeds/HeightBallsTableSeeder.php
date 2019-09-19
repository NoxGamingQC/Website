<?php

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
            ],
            [
                'Text' => 'It is decidedly so.',
            ],
            [
                'Text' => 'Without a doubt.',
            ],
            [
                'Text' => 'Yes definitely.',
            ],
            [
                'Text' => 'You may rely on it.',
            ],
            [
                'Text' => 'As I see it, yes.',
            ],
            [
                'Text' => 'Most likely.',
            ],
            [
                'Text' => 'Outlook good.',
            ],
            [
                'Text' => 'Yes.',
            ],
            [
                'Text' => 'Signs point to yes.',
            ],
            [
                'Text' => 'Reply hazy try again.',
            ],
            [
                'Text' => 'Ask again later.',
            ],
            [
                'Text' => 'Better not tell you now.',
            ],
            [
                'Text' => 'Cannot predict now.',
            ],
            [
                'Text' => 'Concentrate and ask again.',
            ],
            [
                'Text' => 'Don\'t count on it.',
            ],
            [
                'Text' => 'My reply is no.',
            ],
            [
                'Text' => 'My sources say no.',
            ],
            [
                'Text' => 'Outlook not so good.',
            ],
            [
                'Text' => 'Very doubtful.',
            ],
        ]);
    }
}
