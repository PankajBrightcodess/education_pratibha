<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
/* Center the loader */


@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>
<body  class="desktop" style="background: #9ad9ea;">

	<style type="text/css">
		.home2 a{
			text-align: center;
		}
	</style>
	<section class="top-part">
		<div class="container">
			<div class="row header">
				<div class="col-md-2 col-2">
					<div id="myNav" class="overlay5">
              			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: #fff;">&times;</a>	
              			<div class="overlay-content5">
              				
              				<div class="home2">
							<a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home</a><hr>
								<a href="about-us.php"><i class="fa fa-sign-in-alt"></i>&nbsp;&nbsp;&nbsp;About Us</a><hr>

								<a href="contact-us.php"><i class="far fa-building"></i>&nbsp;Contact Us</a><hr>
							</div>
              			</div>
              		</div>
					<div class="nav-menu">
						<p style="cursor: pointer;" onclick="openNav()">
							<i class="fas fa-bars" style="color: #000;"></i>
						</p>
					</div>
				</div>
				<div class="col-md-8 col-8" style="margin-top: -20px;">
					<div class="logo" style="margin-top: 20px;">
						<p>
							<a href="#">
								<label style="color: #171662;"><strong style="font-size: 12px;"><img src="../images/logo/logo.png" height="30px" width="40px"> Educational Pratibha Darpan</strong></label>
							</a>
						</p>
					</div>
				</div>
				
				<div class="col-md-2 col-2">
					<div class="bell">
						<p>
							<a href="#">
								<!-- <span><i class="far fa-bell" style="color: #fff;"></i></span> -->
							</a>
						</p>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</section>