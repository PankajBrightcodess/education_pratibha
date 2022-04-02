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
                 $sql = "SELECT `homework`.`pid`, `field_excutive`.`name`, `homework`.`assessment`,`homework`.`date` 
                 FROM `homework`
                  INNER JOIN `field_excutive` ON `homework`.`executive_id`=`field_excutive`.`id`;";
                  $res = mysqli_query($conn,$sql);
                  while($data = mysqli_fetch_assoc($res)){
                    $homework[]=$data;
                  } ?>

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">                 
<section class="page">
    <div class="container-fluid">
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
                          <h6>Teacher Name: <?php echo $value['name'];?> <br>(<?php echo $value['date'];?>)</h6>
                       </div>
                       
                       <div class="col-md-3 col-3"> 

                     
                     <iframe src="../executive/uploads/homework/<?php echo $value['assessment']; ?>" style="width: 100%; height: 50px; background-color:green ; color: black;">PDF</iframe>
                          
                      </div>
                          <div class="col-3" style="font-size: 10px;"><strong></strong></div>
                          <div class="col-6" style="font-size: 10px;"><strong>Student Name: <?= $_SESSION['name']; ?></strong></div>
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
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>