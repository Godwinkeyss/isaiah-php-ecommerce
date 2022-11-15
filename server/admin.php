<?php
 include('connection.php');

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
//if($_SERVER['REQUEST_METHOD'] ==='POST'){
if(isset($_POST['submit'])){
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


    $product_tmp_image = $_FILES['image1']['tmp_name']?? null;
    $product_tmp_image2 = $_FILES['image2']['tmp_name']?? null;
    $product_tmp_image3 = $_FILES['image3']['tmp_name']?? null ;
    $product_tmp_image4 = $_FILES['image4']['tmp_name']?? null;


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

// if (!is_dir('images')){
//     mkdir('images');
// }

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
    if($product_image ){
           $imagePath = '../images/'.randomString(8).'/'.$product_image;
           mkdir(dirname($imagePath));

        move_uploaded_file( $product_tmp_image,$imagePath);
       
    }
    
    if($product_image2 ){
        $imagePath2 ='../images/'.randomString(8).'/'.$product_image2;
        mkdir(dirname($imagePath2));

        move_uploaded_file( $product_tmp_image2,$imagePath2);
       
    }
    if($product_image3){
        $imagePath3 = '../images/'.randomString(8).'/'.$product_image3;
        mkdir(dirname($imagePath3));
            
        move_uploaded_file($product_tmp_image3,$imagePath3);
       
    }
    if($product_image4){
        $imagePath4 = '../images/'.randomString(8).'/'.$product_image4;
        mkdir(dirname($imagePath4));

        move_uploaded_file($product_tmp_image4,$imagePath4);
       
    }
   

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
  header('Location: admin.php');

}
}
//}

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



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <h1>insert product!</h1>
<div class="row">
<div class="col-lg-3 col-md-6 col-sm-12"></div>
<div class="col-lg-6 col-md-6 col-sm-12">


<?php  if (!empty($errors)):  ?>
<div class="alert alert-danger">
    <?php foreach ($errors as $error): ?>
        <div><?php echo $error ?></div>
    <?php endforeach; ?>
</div>
<?php endif;  ?>
    <form action="admin.php" method="POST" enctype="multipart/form-data">
  
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
    <input type="number" name="special" class="form-control" value="<?php echo $product_color ?>">
  </div>
  <div class="mb-3">
    <label  class="form-label">product color</label>
    <input type="text" class="form-control"  name="color">
  </div>
  <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
</form>
</div>
<div class="col-lg-3 col-md-6 col-sm-12"></div>

</div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>