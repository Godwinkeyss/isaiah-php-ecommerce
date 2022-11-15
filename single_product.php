<?php 
 include('./server/connection.php');
if(isset($_GET['product_id'])){
    
$product_id = $_GET['product_id'];

   
    
    $stmt =$pdo->prepare('SELECT * FROM products WHERE product_id=:product_id LIMIT 1');
    $stmt->bindValue(':product_id', $product_id);
    $stmt->execute();
    
    $products =$stmt->fetchAll(PDO::FETCH_ASSOC);
    

    // no product id was given
}else{
    header('Location: index.php');
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

    <title>Home</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-white py-3 fixed-top navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#"><h2 class="brand">Grapec</h2></a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.html">Products</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="#">Contact us</a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-solid fa-user"></i></a>
          </li>
         
          
        </ul>
        
      </div>
    </div>
  </nav>
<!-- single -->

<section class="single-product my-5 pt-5 container">
    <div class="row mt-5">
       
    <?php foreach($products as $product): ?>
       


        <div class="col-lg-5 col-md-6 col-sm-12">
            <img src="./images/<?php echo $product['product_image'];?>" class="img-fluid w-100 img-me pb-1"alt="" id="main-img">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="./images/<?php echo $product['product_image'];?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="./images/<?php echo $product['product_image2'];?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="./images/<?php echo $product['product_image3'];?>" width="100%" class="small-img" alt="">
                </div>
                <div class="small-img-col">
                    <img src="./images/<?php echo $product['product_image4'];?>" width="100%" class="small-img" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <h6><?php echo $product['product_category'];?></h6>
            <h3 class="py-4"><?php echo $product['product_name'];?></h3>
            <h2>$<?php echo $product['product_price'];?></h2>

            <form action="cart.php" method="POST">
                
                <input type="hidden" name="product_id" value="<?php echo $product['product_id'];?>">
                <input type="hidden" name="product_image" value="<?php echo $product['product_image'];?>">
                <input type="hidden" name="product_name" value="<?php echo $product['product_name'];?>">
                <input type="hidden" name="product_price" value="<?php echo $product['product_price'];?>">
                <input type="number" value="1" name="product_quantity">
                <button class="buy-btn" type="submit" name="add_to_cart">Add to Cart</button>
            </form>
                <h4 class="mt-5 mb-5">Product details</h4>
                <span><?php echo $product['product_description'];?></span>
        </div>
        <?php endforeach;  ?>
    </div>
</section>

<!-- related products -->
<section id="related-products">
    <div class="container text-center mt-5 py-5">
        <h3>Related Products</h3>
        <hr class="mx-auto">
        
    </div>
    <div class="row mx-auto container-fluid clothes">
        <div class="product col-lg-3 col-md-4 col-sm-12 text-center">
            <img src="./images/bag.jpg" alt="" class="img-fluid mb-3">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas  fa-star"></i>
                <i class="fas  fa-star"></i>
                <i class="fas  fa-star"></i>
                <i class="fas  fa-star"></i>
            </div>
            <h5 class="p-name">Smooth Skin</h5>
            <h4 class="p-price">$144</h4>
            <button class="buy-btn ">Buy Now</button>
        </div>
        <div class="product col-lg-3 col-md-4 col-sm-12 text-center">
            <img src="./images/coats1.jpg" alt="" class="img-fluid mb-3">
            <div class="star">
                <i class="fas  fa-star"></i>
                <i class="fas  fa-star"></i>
                <i class="fas  fa-star"></i>
                <i class="fas  fa-star"></i>
                <i class="fas  fa-star"></i>
            </div>
            <h5 class="p-name">Smooth Skin</h5>
            <h4 class="p-price">$144</h4>
            <button class="buy-btn ">Buy Now</button>
        </div>
        <div class="product col-lg-3 col-md-4 col-sm-12 text-center">
            <img src="./images/shoes3.jpg" alt="" class="img-fluid mb-3">
            <div class="star">
                <i class="fas  fa-star"></i>
                <i class="fas  fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas  fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Smooth Skin</h5>
            <h4 class="p-price">$144</h4>
            <button class="buy-btn ">Buy Now</button>
        </div>
        <div class="product col-lg-3 col-md-4 col-sm-12 text-center">
            <img src="./images/coats2.jpg" alt="" class="img-fluid mb-3">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Smooth Skin</h5>
            <h4 class="p-price">$144</h4>
            <button class="buy-btn ">Buy Now</button>
        </div>
    </div>
</section>






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
  <script>
   let mainImg = document.getElementById('main-img')
   let smallImg =document.getElementsByClassName('small-img')
    
   for(let i =0; i<4; i++){
        smallImg[i].onclick = function(){
        mainImg.src = smallImg[i].src;
   }

   }
   

  </script>
  
  <body>
      
  
  </html>