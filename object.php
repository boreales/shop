<?php

require 'product.php';

$product = new Product('Banana', 'A delicious banana', 1.5, 100);
echo $product->name; // Banana
