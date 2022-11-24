<?php include('sidebar.php');  ?>
<?php   
   if(!isset($_SESSION['admin_logged_in'])){
    header('location:login.php');
    exit;
   }

?>

<?php   

     
            // get orders


            //1 determine page number

            if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
                // if user has already entered page then ppage number is the one that he selected
                $page_no = $_GET['page_no'];
            }else{
                // if user just entered then page default page is 1
                $page_no =1;
            }
            //2 return number of products
            $stmt1 =$pdo->prepare("SELECT COUNT(*) As total_records FROM products ");

            $stmt1->execute();

            $total_records = $stmt1->fetchColumn();
            // $total_records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // $products =$stmt->fetchAll(PDO::FETCH_ASSOC);

            //3 products per page

            $total_records_per_page = 10;
            $offset = ($page_no-1) * $total_records_per_page;

            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;

            $adjacents = "2";
            $total_no_of_pages = ceil($total_records/$total_records_per_page);

            // 4 get all products

            $stmt2 =$pdo->prepare("SELECT * FROM products  LIMIT $offset, $total_records_per_page");
            $stmt2->execute();
            $products = $stmt2->fetchAll(PDO::FETCH_ASSOC);

            

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
                <div class="row my-5">
                    <h3 class="fs-4 mb-3"> Products</h3>

                   <?php if(isset($_GET['add_success_message'])){  ?>
                      <p class="text-center text-success"><?php echo $_GET['add_success_message'] ?></p>
                    <?php }  ?>

                   <?php if(isset($_GET['add_failure_message'])){  ?>
                      <p class="text-center text-danger"><?php echo $_GET['add_failure_message'] ?></p>
                    <?php }  ?>
                   <?php if(isset($_GET['edit_success_message'])){  ?>
                      <p class="text-center text-success"><?php echo $_GET['edit_success_message'] ?></p>
                    <?php }  ?>

                   <?php if(isset($_GET['edit_failure_message'])){  ?>
                      <p class="text-center text-danger"><?php echo $_GET['edit_failure_message'] ?></p>
                    <?php }  ?>

                   <?php if(isset($_GET['deleted_successfully'])){  ?>
                      <p class="text-center text-success"><?php echo $_GET['deleted_successfully'] ?></p>
                    <?php }  ?>

                   <?php if(isset($_GET['deleted_failure'])){  ?>
                      <p class="text-center text-danger"><?php echo $_GET['deleted_failure'] ?></p>
                    <?php }  ?>
                   <?php if(isset($_GET['images_updated'])){  ?>
                      <p class="text-center text-success"><?php echo $_GET['images_updated'] ?></p>
                    <?php }  ?>

                   <?php if(isset($_GET['images_failed'])){  ?>
                      <p class="text-center text-danger"><?php echo $_GET['images_failed'] ?></p>
                    <?php }  ?>


                    <div class="col"  id="no-more-table">
                        <table class="table bg-white  table-sm rounded shadow-sm table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Product Id</th>
                                    <th scope="col">Product Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Price</th>
                                    <th scope="col">Product Offer</th>
                                    <th scope="col">Product Category</th>
                                    <th scope="col">Product Color</th>
                                    <th scope="col">Edit Images</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $products as $product): ?>
                                <tr>
                                    <th scope="row"data-title="Product Id"><?php echo $product['product_id']; ?></th>
                                    <td data-title="Product Image"><img src="../images/<?php echo $product['product_image']; ?>" style="width:70px; height:70px;"></td>
                                    <td data-title="Product Name"><?php echo $product['product_name']; ?></td>
                                    <td data-title="Product Price">₦<?php echo $product['product_price']; ?></td>
                                    <td data-title="Product Offer"><?php echo $product['product_special_offer']; ?>%</td>
                                    <td data-title="Product Category"><?php echo $product['product_category']; ?></td>
                                    <td data-title="Product Color"><?php echo $product['product_color']; ?></td>
                                   
                                    <td data-title="Edit Images"><a href="<?php echo "edit_images.php?product_id=".$product['product_id']."&product_name=".$product['product_name']; ?>" class="btn  btn-sm btn-warning">Edit Images</a></td>
                                    
                                    <td data-title="Edit"><a href="edit_product.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-primary btn-sm">Edit</a></td>
                                    
                                    <td data-title="Delete"><a href="delete_product.php?product_id=<?php echo $product['product_id']; ?>" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                                <?php endforeach;  ?>
                               
                               
                                
                            </tbody>
                        </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination mt-5">

                    <li class="page-item <?php if($page_no<=1){echo 'disabled';} ?>">

                        <a href="<?php if($page_no <=1){echo '#';}else{echo '?page_no='.($page_no-1);} ?>" class="page-link">Previous</a>

                    </li>
                    <li class="page-item"><a href="?page_no=1" class="page-link">1</a></li>
                    <li class="page-item"><a href="?page_no=2" class="page-link">2</a></li>

                    <?php if($page_no >=3){ ?>
                    <li class="page-item"><a href="#" class="page-link">...</a></li>
                    <li class="page-item"><a href="<?php echo '?page_no='.$page_no; ?>" class="page-link"><?php echo $page_no; ?></a></li>
                    <?php   }?>

                    <li class="page-item <?php if($page_no>=$total_no_of_pages){echo 'disabled';} ?>">

                        <a href="<?php if($page_no >=$total_no_of_pages){echo '#';}else{echo '?page_no='.($page_no+1);} ?>" class="page-link">Next
                    </a>

                    </li>
                </ul>
            </nav>
                    </div>
                    
                </div>
               
            </div>
        </div>
    </div>


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