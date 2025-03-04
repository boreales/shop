<?php

require 'config/db.php';
include 'header.php';

$orders = $pdo->query('SELECT * FROM orders')->fetchAll();
$nbOrders = count($orders);

?>

<h1 class="text-center">Orders</h1>

<div class="row">
    <div class="col-md-12">
        <p><?= $nbOrders ?> orders</p>
    </div>
</div>
<a href="index.php">Back to home</a>
<hr>

<?php foreach ($orders as $order) : ?>
    <div class="row">
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                    <th>#</th>
                    <th>Total</th>
                    <th>Date</th>
                    <th>Products</th>
            </thead>
            <tbody>
            <tr>
                <td scope="col">n°<?= $order['id'] ?></td>
                <td scope="col"><?= $order['total'] ?>€</td>
                <td scope="col"><?= $order['createdAt'] ?></td>
                <td>
                    <?php
                    $products = $pdo->query("SELECT * FROM products INNER JOIN order_product ON products.id = order_product.id_product WHERE order_product.id_order = $order[id]")->fetchAll();
                    ?>
                    <ul>
                        <?php foreach ($products as $product) : ?>
                            <li><?= $product['nom'] ?> - <?= $product['prix'] ?>€</li>
                        <?php endforeach; ?>
                    </ul>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
<?php endforeach; ?>
