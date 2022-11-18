<?php 
session_start();
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





<?php  include('layouts/header.php') ?>
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


  
  <script>
   let mainImg = document.getElementById('main-img')
   let smallImg =document.getElementsByClassName('small-img')
    
   for(let i =0; i<4; i++){
        smallImg[i].onclick = function(){
        mainImg.src = smallImg[i].src;
   }

   }
   

  </script>
  
  <?php  include('layouts/footer.php') ?>