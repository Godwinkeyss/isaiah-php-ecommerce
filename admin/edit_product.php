<?php include('sidebar.php');  ?>
<?php   
   if(!isset($_SESSION['admin_logged_in'])){
    header('location:login.php');
    exit;
   }

?>

<?php   

     



            // 4 get all products
            if(isset($_GET['product_id'])){
                
           $product_id =  $_GET['product_id'] ?? null;

           if(!$product_id){
            header('location:index.php');
           }

            $stmt =$pdo->prepare("SELECT * FROM products WHERE product_id=:product_id");
            $stmt->bindValue(':product_id', $product_id);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
         

           
            }else if(isset($_POST['edit_btn'])){

                
            
                $product_id = $_POST['product_id'];
                $product_name = $_POST['name'];
                $product_category = $_POST['category'];
                $product_description = $_POST['description'];
                $product_price = $_POST['price'];
                $product_special_offer = $_POST['special'];
                $product_color = $_POST['color'];


                       
                $stmt = $pdo->prepare('UPDATE products SET product_name =:product_name,product_category=:product_category,product_description=:product_description,product_price=:product_price,product_special_offer=:product_special_offer,product_color=:product_color WHERE product_id=:product_id');
                $stmt->bindValue(':product_name',$product_name);
                $stmt->bindValue(':product_category',$product_category);
                $stmt->bindValue(':product_description',$product_description);
                $stmt->bindValue(':product_price',$product_price);
                $stmt->bindValue(':product_special_offer',$product_special_offer);
                $stmt->bindValue(':product_color',$product_color);
                $stmt->bindValue(':product_id',$product_id);
              
                if($stmt->execute()){
                    header('location:products.php?edit_success_message=Product has been updated successfully');
                }else{
                    header('location:products.php?edit_failure_message=Error occured, try again');
                }

                

        }else{
            header('location:products.php');
            exit;
        }
        function randomString($n){
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str = '';
            for($i = 0; $i < $n; $i++){
                $index = rand(0, strlen($characters) - 1);
                $str .= $characters[$index];
            }
        
            return $str;
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
                            <div class="h3 text-center mt-5">Edit Product</div>


                <form action="edit_product.php" method="POST" enctype="multipart/form-data" class="bord ">
                <!-- <?php if($product['product_image']):  ?>
                                        <span>Image1</span>
                                <img src="<?php echo $product['product_image']  ?>" alt="" style="width:120px">
                                <?php endif;  ?> -->
                        <?php foreach($products as $product):?>
                          
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id'];  ?>">
                        <div class="mb-3">
                            <label  class="form-label">Product name</label>
                            <input type="text" name="name" value="<?php echo $product['product_name']; ?>"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <!-- work on this later -->
                            <label  class="form-label">product category</label>
                            <input type="text" name="category"value="<?php echo $product['product_category']; ?>"   class="form-control">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">product description</label>
                            <textarea name="description"class="form-control"value=""   ><?php echo $product['product_description']; ?></textarea>
                        </div>
                       
                        <div class="mb-3">
                            <label  class="form-label">product price</label>
                            <input type="number" name="price" step=".01" class="form-control"value="<?php echo $product['product_price']; ?>"   >
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">product special offer</label>
                            <input type="number" name="special" class="form-control"value="<?php echo $product['product_special_offer']; ?>"   >
                        </div>
                        
                        <div class="mb-3">
                            <label  class="form-label">product color</label>
                            <input type="text" class="form-control"  name="color"value="<?php echo $product['product_color']; ?>"  >
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
            border: 1px solid darkgray;
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