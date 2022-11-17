<?php
  session_start();

  if( !empty($_SESSION['cart'])){

    // let user in


    // send user to home page
  }else{
    header('location:index.php');
  }


?>




<?php  include('layouts/header.php') ?>
      <!-- navbar end -->

<!-- checkout -->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="font-weight-bold">Checkout</h2>
      <hr class="mx-auto" />
    </div>
    <div class="mx-auto container">
      <form action="server/place_order.php" method="POST" id="checkout-form">
        <p class="text-center" style="color:red;">
        <?php if(isset($_GET['message'])){echo $_GET['message'];}  ?>
         <?php if(isset($_GET['message']))  {?>
             <a href="login.php" class="btn btn-primary">Login</a>
          <?php  } ?>
      </p>
        <div class="form-group checkout-small-element">
          <label for="">Name</label>
          <input
            type="text"
            class="form-control"
            id="checkout-name"
            name="name"
            placeholder="name"
            required
          />
        </div>
          <div class="form-group checkout-small-element">
            <label for="">Email</label>
            <input
              type="text"
              class="form-control"
              id="checkout-email"
              name="email"
              placeholder="email"
              required
            />
          </div>
         
        
        <div class="form-group checkout-small-element">
          <label for="">Phone</label>
          <input
            type="tel"
            class="form-control"
            id="checkout-phone"
            name="phone"
            placeholder="phone"
            required
          />
        </div>
        <div class="form-group checkout-small-element">
          <label for="">City</label>
          <input
            type="text"
            class="form-control"
            id="checkout-city"
            name="city"
            placeholder="city"
            required
          />
        </div>
        <div class="form-group checkout-large-element">
          <label for="">Address</label>
          <input
            type="text"
            class="form-control"
            id="checkout-address"
            name="address"
            placeholder="address"
            required
          />
        </div>
        <div class="form-group checkout-btn-container">
          <p>Total amount: $<?php echo $_SESSION['total']  ?></p>
          <input
            type="submit"
            class="btn"
            id="checkout-btn"
            value="Place Order"
            name="place_order"
          />
        </div>
       
      </form>
    </div>
  </section>






      <!-- footer -->

      <?php  include('layouts/footer.php') ?>