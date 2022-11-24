<?php  include('layouts/header.php') ?>
<?php
 
  if(isset($_POST['order_pay_btn'])){
    $order_status = $_POST['order_status'];
    $order_total_price = $_POST['order_total_price'];
  }

?>






<!-- Payment -->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
      <h2 class="font-weight-bold">Payment</h2>
      <hr class="mx-auto" />
    </div>
    <div class="mx-auto container text-center">

    <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "not paid") { ?>
        <?php $amount =strval( $_POST['order_total_price'] ) ?>
        <?php $order_id = $_POST['order_id']; ?>
          <p>Total Payment: $<?php echo $_POST['order_total_price']   ?></p>
          <form id="paymentForm">
                <div class="form-group">
                
                  <input type="email" id="email-address" required placeholder="email" style="width:400px; border-radius:5px;margin-bottom:10px;" />
                </div>
                <!-- <div class="form-group">
                <p class="text-center">Total payment:  </p>
                  <input class="text-center" width="50" style="border:none;outline:none;" type="tel" id="amount" required disabled  value="$<?php echo $_SESSION['total'] ?>"/>
                </div> -->
                <div class="form-group">
                 
                  <input type="text" id="first-name" value="" placeholder="first name"style="width:400px; border-radius:5px;margin-bottom:10px;"/>
                </div>
                <div class="form-group">
                 
                  <input type="text" id="last-name" placeholder="last name" style="width:400px; border-radius:5px;margin-bottom:10px;"/>
                </div>
                <div class="form-submit">
                  <button type="submit"style="width:400px; border-radius:5px;" onclick="payWithPaystack()"> Pay Now </button>
                </div>
          </form>
          <script src="https://js.paystack.co/v1/inline.js"></script>


      <?php } else if(isset($_SESSION['total']) && $_SESSION['total'] != 0){ ?>
        <?php $amount =strval( $_SESSION['total'] ) ?>
        <?php $order_id = $_SESSION['order_id']; ?>
          <p>Total payment:$<?php echo $_SESSION['total'];?></p>
          <form id="paymentForm">
                <div class="form-group">
                
                  <input type="email" id="email-address" required placeholder="email" style="width:400px; border-radius:5px;margin-bottom:10px;" />
                </div>
                <!-- <div class="form-group">
                <p class="text-center">Total payment:  </p>
                  <input class="text-center" width="50" style="border:none;outline:none;" type="tel" id="amount" required disabled  value="$<?php echo $_SESSION['total'] ?>"/>
                </div> -->
                <div class="form-group">
                 
                  <input type="text" id="first-name" value="" placeholder="first name"style="width:400px; border-radius:5px;margin-bottom:10px;"/>
                </div>
                <div class="form-group">
                 
                  <input type="text" id="last-name" placeholder="last name" style="width:400px; border-radius:5px;margin-bottom:10px;"/>
                </div>
                <div class="form-submit">
                  <button type="submit"style="width:400px; border-radius:5px;" onclick="payWithPaystack()"> Pay Now </button>
                </div>
          </form>
          <script src="https://js.paystack.co/v1/inline.js"></script>

          <!-- <input type="submit" class="btn btn-primary" value="Pay Now"> -->
      

      



      <?php } else{ ?>
        <p class="text-danger">You don't have an order</p>
      <?php } ?>



       

     
    </div>
  </section>


 
  <script>
 const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_13cef54d0c840d3e824435c212523939f5043462', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: '<?php echo $amount;  ?>' * 100,
    ref: 'GP'+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      window.location = "http://localhost/grapec/index.php?transaction=cancel"
      alert('Transaction Failed!.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
      // window.location = "http://localhost/grapec/verify_transaction.php?reference=" + response.reference;
      window.location.href = "server/complete_payment.php?reference=" + response.reference+"&order_id="+<?php echo $order_id; ?>

    }
  });

  handler.openIframe();
}
</script>

      <!-- footer -->
      <?php  include('layouts/footer.php') ?>
