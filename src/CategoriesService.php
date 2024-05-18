<?php

namespace Fhtechnikum\Uebung3;

class CategoriesService
{
    private array $categories;

    public function __construct(CategoriesRepository $categoriesRepository){
        $this->categories = $categoriesRepository->getCategoriesModel()->categoriesModel;
    }
}