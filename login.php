

<?php
  include('layouts/header.php');

include('server/connection.php');


if(isset($_POST['login_btn'])){
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $user_id = $pdo->lastInsertId();


  $stmt = $pdo->prepare("SELECT * FROM users WHERE user_email=:user_email AND user_password=:user_password LIMIT 1 ");
   
  // $stmt->bindValue(':user_id',$user_id);
  // $stmt->bindValue(':user_name',$user_name);
 
  $stmt->bindValue(':user_email',$email);
  $stmt->bindValue(':user_password',$password);
 

  if($stmt->execute()){
    // $stmt->bindParam($user_id,$user_email,$user_name, $user_password);

     if($stmt->rowCount() >= 1){
       $row =  $stmt->fetch();
       $_SESSION['user_id'] = $row['user_id'];
       $_SESSION['user_name'] = $row['user_name'];
       $_SESSION['user_email'] = $row['user_email'];
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



<?php   ?>

    <!-- login -->
    <section class="my-5 py-5">
      <div class="c text-center mt-3 pt-5">
        <h2 class="font-weight-bold">Login</h2>
        <hr class="mx-auto" />
      </div>
      <div class=" container">
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
    <?php  include('layouts/footer.php') ?>