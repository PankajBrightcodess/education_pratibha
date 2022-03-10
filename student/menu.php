<?php
error_reporting(0);
	$cp = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  $cpage = explode('.',$cp); 
  $pg=$cpage[0];
?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FFF;">
	<div class="container">
		<a class="navbar-brand" href="index.php"><img src="/../images/logo/logo.jpeg" height="50" width="70" alt="logo"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link <?php if($pg=="dashboard"){ echo "active"; } ?>" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
				</li>
				 <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="AboutVEWT" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Center</a>
          <div class="dropdown-menu" aria-labelledby="AboutVEWT">
          	 <a class="dropdown-item" href="">Upload Result</a>
          </div>
         </li> -->

        <!--  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="AboutVEWT" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Staff</a>
          <div class="dropdown-menu" aria-labelledby="AboutVEWT">
          	 <a class="dropdown-item" href="add_faculty.php">Add Faculty</a>
            <a class="dropdown-item" href="director.php">Director</a>
            <a class="dropdown-item" href="add_student_list.php">Add Student List</a>
            <a class="dropdown-item" href="add_teaching.php">Add Teaching</a>
            <a class="dropdown-item" href="add_non_teaching.php">Add Non-Teaching</a>
          </div>
         </li> -->
			 	<li class="nav-item">
					<a class="nav-link <?php if($pg=="add_banner"){ echo "active";} ?>" href="studymaterial.php">Study material</a>
				</li>
				<!--<li class="nav-item">
					<a class="nav-link <?php if($pg=="add_gallery"){ echo "active";} ?>" href="add_gallery.php">Add Gallery</a>
				</li> -->
				<!-- <li class="nav-item">
					<a class="nav-link <?php if($pg=="add_faculty"){ echo "active";} ?>" href="add_faculty.php">Add Faculty</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($pg=="director"){ echo "active";} ?>" href="director.php">Director</a>
				</li> -->
				<!-- <li class="nav-item">
					<a class="nav-link <?php if($pg=="add_notice"){ echo "active";} ?>" href="add_notice.php">Add Notice</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($pg=="add_events"){ echo "active";} ?>" href="add_events.php">Add Events</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($pg=="add_news"){ echo "active";} ?>" href="add_news.php">Add News</a>
				</li> -->
				<!-- <li class="nav-item">
					<a class="nav-link <?php if($pg=="add_student_list"){ echo "active";} ?>" href="add_student_list.php">Add Student List</a>
				</li> -->
				<!-- <li class="nav-item">
					<a class="nav-link <?php if($pg=="add_complain_list"){ echo "active";} ?>" href="add_complain_list.php">Add Complain Type</a>
				</li> -->
					<!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="AboutVEWT" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Complain</a>
          <div class="dropdown-menu" aria-labelledby="AboutVEWT">
          	 <a class="dropdown-item" href="add_subadmin.php">Add Subadmin</a>
          	 <a class="dropdown-item" href="add_complain_list.php">Add Complain Type</a>
            <a class="dropdown-item" href="studentcomplain.php">Student Complain</a>
            <a class="dropdown-item" href="complain_resolver.php">Resolver Status</a>
          </div>
         </li> -->
				<!-- <li class="nav-item">
					<a class="nav-link <?php if($pg=="add_teaching"){ echo "active";} ?>" href="add_teaching.php">Add Teaching</a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?php if($pg=="add_non_teaching"){ echo "active";} ?>" href="add_non_teaching.php">Add Non-Teaching</a>
				</li> -->
				<!-- <li class="nav-item">
					<a class="nav-link <?php if($pg=="add_important_links"){ echo "active";} ?>" href="add_important_links.php">Add Important Links</a>
				</li>
				<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="teaching.php" id="AboutVEWT" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Feedback</a>
          <div class="dropdown-menu" aria-labelledby="AboutVEWT">
           
            <a class="dropdown-item" href="studentfeedbacklist.php">Student Feedback</a>
            <a class="dropdown-item" href="facultyfeedbacklist.php">Faculty Feedback</a>
          </div>
         </li> -->
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Logout</a>
				</li>

			</ul>

		</div>
		
	</div>
	
</nav>