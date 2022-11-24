<?php include('sidebar.php');  ?>
<?php   
   if(!isset($_SESSION['admin_logged_in'])){
    header('location:login.php');
    exit;
   }

?>

<?php   
 $errors = [];


 $product_name= '';
 $product_category = '';
 $product_description='';
 $product_price = '';
 $product_image  = '';
 $product_image2  = '';
 $product_image3  = '';
 $product_image4  = '';
 $product_color  = '';
 $product_special_offer  = '';
if($_SERVER['REQUEST_METHOD'] ==='POST'){
// if(isset($_POST['submit'])){
$product_name = $_POST['product_name'];
$product_category = $_POST['category'];
$product_description = $_POST['description'];
$product_price = $_POST['price'];
$product_special_offer = $_POST['special'];
$product_color = $_POST['color'];


    // $product_image = $_FILES['image1']['name'] ?? null;
    // $product_image2 = $_FILES['image2']['name'] ?? null;
    // $product_image3 = $_FILES['image3']['name'] ?? null;
    // $product_image4 = $_FILES['image4']['name'] ?? null;


    // $product_tmp_image = $_FILES['image1']['tmp_name']?? null;
    // $product_tmp_image2 = $_FILES['image2']['tmp_name']?? null;
    // $product_tmp_image3 = $_FILES['image3']['tmp_name']?? null ;
    // $product_tmp_image4 = $_FILES['image4']['tmp_name']?? null;


    $product_image = $product_name."1.jpeg";
    $product_image2 = $product_name."2.jpeg";
    $product_image3 = $product_name."3.jpeg";
    $product_image4 = $product_name."4.jpeg";



if(!$product_name){
   $errors[] = 'product name is required';
}

if(!$product_category){
    $errors[] = 'product category is required';
}
if(!$product_description){
    $errors[] = 'product description is required';
}
if(!$product_price){
    $errors[] = 'product price is required';
}
if(!$product_special_offer){
    $errors[] = 'product price is required';
}
if(!$product_color){
    $errors[] = 'product color is required';
}
if(!$product_image){
    $errors[] = 'product image is required';
}
if(!$product_image2){
    $errors[] = 'product image is required';
}
if(!$product_image3){
    $errors[] = 'product image is required';
}
if(!$product_image4){
    $errors[] = 'product image is required';
}

if (!is_dir('images')){
    mkdir('images');
}

 if (empty($errors)){
    // move_uploaded_file( $product_tmp_image, "./images/$product_image" );
    // move_uploaded_file( $product_tmp_image2, "./images/$product_image2" );
    // move_uploaded_file( $product_tmp_image3, "./images/$product_image3" );
    // move_uploaded_file( $product_tmp_image4, "./images/$product_image4" );
    // move_uploaded_file( $product_tmp_image, "../images/".$product_image );
    // move_uploaded_file( $product_tmp_image2, "../images/".$product_image2 );
    // move_uploaded_file( $product_tmp_image3, "../images/".$product_image3 );
    // move_uploaded_file( $product_tmp_image4, "../images/".$product_image4 );


    $imagePath = '';
    $imagePath2 = '';
    $imagePath3 = '';
    $imagePath4 = '';

    $product_image = $_FILES['image1'] ?? null;
    $product_image2 = $_FILES['image2'] ?? null;
    $product_image3 = $_FILES['image3'] ?? null;
    $product_image4 = $_FILES['image4'] ?? null;

    if($product_image && $product_image['tmp_name']){

      $imagePath = '../images/'.randomString(8).'/'.$product_image['name'];
      mkdir(dirname($imagePath));
      move_uploaded_file($product_image['tmp_name'], $imagePath);
    }
    if($product_image2 && $product_image2['tmp_name']){

      $imagePath2 = '../images/'.randomString(8).'/'.$product_image2['name'];
      mkdir(dirname($imagePath2));
      move_uploaded_file($product_image2['tmp_name'], $imagePath2);
    }
   
    if($product_image3 && $product_image3['tmp_name']){

      $imagePath3 = '../images/'.randomString(8).'/'.$product_image3['name'];
      mkdir(dirname($imagePath3));
      move_uploaded_file($product_image3['tmp_name'], $imagePath3);
    }
    
    if($product_image4 && $product_image4['tmp_name']){

      $imagePath4 = '../images/'.randomString(8).'/'.$product_image4['name'];
      mkdir(dirname($imagePath4));
      move_uploaded_file($product_image4['tmp_name'], $imagePath4);
    }
    
    
   

    // if($product_image ){
    //        $imagePath = '../images/'.randomString(8).'/'.$product_image;
    //        mkdir(dirname($imagePath));

    //     move_uploaded_file( $product_tmp_image,$imagePath);
       
    // }
    
    // if($product_image2 ){
    //     $imagePath2 ='../images/'.randomString(8).'/'.$product_image2;
    //     mkdir(dirname($imagePath2));

    //     move_uploaded_file( $product_tmp_image2,$imagePath2);
       
    // }
    // if($product_image3){
    //     $imagePath3 = '../images/'.randomString(8).'/'.$product_image3;
    //     mkdir(dirname($imagePath3));
            
    //     move_uploaded_file($product_tmp_image3,$imagePath3);
       
    // }
    // if($product_image4){
    //     $imagePath4 = '../images/'.randomString(8).'/'.$product_image4;
    //     mkdir(dirname($imagePath4));

    //     move_uploaded_file($product_tmp_image4,$imagePath4);
       
    // }
   

$stmt = $pdo->prepare("INSERT INTO products (product_name,product_category,product_description,product_image,product_image2,product_image3,product_image4,product_price,product_special_offer,product_color) VALUES(:product_name,:product_category,:product_description,:product_image,:product_image2,:product_image3,:product_image4,:product_price,:product_special_offer,:product_color)");

$stmt->bindValue(':product_name', $product_name);
$stmt->bindValue(':product_category', $product_category);
$stmt->bindValue(':product_description', $product_description);
//  $stmt->bindValue(':product_image', $product_image);
//  $stmt->bindValue(':product_image2', $product_image2);
//  $stmt->bindValue(':product_image3', $product_image3);
//  $stmt->bindValue(':product_image4',$product_image4);
$stmt->bindValue(':product_image', $imagePath);
$stmt->bindValue(':product_image2', $imagePath2);
$stmt->bindValue(':product_image3',  $imagePath3);
$stmt->bindValue(':product_image4',$imagePath4);
$stmt->bindValue(':product_price', $product_price);
$stmt->bindValue(':product_special_offer', $product_special_offer);
$stmt->bindValue(':product_color',$product_color);
  $stmt->execute();
  header('Location: products.php');

}

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
                            <div class="h3 text-center mt-5">Add Product</div>


                            <form action="add_product.php" method="POST" enctype="multipart/form-data">

                                     <?php  if (!empty($errors)):  ?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($errors as $error): ?>
                                            <div><?php echo $error ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif;  ?>
  <div class="mb-3">
    <label  class="form-label">Product name</label>
    <input type="text" name="product_name" value="<?php echo $product_name ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label  class="form-label">product category</label>
    <input type="text" name="category"value="<?php echo $product_category ?>" class="form-control">
  </div>
  <div class="mb-3">
    <label  class="form-label">product description</label>
    <textarea name="description"class="form-control" ><?php echo $product_description ?></textarea>
  </div>
  <div class="mb-3">
    <label  class="form-label">product image</label><br>
    <input type="file" name="image1">
  </div>
  <div class="mb-3">
    <label  class="form-label">product image2</label><br>
    <input type="file" name="image2">
  </div>
  <div class="mb-3">
    <label  class="form-label">product image3</label><br>
    <input type="file" name="image3">
  </div>
  <div class="mb-3">
    <label  class="form-label">product image4</label><br>
    <input type="file" name="image4">
  </div>
  <div class="mb-3">
    <label  class="form-label">product price</label>
    <input type="number" name="price" step=".01" class="form-control" value="<?php echo $product_price ?>">
  </div>
  <div class="mb-3">
    <label  class="form-label">product special offer</label>
    <input type="number" name="special" class="form-control" value="<?php echo $product_special_offer ?>">
  </div>
  <div class="mb-3">
    <label  class="form-label">product color</label>
    <input type="text" class="form-control"  name="color"value="<?php echo $product_color ?>">
  </div>
  <button type="submit" class="btn btn-primary"  name="add_product">Add Product</button>
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