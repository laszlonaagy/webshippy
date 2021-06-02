<?php

class Stock {

    public object $availableProducts;

    public function __construct($inputStock) {
        
        try {
            $this->availableProducts = json_decode($inputStock, false, 512, JSON_THROW_ON_ERROR); 
        }
        catch (\JsonException $exception) {
            echo $exception->getMessage();
        }

    }

}