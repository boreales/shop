<?php

require 'config/db.php';
include 'header.php';

$products = $pdo->query('SELECT * FROM products')->fetchAll();

if (empty($products)) {
    echo 'No products';
} else {
    echo '<h1>Produits</h1>';
}

foreach ($products as $product) {
    if ($product['id'] == 1) {
        echo '<img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcTOneu_ynq4qMMgc57HhJAyLOsT2zYKBX-4FgwE2R1j5lkRAXorjt-iBnd_mP1QenS-1ZFT9okiOZvN6rnnmbBdkEfvqKmudo6zBbcIVwi-9gyU5tne3ZAGHUHoCNbDOmJKk8zBl6h0gQ&usqp=CAc" alt="product" height="100px">';
    }
    elseif ($product['id'] == 2) {
        echo '<img src="https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcRsPncYiDeXgGRjkegIBWOGgatVpt6a2vFU1dpFMevn0pxIdomlkrd5D4lUBBix_jQKkpgbwUy9PdJsypVyI7RElW02OoBy-Hb8oVfEqIr0Wpv_iNLU_JwVKsauYkQBEOCK9WP81ZDvQw&usqp=CAc" alt="product" height="100px">';
    } else {
        echo '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARMAAAC3CAMAAAAGjUrGAAAAbFBMVEX///8UFBQAAAAoKCiwsLDr6+sPDw8REREUFhUNDQ3MzMw1NTX29vb8/PwWFhbw8PAtLS2jo6OOjo4cHBydnZ1QUFBYWFh1dXV/f38kJCTl5eXHx8cDBwVOTk5ycnJtbW1iYmI4ODi3t7c+Pj5bNfD1AAACvElEQVR4nO3d7VKbQABG4d2N2WWp5FMTjLHVeP/3WCBGO33JOO0yC7bnmfiX4IFIfvkaAwAAAAAAAAAAAAAAAABTVFWVaV9jn8dVVXeK//pb/rH8USoz36weZlP1sNrMc9/GlSmdi36ioo/RuTJ3krmLdgDNyffwwS5Sj1xEN8/cZOOGSOK+9XMh+dBF4TZZmxizHeI2cXe3/e4GKF6EbdYilfHpV7Jpcrhy/EN6k8KGImsTY6wfoMlx91g+lj3uj0X60YP9ik1s83ToFYv/t0lY9H4EQxG+dJMrV3pMozYpmgfe3c3UXB5aI90nTZNl5jf+3HL0Jnm/LH6u/YpNk9+N26Sgya9oomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKJoomiiaKLem/D/7d+9/S9369Zjzx6I9bhNLHsZfU3+3iIc4yJ0w13+eP5tLktHcYgVqK/YxLv7XWzKNLfa6un7vt7/eFqdL3Lc3Q8woZa/SfJ2lZvdmNq1SZ7L27ej3pbPbQtXm5tZ8nxV5iZV+n0Sd80Tq3bB+pfugN2r+XmJXROz3KXeKT5mbrJNbRJsfWia2ODt6WPwsTq1f1KaJoc6eSEw5t19a69w6ilbt13v2yFA717rUzdtdqpfu2XA4369TZ8IbO+2jNqRm2Py6Ja/dP2YOrt8Xlz6bZh7R7JROhf6lzEnwHuff2/0vEu7Gnt+9pqH2WqzzLzVW0160Pls+gvLAAAAAAAAAAAAAAAAAIAPPwH3gkMXAVz9PwAAAABJRU5ErkJggg==" alt="product" height="100px">';
    }
    echo '<br>'.$product['nom'] . ' - ' . $product['prix'] . '€<br>';
    echo '<a href="editProduct.php?id=' . $product['id'] . '">Modifier</a><br><br>';
}

?>
<hr>
<h1>Ajouter un produit</h1>

<form action="addProduct.php" method="post">
    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" name="name" placeholder="Name" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" name="description" placeholder="Description" class="form-control">
    </div>
    <div class="form-group">
        <label for="price">Prix</label>
        <input type="number" name="price" placeholder="Price" class="form-control">
    </div>
    <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" name="stock" placeholder="Stock" class="form-control">
    </div>
    <button class="btn btn-secondary" type="submit">Add product</button>
</form>

<?php
include 'footer.php';
?>
