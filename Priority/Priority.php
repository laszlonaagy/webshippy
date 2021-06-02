<?php

 interface Priority {

    const PRIORITIES = [
        1 => "low",
        2 => "medium",
        3 => "high"
    ];

    public static function getPriority($id);
 }