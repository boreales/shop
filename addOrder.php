<?php

require 'config/db.php';
include 'header.php';

$id = htmlspecialchars($_GET['id']);

$query = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$query->bindParam('id', $id);
$query->execute();
$product = $query->fetch();

if (isset($product)) {

    $total = $product['prix'];
    $createdAt = new DateTime();
    $createdAt = $createdAt->format('Y-m-d H:i:s');

    $query = $pdo->prepare('INSERT INTO orders (total, createdAt) VALUES (:total, :createdAt)');
    $query->bindParam('total', $total);
    $query->bindParam('createdAt', $createdAt);
    $query->execute();

    $idOrder = $pdo->lastInsertId();

    $query = $pdo->prepare('INSERT INTO order_product (id_product, id_order) VALUES (:id_product, :id_order)');
    $query->bindParam('id_product', $product['id']);
    $query->bindParam('id_order', $idOrder);
    $query->execute();
}

?>

<h1>Commande validée</h1>
<p><?= $product['nom']." - ".$product['prix']."€" ?></p>
<a href="index.php">Retour à l'accueil</a>
