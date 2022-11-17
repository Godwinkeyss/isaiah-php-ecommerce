<?php
session_start();
include('connection.php');


// if user is not logged in
if(!isset($_SESSION['logged_in'])){
   header('location:../checkout.php?message=Please login/register to place an order');
   
    exit;
   // if user is logged in
}else{
   


      if(isset($_POST['place_order'])){
         // 1. get user info and store it in database

         $name = $_POST['name'];
         $email = $_POST['email'];
         $phone = $_POST['phone'];
         $city = $_POST['city'];
         $address = $_POST['address'];
         $order_cost = $_SESSION['total'];
         $order_status = 'not paid';
         $user_id =$_SESSION['user_id'];
         $order_date = date('Y-m-d H:i:s');

         $stmt = $pdo->prepare("INSERT INTO orders(order_cost, order_status,user_id,user_phone,user_city,user_address,order_date) VALUES(:order_cost,:order_status,:user_id,:user_phone,:user_city,:user_address,:order_date );");
         $stmt->bindValue(':order_cost',$order_cost);
         $stmt->bindValue(':order_status',$order_status);
         $stmt->bindValue(':user_id',$user_id);
         $stmt->bindValue(':user_phone',$phone);
         $stmt->bindValue(':user_city',$city);
         $stmt->bindValue(':user_address',$address);
         $stmt->bindValue(':order_date',$order_date);

         
         $stmt_status = $stmt->execute();

         if(!$stmt_status){
            header('location: index.php');
            exit;
         }
         //2 .issue new order and store order information in database
         $order_id = $pdo->lastInsertId();
         


      // 3.  get product from cart (from session)
      foreach($_SESSION['cart'] as $key => $value){
         $product = $_SESSION['cart'][$key]; // []
         $product_id = $product['product_id'];
         $product_name = $product['product_name'];
         $product_image = $product['product_image'];
         $product_price = $product['product_price'];
         $product_quantity = $product['product_quantity'];

         // 4.store each single item in order_items  database

         $stmt1 = $pdo->prepare("INSERT INTO order_items (order_id, product_id,product_name,product_image,product_price,product_quantity,user_id,order_date) VALUES(:order_id,:product_id,:product_name,:product_image,:product_price,:product_quantity,:user_id,:order_date);");

         $stmt1->bindValue(':order_id',$order_id);
         $stmt1->bindValue(':product_id',$product_id);
         $stmt1->bindValue(':product_name',$product_name);
         $stmt1->bindValue('product_image',$product_image);
         $stmt1->bindValue('product_price',$product_price);
         $stmt1->bindValue('product_quantity',$product_quantity);
         $stmt1->bindValue(':user_id',$user_id);
         $stmt1->bindValue(':order_date',$order_date);

         $stmt1->execute();
      }









      // 5. remove everything from cart -> delay until payment is done
      // unset($_SESSION['cart']);

      $_SESSION['order_id'] = $order_id;
      // 6. inform user wether everything is fine or there is a problem
      header('Location: ../payment.php?order_status=order placed successfully');

      }
}

?>