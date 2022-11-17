<?php

$ref =$_GET['reference'];
if($refv= ""){
    header("location:javascript://history.go(-1)");
}
?>
<?php
  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_d9749f6c87801c71e626edfadd3727447447abbf",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    // echo $response;
    $result = json_decode($response);
  }
  if($result->data->status == 'success'){
    $status = $result->data->status;
    $reference = $result->data->reference;
    $lname =  $result->data->customer->last_name;
    $fname =  $result->data->customer->first_name;
    $fullname = $lname.' '.$fname;
    $Cus_email = $result->data->customer->email;
    date_default_timezone_set('Africa/Lagos');
    $Date_time = date('m/d/Y h:i:s', time());

    include('server/connection.php');
    $stmt =  $pdo->prepare("INSERT INTO customer_details (status,reference,fullname, date_purchase,email) VALUES(:status,:reference:fullname,:date_purchase,:email)");

    $stmt->bindValue(':status',$status);
    $stmt->bindValue(':reference',$reference);
    $stmt->bindValue(':fullname',$fullname);
    $stmt->bindValue(':date_purchase',$Date_time);
    $stmt->bindValue(':email',$Cus_email);
    $stmt->execute();
    if(!$stmt){
        echo 'There was a problem on your code'. $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }else{
        header('location: success.php?status=success');
        exit;
    }
    



  }else{
    header('location: error.html');
    exit;
  }
?>