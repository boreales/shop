<?php

require 'product2.php';

$product = new Product();
$product->setName('Banana');
$product->setDescription('A delicious banana');
$product->setPrice(1.5);
$product->setStock(100);

echo $product->getName(); // Banana
