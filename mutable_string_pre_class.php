<?php

$chars = [];

function create_chars(string $initialString = "", array &$chars): void {
    $chars = mb_str_split($initialString);
}

function append_char(array &$chars, string $char): void {
    $chars[] = $char;
}

function get_length(array $chars): int {
    return count($chars);
}

function to_string(array $chars): string {
    return implode('', $chars);
}

function substring_chars(array $chars, int $start, ?int $end = null): array {
    $end = $end ?? count($chars);
    return array_slice($chars, $start, $end - $start);
}

function concat_chars(array &$chars, array|string $input): void {
    if (is_string($input)) {
        $input = mb_str_split($input);
    }
    $chars = array_merge($chars, $input);
}

// 利用例
create_chars(initialString: "hello", chars: $chars);
append_char($chars, '!');
concat_chars($chars, [' ', '世', '界']);
concat_chars($chars, " こんにちは");

$sub = substring_chars($chars, 6, get_length($chars));

print_r($chars);                       // ['h', 'e', 'l', 'l', 'o', '!', ' ', '世', '界', ' ', 'こ', 'ん', 'に', 'ち', 'は']
echo to_string($chars) . PHP_EOL;     // "hello! 世界 こんにちは"
echo to_string($sub) . PHP_EOL;       // " 世界 こんにちは"
echo get_length($chars) . PHP_EOL;    // 15
