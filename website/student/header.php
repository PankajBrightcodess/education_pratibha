<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 90px;
  height: 90px;
  margin: -76px 0 0 -76px;
  border: 10px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 1s linear infinite;
  animation: spin 1s linear infinite;
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
<body onload="myFunction()" class="desktop" style="background: #9ad9ea;">
	<div id="loader"></div>
	
	<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">

  <a class="navbar-brand logo" href="index.php"><img src="../../images/logo/logo.png" > </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav mx-auto">
      <a class="nav-item nav-link active  mb-0 h5" href="../index.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active  mb-0 h5" href="../about-us.php">About Us</a>
      <a class="nav-item nav-link active  mb-0 h5" href="../contact-us.php">Contact Us</a>
      
    </div>	
    <div>
    	<div class="dropdown">
  <a class="dropdown-toggle  my-2 my-sm-0" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <img src="../../images/fav/01_old.png" width="20%">
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  	  <a class="dropdown-item" href="dashboard.php"><img src="../../images/app/07.png" width="50px">&nbsp;&nbsp;&nbsp;Dashboard</a>
  	  <a class="dropdown-item" href="onlineexamlist.php"><img src="../../images/app/09.png" width="50px" >&nbsp;&nbsp;&nbsp;Online Test</a>
  	  <a class="dropdown-item" href="winner-list.php"> <img src="../../images/app/10.png" width="50px" >&nbsp;&nbsp;&nbsp;Winner List</a>
  	  <a class="dropdown-item" href="user_profile.php"><img src="../../images/app/08.png" width="50px" >&nbsp;&nbsp;&nbsp;Profile</a>
  	  <a class="dropdown-item" href="pay.php"><img src="../../images/app/11.png" width="50px" >&nbsp;&nbsp;&nbsp;Pay Now</a>
  	  	<a class="dropdown-item" href="history.php"><img src="../../images/app/11.png" width="50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;History</a><hr>
      <a class="dropdown-item" href="setting.php"><img src="../../images/app/18.png" width="50px" >&nbsp;&nbsp;&nbsp;Setting</a>
      <a class="dropdown-item" href="logout.php"><img src="../../images/app/12.png" width="50px" >&nbsp;&nbsp;&nbsp;logout</a>
   
  </div>
</div>
    	 <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    
    </div>	
  </div>
</nav>
	
	
	<!-- <section class="top-part">
		<div class="container">
			<div class="row header">
				<div class="col-md-2 col-2">
					<div id="myNav" class="overlay5">
              			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()" style="color: #fff;">&times;</a>	
              			<div class="overlay-content5">
              				 <div class="row">
              					<div class="col-8 sidelogo">
              						<a href="" style="padding-bottom: 20px;">
              							<img src="../images/logo/logo.jpeg"  class="img-fluid">
              						</a>
              					</div>
              				</div> --
              				<div class="home2">
								<a href="dashboard.php"><i class="fa fa-home" aria-hidden="true" style="color:blue; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Dashboard</a><hr>
								
								<a href="onlineexamlist.php"><i class="fa fa-book" style=" color:brown; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Online Test</a><hr>

								<a href="winner-list.php"><i class="fa fa-medal" style="color:gold; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Winner List</a><hr>
								<a href="user_profile.php"><i class="fa fa-user" style=" font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Profile</a><hr>
								<a href="pay.php"><i class="fa fa-book" style=" color:brown; font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Pay Now</a><hr>
								<a href="setting.php"><i class="fa fa-gear fa-spin" style=" font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Setting</a><hr>
				                <a href="logout.php"><i class="fa fa-star" aria-hidden="true" style="color:red;"></i>&nbsp;&nbsp;&nbsp;Logout</a><hr>
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
								<label style="color: #171662;"><strong style="font-size: 14px;"><img src="../../images/logo/logo.png" height="30px" width="40px"> Educational Pratibha Darpan</strong></label>
							</a>
						</p>
					</div>
				</div>
				
				<div class="col-md-2 col-2">
					<div class="bell">
						<p>
							<a href="#">
								 <span><i class="far fa-bell" style="color: #fff;"></i></span> -
							</a>
						</p>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</section> -->