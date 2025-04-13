<?php

$chars = [];

function createChars(string $initialString = "", array &$chars): void {
    $chars = mb_str_split($initialString);
}

function appendChar(array &$chars, string $char): void {
    $chars[] = $char;
}

function getLength(array $chars): int {
    return count($chars);
}

function toString(array $chars): string {
    return implode('', $chars);
}

function substring(array $chars, int $start, ?int $end = null): array {
    $end = $end ?? count($chars);
    return array_slice($chars, $start, $end - $start);
}

function concatChars(array &$chars, array|string $input): void {
    if (is_string($input)) {
        $chars = array_merge($chars, mb_str_split($input));
    }else {
        $chars = array_merge($chars, $input);
    }
}

// 利用例
createChars("hello", $chars);
appendChar($chars, '!');
concatChars($chars, [' ', '世', '界']);
concatChars($chars, " こんにちは");

$sub = substring($chars, 6, getLength($chars));

print_r($chars);                       // ['h', 'e', 'l', 'l', 'o', '!', ' ', '世', '界', ' ', 'こ', 'ん', 'に', 'ち', 'は']
echo toString($chars) . PHP_EOL;     // "hello! 世界 こんにちは"
echo toString($sub) . PHP_EOL;       // " 世界 こんにちは"
echo getLength($chars) . PHP_EOL;    // 15
