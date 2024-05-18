<?php

namespace Fhtechnikum\Uebung3;

class ProductTypeService
{
    private array $categoryList;

    public function __construct(CategoriesRepository $repository){
        $this->categoryList = $repository->getCategoriesModel()->categoryList;
    }

    public function getCategoryResult(): DTOs\CategoryDTO{
        $resultDTO = new DTOs\CategoryDTO();
        $resultDTO->productType = //hier soll jetzt ein String her - naemlich das Ergebnis aus der Abfrage aus der Datenbank fuer das Produkt.
        //Hie rmuss man irgendwas iterieren...;

        return $resultDTO;
    }

}