<?php

include('connection.php');

$stmt =$pdo->prepare("SELECT * FROM products WHERE product_category='watches' LIMIT 4");

$stmt->execute();

$watches_products =$stmt->fetchAll(PDO::FETCH_ASSOC);
?>