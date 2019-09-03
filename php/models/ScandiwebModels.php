<?php

function getAllWorkers() {
    $dbConnection = DB::getInstance()->getPDO();
    $products = $dbConnection->query('SELECT * FROM `scandiweb`');

}

