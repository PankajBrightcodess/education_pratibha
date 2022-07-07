<?php 
session_start();
include '../connection.php';
$msg = "";
	if (isset($_SESSION['msg'])) {
		$msg = $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	if($msg != ""){
		echo "<script> alert('$msg') </script>";
	}
	// print_r($_SESSION['role']);die;
	if($_SESSION['role']!='2'){
		header('location:../executivelogin.php');
	}
    $ids=$_SESSION['exe_id'];
    
?>
<?php include 'header-links.php'; ?>
<style type="text/css">
  .desktop{
    background: #d1d5d6!important;
  }
</style>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
  <?php
    $ids=$_SESSION['exe_id'];  
  $query="SELECT * FROM `field_excutive` WHERE `id`='$ids'";

          $run=mysqli_query($conn,$query);
            while($data=mysqli_fetch_assoc($run)){
                    $result[]=$data;
        } 
        if(!empty($result)){
          foreach ($result as $key => $value) {  ?>
           
        <section style="margin-top: 66px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="background-color: #182458; border-radius: 0px 0px 40px 40px; height: 111px;">
          <div class="row">
            <div class="col-4">
              <img src="../../images/logo/logo.png" height="30px" width="40px">
            </div>
            <div class="col-8">
              <h6 style="padding-top: 20px!important;text-align: left; color: white;">Profile Field Executive</h6>
            </div>
          </div>
          
          <center><a href=""><img src="../../images/app/08.png" class="edit"; style="border-radius: 100%;" width="50px"></a></center>
         </div>
       </div>
     </div>
 </section>
  
   <section style="margin-bottom: 10px;">
    <div class="container">
      <div class="row">
       <div class="col-md-12">
       
              <form action="/action_page.php" style="line-height: 17px;">
              <b for="fname">First name:</b><br>
              <span><?php echo $value['name'] ?></span><hr>
              <b for="lname">Last name:</b><br>
             <!--  <span><?php echo $value['last_name'] ?></span><br><hr> -->
              <b for="lname">Mobile no:</b><br>
              <span><?php echo $value['mobile'] ?></span><br><hr>
              <b for="lname">Email:</b><br>
               <span><?php echo $value['email'] ?></span><br><hr>
              <b for="lname">Date of Birth:</b><br>
              <span><?php echo date('d-M-Y', strtotime($value['dob'])); ?></span><br><hr>
              <b for="lname">Address:</b><br>
              <span><?php echo $value['location'] ?>,<?php echo $value['city'] ?>(<?php echo $value['state'] ?>)<?php echo $value['pincode'] ?></span><br><hr>
              <b for="lname">Gender:</b><br>
              <span><?php echo $value['gender'] ?></span>

                  
                     
                     
                
                  
             </form>
           </div>
       </div>

      </div>
 
 <!--   <div class="container">
    <div class="row justify-content-center">
      <div class="col-6">
        <label>Name</label>
      </div>
      <div class="col-6">
        <label><?php echo $value['name']; ?></label>
      </div>
      <div class="col-6">
        <label>Mobile No</label>
      </div>
      <div class="col-6">
        <label><?php echo $value['mobile']; ?></label>
      </div>
      <div class="col-6">
        <label>Mobile No</label>
      </div>
      <div class="col-6">
        <label><?php echo $value['mobile']; ?></label>
      </div>
      
    </div>
  
    
      
    </div> -->
	<?php  }
} ?>
</section>
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>