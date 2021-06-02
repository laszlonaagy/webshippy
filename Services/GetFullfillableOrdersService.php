<?php 
require_once "../CSV/CSV.php";
require_once "../CSV/CSVSort.php";
require_once "../CSV/CSVFormatter.php";
require_once "../CSV/CSVList.php";
require_once "../Stock/Stock.php";

  if ($argc != 2) {
    echo "Ambiguous number of parameters!";
    exit(1);
}  

$stock = new Stock($argv[1]);
$csv = new CSV("../orders.csv"); 
$orders = $csv->readAll(true);

CSVFormatter::standardFormat($orders["headers"]);
CSVFormatter::divider($orders["headers"],"=");
CSVSort::twoWayOrdering($orders["values"],"priority","created_at");
CSVList::list($orders,$stock);



