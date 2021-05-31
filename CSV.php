<?php

class CSV 
{
    private $file;
    private $handle;

    public function __construct($file, $mode = 'r') {

        if(!is_string($file)) {
            throw new InvalidArgumentException('Parameter $file must be a string. Provided type: ' . gettype($file));
        }

        if(!is_file($file) || !is_readable($file)) {
            throw new RuntimeException('The provided file could not be opened for reading. File: ' . $file);
        }

        $this->file   = $file;
        $this->handle = fopen($file, $mode);
    }

    public function getCSV($mode) {
        $value = fgetcsv($this->handle, $mode);

        if($value === false) {
            throw new RuntimeException('Encountered an error while reading CSV file: ' . $this->file);
        }

        return $value;
    }   

    public function readAll() {
        $array = [];

        while(($rows = fgetcsv($this->handle)) !== false) {

            $columns = count($rows);

            for($i = 0; $i < $columns; $i++) {
                $array[] = $rows[$i];
            }

        }

        $this->close();

        return $array;
    }

    public function __destruct() {
        if(is_resource($this->handle)) {
            $this->close();
        }
    }

    public function close() {
        fclose($this->handle); 
    }

    public function endFile() {
        return feof($this->handle); 
    }

}