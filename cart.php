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
  $total_price = 0;
  $total_quantity = 0;

  foreach($_SESSION['cart'] as $key => $value){
   $product = $_SESSION['cart'][$key];
   $price = $product['product_price'];
   $quantity = $product['product_quantity'];

   $total_price =$total_price +($price * $quantity);
   $total_quantity = $total_quantity + $quantity;
  }
  $_SESSION['total'] = $total_price;
  $_SESSION['quantity'] = $total_quantity;
}


?>





<?php  include('layouts/header2.php') ?>
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
    <?php if(isset($_SESSION['cart'])) { ?>
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
       <?php  } ?>
        
      </table>
      <div class="cart-total">
        <table class="">
          <!-- <tr>
            <td>Subtotal</td>
            <td>$2555</td>
          </tr> -->
          <tr>
            <td>Total</td>
            <?php if(isset($_SESSION['cart'])){ ?>
                <td>$<?php echo $_SESSION['total']; ?></td>
            <?php  }?>
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
    <?php  include('layouts/footer.php') ?>