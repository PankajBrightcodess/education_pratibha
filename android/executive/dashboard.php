<?php 
session_start();
$msg = "";
	if (isset($_SESSION['msg'])) {
		$msg = $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	if($msg != ""){
		echo "<script> alert('$msg') </script>";
	}
	// print_r($_SESSION['role']);die;
	if($_SESSION['role']!='2'){
		header('location:../executivelogin.php');
	}
?>
<?php include 'header-links.php'; ?>
<style type="text/css">
  .menu{
    margin-top: -28px;
    padding: 22px;
    margin-left: 0px;
    width: 100%;
    height: 70px;
    background-color: #fff;
    border-radius: 50px;
    box-shadow: 1px 3px 5px 0px;
    margin-bottom: 48px;
}
 .menu a{
  text-decoration: none;
  color: black;
  font-size:30px;
   
   /* text-shadow:2px 2px 4px #000000;*/
 }
 .mar{
  margin-top: 24px;
 }
</style>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
<section>
   <div class="container">
    <div class="row">
      <div class="col-4 ">
        <a href="dashboard.php">
          <img src="../../images/app/01.png" width="80px;">
              </a>
      </div>
      <div class="col-4"><a href="studentlist.php"><img src="../../images/app/student.png" width="80px;">
              </a></div>
               <div class="col-4"><a href="profile.php"><img src="../../images/app/02.png" width="80px;">
              </a></div>
             
               <div class="col-4 mar"><a href="setting.php"><img src="../../images/app/19.png" width="80px;">
              </a></div>
             
               <div class="col-4 mar"><a href="history.php"><img src="../../images/app/history.png" width="80px;">
              </a></div>

              <div class="col-4 mar"><a href="logout.php"><img src="../../images/app/06.png" width="80px;">
              </a></div>
      
    </div>
  
    
      
    </div>
	
</section>
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>