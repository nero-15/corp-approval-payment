<?php
require 'vendor/autoload.php';

$parser    = new \Smalot\PdfParser\Parser();
$pdf       = $parser->parseFile('pdf/sample.pdf');
$firstPage = $pdf->getPages()[0];

preg_match_all('/¥(.+)-/', $firstPage->getText(), $match);
$amount  = $match[1][0];

// TODO: 〇〇のところもテキストを抽出して埋め込む
$template = <<<EOM
今月の請求になります。よろしくお願いいたします。
```
1)支払先 : 〇〇
2)金　額 : {$amount}円
3)予　算 : 通信費
4)内　容 : 〇〇
5)備　考 : 計上日 〇〇 / 支払期限 〇〇
6)決裁者 : 〇〇
```
EOM;

echo "<pre>{$template}</pre>";
