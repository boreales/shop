<?php

require 'config/db.php';
include 'header.php';

$id = htmlspecialchars($_GET['id']);

$query = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$query->bindParam('id', $id);
$query->execute();
$product = $query->fetch();

if (!$product) {
    header('Location: index.php');
    exit;
}

if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['stock'])) {
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $price = htmlspecialchars($_POST['price']);
    $stock = htmlspecialchars($_POST['stock']);

    $query = $pdo->prepare('UPDATE products SET nom = :name, description = :description, prix = :price, stock = :stock WHERE id = :id');
    $query->bindParam('name', $name);
    $query->bindParam('description', $description);
    $query->bindParam('price', $price);
    $query->bindParam('stock', $stock);
    $query->bindParam('id', $id);
    $query->execute();

    header('Location: index.php');
    exit;
}

?>
<h1>Editer <?= $product['nom'] ?></h1>
<form action="editProduct.php?id=<?= $product['id'] ?>" method="post">
    <div class="form-group">
        <label for="name">Nom</label>
        <input class="form-control" type="text" name="name" placeholder="Name" value="<?= $product['nom'] ?>">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input class="form-control" type="text" name="description" placeholder="Description" value="<?= $product['description'] ?>">
    </div>
    <div class="form-group">
        <label for="price">Prix</label>
        <input class="form-control" type="number" name="price" placeholder="Price" value="<?= $product['prix'] ?>">
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input class="form-control" type="number" name="stock" placeholder="Stock" value="<?= $product['stock'] ?>">
    </div>
    <button class="btn btn-secondary" type="submit">Editer</button>
</form>
<a href="index.php">Retour</a>

<?php
include 'footer.php';
?>
