<?php

use Illuminate\Database\Seeder;

class CandyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('candy')->insert([
            [
                'name'  => '特濃ミルク8.2濃香いちご',
                'maker' => 'UHA味覚糖',
                'style' => '濃い味',
                'taste' => 'ミルク',
                'url'   => 'https://www.amazon.co.jp/UHA%E5%91%B3%E8%A6%9A%E7%B3%96-%E7%89%B9%E6%BF%83%E3%83%9F%E3%83%AB%E3%82%AF8-2-%E6%BF%83%E9%A6%99%E3%81%84%E3%81%A1%E3%81%94-75g%C3%974%E8%A2%8B/dp/B08KXMLHM2/ref=sr_1_110?keywords=%E9%A3%B4&qid=1649769121&sr=8-110'
            ],[

                'name'  => '濃ーい苺',
                'maker' => 'Asahi',
                'style' => '濃い味',
                'taste' => '果物',
                'url'   => 'https://www.amazon.co.jp/%E6%BF%83%E3%83%BC%E3%81%84-%E3%82%A2%E3%82%B5%E3%83%92%E3%82%B0%E3%83%AB%E3%83%BC%E3%83%97%E9%A3%9F%E5%93%81-%E6%BF%83%E3%83%BC%E3%81%84%E8%8B%BA-84g%C3%974%E8%A2%8B/dp/B084B18382/ref=sr_1_122?keywords=%E9%A3%B4&qid=1649769121&sr=8-122'

            ],[

                'name'  => 'パインアメ',
                'maker' => 'パイン',
                'style' => 'フルーティー',
                'taste' => '果物',
                'url'   => 'https://www.amazon.co.jp/UHA%E5%91%B3%E8%A6%9A%E7%B3%96-%E7%89%B9%E6%BF%83%E3%83%9F%E3%83%AB%E3%82%AF8-2-%E6%BF%83%E9%A6%99%E3%81%84%E3%81%A1%E3%81%94-75g%C3%974%E8%A2%8B/dp/B08KXMLHM2/ref=sr_1_110?keywords=%E9%A3%B4&qid=1649769121&sr=8-110'

            ],[

                'name'  => '邪払のど飴',
                'maker' => 'UHA味覚糖',
                'style' => 'さっぱり',
                'taste' => '果物',
                'url'   => 'https://www.amazon.co.jp/%EF%BC%B5%EF%BC%A8%EF%BC%A1%E5%91%B3%E8%A6%9A%E7%B3%96-%E9%82%AA%E6%89%95%E3%81%AE%E3%81%A9%E9%A3%B4-%E6%9F%91%E6%A9%98%E3%83%9F%E3%83%83%E3%82%AF%E3%82%B9-72g-%C3%976%E8%A2%8B/dp/B07YSNBLMF/ref=sr_1_84?keywords=%E9%A3%B4&qid=1649770681&sr=8-84'

            ],[

                'name'  => 'レモンスカッシュ',
                'maker' => '不二家',
                'style' => '酸っぱい',
                'taste' => '果物',
                'url'   => 'https://www.amazon.co.jp/%E4%B8%8D%E4%BA%8C%E5%AE%B6-%E3%83%AC%E3%83%A2%E3%83%B3%E3%82%B9%E3%82%AB%E3%83%83%E3%82%B7%E3%83%A5%E3%82%AD%E3%83%A3%E3%83%B3%E3%83%87%E3%82%A3%E8%A2%8B-80g%C3%976%E8%A2%8B/dp/B007EKQO2C/ref=sr_1_7?__mk_ja_JP=%E3%82%AB%E3%82%BF%E3%82%AB%E3%83%8A&crid=20PQM1H87I2KO&keywords=%E3%83%AC%E3%83%A2%E3%83%B3%E3%82%B9%E3%82%AB%E3%83%83%E3%82%B7%E3%83%A5&qid=1652408153&sprefix=%E3%83%AC%E3%83%A2%E3%83%B3%E3%82%B9%E3%82%AB%E3%83%83%E3%82%B7%E3%83%A5%2Caps%2C178&sr=8-7'
            ],[
                'name'  => '北見ハッカ飴',
                'maker' => '北見ハッカ通商',
                'style' => 'さっぱり',
                'taste' => 'ハッカ',
                'url'   => 'https://www.amazon.co.jp/UHA%E5%91%B3%E8%A6%9A%E7%B3%96-%E7%89%B9%E6%BF%83%E3%83%9F%E3%83%AB%E3%82%AF8-2-%E6%BF%83%E9%A6%99%E3%81%84%E3%81%A1%E3%81%94-75g%C3%974%E8%A2%8B/dp/B08KXMLHM2/ref=sr_1_110?keywords=%E9%A3%B4&qid=1649769121&sr=8-110'
            ]
        ]);
    }
}
