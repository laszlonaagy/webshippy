<?php 

class CSVSort extends CSV {

    public static function twoWayOrdering(&$array,$param1,$param2) {
        usort($array, function ($a, $b) use($param1,$param2)  {
            $pc = -1 * ($a[$param1] <=> $b[$param1]);
            return $pc == 0 ? $a[$param2] <=> $b[$param2] : $pc;
        });
    }

}