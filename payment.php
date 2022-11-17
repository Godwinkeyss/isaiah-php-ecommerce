<?php
  session_start();


?>




<?php  include('layouts/header.php') ?>
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

<!-- Payment -->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="font-weight-bold">Payment</h2>
      <hr class="mx-auto" />
    </div>
    <div class="mx-auto container text-center">
        <p><?php  echo $_GET['order_status']; ?></p>
      <p>Total payment:$<?php echo $_SESSION['total'];?></p>
      <input type="submit" class="btn btn-primary" value="Pay Now">
    </div>
  </section>






      <!-- footer -->
      <?php  include('layouts/footer.php') ?>
