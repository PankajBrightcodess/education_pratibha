    <?php include 'header-links.php'; ?>
     <?php include 'header.php'; ?>

<section class="slider">
<!-- 	<img src="../data1/images/New/banner.png" alt="Los Angeles"> -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="../data1/images/New/banner.png" alt="First slide" width="100%">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../data1/images/New/banner.png" alt="Second slide"  width="100%">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="../data1/images/New/banner.png" alt="Third slide"  width="100%">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  
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
            <div class="col-6 col-md-6" style="padding-right:0px!important;">
                <button class="btn btn-secondary btn-block" onclick="openCity(event, 'student')" id="defaultOpen" style="color: black;border-radius:10px 0px 0px 10px;border: 1px solid black; background: #c7bfe6; font-weight:bold!important;">Student</button>
            </div>
            <div class="col-6 col-md-6" style="padding-left:0px!important;">
                 <button class="btn btn-secondary btn-block" onclick="openCity(event, 'Exectutive')" style=" color: black;border-radius:0px 10px 10px 0px;border: 1px solid black;background: #c7bfe6; font-weight:bold!important;">Executive</button>
            </div>
        </div>
    </div>
</div>

<div id="student" class="tabcontent">
  <div class="container">
            <div class="row">
            <!--     <div class="col-md-3"></div> -->
                <div class="col-md-12">
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
            <!--     <div class="col-md-3"></div> -->
            </div>
        </div>
</div>

<div id="Exectutive" class="tabcontent">

 <div class="container">
            <div class="row">
             <!--    <div class="col-md-3"></div> -->
                <div class="col-md-12">
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
             <!--    <div class="col-md-3"></div> -->
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    var url_string = window.location.href;
    var url = new URL(url_string);
    var b = url.searchParams.get("status");
    if(b==1){
       swal("Success!", "Login successfully!", "success");
     }else if(b==0){
       swal("Opps!", "Please Try Again!", "error");    
        }
</script>