<?php

include('connection.php');

$stmt =$pdo->prepare("SELECT * FROM products WHERE product_category='shoes' LIMIT 4");

$stmt->execute();

$shoes_products =$stmt->fetchAll(PDO::FETCH_ASSOC);
?>