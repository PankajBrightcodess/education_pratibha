<?php 
	session_start();
	$msg = "";
		if(isset($_SESSION['msg'])){
			$msg = $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		if($msg != ""){
			echo "<script> alert('$msg') </script>";
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include '../admin/header-links.php'; ?>
	<title>Student Change Password | Shivanya Computer Education</title>
</head>
<body style="background:#e8e7e5; ">
	<section class="login" style="margin-top: 15rem;">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="login-form" style="background: #49557A; padding:15px; border-radius: 15px;">
						<div class="logo-section">
							<h1 style="font-size: 35px; text-align:center; color: white;">Student Change Password</h1><hr>
						</div>
						<form action="action.php" method="POST">
							<div class="form-group">
								<!-- <i class="fa fa-envelope-square fa-lg passkey"></i> -->
								<input type="email" name="email" placeholder="Enter Valid Email Id:" class="form-control" required="">
							</div>
							
							<div class="form-group mb-5">
								<input type="submit" class="btn btn-warning form-control" name="change_student_pass" value="Change Password">
							</div>
						</form>

					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div> 
	</section>
	<?php include '../admin/footer-links.php'; ?>
</body>
</html>