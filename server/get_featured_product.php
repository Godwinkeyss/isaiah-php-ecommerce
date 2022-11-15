<?php

include('connection.php');

$stmt =$pdo->prepare('SELECT * FROM products LIMIT 4');

$stmt->execute();

$feature_products =$stmt->fetchAll(PDO::FETCH_ASSOC);
?>