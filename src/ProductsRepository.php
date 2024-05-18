<?php

namespace Fhtechnikum\Uebung3;

use PDO;

class ProductsRepository
{
    private PDO $database;

    public function __construct(PDO $database){
        $this->database = $database;
    }
}