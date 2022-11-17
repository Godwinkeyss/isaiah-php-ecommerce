
<?php 
if($_GET['status'] !== "success"){
    header('location:javascript://history.go(-1)');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 style="text-align:center; color:green; font-weight:bold;">You have successfully made your payment. your product will be shipped within 4 business days</h1>
</body>
</html>