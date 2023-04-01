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

<?php include 'header-links.php'; ?>

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

 .notice{
  background-color: #f43131;
    /* padding: -5px 3px 3px 3px; */
    /* margin: 3px 3px 3px 3px; */
    border-radius: 31px;
    position: relative;
    top: -20px;
    color: black;
}

</style>

 <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
 <?php 

$date = date('Y-m-d');
$id =  $_SESSION['enroll_id']; 


$noti_query =  "SELECT * FROM `add_notice` ORDER BY `id` DESC LIMIT 1";
$noti_run = mysqli_query($conn,$noti_query);
$notification = mysqli_fetch_assoc($noti_run);
$last_notification_id = $notification['id'];

$view_noti_query =  "select * from `view_notification` where `sid` = '$id'";
$view_noti_run = mysqli_query($conn,$view_noti_query);
$is_ok = mysqli_num_rows($view_noti_run); 


if($is_ok == 0 ){
 $view_insert_query = "INSERT INTO `view_notification` (`sid`, `viewed`, `viewed_at`) VALUES ('$id', '0', '$date')"; 
 $view_insert_run  = mysqli_query($conn,$view_insert_query);
 $total_viwed = 0;
}else{
  $view_notice = mysqli_fetch_assoc($view_noti_run);
  $total_viwed = $view_notice['viewed'];
}

$not_viewed_notice = $last_notification_id - $total_viwed;

?>

<section >
  <div class="container">
    <div class="row">
      <div class="col-4 ">
        <a href="dashboard.php">
          <img src="../../images/app/01.png" width="80px;">
              </a>
      </div>
      <div class="col-4"><a href="user_profile.php"><img src="../../images/app/02.png" width="80px;">
              </a></div>

               <div class="col-4"><a href="winner-list.php"><img src="../../images/app/04.png" width="80px;">
              </a></div>
      
    </div>
    <br>
      <div class="row">

     
              <div class="col-4"><a href="onlineexamlist.php"><img src="../../images/app/03.png" width="80px;">
              </a></div>
              <div class="col-4">
                 <a href="pay.php"><img src="../../images/app/05.png" width="80px;">
                 </a>
            </div>
           <div class="col-4">
             <a href="logout.php"><img src="../../images/app/06.png" width="80px;"></a>
           </div>

           
       <div class="col-4 mt-3">
       <span  class="btn  share_button_des" id="sub40"> <i  class="fa fa-share" style="color:white;font-size: 30px;"> </i> </span> <br>
       <span class="botton_text"> Share </span> 
      </div>


      <div class="col-4 mt-3">
      <a href="all_notificaton.php"> <span  class="btn  share_button_des" >  <i  class="fa fa-bell" style="color:white;font-size: 30px;"> </i>
      <?php if($not_viewed_notice != 0){ ?>
       <span class="notice"> <?php echo $not_viewed_notice; ?> </span>
       <?php } ?>
      </span> </a>  <br>
       <span class="botton_text"> Notification </span> 
      </div>

         <!--   <div class="col-6">
             <span  class="btn  share_button_des" id="sub450" >  <i  class="fa fa-share" style="color:white;"> </i> </span> <br>
             <span class="botton_text"> 1 Year Subscription </span> 
         </div> -->

    </div>
      
   
   
    </div>


    </div>
</section>
               
<section class="page">
    <div class="container-fluid">


    <br>
    <br>
      <div class="row">
        <?php 
          if(!empty($homework)){
            foreach ($homework as $key => $value) {
                ?>
               <div class="col-md-9 mb-3">
                  <div class="card">
                   <div class="card-header bg-secondary text-light text-center"><span><strong>Homework</strong></span></div>
                    <div class="card-body">
                      <div class="row">
                       <div class="col-md-9 col-9 mb-5">
                          <h6>Homework Name: <?php echo $value['name'];?> <br>(<?php echo $value['date'];?>)</h6>
                       </div>
                       
                       <div class="col-md-3 col-3"> 
                    	<a href="../../adminpanel/uploads/homework/<?php echo $value['assessment']; ?>" target="_blank">
                    		<i class="fa fa-file-pdf-o" style="font-size:48px;color:red"></i></a>
                      <!--  <iframe src="../executive/uploads/homework/<?php echo $value['assessment']; ?>"><i class="fa fa-file-pdf-o" style="font-size:48px;color:red"></i></iframe> -->
                          
                      </div>
                          <div class="col-3" style="font-size: 10px;"><strong></strong></div>
                          <div class="col-6" style="font-size: 10px; margin-bottom: -50px;"><strong >Student Name: <?= $_SESSION['name']; ?></strong></div>
                          <div class="col-2" style="font-size: 10px;"><strong></strong></div>
                    </div>
                  </div>

                </div>
              </div>

                <?php
            }
          } ?>
    </div>
  </section>



<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>
<script type="text/javascript">
      var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("status");
    if(c==1){
       swal("Payment!", "Payment successfully!", "success");
     }else if(c==0){
       swal("Opps not payment!", "Something Error !", "error");     }
</script>
<script type="text/javascript">
      var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("statuss");
    if(c==1){
       swal("Success!", "successfully!", "success");
     }else if(c==0){
       swal("Opps!", "Something Error !", "error");     }


    
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

