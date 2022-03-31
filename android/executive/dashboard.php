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
					<?php print_r($_SESSION['id'])?>
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
		</div>
		+
		<div class="row">

        </div>
	</div>
</section>
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>