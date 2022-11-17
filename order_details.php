<?php 

// not paid, delivered, shipped(key word)

include('./server/connection.php');

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){
    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    $stmt = $pdo->prepare("SELECT * FROM order_items WHERE order_id = :order_id");

    $stmt->bindValue(":order_id", $order_id);

    $stmt->execute();
    $order_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
}else{
    header('location: account.php');
    exit;
}




?>


<?php  include('layouts/header.php') ?>

  <!-- order ddetails -->
  <section class="orders container my-5 py-3" id="orders">
        <div class="container mt-5">
          <h2 class="font-weight-bold text-center">Order Details</h2>
          <hr class="mx-auto"/>
        </div>
        <table class="mt-5 pt-5 mx-auto">
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            
            
          </tr>
        

          <?php  foreach($order_details as $row):  ?>
           <tr>
            <td>
             <div class="product-info">
                 <img src="./images/<?php echo $row['product_image'];   ?>" alt="">
                <div>
                    <p class="mt-3"><?php echo $row['product_name'];?></p>
                </div>
             </div>
          
            </td>
            <td>
              <span>$<?php echo $row['product_price'];?></span>
            </td>
            <td>
              <span><?php echo $row['product_quantity'];?></span>
            </td>
           
            
           
          </tr>
          <?php endforeach; ?>
         
        </table>
        <?php if($order_status == "not paid"){?>

            <form action="" style="float:right">
                <input type="submit" value="Pay Now" class="btn btn-primary">
            </form>
        
    
        <?php } ?>
  </section>




 <!-- footer -->
 <?php  include('layouts/footer.php') ?>