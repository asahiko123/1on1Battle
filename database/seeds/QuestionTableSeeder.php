<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question')->insert([
            [
                'statement' => '最近癒しが足りないと感じるかい？',
                'card_image'=> '150x150.png'
            ],
            [
                'statement' => 'スースーする飴ちゃんは苦手かい？',
                'card_image'=> '150x150.png'
            ],
            [
                'statement' => '濃い～味で甘いやつ欲しいかい？',
                'card_image'=> '150x150.png'
            ],
            [
                'statement' => '高級感のある飴ちゃんはどうだい？',
                'card_image'=> '150x150.png'
            ],
            [
                'statement' => '酸っぱいのが好きかい？',
                'card_image'=> '150x150.png'
            ],
            [
                'statement' => 'もしかして風邪ぎみかい？',
                'card_image'=> '150x150.png'
            ],
            [
                'statement' => 'ゲームしながら食べるのかい？',
                'card_image'=> '150x150.png'
            ],
            [
                'statement' => '大玉の飴ちゃん欲しくないかい？',
                'card_image'=> '150x150.png'
                ]
        ]);
    }
}
