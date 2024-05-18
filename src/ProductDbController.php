<?php

namespace Fhtechnikum\Uebung3;

use Fhtechnikum\Uebung3\DTOs\CategoryDTO;
use Fhtechnikum\Uebung3\views\JSONView;
use http\Exception\InvalidArgumentException;
use PDO;

class ProductDbController
{
    private PDO $productDatabase;
    private CategoriesRepository $typeRepository;
    //private ProductsRepository $productsRepository;
    private ProductTypeService $productTypeService;
    //private ProductItemsService $productItemsService;
    private array $result;
    private JSONView $jsonView;


    public function __construct()
    {
        $this->productDatabase = new PDO("mysql:host=localhost;dbname=bb_uebung_3; charset=utf8", "root", "");
        $this->typeRepository = new CategoriesRepository($this->productDatabase);
        //$this->productsRepository = new ProductsRepository($this->productDatabase);
        $this->productTypeService = new ProductTypeService($this->typeRepository);
        //$this->productItemsService = new ProductItemsService($this->productsRepository);
        $this->jsonView = new JSONView();
        $this->result = [];
        //$this->productsResult = new ProductsDTO();

    }

    public function route(): void
    {
        try {
            if (!isset($_GET["resource"])) {
                throw new \InvalidArgumentException("Invalid resource parameter");
            }
            $resource = strtolower($_GET["resource"]);
            switch ($resource) {
                case "types":
                    $this->result = $this->productTypeService->provideCategoryResult();
                    break;
                /*case "products":
                    $this->categoryResult = $this->productItemsService->provideItemsResult();
                    break;*/
                default:
                    throw new InvalidArgumentException("Invalid value for resource parameter");
            }
                $this->jsonView->output($this->result);
        } catch (InvalidArgumentException $e) {
            http_response_code(400);
            $this->jsonView->output(['error' => $e->getMessage()]);
        } catch (\Exception $e) {
            http_response_code(500);
            $this->jsonView->output(['error' => 'An unexpected error occurred']);
        }
    }
}