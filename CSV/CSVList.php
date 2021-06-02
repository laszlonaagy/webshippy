<?php
require_once "../Priority/Priority.php";
class CSVList extends CSV implements Priority {

    public static function list(array $orders, object $stock) {
        foreach ($orders["values"] as $item) {
            if ($stock->availableProducts->{$item['product_id']} >= $item['quantity']) {
                foreach ($orders['headers'] as $h) {
                    if ($h == 'priority') {
                        $text = CSVList::getPriority($item["priority"]);
                        CSVFormatter::singleFormat($text);
                    } else {
                        CSVFormatter::singleFormat($item[$h]);
                    }
                }
                echo "\n";
            }
        }
        

    }

    public static function getPriority($id) {
        return Priority::PRIORITIES[$id];
    }

}