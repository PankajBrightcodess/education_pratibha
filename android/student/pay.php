<?php 
session_start();

include '../connection.php';
    if(empty($_SESSION['enroll_id'])){
    header('location:../studentlogin.php');
  }       
    
?>
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
 <section class="pages" id="contactpg">
    <div class="container">
        <form action="action.php" method="post">
            <div class="row">
                <div class="col-md-12"><h5 class="text-center text-info">Payment</h5><hr class="border-warning"></div>
             <div class="col-md-6 mb-5">
                <label >Amount<span style="color: Red;">*</span></label>
                <select name="amount" class="form-control" required>
                    <option value="">--Select--</option>
                    <option value="450">450</option>
                    <option value="40">40</option>
                </select>
                <!-- <input type="text" name="" class="form-control" readonly value="" required>  -->
            </div>
                <div class="clearfix"></div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="mode" id="inlineRadio1" value="online" required>
                  <label class="form-check-label" for="inlineRadio1">Online</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="mode" id="inlineRadio2" value="wallet" required>
                  <label class="form-check-label" for="inlineRadio2">Wallet</label>
                </div>
            <div class="col-md-12 text-center"><input type="submit" class="btn btn-warning btn-sm" value="Pay Now" name="payment"></div>
            </div>
            
    </form>
    </div>
      <!-- <span style="text-align: center; font-size:15px;">Total Amount: 450 + 18%GST = 531</span> -->
 </section>
 
 <?php include 'footer.php';?>
<?php include 'footer-links.php';?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
      var url_string = window.location.href;
    var url = new URL(url_string);
    var b = url.searchParams.get("warning");
    if(b==1){
       swal("Payment!", "Payment successfully!", "success");
     }else if(b==0){
       swal("Opps Wallet insufficient!", "Exceed amount Your wallet!", "error");    
        }
</script>
<script type="text/javascript">
      var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("status");
    if(c==1){
       swal("Payment!", "Payment successfully!", "success");
     }else if(c==0){
       swal("Opps not payment!", "Something Error !", "error");     }
</script>