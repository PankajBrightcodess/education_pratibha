<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
<section class="pages">
 <div class="container ">
    <h2 class="text-center text-info">Result</h2>
            <hr class="border-warning">
   
    <form action="action.php" method="post"> 
     <div class="row all-center">
       <div class="col-md-9 mb-3 md-12"><input type="text" name="enroll" placeholder="Enter Your Roll No." class="form-control"></div>
       <div class="col-md-3 md-12"><input type="submit" class="btn btn-sm btn-warning "  value="Submit" name="getresult"></div>      
    </div>
  </form>      
</div>
</section>
     <?php include 'footer.php';?>
<?php include 'footer-links.php';?>