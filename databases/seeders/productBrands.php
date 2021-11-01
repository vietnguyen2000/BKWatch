<?php

use Models\ProductBrandModel;

$productBrands = new ProductBrandModel();

$productBrands->insert([
  "id" => 1,
  "title" => "Rolex"
]);

$productBrands->insert([
  "id" => 2,
  "title" => "Omega"
]);

$productBrands->insert([
  "id" => 3,
  "title" => "Casio"
]);

$productBrands->insert([
  "id" => 4,
  "title" => "Apple"
]);

$productBrands->insert([
  "id" => 5,
  "title" => "Louis Vuitton"
]);

$productBrands->insert([
  "id" => 6,
  "title" => "Zenith"
]);
