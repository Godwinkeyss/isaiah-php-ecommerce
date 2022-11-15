<?php  

include('./server/connection.php');
// use the search secttion
if(isset($_POST['search'])){
    $category = $_POST['category'];
    $price = $_POST['price'];

    $stmt =$pdo->prepare("SELECT * FROM products WHERE product_category=:product_category AND product_price<=:product_price");

    $stmt->bindValue(':product_category',$category);
    $stmt->bindValue(':product_price',$price);

    $stmt->execute();
    
    $products =$stmt->fetchAll(PDO::FETCH_ASSOC);

    // return all products
}else{
    $stmt =$pdo->prepare("SELECT * FROM products ");

    $stmt->execute();
    
    $products =$stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Shop</title>
    <style>
        .pagination a{
           color:coral;
        }
        .pagination li:hover a{
            color:#fff;
            background-color: coral;
        }
    </style>
    </head>
<body>
   <!-- navbar -->
   <nav class="navbar navbar-expand-lg bg-white py-3 fixed-top navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#"><h2 class="brand">Grapec</h2></a>

      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div
        class="collapse navbar-collapse nav-buttons"
        id="navbarSupportedContent"
      >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html"
              >Home</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.html">Products</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="cart.html"
              ><i class="fa-solid fa-cart-shopping"></i
            ></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="account.html"><i class="fa-solid fa-user"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
   <!-- navbar end -->


   <!-- search -->
   <div class="shop mt-5">
   <section id="search" class=" py-5 mt-5 ms-2">
     <div class="container ">
        <p>Search Products</p>
        <hr>
     </div>

     <form action="shop.php" method="POST">
        <div class="row mx-auto container">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p>Category</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input"value="shoes" name="category" id="category_one">
                    <label class="form-check-label" for="flexRadioDefault1">Shoes</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input"value="coats" name="category" id="category_two">
                    <label class="form-check-label" for="flexRadioDefault2">Coats</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input"value="watches" name="category" id="category_two">
                    <label class="form-check-label" for="flexRadioDefault2">Watches</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input"value="bags" name="category" id="category_two" checked>
                    <label class="form-check-label" for="flexRadioDefault2">Bags</label>
                </div>
            </div>
        </div>
        <div class="row mx-auto container mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p>Price</p>
                <input type="range" class="form-range "name="price" value="100" min="1" max="1000" id="customRange2">
                <div class="">
                    <span style="float:left;">1</span>
                    <span style="float:right;">1000</span>
                </div>
            </div>
        </div>
        <div class="form-group my-3 mx-3">
            <input type="submit" name="search" value="Search" class="btn btn-primary">
        </div>
     </form>
   </section>

<!-- shop -->
<section id="shop" class="container">
    <div class="container  mt-5 py-5">
        <h3>Our Products</h3>
        <hr>
        <p>Here you can check out our products</p>
    </div>
    <div class="row mx-auto container">
        
       
        
       
       
       
       
        
        
        
        
    <?php foreach($products as $row): ?>
       
        <div onclick="window.location.href='single_product.html';" class="product col-lg-3 col-md-4 col-sm-12 text-center">
            <img src="./images/<?php echo $row['product_image'] ?>" alt="" class="img-fluid mb-3">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
            <h4 class="p-price mb-3">$<?php echo $row['product_price'] ?></h4>
            <a class=" ship-btn " href="<?php echo "single_product.php?product_id=".$row['product_id'] ?>">Buy Now</a>
        </div>
       
        <?php endforeach; ?>
       
       

        <nav aria-label="Page navigation example">
            <ul class="pagination mt-5">
                <li class="page-item"><a href="#" class="page-link">Previous</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
        </nav>
    </div>
</section>



</div>
















      <!-- footer -->

<footer class="mt-t py-5">
    <div class="row container mx-auto pt-5">
       <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <img src="./images/logo.jpg" alt="" class="logo-img">
          <p class="pt-3">We provide the best products for the most affordable prices</p>
       </div>
       <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Featured</h5>
          <ul class="text-uppercase">
              <li><a href="#">men</a></li>
              <li><a href="#">women</a></li>
              <li><a href="#">boys</a></li>
              <li><a href="#">girls</a></li>
              <li><a href="#">new arrivals</a></li>
              <li><a href="#">clothes</a></li>
          </ul>
       </div>
       <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Contact Us</h5>
          <div class="">
              <h6 class="text-uppercase">Address</h6>
              <p>Benin City, Nigeria</p>
          </div>
          <div class="">
              <h6 class="text-uppercase">Phone</h6>
              <p>+234 8136-144-950</p>
          </div>
          <div class="">
              <h6 class="text-uppercase">Email</h6>
              <p>Godwinkeyss@gmail.com</p>
          </div>
       </div>
       <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <h5 class="pb-2">Instagram</h5>
          <div class="row">
              <img src="" alt="" class="img-fluid w-25 h-100 m-2">
              <img src="" alt="" class="img-fluid w-25 h-100 m-2">
              <img src="" alt="" class="img-fluid w-25 h-100 m-2">
              <img src="" alt="" class="img-fluid w-25 h-100 m-2">
              <img src="" alt="" class="img-fluid w-25 h-100 m-2">
          </div>
       </div>
  
    </div>
    <div class="copyright mt-5">
      <div class="row container mx-auto">
          <div class="col-lg-3 col-md6-6 col-sm-12 mb-4">
              <img src="./images/payment.jpg" alt="">
          </div>
          <div class="col-lg-3 col-md6-6 col-sm-12 mb-4 text-nowrap mb-2">
             <p>eCommerce &copy; 2022 All Right Reserved</p>
          </div>
          <div class="col-lg-3 col-md6-6 col-sm-12 mb-4">
             <a href="#"><i class="fab fa-facebook"></i></a>
             <a href="#"><i class="fab fa-instagram"></i></a>
             <a href="#"><i class="fab fa-twitter"></i></a>
             <a href="#"><i class="fab fa-linkedin"></i></a>
          </div>
      </div>
    </div>
  </footer>

<script src="./js/bootstrap.bundle.min.js"></script>

<body>
        
    
</html>