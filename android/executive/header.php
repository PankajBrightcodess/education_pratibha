<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

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
<!-- <body class="desktop" style="background: #e9ebfb;"> -->
<body onload="myFunction()" class="desktop" style="background:  #9ad9ea;">
	<div id="loader"></div>
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
              				<!-- <div class="row">
              					<div class="col-8 sidelogo">
              						<a href="" style="padding-bottom: 20px;">
              							<img src="../images/logo/logo.jpeg"  class="img-fluid">
              						</a>
              					</div>
              				</div> -->
              				<div class="home2">
								<a href="dashboard.php"><img src="../../images/app/07.png" width="30px">&nbsp;&nbsp;&nbsp;Dashboard</a><hr>
								<a href="studentlist.php"><img src="../../images/app/08.png" width="30px">&nbsp;&nbsp;&nbsp;Student List</a><hr>
								<a href="setting.php"><img src="../../images/app/18.png" width="30px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Setting</a><hr>
				                <a href="logout.php"><img src="../../images/app/12.png" width="30px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout</a><hr>
							</div>
              			</div>
              		</div>
					<div class="nav-menu">
						<p style="cursor: pointer;" onclick="openNav()">
							<i class="fas fa-bars" style="color: #000;"></i>
						</p>
					</div>
				</div>
				<div class="col-md-8 col-8">
					<div class="logo">
						<p>
							<a href="#">
								<label style="color: #171662;"><strong><img src="../../images/logo/logo.png" height="30px" width="40px"> Educational Pratibha Darpan</strong></label>
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