<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="login" style="margin-top: 15rem;">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="login-form" style="background: #FA9189; padding:15px; border-radius: 15px;">
						<div class="logo-section">
							<h1 style="font-size: 35px; text-align:center; color: white;">Center Change Password</h1><hr>
						</div>
						<form action="action.php" method="POST">
							<div class="form-group">
								<!-- <i class="fa fa-envelope-square fa-lg passkey"></i> -->
								<input type="email" name="email" placeholder="Enter Valid Email Id:" class="form-control" required="">
							</div>
							
							<div class="form-group mb-5">
								<input type="submit" class="btn btn-warning form-control" name="change_center_pass" value="Change Password">
							</div>
						</form>

					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div> 
	</section>
	<?php include 'footer.php';?>
<?php include 'footer-links.php';?>