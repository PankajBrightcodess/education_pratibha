<?php 
include '../connection.php';
session_start();
$msg = "";
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if($msg != ""){
        echo "<script> alert('$msg') </script>";
    }
    // print_r($_SESSION['role']);die;
    if(empty($_SESSION['enroll_id'])){
        header('location:../studentlogin.php');
    }
    $id = $_SESSION['enroll_id'];
     $query="SELECT * FROM `student` WHERE `id`='$id'";
  $run=mysqli_query($conn,$query);
  $data=mysqli_fetch_assoc($run);
  // echo '<pre>';
  // print_r($data);die;
   $query1="SELECT * FROM `wallet` WHERE `user_id`='$id' AND `type` = 'student'";
  $run1=mysqli_query($conn,$query1);
  $data1=mysqli_fetch_assoc($run1);
 
?>
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
<section class="pages" id="contactpg">
  	<div class="container">
		<div class="row">
           <!--  <div class="col-md-7">
            	<h2 class="text-center text-info">Contact Us</h2><hr class="border-warning">
                <form action="sendmail.php" method="post">
                    <div class="form-row">
                        <div class="col"><input type="text" name="name" placeholder="Name :" class="form-control py-4" required></div>
                        <div class="col"><input type="tel" name="contact" placeholder="Contact :" class="form-control py-4" required></div>
                    </div>
                    <div class="form-row mt-4">                        
                        <div class="col"><input type="email" name="email" placeholder="Email :" class="form-control py-4" required></div>
                    </div>
                    <div class="form-row">
                    	<div class="col mt-4"><textarea name="message" placeholder="Message :" class="form-control py-4" required style="min-height:75px;"></textarea></div>
                    </div>
                    <button type="submit" name="contactus" class="my-4 btn btn-warning btn-sm btn-block">Send</button>
                </form>
            </div> -->
            <div class="col-md-12">
            	<h2 class="text-center text-info">User Profile</h2><hr class="border-warning">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Wallet:</th>
                            <td><?php echo $data1['amount'];?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $data['name'];?></td>
                        </tr>
                          <tr>
                            <th>Course</th>
                            <td><?php echo $data['course'];?></td>
                        </tr>
                         <tr>
                            <th>Address</th>
                            <td><?php echo $data['address'];?></td>
                        </tr>

                        <tr>
                            <th>Mobile</th>
                            <td><?php echo $data['mobile'];?></td>
                        </tr>
                         <tr>
                            <th>Email</th>
                            <td><?php echo $data['email'];?></td>
                        </tr>
                        <!-- <tr>
                            <th>Password</th>
                            <td><?php echo $data['password'];?></td>
                        </tr> -->
                    </thead>
                    
                </table>
               
            </div>
            <div class="col-md-12">

    </div>
            <div class="clearfix"></div>
        </div>
    </div>
 </section>
 <?php include 'footer.php';?>
<?php include 'footer-links.php';?>