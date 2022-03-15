<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
	<section class="login" style="margin-top: 10rem;">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="login-form" style="background: #B0B379; padding:15px; border-radius: 15px;">
						<div class="logo-section">
							<h1 style="font-size: 35px; text-align:center; color: white;">Executive Change Password</h1><hr>
						</div>
						<form action="#" method="POST">
							<div class="form-group">
								<!-- <i class="fa fa-envelope-square fa-lg passkey"></i> -->
								<input type="password" name="new_pass" id="new_pass" placeholder="Enter New Password:" class="form-control" required="">
							</div>
							<div class="form-group">
								<!-- <i class="fa fa-key fa-lg passkey"></i> -->
								<input type="password" name="con_pass" id="con_pass" placeholder="Enter Confirm Password:" class="form-control" required="" >
							</div>
							<div class="form-group mb-5">
								<input type="button" name="update_executive" class="btn btn-warning form-control updt"  value="Update Password">
								
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

<script type="text/javascript">
     $('.updt').click(function(e){
         var new_pass=$('#new_pass').val();
         var con_pass=$('#con_pass').val();
        $.ajax({
                type:'POST',
                url:'executive/action.php',
                data:{new_pass:new_pass,con_pass:con_pass,update_password_executive:'update_password_executive'},
                success: function(result){
                	
                    if(result=='1'){
                    	// window.location.href = "new_password_excutive.php";
                        swal("Good job!", "Updated Successfully!", "success");
                    }
                    else{
                        swal("Opps!", "Something Error!", "error");
                      
                    }
                      
                    },
                    error: function(){ 
                       alert("error");
                    },
        });
    return false;  
    });
</script>