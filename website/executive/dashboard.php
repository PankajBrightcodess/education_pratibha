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
<!-- <style type="text/css">
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
</style> -->
<style type="text/css">
  .mar{
  margin-top: 24px;
 }
</style>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
<section class=" banner-bottom-executive" >
  <div class="container">
    <div class="row dashboard1">
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
<!-- <section>
	<div class="container">
     <div class="row menu">
      <div class="col-4"><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i></a></div>
      <div class="col-4"><a href="studentlist.php"><i class="far fa-address-book" style="color:blue; text-align:center; margin-left: 40px;"></i></a></div>
      <div class="col-4"><a href="logout.php"><i class="fa fa-sign-in-alt" style="color:red; float: 	right;" aria-hidden="true"></i></a></div>
    </div>
		<div class="row">
			<div class="col-md-12 dashboard mb-3">
				<h4 style="color:#403226; margin-top: 2rem; text-align: center;"><?php print_r($_SESSION['name'])?>
					
				</h4>

                <form  action="action.php" id="form_data" enctype="multipart/form-data" method="post">
                	<div class="col-md-12 mb-2">
                		
                		<input type="hidden" name="executive_id" value="<?php echo $_SESSION['id']; ?>">
                	</div>
           
                        <div class="col-md-12 mb-2">
                          <label>Upload Pdf.<span style="color:red;">*</span></label>
                          <input type="file" name="assessement" id="assessement" class="form-control" required="" >      
                        </div>
                          <button class="btn btn-info btn-sm btn-block formdata" type="submit" name="add_homework" style="margin-top: 10px;">Save</button>
                </form>

			</div>
		</div>

   
		
	</div>
</section> -->
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>