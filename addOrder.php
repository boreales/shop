<?php

require 'config/db.php';
include 'header.php';

$id = htmlspecialchars($_GET['id']);

$query = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$query->bindParam('id', $id);
$query->execute();
$product = $query->fetch();

if ($product) {

    $total = $product['prix'];
    $createdAt = new DateTime();
    $createdAt = $createdAt->format('Y-m-d H:i:s');

    //On insère d'abord la nouvelle commande avec le total et la date
    $query = $pdo->prepare('INSERT INTO orders (total, createdAt) VALUES (:total, :createdAt)');
    $query->bindParam('total', $total);
    $query->bindParam('createdAt', $createdAt);
    $query->execute();

    //On récupère le dernier id en base de données qui correspond à la commande enregistrée
    $idOrder = $pdo->lastInsertId();

    //On insère le produit et la commande qui vient d'être passée dans la table intermédiaire pour garder le lien produit/commande
    $query = $pdo->prepare('INSERT INTO order_product (id_product, id_order) VALUES (:id_product, :id_order)');
    $query->bindParam('id_product', $product['id']);
    $query->bindParam('id_order', $idOrder);
    $query->execute();
}

?>

<h1>Commande validée</h1>
<p><?= $product['nom']." - ".$product['prix']."€" ?></p>
<a href="index.php">Retour à l'accueil</a>
