 <?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<!-- <section class="blank-course "></section> -->
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
								<input type="email" name="email" id="email" placeholder="Enter Valid Email Id:" class="form-control" required="">
							</div>
							
							<div class="form-group mb-5">
								<input type="button" class="btn btn-warning form-control check_id" name="change_student_pass" value="Change Password">
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
     $('.check_id').click(function(e){
            debugger;
         var email=$('#email').val();
        $.ajax({
                type:'POST',
                url:'student/action.php',	
                data:{email:email,change_student_pass:'change_student_pass'},
                success: function(result){
                	// alert(result);
                    if(result==1){
                    	swal("Sent!", "Otp on email!", "success");
                    	window.location.href = "new_password_student.php";
                    }
                    else{
                        swal("Opps!", "Something Error!", "error");
                        window.location.href = "forget_password_student.php";
                    }
                      
                },
                error: function(){ 
                   swal("Opps!", "Not sent on Mail!", "internet problem");
                },
        });
    return false;  
    });
</script>