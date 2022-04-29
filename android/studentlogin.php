 <?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>

 <section class="login" style="margin-top: 15rem;">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="login-form" style="background: #305474; padding:15px; border-radius: 15px;">
                        <div class="logo-section">
                            <h1 style="font-size: 35px; text-align:center; color: white;">Student Login</h1><hr>
                        </div>
                        <form action="student/action.php" method="POST">
                            <div class="form-group">
                                <!-- <i class="fa fa-envelope-square fa-lg passkey"></i> -->
                             <input type="email" name="email" placeholder="Enter User Id:" class="form-control" required="" style="padding-left: 30px;"> 
                             </div>
                            <div class="form-group">
                                <!-- <i class="fa fa-key fa-lg passkey"></i> -->
                              <input type="password" name="pass" placeholder="Enter Password:" class="form-control" required="" style="padding-left: 30px;">
                            </div>
                            <div class="form-group mb-5">
                                <input type="submit" class="btn btn-warning form-control" name="studentlogin" value="Login">
                                <label style="color:white;float:right; padding:10px;"><a href="forget_password_student.php" style="color:white">forgot password</a></label>
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