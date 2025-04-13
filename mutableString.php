<?php

class MutableString {
    
    private array $chars = [];

    public function __construct(string $initialString = ""): void {
        $this->chars = mb_str_split($initialString);
    }

    public function getChars(): array {
        return $this->chars;
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

    // public function substring(int $start, ?int $end = null): array {
    //     $end = $end ?? count($this->chars);
    //     return array_slice($this->chars, $start, $end - $start);
    // }

    
    public function concatChar(array|string|MutableString $input): void {
        if (is_string($input)) {
            $this->chars = array_merge($this->chars, mb_str_split($input));
        } elseif (is_array($input)) {
            $this->chars = array_merge($this->chars, $input);
        } elseif ($input instanceof MutableString) {
            $this->chars = array_merge($this->chars, $input->getChars());
        }
    }
}

// 利用例
$mutable = new MutableString("hello");
$mutable->appendChar('!');
$mutable->concatChar([' ', '世', '界']);
$mutable->concatChar(" こんにちは");

$subMutable = $mutable->substring(6, $mutable->getLength());
echo $mutable . PHP_EOL;         // "hello! 世界 こんにちは"
echo $subMutable . PHP_EOL;      // " 世界 こんにちは"
echo $mutable->getLength();         // 15
