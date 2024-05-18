<?php

namespace Fhtechnikum\Uebung3;

use Fhtechnikum\Uebung3\models\CategoriesModel;
use PDO;

class CategoriesRepository
{
    private PDO $database;

    public function __construct(PDO $database){
        $this->database = $database;
    }

    public function getCategoriesModel(): CategoriesModel
    {
        $categoriesModel = new CategoriesModel();

        $query = "SELECT id, name FROM product_types ORDER BY name";
        $statement = $this->database->prepare($query);

        $statement->execute();

        $categoriesModel->categoryList = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $categoriesModel;
    }
}