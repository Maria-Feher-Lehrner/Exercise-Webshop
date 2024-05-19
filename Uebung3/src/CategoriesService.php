<?php

namespace Fhtechnikum\Uebung3;

use Fhtechnikum\Uebung3\DTOs\CategoryDTO;

class CategoriesService
{
    private array $categoryList;

    public function __construct(CategoriesRepository $repository){
        $this->categoryList = $repository->getAllCategories();
    }

    /**
     * @return array|DTOs\CategoryDTO[]
     */
    public function provideCategoryResult(): array{
        $DTOList = [];

        foreach($this->categoryList as $category){
            $resultDTO = new CategoryDTO();
            $resultDTO->productType = $category['name'];
            $resultDTO->url = "http://localhost/bb/Uebung3/index.php?resource=products&filter-type=".$category['id'];
            $DTOList[] = $resultDTO;
        }

        return $DTOList;
    }

}