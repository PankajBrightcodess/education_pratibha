<?php 
session_start();
include '../connection.php';
$msg = "";
	if (isset($_SESSION['msg'])) {
		$msg = $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	if($msg != ""){
		echo "<script> alert('$msg') </script>";
	}
	// print_r($_SESSION['role']);die;
	if(empty($_SESSION['enroll_id'])){
		header('location:../studentlogin.php');
	}
  
?>
<?php include 'header-links.php'; ?>


<?php  
function url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    }else{
        $protocol = 'http';
    }
   $re_id =  $_SESSION['enroll_id']; 
  if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST']=='localhost'){
     $myurl =   $protocol . "://" . $_SERVER['HTTP_HOST']."/education_pratibha/android/student_reg.php?refid=STD_".$re_id;
  }else{
     $myurl = "https://educollectionpratibhadarpan.com/android/student_reg.php?refid=STD_".$re_id; 
  }
  return $myurl;
}

$base = url();
?>

<?php include 'header.php'; ?>
<section class="blank-course "></section>
       <?php             
          $sql = "SELECT * FROM `homework` WHERE `status`='1' GROUP BY `pid` DESC";
          $res = mysqli_query($conn, $sql);
          while($data = mysqli_fetch_assoc($res)){
           $homework[] = $data;
          }

         ?>
<style type="text/css">
  .banner-bottom i{
    font-size:30px;
    text-shadow:2px 2px 4px #000000;
  }
  
 .share_button_des{
      background: #3e34aa;
    /* width: 48%; */
    border-radius: 100%;
    padding: 22px;
    border: 4px solid #5b5bcd;
 }

 .botton_text{
font-weight: 500;font-size: 14px;
 }
</style>

 <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->


<section class=" banner-bottom" >
  <div class="container">
    <div class="row dashboard1">
      <div class="col-4 ">
        <a href="dashboard.php">
       <img src="../../images/app/01.png">
           </a>
      </div>
      <div class="col-4"><a href="user_profile.php"><img src="../../images/app/02.png" >
             </a></div>
      <div class="col-4"><a href="onlineexamlist.php"> <img src="../../images/app/03.png" >
              </a></div>
    </div>
    <div class="row dashboard">
      <div class="col-4"><a href="winner-list.php"> <img src="../../images/app/04.png" >
              </a></div>
      <div class="col-4">
        <a href="pay.php"> <img src="../../images/app/05.png" >
         </a>
      </div>
     
      <div class="col-4">
         <a href="logout.php"> <img src="../../images/app/06.png" > </a>
      </div>
    </div>
    <div class="row mt-4">  
       <div class="col-4">
       <span  class="btn  share_button_des " id="sub40"> <i  class="fa fa-share" style="color:white;"> </i> </span> <br>
       <span class="botton_text"> Share </span> 
      </div>

    <!--   <div class="col-6">
      <span  class="btn  share_button_des" id="sub450" >  <i  class="fa fa-share" style="color:white;"> </i> </span> <br>
        <span class="botton_text"> 1 Year Subscription </span> 
      </div> -->
    </div>
   
    </div>
</section>
               
<section class="page">
    <div class="container-fluid">

     <!--  <div class="row menu">
        <div class="col-6"><a href="dashboard.php"><i class="fa fa-home" aria-hidden="true"></i>Dashboard</a></div>
        <div class="col-6"><a href="user_profile.php"><i class="fa fa-sign-in-alt"></i>Profile</a></div>
        <div class="row" style="margin-left: 3px;">
          <div class="col-6"><a href="paid_course.php"><i class="fa fa-book"></i>Online Test</a></div>
           <div class="col-6"><a href="winner-list.php"><i class="fa fa-medal"></i>Winner List</a></div>
            <div class="row">
          <div class="col-12" style="margin-left: 15px;"><a href="logout.php"><i class="fa fa-star" aria-hidden="true"></i>Logout</a></div>
        </div>
        </div>
       </div> -->
      <div class="row">
        <?php 
          if(!empty($homework)){
            foreach ($homework as $key => $value) {
                ?>
               <div class="container">
                 <div class="col-md-12 mb-3">
                  <div class="card">
                   <div class="card-header bg-secondary text-light text-center"><span><strong>Homework</strong></span></div>
                    <div class="card-body">
                      <div class="row">
                       <div class="col-md-9 col-9 mb-5">
                          <h6>Homework Name: <?php echo $value['name'];?> <br>(<?php echo $value['date'];?>) <br> <a href='<?php echo $value['link'];?>' target="_blank">Youtube Link </a>  </h6>

                       </div>
                       
                       <div class="col-md-3 col-3"> 
                         <a href="../../adminpanel/uploads/homework/<?php echo $value['assessment']; ?>" target="_blank">
                         <i class="fa fa-file-pdf-o" style="font-size:48px;color:red"></i></a>          
                       </div>
                          <div class="col-3 col-md-3" style="font-size: 10px;"><strong></strong></div>
                          <div class="col-6 col-md-3 dashcard" style="font-size: 10px;"><strong > Student Name: <?= $_SESSION['name']; ?> </strong></div>
                          <div class="col-2 col-md-3" style="font-size: 10px;"><strong></strong></div>
                    </div>
                  </div>
                  </div>
                </div>
               </div>
              <?php
            }
          }
        ?>
    </div>
  </section>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
    var url_string = window.location.href;
    var url = new URL(url_string);
    var b = url.searchParams.get("statuss");
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