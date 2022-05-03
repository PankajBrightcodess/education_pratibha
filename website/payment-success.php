<?php
session_start();
include'connection.php';
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
      $id = $_SESSION['last_ins_id'];
      // unset($_SESSION['last_inst_id']);
      $sql="UPDATE paid_student SET payment_status = '$payment_status',payment_id = '$razorpay_payment_id', payment_details = '$payment_details' WHERE `id`='$id'";
      $conn->query($sql);
    }
?>
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
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
    <?php include 'footer.php';?>
<?php include 'footer-links.php';?>
   
  