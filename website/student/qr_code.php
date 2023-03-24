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
            <div class="row ">
                <div class="col-md-12"><h5 class="text-center text-info">QR Payment</h5><hr class="border-warning"></div>
                <div class="col-md-12 col-12">
                    <img src="../../images/<?php if($_SESSION['nowpay_amount'] == 450){ echo "qr_code.png"; }elseif($_SESSION['nowpay_amount'] == 40){ echo "qr_code_40.png"; }  ?>  " width="100%">
                </div> 
            </div>

            <div class="row">
            <div class="col-md-12"><hr class="border-warning"></div>
            <div class="col-md-6 mb-5">
                <label style="font-weight: 700;">UTR NO(Transaction ID)<span style="color: Red;">*</span></label>
                <input type="text" name="utr_no" class="form-control" placeholder="Enter UTR No" required> 
            </div>
            <div class="clearfix"></div>
              <!-- <input type="hidden" name="amount" value="<?php if($_SESSION['nowpay_amount'] == 450){ echo 450; }elseif($_SESSION['nowpay_amount'] == 40){ echo 40; }  ?>" > -->
            <div class="col-md-12 text-center"><input type="submit" class="btn btn-warning btn-sm" value="Pay Now" name="qr_code"></div>
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
       swal("UTR Number save successfully!", "Admin aprroved pending!", "success");
     }else if(c==0){
       swal("Opps not payment!", "Something Error !", "error");     }
</script>
<script type="text/javascript">
      var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("already");
    if(c==1){
       swal("UTR Number save successfully!", "Admin aprroved pending!", "success");
     }else if(c==0){
       swal("Opps", "Already save UTR Number!", "error");     }
</script>













