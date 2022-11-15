<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/index.css" />
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
      integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- google fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <title>Home</title>
  </head>
  <body>
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
              <a class="nav-link" href="shop.php">Products</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Blog</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact us</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="cart.php"
                ><i class="fa-solid fa-cart-shopping"></i
              ></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="account.php"><i class="fa-solid fa-user"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section class="header">
      <div class="header-title">
        <h1><span>Your smooth skin</span> is our priority</h1>
        <p>
          Your all round smooth tonic skin is possible only with Grapec organic
        </p>
        <button class="button-me">Shop Now</button>
      </div>
    </section>

    <!-- brand -->
    <section class="container" id="brand">
      <div class="row">
        <img
          src="./images/nivea-logo.png"
          alt=""
          class="img-fluid col-lg-3 col-md-6 col-sm-12"
        />
        <img
          src="./images/pears-logo.jpg"
          alt=""
          class="img-fluid col-lg-3 col-md-6 col-sm-12"
        />
        <img
          src="./images/pears-2.jpg"
          alt=""
          class="img-fluid col-lg-3 col-md-6 col-sm-12"
        />
        <img
          src="./images/pears-3.jpg"
          alt=""
          class="img-fluid col-lg-3 col-md-6 col-sm-12"
        />
      </div>
    </section>
    <!-- new -->

    <section id="new" class="w-100">
      <div class="row p-0 m-0">
        <div class="one col-lg-4 col-md-12 col-sm-12">
          <img src="./image/bag.jpg" alt="" class="img-fluid" />
          <div class="details">
            <h2>Extremely awesome Facial Cream</h2>
            <button class="text-upper-case">shop now</button>
          </div>
        </div>
        <div class="one col-lg-4 col-md-12 col-sm-12">
          <img src="./image/watch4.jpg" alt="" class="img-fluid" />
          <div class="details">
            <h2>Extremely awesome Facial Cream</h2>
            <button class="text-upper-case">shop now</button>
          </div>
        </div>
        <div class="one col-lg-4 col-md-12 col-sm-12">
          <img src="./image/watch3.jpg" alt="" class="img-fluid" />
          <div class="details">
            <h2>50% Off Lip-Gloss</h2>
            <button class="text-upper-case">shop now</button>
          </div>
        </div>
      </div>
    </section>

    <!-- fEATURE -->
    <section id="featured">
      <div class="container text-center mt-5 py-5">
        <h3>Our Featured</h3>
        <hr class="mx-auto" />
        <p>Here you can check out our featured products</p>
      </div>
      <div class="row mx-auto container-fluid">
        <?php include('./server/get_featured_product.php') ?>

        <?php  foreach($feature_products as $product):  ?>
          <!-- <php if($product->$rowCount == 0){ <?php echo 'product not available';?>} ?> -->
        <div class="product col-lg-3 col-md-4 col-sm-12 text-center">
          <img src="./images/<?php echo $product['product_image']; ?>" alt="" class="img-fluid mb-3" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $product['product_name'] ?></h5>
          <h4 class="p-price">$<?php echo $product['product_price']; ?></h4>
          <a href= "single_product.php?product_id=<?php echo $product['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
        </div>
       <?php endforeach; ?>
       
      </div>
    </section>

    <!-- Banner -->
    <section id="banner" class="my-5 py-5">
      <div class="container">
        <h4>MID SEASON'S SALE</h4>
        <h1>
          Autumn Collection <br />
          UP to 30% OFF
        </h1>
        <button class="text-uppercase">shop now</button>
      </div>
    </section>

    <!-- Clothes -->
    <section id="clothes my-5" class="clothes">
      <div class="container text-center mt-5 py-5">
        <h3>Dresses & Coats</h3>
        <hr class="mx-auto" />
        <p>Here you can check out our amazing clothes</p>
      </div>
      <div class="row mx-auto container-fluid">

      <?php include('./server/get_coats.php') ?>

      <?php  foreach($coats_products as $product): ?>
        <div class="product col-lg-3 col-md-4 col-sm-12 text-center">
          <img src="./images/<?php echo $product['product_image'] ?>" alt="" class="img-fluid mb-3" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $product['product_name'] ?></h5>
          <h4 class="p-price">$<?php echo $product['product_price'] ?></h4>
          <button class="buy-btn">Buy Now</button>
        </div>
      <?php endforeach; ?>
        
       
      </div>
    </section>

    <!-- watches -->
    <section id="watches my-5" class="clothes">
      <div class="container text-center mt-5 py-5">
        <h3>Best Watches</h3>
        <hr class="mx-auto" />
        <p>Check Out Our Unique Watches</p>
      </div>
      <div class="row mx-auto container-fluid">

        <?php  include('./server/get_watches.php')  ?>

        <?php  foreach($watches_products as $product): ?>

        <div class="product col-lg-3 col-md-4 col-sm-12 text-center">
          <img src="./images/<?php echo $product['product_image'] ?>" alt="" class="img-fluid mb-3" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $product['product_name'] ?></h5>
          <h4 class="p-price">$<?php echo $product['product_price'] ?></h4>
          <button class="buy-btn">Buy Now</button>
        </div>
       <?php  endforeach; ?>
        
       
      </div>
    </section>

    <!-- shoes  -->

    <section id="shoes my-5" class="clothes">
      <div class="container text-center mt-5 py-5">
        <h3>Shoes</h3>
        <hr class="mx-auto" />
        <p>Here you can check out our amazing shoes</p>
      </div>
      <div class="row mx-auto container-fluid">

      <?php include('./server/get_shoes.php') ?>

      <?php  foreach($shoes_products as $product):  ?>
        <div class="product col-lg-3 col-md-4 col-sm-12 text-center">
          <img src="./images/<?php echo $product['product_image'] ?>" alt="" class="img-fluid mb-3" />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $product['product_name'] ?></h5>
          <h4 class="p-price">$<?php echo $product['product_price'] ?></h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <?php  endforeach;  ?>
        
       
      </div>
    </section>

    <!-- footer -->

    <footer class="mt-t py-5">
      <div class="row container mx-auto pt-5">
        <div class="footer-one col-lg-3 col-md-6 col-sm-12">
          <img src="./images/logo.jpg" alt="" class="logo-img" />
          <p class="pt-3">
            We provide the best products for the most affordable prices
          </p>
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
            <img src="" alt="" class="img-fluid w-25 h-100 m-2" />
            <img src="" alt="" class="img-fluid w-25 h-100 m-2" />
            <img src="" alt="" class="img-fluid w-25 h-100 m-2" />
            <img src="" alt="" class="img-fluid w-25 h-100 m-2" />
            <img src="" alt="" class="img-fluid w-25 h-100 m-2" />
          </div>
        </div>
      </div>
      <div class="copyright mt-5">
        <div class="row container mx-auto">
          <div class="col-lg-3 col-md6-6 col-sm-12 mb-4">
            <img src="./images/payment.jpg" alt="" />
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
  </body>
</html>
