<?php  include('layouts/header.php') ?>
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
    <?php  include('layouts/footer.php') ?>
