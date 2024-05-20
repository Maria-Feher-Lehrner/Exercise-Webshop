<?php

namespace Fhtechnikum\Uebung3;

use PDO;

class ProductsRepository
{
    private PDO $database;
    private int $typeId;

    public function __construct(PDO $database, int $typeId){
        $this->database = $database;
        $this->typeId = $typeId;
    }

    /**
     * @return models\ProductModel[]
     * @return array
     */
public function getProducts(): array
{
    $query = "SELECT t.name AS productTypeName, p.name AS productName 
    FROM product_types t JOIN products p ON t.id = p.id_product_types
    WHERE t.id = :id";
    $statement = $this->database->prepare($query);
    $statement->bindParam(":id", $this->typeId);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    //starting here: handling of empty results
    if(empty($results) || $results[0]['productName'] === null){
        $productTypeQuery = "SELECT name AS productTypeName FROM product_types WHERE id = :id";
        $productTypeStatement = $this->database->prepare($productTypeQuery);
        $productTypeStatement->bindParam(":id", $this->typeId);
        $productTypeStatement->execute();
        $productType = $productTypeStatement->fetch(PDO::FETCH_ASSOC);

        if($productType) {
            return[
                [
                    'productTypeName' => $productType['productTypeName'],
                    'productName' => null,
                ]
            ];
        }
        return [];
    }
        return $results;
}

}