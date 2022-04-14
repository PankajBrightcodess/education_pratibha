<?php
session_start();
include '../connection.php';
 if(empty($_SESSION['enroll_id'])){
    header('location:../studentlogin.php');
  }   
$msg = "";
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if ($msg != "") {
        echo "<script> alert('$msg')</script>";
    }
      if(isset($_POST['razorpay_payment_id'])){
      $payment_details=json_encode($_POST);
      $razorpay_payment_id = $_POST['razorpay_payment_id'];
      // $payment_date = date('Y/m/d');
      $payment_status = 1;
      $id = $_SESSION['last_inst_id'];
      // unset($_SESSION['last_inst_id']);
      $sql="UPDATE student SET payment_status = '$payment_status',payment_id = '$razorpay_payment_id', payment_details = '$payment_details' WHERE `id`='$id'";
     $run=mysqli_query($conn,$sql);
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Payment Success</title>
        <?php  include 'main-head-links.php'; ?>
  </head>
  <body style="background: #dff5df;">
    <section class="payment-success">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="payment-success-box">
              <img src="https://img.icons8.com/ios-filled/50/000000/cloud-checked.png"/>
              <h3>Payment Successfull !!!</h3>
              <p style="color:green;">Your Payment has been Successfully Recieved !!!</p>
              <a href="payment_slip.php" class="btn btn-success mt-2">Done</a>
            </div>
          </div>
        </div>
      </div>
    </section>
   <!-- <?php include'footerlink.php'; ?> -->
  </body>
</html>