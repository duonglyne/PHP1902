<?php
include_once "database.php";
include_once "productModel.php";
$productModel = new productModel("localhost", "root", "", "oop");
$testIndex = $productModel->index();
echo "<pre>";
print_r($testIndex);
echo "</pre>";

$productss = [
    'product_name' => 'son môi',
    'product_desc' => 'son môi',
    'created' => '12/03/2013'
];
$testCreate = $productModel->create($productss);

echo "<pre>";
print_r($testCreate);
echo "</pre>";

$testDelete = $productModel->delete(3);

echo "<br>".$testDelete;

$productss1 = [
    'product_name' => 'giày',
    'product_desc' => 'giày đẹp',
    'created' => '12/03/2015',
    'id' => 4
];

$testEdit = $productModel->edit($productss1);

echo "<br>".$testEdit;
