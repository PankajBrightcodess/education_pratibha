<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
	<section class="login" style="margin-top: 10rem;">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="login-form" style="background: #B0B379; padding:15px; border-radius: 15px;">
						<div class="logo-section">
							<h1 style="font-size: 35px; text-align:center; color: white;">Student Change Password</h1><hr>
						</div>
						<form action="#" method="POST">
							<div class="form-group">
								<label>Enter Otp</label>
								<input type="number" name="otp" id="otp" placeholer="Enter your otp" class="form-control" required="" >
							</div>
							<div class="form-group">
								<label>New Password</label>
								<input type="password" name="new_pass" id="new_pass" placeholder="Enter New Password:" 
								class="form-control" required="">
							</div>
							<div class="form-group">
								<label>Confirm Password</label>
								<input type="password" name="con_pass" id="con_pass" placeholder="Enter Confirm Password:" class="form-control" required="" >
							</div>
							 
							<div class="form-group mb-5">
								<input type="button" name="update_password_student" class="btn btn-warning form-control updt"  value="Update Password">
								
							</div>
							<div><h6 style="color: white;">Otp Time left = <span id="timer"></span></h6></div>
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
	let timerOn = true;

function timer(remaining) {
  var m = Math.floor(remaining / 60);
  var s = remaining % 60;
  
  m = m < 10 ? '0' + m : m;
  s = s < 10 ? '0' + s : s;
  document.getElementById('timer').innerHTML = m + ':' + s;
  remaining -= 1;
  
  if(remaining >= 0 && timerOn) {
    setTimeout(function() {
        timer(remaining);
    }, 1000);
    return;
  }

  if(!timerOn) {
    // Do validate stuff here
    return;
    deletedata();

  }
  
  // Do timeout stuff here
  alert('Timeout for otp');
}
timer(600);

function deletedata(){

	$.ajax({
                    type:"POST",
                    url:"student/action.php",
                    data:{deleteotp:"deleteotp"},
                    success:function(data){
                       if(data == 1){
                        swal("Opps", "Otp time out", "error");
                       	window.location.href = "studentlogin.php";
                       }
                       else{
                       
                        window.location.href = "new_password_student.php";
                       }
                    },
                     error: function(){ 
                      return false;
                    },
                });
	return false;
}







 $('body').on('click','.updt',function(){
     	// debugger;
     	 var otp=$('#otp').val();
         var new_pass=$('#new_pass').val();
         var con_pass=$('#con_pass').val();
         
        $.ajax({
                type:'POST',
                url:'student/action.php',
                data:{otp:otp,new_pass:new_pass,con_pass:con_pass,update_password_student:'update_password_student'},
                success: function(result){
                		console.log(result);
                    if(result == 1){
                    	// window.location.href = "new_password_excutive.php";
                        swal("Good job!", "Updated Successfully!", "success");
                        window.location.href = "studentlogin.php";
                    }
                    else{
                        swal("Opps!", "Something Error!", "error");
                        window.location.href = "new_password_student.php";
                    }
                      
                 },
                    error: function(){ 
                       swal("Opps!", " updated Error!", "error");
                    },
        });
    return false;  
    });
</script>