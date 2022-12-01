<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="slider">
	<img src="../data1/images/New/banner.png" alt="Los Angeles">
    <hr>
</section>

<style>
    .tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  justify-content:  center;
}
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
 <!--  <section class="login" style="margin-top: 15rem;"> -->
    <section class="login" style="margin-top: 2rem;">
 <div class="tab" style="background: #9ad9ea;">
    <div class="container">
        <div class="row">
            <div class="col-6" style="padding-right:0px!important;">
                <button class="btn btn-secondary btn-block" onclick="openCity(event, 'student')" id="defaultOpen" style="color: black;border-radius:10px 0px 0px 10px;border: 1px solid black; background: #c7bfe6; font-weight:bold!important;">Student</button>
            </div>
            <div class="col-6" style="padding-left:0px!important;">
                 <button class="btn btn-secondary btn-block" onclick="openCity(event, 'Exectutive')" style=" color: black;border-radius:0px 10px 10px 0px;border: 1px solid black;background: #c7bfe6; font-weight:bold!important;">Executive</button>
            </div>
        </div>
    </div>
</div>

<div id="student" class="tabcontent">
  <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="login-form" style="background: #305474; padding:15px; border-radius: 15px;">
                        <div class="logo-section">
                            <h1 style="font-size: 30px; text-align:center; color: white;">Student Login</h1><hr>
                        </div>
                        <form action="student/action.php" method="POST">
                            <div class="form-group">
                                <!-- <i class="fa fa-envelope-square fa-lg passkey"></i> -->
                             <input type="email" name="email" placeholder="Enter Email Id:" class="form-control" required="" style="padding-left: 30px;">
                             </div>
                            <div class="form-group">
                                <!-- <i class="fa fa-key fa-lg passkey"></i> -->
                              <input type="password" name="pass" placeholder="Enter Password:" class="form-control" required="" style="padding-left: 30px;">
                            </div>
                            <div class="form-group mb-5">
                                <input type="submit" class="btn btn-warning form-control" name="studentlogin" value="Login">
                                <label style="color:white;float:right; padding:10px;"><a href="forget_password_student.php" style="color:white">forgot password</a></label>
                                 <label style="color:white;float:left; padding:10px;"><a href="student_reg.php" style="color:white">Register</a></label>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
</div>

<div id="Exectutive" class="tabcontent">

 <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="login-form" style="background: #305474; padding:15px; border-radius: 15px;">
                        <div class="logo-section">
                            <h1 style="font-size: 29px; text-align:center; color: white;">Field Executive Login</h1><hr>
                        </div>
                        <form action="executive/action.php" method="POST">
                            <div class="form-group">
                                <!-- <i class="fa fa-envelope-square fa-lg passkey"></i> -->
                                <input type="text" name="email" placeholder="Enter Email Id :" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <!-- <i class="fa fa-key fa-lg passkey"></i> -->
                                <input type="text" name="pass" placeholder="Enter Password :" class="form-control" required>
                            </div>
                            <div class="form-group mb-5">
                                <input type="submit" class="btn btn-warning form-control" name="executive_login" value="Login">
                                <label style="color:white;float:right; padding:10px;"><a href="forget_password_executive.php" style="color:white">forgot password</a></label>
                                <!-- <label style="color:white;float:left; padding:10px;"><a href="apply_feildexcutive.php" style="color:white">Register</a></label> -->
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
    <script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<!-- <section class="banner-bottom" >
	<div class="container">
        <div class="row">
            <div class="col-md-6	col-6">
            	<a href="apply_feildexcutive.php"><img src="../images/fav/01.png" alt="Los Angeles" style="padding:25px;padding-bottom: 0px;" class="img-fluid">
            	<label>Apply Field Executive</label></a>
            </div>
            <div class="col-md-6	col-6">
            	<a href="student_reg.php"><img src="../images/fav/02.png" alt="Los Angeles" style="padding:25px;padding-bottom: 0px;" class="img-fluid">
            	<label>Student Registration</label></a>
            </div>
            <div class="col-md-6	col-6">
            	<a href="studentlogin.php"><img src="../images/fav/031.png" alt="Los Angeles" style="padding:25px;padding-bottom: 0px;" class="img-fluid">
            	<label>Student Login</label></a>

            </div>
            <div class="col-md-6	col-6">
            	<a href="executivelogin.php"><img src="../images/fav/04.png" alt="Los Angeles" style="padding:25px;padding-bottom: 0px;" class="img-fluid">
            	<label>Field Executive Login</label></a> <!--  Online Examination -->

          <!--  </div>
        </div>
    </div>
</section> -->
<!-- <section class="linkup"> 
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-4"><a href="course.php"><img src="../images/fav/002s.png" alt="Los Angeles" class="img-fluid"></a></div>
            <div class="col-md-4 col-4"><a href="franchise.php"><img src="../images/fav/003s.png" alt="Los Angeles" class="img-fluid"></a></div>
            <div class="col-md-4 col-4"><a href="admission.php"><img src="../images/fav/001S.png" alt="Los Angeles" class="img-fluid"></a></div>
        </div>
    </div>
</section> -->

<!-- <section class="linkup"> 
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <label style="font-size:12px; margin-top: 7px;font-weight: 600; color: #353746;">Certified By <hr style="margin:5px;"></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-2"></div>
            <div class="col-md-2 col-2"><img src="../images/fav/R01T.png"  alt="Los Angeles" class="img-fluid"></div>
            <div class="col-md-2 col-2"><img src="../images/fav/T02T.png" alt="Los Angeles" class="img-fluid"></div>
            <div class="col-md-2 col-2"><img src="../images/fav/T03T.png" alt="Los Angeles" class="img-fluid"></div>
            <div class="col-md-2 col-2"><img src="../images/fav/T04T.png" alt="Los Angeles" class="img-fluid"></div>
            <div class="col-md-2 col-2"></div>
        </div>
    </div>
</section> -->

<!--  <section class="part">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">         
       <div class="owl-carousel owl-theme">
            <div class="item"><h4>1</h4></div>
            <div class="item"><h4>2</h4></div>
            <div class="item"><h4>3</h4></div>
            <div class="item"><h4>4</h4></div>
            <div class="item"><h4>5</h4></div>
            <div class="item"><h4>6</h4></div>
            <div class="item"><h4>7</h4></div>
            <div class="item"><h4>8</h4></div>
            <div class="item"><h4>9</h4></div>
            <div class="item"><h4>10</h4></div>
            <div class="item"><h4>11</h4></div>
            <div class="item"><h4>12</h4></div>
        </div>
        </div>
      </div>
    </div>
  </section> -->
   <script>
   $(document).ready(function(){
    $(".owl-carousel").owlCarousel();
     $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

   });

 </script>
<?php include 'footer.php';?>
<?php include 'footer-links.php';?>