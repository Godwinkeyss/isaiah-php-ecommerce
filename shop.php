<?php  

include('./server/connection.php');
// use the search secttion
if(isset($_POST['search'])){
     //1 determine page number

     if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
        // if user has already entered page then ppage number is the one that he selected
        $page_no = $_GET['page_no'];
    }else{
        // if user just entered then page default page is 1
        $page_no =1;
    }
     
    $category = $_POST['category'];
    $price = $_POST['price'];
    //2 return number of products
    $stmt1 =$pdo->prepare("SELECT COUNT(*) As total_records FROM products WHERE product_category=:product_category AND product_price <= :product_price");
    $stmt1->bindValue(':product_category',$category);
    $stmt1->bindValue(':product_price',$price);

    $stmt1->execute();

    $total_records = $stmt1->fetchColumn();

     //3 products per page

     $total_records_per_page = 1;
     $offset = ($page_no-1) * $total_records_per_page;
 
     $previous_page = $page_no - 1;
     $next_page = $page_no + 1;
 
     $adjacents = "2";
     $total_no_of_pages = ceil($total_records/$total_records_per_page);

    
      // 4 get all products

    $stmt2 =$pdo->prepare("SELECT * FROM products WHERE product_category=:product_category AND product_price<=:product_price LIMIT $offset, $total_records_per_page");
    $stmt2->bindValue(':product_category',$category);
    $stmt2->bindValue(':product_price',$price);

    $stmt2->execute();
    $products = $stmt2->fetchAll(PDO::FETCH_ASSOC);//[]

   

   

   

    // return all products --->
}else{
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

    $total_records_per_page = 8;
    $offset = ($page_no-1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $adjacents = "2";
    $total_no_of_pages = ceil($total_records/$total_records_per_page);

    // 4 get all products

    $stmt2 =$pdo->prepare("SELECT * FROM products  LIMIT $offset, $total_records_per_page");
    $stmt2->execute();
    $products = $stmt2->fetchAll(PDO::FETCH_ASSOC);

}


?>




<?php  include('layouts/header.php') ?>
   <!-- navbar end -->


   <!-- search -->
   <div class="shop mt-5">
   <section id="search" class=" py-5 mt-5 ms-2">
     <div class="container ">
        <p>Search Products</p>
        <hr>
     </div>

     <form action="shop.php" method="POST">
        <div class="row mx-auto container">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p>Category</p>
                <div class="form-check">
                    <input type="radio" class="form-check-input"value="shoes" name="category" id="category_one"<?php if(isset($category)&& $category == 'shoes'){echo 'checked';} ?>>
                    <label class="form-check-label" for="flexRadioDefault1">Shoes</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input"value="coats" name="category" id="category_two"<?php if(isset($category)&& $category == 'coats'){echo 'checked';} ?>>
                    <label class="form-check-label" for="flexRadioDefault2">Coats</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input"value="watches" name="category" id="category_two"<?php if(isset($category)&& $category == 'watches'){echo 'checked';} ?>>
                    <label class="form-check-label" for="flexRadioDefault2">Watches</label>
                </div>
                <div class="form-check">
                    <input type="radio" class="form-check-input"value="bags" name="category" id="category_two" <?php if(isset($category)&& $category == 'bags'){echo 'checked';} ?>>
                    <label class="form-check-label" for="flexRadioDefault2">Bags</label>
                </div>
            </div>
        </div>
        <div class="row mx-auto container mt-5">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <p>Price</p>
                <input type="range" class="form-range "name="price" value="<?php if(isset($price)){echo $price;}else{echo '100';} ?>" min="1" max="1000" id="customRange2">
                <div class="">
                    <span style="float:left;">1</span>
                    <span style="float:right;">1000</span>
                </div>
            </div>
        </div>
        <div class="form-group my-3 mx-3">
            <input type="submit" name="search" value="Search" class="btn btn-primary">
        </div>
     </form>
   </section>

<!-- shop -->
<section id="shop" class="container">
    <div class="container  mt-5 py-5">
        <h3>Our Products</h3>
        <hr>
        <p>Here you can check out our products</p>
    </div>
    <div class="row mx-auto container">
        
       
        
       
       
       
       
        
        
        
        
    <?php foreach($products as $row): ?>
       
        <div onclick="window.location.href='single_product.html';" class="product col-lg-3 col-md-4 col-sm-12 text-center">
            <img src="./images/<?php echo $row['product_image'] ?>" alt="" class="img-fluid mb-3">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
            <h4 class="p-price mb-3">$<?php echo $row['product_price'] ?></h4>
            <a class=" ship-btn " href="<?php echo "single_product.php?product_id=".$row['product_id'] ?>">Buy Now</a>
        </div>
       
        <?php endforeach; ?>
       
       

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
</section>



</div>
















      <!-- footer -->

      <?php  include('layouts/footer.php') ?>