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
            ['statement' => '最近癒しが足りないと感じるかい？'],
            ['statement' => 'スースーする飴ちゃんは苦手かい？'],
            ['statement' => '濃い～味で甘いやつ欲しいかい？'],
            ['statement' => '高級感のある飴ちゃんはどうだい？'],
            ['statement' => '酸っぱいのが好きかい？'],
            ['statement' => 'もしかして風邪ぎみかい？'],
            ['statement' => 'ゲームしながら食べるのかい？'],
            ['statement' => '大玉の飴ちゃん欲しくないかい？']
        ]);
    }
}
