# 📝 MutableString-PHP

PHPで実装した可変長文字列クラス。
文字列の追加、部分文字列の取得、連結、長さの取得などの操作が可能。




## 詳細説明

| メソッド | 説明 |
|----------|------|
| `__construct(string $initialString = "")` | コンストラクタ。初期文字列を設定できます。 |
| `append(string $c): void` | 指定した1文字を末尾に追加します。 |
| `substring(int $start, ?int $end = null): MutableString` | 指定した範囲の部分文字列を持つ新しい `MutableString` インスタンスを返します。 |
| `concat($input: string\|array\|MutableString): void` | 文字列・文字配列・`MutableString` を連結します。 |
| `length(): int` | 現在の文字列の長さを返します。 |
| `__toString(): string` | オブジェクトを文字列として扱った際に、現在の文字列を返します。 |



## 使用例

```php
<?php

require 'MutableString.php'; // クラスファイルの読み込み

$mutable = new MutableString("hello");
$mutable->append('!');
$mutable->concat([' ', '世', '界']);
$mutable->concat(" こんにちは");

$subMutable = $mutable->substring(6, $mutable->length());

echo $mutable . PHP_EOL; // "hello! 世界 こんにちは"
echo $subMutable . PHP_EOL; // " 世界 こんにちは"
echo $mutable->length(); // 15
```

