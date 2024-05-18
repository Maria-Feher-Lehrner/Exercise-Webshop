<?php

namespace Fhtechnikum\Uebung3;

class ProductItemsService
{
    private array $categories;

    public function __construct(CategoriesRepository $categoriesRepository){
        $this->categories = $categoriesRepository->getAllCategories()->categoriesModel;
    }

    public function provideItemsResult()
    {
    }
}