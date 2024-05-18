<?php

namespace Fhtechnikum\Uebung3;

use Fhtechnikum\Uebung3\DTOs\ProductDTO;

class ProductItemsService
{
    private array $productList;

    public function __construct(ProductsRepository $productsRepository){
        $this->productList = $productsRepository->getProducts();
    }

    public function provideItemsResult(): ProductDTO
    {

    }

    /**
     * @return array
     */
    public function buildItemsList(): array
    {
        $products = [];
        for ($i = 0; $i < count($this->productList); $i++) {
            //Hier weitermachen: zweidimensionales Array? bauen aus Produktliste
        }
    }

}
