<?php

require_once '../vendor/autoload.php';

use PHPHtmlParser\Dom;
use PHPHtmlParser\Options;

// 文字コードを設定する。
// 日本語だと文字コードの自動解析がうまく動かないようなので、
// ページに合わせて設定する必要があります
$options = new Options();
$options->setEnforceEncoding('utf8');

// 文字化けする場合は Shift JIS を試してみてください
// $options->setEnforceEncoding('sjis');

// ページを解析
$url = 'https://www.amazon.co.jp/UHA%E5%91%B3%E8%A6%9A%E7%B3%96-%E7%89%B9%E6%BF%83%E3%83%9F%E3%83%AB%E3%82%AF8-2-%E6%BF%83%E9%A6%99%E3%81%84%E3%81%A1%E3%81%94-75g%C3%974%E8%A2%8B/dp/B08KXMLHM2/ref=sr_1_110?keywords=%E9%A3%B4&qid=1649769121&sr=8-110';
$dom = new Dom();
$dom->loadFromUrl($url, $options);

// 商品名を取得
$element = $dom->find('#landingImage')->src;
echo $element . "\n";