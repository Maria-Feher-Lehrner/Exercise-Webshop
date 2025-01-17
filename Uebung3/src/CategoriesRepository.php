<?php

namespace Fhtechnikum\Uebung3;

use Fhtechnikum\Uebung3\models\CategoryModel;
use PDO;

class CategoriesRepository
{
    private PDO $database;

    public function __construct(PDO $database){
        $this->database = $database;
    }

    /**
     * @return models\CategoryModel[]
     * @return array
     */
    public function getAllCategories(): array
    {
        $query = "SELECT id, name FROM product_types ORDER BY name";
        $statement = $this->database->prepare($query);

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
}