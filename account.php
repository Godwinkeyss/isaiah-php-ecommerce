<?php
session_start();
include('./server/connection.php');


if(!isset($_SESSION['logged_in'])){
  header('Location: login.php');
  exit;
}
if(isset($_GET['logout'])){
  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('Location:login.php');
    exit;
  }
}


if(isset($_POST['change_password'])){
      $password = $_POST['password'];
      $confirmPassword = $_POST['confirmPassword'];
      $user_email = $_SESSION['user_email'];

      // if password don't match
      if($password !== $confirmPassword){
        header("Location: account.php?error=password don't match");
      }
      // if password is less than 6 characters
      else if(strlen($password) < 6){
        header('Location: account.php?error=password must be at least 6 characters');
    }else{
      $stmt = $pdo->prepare('UPDATE users SET user_password = :user_password WHERE user_email=:user_email');
       $stmt->bindValue(':user_password',md5($password));
       $stmt->bindValue(':user_email',$user_email);
       if($stmt->execute()){
        header('Location:account.php?message=password has been updated successfully');
       }else{
        header('Location:account.php?error=could not update password');
       }
    }
}



// get orders

if(isset($_SESSION['logged_in'])){
    $user_id = $_SESSION['user_id'];
    $stmt =$pdo->prepare("SELECT * FROM orders WHERE user_id=:user_id");

    $stmt->bindValue(':user_id',$user_id);

    $stmt->execute();

    $orders =$stmt->fetchAll(PDO::FETCH_ASSOC);
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

    <!-- Account -->
    <section class="my-5 py-5">
      <div class="container row mx-auto">
        <div class="text-center mt-3 pt-5 col-lg-6 col-md-12">
        <p class="text-center" style="color:green"><?php if(isset($_GET['login_success'])){echo $_GET['login_success'];} ?></p>
        <p class="text-center" style="color:green"><?php if(isset($_GET['register_success'])){echo $_GET['register_success'];} ?></p>
            <h3 class="font-weight-bold">Account Info</h3>
            <hr class="mx-auto">
            <div class="account-info">
                <p>Name <span><?php if(isset($_SESSION['user_name'])) { echo $_SESSION['user_name']; }?></span></p>
                <p>Email <span><?php if(isset($_SESSION['user_email'])) { echo $_SESSION['user_email'];} ?></span></p>
                <p><a href="#orders" id="orders-btn" class="orders-btn">Your orders</a></p>
                <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
            </div>

        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <form action="account.php"method="POST" id="account-form">
              <p class="text-center" style="color:red"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></p>
              <p class="text-center" style="color:green"><?php if(isset($_GET['message'])){echo $_GET['message'];} ?></p>
                <h3>Change Password</h3>
                <hr class="mx-auto">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="account-password" placeholder="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" id="account-password-confirm" placeholder="confirm password" name="confirmPassword" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Change Password" id="change-pass-btn" name="change_password">
                </div>
            </form>
        </div>
      </div>
    </section>


     <!-- orders -->
     <section class="orders container my-5 py-3" id="orders">
        <div class="container mt-2">
          <h2 class="font-weight-bold text-center">Your Orders</h2>
          <hr class="mx-auto"/>
        </div>
        <table class="mt-5 pt-5">
          <tr>
            <th>Order id</th>
            <th>Order cost</th>
            <th>Order status</th>
            <th>Order Date</th>
            
          </tr>
          <?php foreach($orders as $order): ?>


           <tr>
            <td>
             <!-- <div class="product-info">
                 <img src="./images/watch1.jpg" alt="">
                <div>
                    <p class="mt-3"><?php echo $order['order_id']; ?></p>
                </div>
             </div> -->
             <span><?php echo $order['order_id'] ?></span>
            </td>
            <td>
              <span><?php echo $order['order_cost'] ?></span>
            </td>
            <td>
              <span><?php echo $order['order_status'] ?></span>
            </td>
            <td>
              <span><?php echo $order['order_date'] ?></span>
            </td>
            
           
          </tr>
          
          <?php endforeach; ?>
        </table>
        
        
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
