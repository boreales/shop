<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=shop', 'root', 'root');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
