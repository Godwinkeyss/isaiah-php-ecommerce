<?php include('sidebar.php');  ?>
<?php   
   if(!isset($_SESSION['admin_logged_in'])){
    header('location:login.php');
    exit;
   }

?>

<?php   

     

            // 4 get all products
            if(isset($_GET['order_id'])){

                $order_id =  $_GET['order_id'];
     
                 $stmt =$pdo->prepare("SELECT * FROM orders WHERE order_id=:order_id");
                 $stmt->bindValue(':order_id', $order_id);
                 $stmt->execute();
                 $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

            } else if(isset($_POST['edit_btn'])){
                    
                $order_status = $_POST['order_status'];
                $order_id = $_POST['order_id'];

                $stmt = $pdo->prepare('UPDATE orders SET order_status =:order_status WHERE order_id=:order_id');
                $stmt->bindValue(':order_status',$order_status);
                $stmt->bindValue(':order_id',$order_id);
                
                
                if($stmt->execute()){
                    header('location:index.php?order_updated=Order has been updated successfully');
                }else{
                    header('location:products.php?order_failed=Error occured, try again');
                }

            } else{
                header('location:index.php');
                exit;
            }    


          
          

?>


        <!-- sidebar starts -->
        
        <!-- sidebar end -->

        <div id="page-content-wrapper">
           <!-- navbar header -->
              <?php include('header.php');  ?>
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                   <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2">720</h3>
                                    <p class="fs-5">Products</p>
                                </div>
                                <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                   </div>
                   <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2">920</h3>
                                    <p class="fs-5">Sales</p>
                                </div>
                                <i class="fas fa-hand-holding fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                   </div>
                   <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2">3893</h3>
                                    <p class="fs-5">Delivery</p>
                                </div>
                                <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                   </div>
                   <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                                <div>
                                    <h3 class="fs-2">650</h3>
                                    <p class="fs-5">Increase</p>
                                </div>
                                <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                   </div>
                </div>
                


                <!-- nnnnn -->

<div class="row">
                        <div class="col-lg-1 col-md-12 col-sm-12"></div>
                        <div class="col-lg-10 col-md-12 col-sm-12 ">
                            <div class="h3 text-center mt-2">Edit Orders</div>


                <form action="edit_order.php" method="POST"  class="bord ">
                       
                           <?php foreach($orders as $r):  ?>
                            <input type="hidden" name="order_id" value="<?php echo $r['order_id'];  ?>">
                        <div class="mb-3">
                            <label  class="form-label">Order Id</label>
                            <p class="my-4"><?php  echo $r['order_id']; ?></p>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Order Price</label>
                            <p class="my-4"><?php  echo $r['order_cost']; ?></p>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Order Status</label>
                            <select  class="form-select" required name="order_status">
                              
                                <option value="not paid"<?php if($r['order_status']=='not paid'){echo 'selected';}?> >Not Paid</option>
                                <option value="paid"<?php if($r['order_status']=='paid'){echo 'selected';}?>> Paid</option>
                                <option value="shipped"<?php if($r['order_status']=='shipped'){echo 'selected';}?>> Shipped</option>
                                <option value="delivered"<?php if($r['order_status']=='delivered'){echo 'selected';}?>> Delivered</option>
                            </select>
                            
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Order Date</label>
                            <p class="my-4"><?php  echo $r['order_date']; ?></p>
                        </div>
                        
                       
                       
                        <button type="submit" class="btn btn-primary"  name="edit_btn">Edit Product</button>

                        <?php endforeach;  ?>
                        </form>
                        </div>
                        <!-- <div class="col-lg-3 col-md-6 col-sm-12"></div> -->

                        </div>
                        <div class="col-lg-1 col-md-12 col-sm-12"></div>
                        </div>




               
            </div>
        </div>
    </div>
    <style>
        .bord{
            border: 1px solid black;
            padding: 10px 20px;
        }
    </style>


    <style>
    @media screen and (max-width:450px) {
        #no-more-table tbody,
        #no-more-table tr,
        #no-more-table td{
            display: block;
        }
        #no-more-table thead tr{
            position: absolute;
            top:-9999px;
            left: -9999px;
        }
        #no-more-table td{
            position: relative;
            padding-left: 70%;
            border: none;
            border-bottom: 1px solid #eee;
        }
        #no-more-table td::before{
            content:attr(data-title);
            position: absolute;
            left: 6px;
            font-weight: bold;
        }
        #no-more-table tr{
            border-bottom: 2px solid #ccc;
        }
        .filem{
            display: flex;
            background-color: red!important;
        }
        
        .table2 tr{
            margin-right: 160px;
            
            
        }
        .table2 td{
            /* display: flex !important;
            align-items: center;
            margin-left: 30px; */
        }
        .last{
            width: 95%;
            padding: 10px 20px;
            margin-right: 10px !important;
            margin-top: 20px;
            
        }
        .ty{
            height: 22px;
            width: 52px !important;
        }
        
        /* fhhghghghg */
    }
    @media screen and (max-width:450px) {
        .bbb{
            flex-direction: column;
            align-items: center;
        }
    }
</style>




<script src="../js/bootstrap.bundle.min.js"></script>

<script>
    let el = document.getElementById('wrapper');
    let toggleButton = document.getElementById('menu-toggle');

    toggleButton.onclick = function(){
        el.classList.toggle('toggled')
    }
</script>
</body>
</html>