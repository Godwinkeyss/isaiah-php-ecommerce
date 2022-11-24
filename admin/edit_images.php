<?php include('sidebar.php');  ?>

<?php 
    // $product_id = $_GET['product_id']?? null;

  if(isset($_GET['product_id'])){
      $product_name = $_GET['product_name'];
        $product_id = $_GET['product_id'];
  }else{
    header('locataion:products.php');
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


                <form action="update_images.php" method="POST" enctype="multipart/form-data" class="bord ">
                                   
                        
                            <p style="color:red;"><?php if(isset($_GET['error'])){echo $_GET['error'];}  ?></p>
                          
                            <input type="hidden" name="product_id" value="<?php echo $product_id;  ?>">
                            <input type="hidden" name="product_name" value="<?php echo $product_name  ?>">
                        
                       
                       
                        <div class="mb-3">
                            <label  class="form-label">product image 1</label><br>
                            <input type="file" name="image1" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">product image2</label><br>
                            <input type="file" name="image2"class="form-control">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">product image3</label><br>
                            <input type="file" name="image3"class="form-control">
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">product image4</label><br>
                            <input type="file" name="image4"class="form-control">
                        </div>
                        
                        <input type="submit" class="btn btn-primary"  name="update_images" value="Update Images">

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