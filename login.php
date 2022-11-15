<?php
  session_start();

include('server/connection.php');


if(isset($_POST['login_btn'])){
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $user_id = $pdo->lastInsertId();


  $stmt = $pdo->prepare("SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email=:user_email AND user_password=:user_password LIMIT 1 ");
   
  // $stmt->bindValue(':user_id',$user_id);
  // $stmt->bindValue(':user_name',$user_name);
 
  $stmt->bindValue(':user_email',$email);
  $stmt->bindValue(':user_password',$password);
 

  if($stmt->execute()){
    // $stmt->bindValue($user_id,$user_email,$user_name, $user_password);

     if($stmt->rowCount() == 1){
       $stmt->fetchAll(PDO::FETCH_ASSOC);
       $_SESSION['user_id'] = $user_id;
       $_SESSION['user_name'] = $name;
       $_SESSION['user_email'] = $email;
       $_SESSION['logged_in'] = true;

       header("Location:account.php?login_success=logged in successfully");
       
     }else{
      
      header("Location:login.php?error=could not verify your account");
     }


  }else{
      // error
      header("Location:login.php?error=something went wrong");
  }
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

    <!-- login -->
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="font-weight-bold">Login</h2>
        <hr class="mx-auto" />
      </div>
      <div class="mx-auto container">
        <form action="login.php"method="POST" id="login-form">
        <p style="color:red" class="text-center"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
          <div class="form-group">
            <label for="">Email</label>
            <input
              type="text"
              class="form-control"
              id="login-email"
              name="email"
              placeholder="email"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input
              type="password"
              class="form-control"
              id="password"
              name="password"
              placeholder="password"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="submit"
              class="btn btn-secondary"
              id="login-btn"
              value="Login"
              name="login_btn"
            />
          </div>
          <div class="form-group">
            <a href="register.php" id="register-url" class="btn">Don't have an account? Register</a>
          </div>
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
