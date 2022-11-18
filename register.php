<?php
  //  session_start();
include('server/connection.php');

 // if user has already register  then take user to account page
if(isset($_SESSION['logged_in'])){
  header('Location: account.php');
  exit;
}
  
  if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmPassword'];


    // if password don't match
    if($password !== $confirmpassword){
      header("Location: register.php?error=password don't match");
    }
    // if password is less than 6 characters
    else if(strlen($password) < 6){
      header('Location: register.php?error=password must be at least 6 characters');
   

    // if there is no error
    }else{
          // check wether there is a user with this email or not
        $sql = "SELECT * FROM users WHERE user_email=:user_email";
      //   $stmt1->bindValue(':user_email',$email);
      //   $stmt1->execute();
      //  $stmt1->fetch(PDO::FETCH_ASSOC);
       $query= $pdo-> prepare($sql);
        $query-> bindParam(':user_email', $email, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
         
      //   if there is a user already register with the email
        if($query -> rowCount() > 0){
          header("Location: register.php?error=user with this email already exist");

          // if no user registered with this email before,
        }else{

        

        

          // create a new user
            $stmt =  $pdo->prepare("INSERT INTO users (user_name,user_email,user_password) VALUES(:user_name,:user_email,:user_password)");
            
            $stmt->bindValue(':user_name',$name);
            $stmt->bindValue(':user_email',$email);
            $stmt->bindValue(':user_password',md5($password));
            
            // if account was created successfully
            if($stmt->execute()){
              $user_id =  $pdo->lastInsertId();
              $_SESSION['user_id'] = $user_id;
               $_SESSION['user_email'] = $email;
               $_SESSION['user_name'] = $name;
               $_SESSION['logged_in'] = true;
               header('Location: account.php?register_success=You registered successfully');

              //  account could not be created
            }else{
              header('Location:register.php?error=could not create an account at the moment');
            }
        }
      }
    }
  
?>




<?php  include('layouts/header.php') ?>
   <!-- navbar end -->

    <!-- register -->
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="font-weight-bold">Register</h2>
        <hr class="mx-auto" />
      </div>
      <div class="mx-auto container">

        <form action="register.php" method="POST" id="register-form">
        <p style="color:red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
          <div class="form-group">
            <label for="">Name</label>
            <input
              type="text"
              class="form-control"
              id="register-name"
              name="name"
              placeholder="name"
              required
            />
        </div>
            <div class="form-group">
                <label for="">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="register-email"
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
              id="register-password"
              name="password"
              placeholder="password"
              required
            />
          <div class="form-group">
            <label for="">Confirm Password</label>
            <input
              type="password"
              class="form-control"
              id="register-confirm-password"
              name="confirmPassword"
              placeholder="confirm password"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="submit"
              class="btn"
              id="register-btn"
              value="Register"
              name="register"
            />
          </div>
          <div class="form-group">
            <a href="login.php" id="login-url" class="btn">Do you have an account? Login</a>
          </div>
        </form>
      </div>
    </section>

    <!-- footer -->
    <?php  include('layouts/footer.php') ?>
