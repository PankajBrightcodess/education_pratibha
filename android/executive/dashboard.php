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

<?php  

function url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }else{
        $protocol = 'http';
    }
   $exe_id =  $_SESSION['exe_id']; 
  if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='localhost'){
     $myurl =   $protocol . "://" . $_SERVER['HTTP_HOST']."/education_pratibha/android/student_reg.php?refid=EXC_".$exe_id;
  }else{
     $myurl = "https://educollectionpratibhadarpan.com/android/student_reg.php?refid=STD_".$exe_id; 
  }
  return $myurl;
}
$base = url();

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

<style type="text/css">

 .share_button_des{
      background: #3e34aa;
    /* width: 48%; */
    border-radius: 100%;
    padding: 27px;
    border: 4px solid #5b5bcd;
 }

 .botton_text{
font-weight: 500;font-size: 14px;
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
      
    
       <div class="col-4 mt-3">
       <span  class="btn  share_button_des " id="sub40"> <i  class="fa fa-share" style="color:white;"> </i> </span> <br>
       <span class="botton_text"> Share </span> 
      </div>

    </div>
  
    
      
    </div>
	
</section>
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>
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

 
   $('body').on('click','#sub40',function(){
      var link=  '<?php echo $base.""; ?>';
      var name=$(this).attr('data-name');
      if (navigator.share) {
      navigator.share({
        title: '<?php echo "Education PRATIBHA DARPAN"; ?>',
        text: 'Hii '+name+', Thanks For Purchase !! To Check Your Purchase Detail Click Here -',
        url: link,
      })
        .then(() => console.log('Successful share'))
        .catch((error) => console.log('Error sharing', error));
     }
   });


</script>