<?php session_start()  ?>

<?php include('../server/connection.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../css/bootstrap.rtl.min.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
</head>
<body>
    <div class="d-flex" id="wrapper">


<div class="bg-white " id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <i class="fas fa-user-secret me-2"></i>Grapec
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashborad
                </a>
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i>Orders
                </a>
                
               
                <a href="products.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-gift me-2"></i>Product
                </a>
               
                <a href="account.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-map-marker me-2"></i>Account
                </a>
                <a href="add_product.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-comment-dots me-2"></i>Add New Product
                </a>
                <a href="help.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-comment-dots me-2"></i>Help
                </a>
                <a href="logout.php?logout=1" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-project-diagram me-2"></i>Logout
                </a>
            </div>
        </div>