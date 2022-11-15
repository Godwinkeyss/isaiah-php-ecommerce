<?php

include('connection.php');

$stmt =$pdo->prepare("SELECT * FROM products WHERE product_category='coats' LIMIT 4");

$stmt->execute();

$coats_products =$stmt->fetchAll(PDO::FETCH_ASSOC);
?>