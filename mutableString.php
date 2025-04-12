<?php

class MutableString {
    
    private array $chars = [];

    public function __construct(string $initialString = ""): void {
        $this->chars = mb_str_split($initialString);
    }

    public function appendChar(string $char): void {
        $this->chars[] = $char;
    }

    public function getLength(): int {
        return count($this->chars);
    }

    public function __toString(): string {
        return implode('', $this->chars);
    }

    # start から end までの文字列を持つオブジェクトを返すメソッド
    public function substring(int $start, ?int $end = null): MutableString {
        $end = $end ?? count($this->chars); // end が null の場合は最後まで取得
        return new MutableString(
            implode('', array_slice($this->chars, $start, $end - $start))
        );
    }
    
    public function concat(array|string|MutableString $input): void {
        if ($input instanceof MutableString) {
            $this->chars = array_merge($this->chars, $input->chars);
        } elseif (is_string($input)) {
            $this->chars = array_merge($this->chars, mb_str_split($input));
        } else {
            $this->chars = array_merge($this->chars, $input);
        }
    }
}

// 利用例
$mutable = new MutableString("hello");
$mutable->appendChar('!');
$mutable->concat([' ', '世', '界']);
$mutable->concat(" こんにちは");

$subMutable = $mutable->substring(6, $mutable->getLength());
echo $mutable . PHP_EOL;         // "hello! 世界 こんにちは"
echo $subMutable . PHP_EOL;      // " 世界 こんにちは"
echo $mutable->getLength();         // 15
