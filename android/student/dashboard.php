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
	if(empty($_SESSION['enroll_id'])){
		header('location:../studentlogin.php');
	}
  
?>
<?php include 'header-links.php'; ?>

<?php include 'header.php'; ?>
<section class="blank-course "></section>
<?php             
                 // $sql = "SELECT * FROM `homework` WHERE `status`='1'";
                 // $sql = "SELECT `homework`.`pid`, `field_excutive`.`name`, `homework`.`assessment`,`homework`.`date` 
                 // FROM `homework`
                 //  INNER JOIN `field_excutive` ON `homework`.`executive_id`=`field_excutive`.`id`;";
                 //  $res = mysqli_query($conn,$sql);
                 //  while($data = mysqli_fetch_assoc($res)){
                 //    $homework[]=$data;
                 //  } 
             $sql = "SELECT * FROM `homework` WHERE `status`='1'";
             $res = mysqli_query($conn, $sql);
             while($data = mysqli_fetch_assoc($res)){
              $homework[] = $data;
             }





?>
<style type="text/css">
  .banner-bottom i{
    font-size:30px;
   
    text-shadow:2px 2px 4px #000000;
  }
  
</style>

 <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->


<section class="banner-bottom" >
  <div class="container">
    <div class="row">
      <div class="col-4 ">
        <a href="dashboard.php">
        <i class="fa fa-home" style="padding:25px;padding-bottom: 0px;" aria-hidden="true"></i>
              </a>
      </div>
      <div class="col-4"><a href="user_profile.php"><i class="fa fa-user" style="padding:25px;padding-bottom: 0px; color: black;" aria-hidden="true"></i>
              <br></a></div>
      <div class="col-4"><a href="onlineexamlist.php"><i class="fa fa-book" style="padding:25px;padding-bottom: 0px; color:brown;"></i>
              </a></div>
    </div>
    <div class="row">
      <div class="col-4"><a href="winner-list.php"><i class="fa fa-medal" style="color:gold;padding:25px;padding-bottom: 0px;"></i>
              </a></div>
      <div class="col-4">
        <a href="pay.php"><i class="fa fa-credit-card" style="padding:25px;padding-bottom: 0px;"></i>
              </a>
      </div>
     
      <div class="col-4">
         <a href="logout.php"><i class="fa fa-sign-in-alt" style="color:red;padding:25px;padding-bottom: 0px;"></i> <br></a>
      </div>
    </div>


    </div>
</section>
               
<section class="page">
    <div class="container-fluid">

     <!--  <div class="row menu">
        <div class="col-6"><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>Dashboard</a></div>
        <div class="col-6"><a href="user_profile.php"><i class="fa fa-sign-in-alt"></i>Profile</a></div>
        <div class="row" style="margin-left: 3px;">
          <div class="col-6"><a href="paid_course.php"><i class="fa fa-book"></i>Online Test</a></div>
           <div class="col-6"><a href="winner-list.php"><i class="fa fa-medal"></i>Winner List</a></div>
            <div class="row">
          <div class="col-12" style="margin-left: 15px;"><a href="logout.php"><i class="fa fa-star" aria-hidden="true"></i>Logout</a></div>
        </div>
        </div>
       
     
    </div> -->
      <div class="row">
        <?php 
          if(!empty($homework)){
            foreach ($homework as $key => $value) {
                ?>
               <div class="col-md-9 mb-3">
                  <div class="card">
                   <div class="card-header bg-secondary text-light text-center"><span><strong>Homework</strong></span></div>
                    <div class="card-body">
                      <div class="row">
                       <div class="col-md-9 col-9 mb-5">
                          <h6>Homework Name: <?php echo $value['name'];?> <br>(<?php echo $value['date'];?>)</h6>
                       </div>
                       
                       <div class="col-md-3 col-3"> 
                    	<a href="../../adminpanel/uploads/homework/<?php echo $value['assessment']; ?>" target="_blank">
                    		<i class="fa fa-file-pdf-o" style="font-size:48px;color:red"></i></a>
                      <!--  <iframe src="../executive/uploads/homework/<?php echo $value['assessment']; ?>"><i class="fa fa-file-pdf-o" style="font-size:48px;color:red"></i></iframe> -->
                          
                      </div>
                          <div class="col-3" style="font-size: 10px;"><strong></strong></div>
                          <div class="col-6" style="font-size: 10px; margin-bottom: -50px;"><strong >Student Name: <?= $_SESSION['name']; ?></strong></div>
                          <div class="col-2" style="font-size: 10px;"><strong></strong></div>
                    </div>
                  </div>

                </div>
              </div>

                <?php
            }
          }



        ?>
    </div>
  </section>



<!-- <section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 dashboard mb-3">
				<h4 style="color:#403226; margin-top: 2rem; text-align: center;"><?php print_r($_SESSION['name'])?>
				
				</h4>

				     <div class="col-md-9">
                  <div class="department-list">
                     <div class="card">
              <div class="card-header">
                <h5 style="font-weight: bold;">Student Assessment List</h5>
              </div>
              <!-- /.card-header -->
              <!-- <div class="card-body">
              
                <table  class="table  ">
                  <thead>
                  <tr>
                    <th>S.No.:</th>
                   <th>Teacher name</th>
                    <th>Assessement</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody > -->
                 <!-- <?php 
                 // $sql = "SELECT * FROM `homework` WHERE `status`='1'";
                 $sql = "SELECT `homework`.`pid`, `field_excutive`.`name`, `homework`.`assessment`,`homework`.`date` 
                 FROM `homework`
                  INNER JOIN `field_excutive` ON `homework`.`executive_id`=`field_excutive`.`id`;";
                  $res = mysqli_query($conn,$sql);
                  while($data = mysqli_fetch_assoc($res)){
                    $homework[]=$data;
                  } 
                 if(!empty($homework)){$sn=0;
                  echo '<pre>';
                  // print_r($gallery);
                  foreach ($homework as $key => $row) {$sn++;  $id=$row['pid'];?>
                      <tr>
                        <td><?php echo $sn; ?></td>
                        <td><p ><?php echo $row['name']; ?></p></td>
                        <td><a href="../executive/uploads/homework/<?php echo $row['assessment']; ?>"><i class="fa fa-file-pdf-o" style="font-size:24px"></i></a>	 </td>
                        <td><?php echo $row['date']; ?></td>
                 
                    <?php
                  }
                 }
                         
                ?> -->
                        
                            
                        <!-- </tr>
                 
                    </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
              
            <!-- </div>
                  </div>
                </div>
			</div>
		</div>
		<div class="row">

        </div>
	</div>
</section> -->
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>