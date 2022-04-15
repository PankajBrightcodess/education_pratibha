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
                <div class="col-md-12"><h5 class="text-center text-info">Payment</h5><hr class="border-warning"></div>
               
          
            <div class="col-md-6 mb-5">
                <label >Amount<span style="color: Red;">*</span></label>
                <input type="text" name="amount" class="form-control" readonly value="531" required> 
            </div>
                <div class="clearfix"></div>
            <div class="col-md-12 text-center"><input type="submit" class="btn btn-warning btn-sm" value="Pay Now" name="payment"></div>
            </div>
            
    </form>
    </div>
      <span style="text-align: center; font-size:15px;">Total Amount: 450 + 18%GST = 531</span>
 </section>
 
 <?php include 'footer.php';?>
<?php include 'footer-links.php';?>