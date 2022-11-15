<?php  
session_start();
// $_SESSION['cart'] = "" ;
// $_SESSION['total']="";

if(isset($_POST['add_to_cart'])){

  // if user has already added a product to cart
  if(isset($_SESSION['cart'])){

    $products_array_ids =array_column($_SESSION['cart'], "product_id"); //[2,3,4,10,15]
     
    // if product has already been added to cart or not
    if(!in_array($_POST['product_id'], $products_array_ids) ){
      
          $product_id = $_POST['product_id'];
         
      
          $product_array = array(
            'product_id' => $_POST['product_id'],
            'product_name' =>  $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'product_image' => $_POST['product_image'],
            'product_quantity' => $_POST['product_quantity'],
          );
      
          $_SESSION['cart'][$product_id] = $product_array;
          //  [2=>[], 3=>[], 5=>[]  ]


      //product has already been added
    }else{
     echo '<script>alert("Product was already added to the cart")</script>';
     //echo '<script>window.location="index.php"</script>';
    }

    // if this is the first product
  }else{


    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];

    $product_array = array(
      'product_id' => $product_id,
      'product_name' => $product_name,
      'product_price' => $product_price,
      'product_image' => $product_image,
      'product_quantity' => $product_quantity,
    );

     $_SESSION['cart'][$product_id] = $product_array;
    //  [2=>[], 3=>[], 5=>[]  ]

  }

  // calculate total
  calculateTotalCart();


  // remove product from cart
}else if(isset($_POST['remove_product'])){

  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id]);

  // calculate thee total
  calculateTotalCart();


}else if(isset($_POST['edit_quantity'])){

  // we getbid and quantity from the form
  $product_id = $_POST['product_id'];
  $product_quantity = $_POST['product_quantity'];

  // get the product array from the session
  $product_array = $_SESSION['cart'][$product_id];

  // update product quantity
  $product_array['product_quantity'] = $product_quantity;

  // return array back to its place
  $_SESSION['cart'][$product_id] = $product_array;

   // calculate thee total
   calculateTotalCart();
  
}else{
  // header('Location:index.php');
}

function calculateTotalCart(){
  $total = 0;
  foreach($_SESSION['cart'] as $key => $value){
   $product = $_SESSION['cart'][$key];
   $price = $product['product_price'];
   $quantity = $product['product_quantity'];

   $total =$total +($price * $quantity);
  }
  $_SESSION['total'] = $total;
}


?>





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
    <!-- nav bar -->
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
    <!-- end of navbar -->

    <!-- cart -->
    <section class="cart container my-5 py-5">
      <div class="container mt-5">
        <h2 class="font-weight-bold">Your Cart</h2>
        <hr />
      </div>
      <table class="mt-5 pt-5">
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>
        <!-- if (is_array($values) || is_object($values))
{
    foreach ($values as $value)
    {
        ...
    }
} -->

        <?php foreach(($_SESSION['cart']) as $key => $value):  ?>
        <tr>
          <td>
            <div class="product-info">
              <img src="./images/<?php  echo $value['product_image']; ?>" alt="" />
              <div>
                <p><?php  echo $value['product_name']; ?></p>
                <small><span>$</span><?php  echo $value['product_price']; ?></small>
                <br />
                <form action="cart.php"method="POST">
                  <input type="hidden" name="product_id" value="<?php  echo $value['product_id']; ?>">
                    <input type="submit" name="remove_product"style="width:100%; background-color:white;border:none;"  class="remove-btn"  value="Remove"/>
                </form>
              
              </div>
            </div>
          </td>
          <td>
            

            <form action="cart.php" method="POST">
              <input type="number"name="product_quantity" value="<?php  echo $value['product_quantity']; ?>" />
              <input type="hidden" name="product_id" value="<?php  echo $value['product_id']; ?>">
              <input type="submit" class="edit-btn" value="Edit" name="edit_quantity"style=" background-color:white;border:none;" >
            </form>
            
          </td>
          <td>
            <span>$</span>
            <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price']; ?></span>
          </td>
        </tr>
        <?php  endforeach; ?>
       
        
      </table>
      <div class="cart-total">
        <table>
          <!-- <tr>
            <td>Subtotal</td>
            <td>$2555</td>
          </tr> -->
          <tr>
            <td>Total</td>
            <td>$<?php echo $_SESSION['total']; ?></td>
          </tr>
        </table>
      </div>
      <div class="checkout-container">
        <form action="checkout.php" method="POST">
        <input type="submit"class="btn checkout-btn" value="Checkout" name="checkout">
        </form>
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
