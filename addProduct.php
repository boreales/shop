<?php

require 'config/db.php';

$name = htmlspecialchars($_POST['name']);
$description = htmlspecialchars($_POST['description']);
$price = htmlspecialchars($_POST['price']);
$stock = htmlspecialchars($_POST['stock']);

if (isset($name) && isset($description) && isset($price) && isset($stock)) {
    $query = $pdo->prepare('INSERT INTO products (nom, description, prix, stock) VALUES (:name, :description, :price, :stock)');
    $query->bindParam('name', $name);
    $query->bindParam('description', $description);
    $query->bindParam('price', $price);
    $query->bindParam('stock', $stock);
    $query->execute();

    header('Location: index.php');
}
