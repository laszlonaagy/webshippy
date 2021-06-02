<?php 
class CSVFormatter extends CSV {

    public static function standardFormat(array $array) {
        foreach ($array as $element) {
            echo str_pad($element, 20);
        }
        echo "\n";
    }

    public static function singleFormat(string $text) {
            echo str_pad($text, 20);
    }

    public static function divider(array $arrayCount, $separator) {
        foreach ($arrayCount as $element) {
            echo str_repeat($separator, 20);
        }
        echo "\n";
    }

    public static function spacer(int $charCount, $char = " ") {
            echo str_repeat($char, $charCount);
            echo "\n";
    }

}