<?php

namespace Fhtechnikum\Uebung3;

use Fhtechnikum\Uebung3\DTOs\ProductsDTO;

class ProductItemsService
{
    private array $productList;

    public function __construct(ProductsRepository $productsRepository){
        $this->productList = $productsRepository->getProducts();
    }

    public function provideItemsResult(): ProductsDTO
    {
        $DTO = new ProductsDTO();

        $DTO->productType = $this->productList[0]["productTypeName"];
        $DTO->products = $this->buildItemsList();
        $DTO->url = "http://localhost/bb/Uebung3/index.php?resource=types";

        return $DTO;
    }

    /**
     * @return array
     */
    public function buildItemsList(): array
    {
        $products = [];
        foreach ($this->productList as $product) {
            $products[] = ['name' => $product['productName']];
        }
        return $products;
    }

}

