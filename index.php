<?php
require 'vendor/autoload.php';

$app = new \Fhtechnikum\Uebung3\ProductDbController();
$app->route();


/*

use Fhtechnikum\Uebung3\ProductsRepository;

$pdo = new PDO("mysql:host=localhost;dbname=bb_uebung_3; charset=utf8", "root", "");
$repository = new ProductsRepository($pdo, 4);
print_r($repository->getProducts());
/*
$query = "SELECT id, name FROM product_types ORDER BY name";
$statement = $pdo->prepare($query);

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

print_r($result);*/