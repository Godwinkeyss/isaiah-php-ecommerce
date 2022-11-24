<?php session_start(); ?>




<?php
 

include('../server/connection.php');
if(isset($_SESSION['admin_logged_in'])){
    header('location:index.php');
    exit;
}

if(isset($_POST['admin_login_btn'])){
  $admin_email = $_POST['email'];
  $admin_password = md5($_POST['password']);
  $admin_id = $pdo->lastInsertId();


  $stmt = $pdo->prepare("SELECT * FROM admins WHERE admin_email=:admin_email AND admin_password=:admin_password LIMIT 1 ");
   
  // $stmt->bindValue(':user_id',$user_id);
  // $stmt->bindValue(':user_name',$user_name);
 
  $stmt->bindValue(':admin_email',$admin_email);
  $stmt->bindValue(':admin_password',$admin_password);
 

  if($stmt->execute()){
    // $stmt->bindValue($user_id,$user_email,$user_name, $user_password);
      // $stmt->bindValue(':admin_id',$admin_id);
      //  $stmt->bindValue(':admin_name',$admin_name);

     if($stmt->rowCount() >= 1){
      $row =  $stmt->fetch();
       $_SESSION['admin_id'] = $row['admin_id'];
       $_SESSION['admin_name'] = $row['admin_name'];
       $_SESSION['admin_email'] = $row['admin_email'];
       $_SESSION['admin_logged_in'] = true;

       header("Location:index.php?login_success=logged in successfully");
       
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.rtl.min.css" />
    <link rel="stylesheet" href="style.css">
</head>
<body class=" ">
   

  <div class="login">
  <h1 class="text center "> Admin Login </h1>
    <form action="login.php" method="POST">
        <div class="email">
            <label for="">Email</label>
            <input type="email" placeholder="email" name="email">
        </div>
        <div class="password">
             <label for="">Password</label>
             <input type="password" placeholder="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary login-btn " name="admin_login_btn">Sign In</button>
  
    
        
    </form>
  </div>




<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>