<?php

namespace Fhtechnikum\Uebung3;

use PDO;

class ProductDbController
{
    private PDO $ProductDatabase;
    private CategoriesRepository $typeRepository;
    private ProductsRepository $productsRepository;


    public function __construct(){
        $this->ProductDatabase = new PDO("mysql:host=localhost;dbname=bb_uebung_3; charset=utf8", "root", "");
        $this->typeRepository = new CategoriesRepository($this->ProductDatabase);
        $this->productsRepository = new ProductsRepository($this->ProductDatabase);

    }

}