<?php 
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
	if($_SESSION['role']!='2'){
		header('location:../executivelogin.php');
	}
?>
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 dashboard mb-3">
				<h4 style="color:#403226; margin-top: 2rem; text-align: center;"><?php print_r($_SESSION['name'])?>
					
				</h4>

                <form  action="action.php" id="form_data" enctype="multipart/form-data" method="post">
                	<div class="col-md-12 mb-2">
                		
                		<input type="hidden" name="executive_id" value="<?php echo $_SESSION['id']; ?>">
                	</div>
           
                        <div class="col-md-12 mb-2">
                          <label>Upload Image.<span style="color:red;">*</span></label>
                          <input type="file" name="assessement" id="assessement" class="form-control" required="" >      
                        </div>
                          <button class="btn btn-info btn-sm btn-block formdata" type="submit" name="add_homework" style="margin-top: 10px;">Save</button>
                </form>

			</div>
		<!-- 	<div class="col-md-7">
                  <table id="datatable" class="table table-hovered table-responsive table-bordered">
                      <thead>
                        <tr class="bg-dark text-light">
                          <th>#</th>
                          <th>Enorll No</th>
                          <th>Course</th>
                          <th>Student's Name</th>
                          <!-- <th>Result</th>
                          <th>Action</th> -->
                        <!-- </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($center)){ $i=0;  foreach ($center as $uploadresult) { ++$i; ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $uploadresult['enroll']; ?></td>
                          <td><?php echo $uploadresult['course']; ?></td>
                          <td><?php echo $uploadresult['name']; ?></td> -->
                         <!--  <td><img src="../../upload/<?php echo $uploadresult['upload_image']; ?>" height="100" width="100" class="img-fluid"></td>
                          <td>
                             <a class=" btn btn-sm btn-danger delete" data-id="<?php echo $uploadresult['id'] ?>"><i class="fa fa-trash-alt btn btn-sm btn-danger"></i></a></td> -->
                       <!--  </tr>  
                        <?php } }?>
                      </tbody>
                    </table>
              </div>  -->
		</div>
		
	</div>
</section>
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>