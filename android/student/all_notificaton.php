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
    $sql = "SELECT * FROM `add_notice` WHERE `status`='1' GROUP BY `id` DESC";
    $res = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_assoc($res)){
     $notice[] = $data;
    }
  ?>

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

if($is_ok == 0){
 $view_insert_query = "INSERT INTO `view_notification` (`sid`, `viewed`, `viewed_at`) VALUES ('$id', '0', '$date')"; 
 $view_insert_run  = mysqli_query($conn,$view_insert_query);
 $view_notice = 0;
}else{
  $view_notice = mysqli_fetch_assoc($view_noti_run);
  $total_viwed = $view_notice['viewed'];
}

if($last_notification_id !=  $total_viwed){
  $update_viewed_query = "UPDATE `view_notification` SET `viewed` = '$last_notification_id' WHERE `view_notification`.`sid` = $id";
  $update_viewed_run = mysqli_query($conn,$update_viewed_query);

}


?>


<?php include 'header-links.php'; ?>
<style>
.page{
  min-height: 20rem;
}
</style>

<?php include 'header.php'; ?>
<section class="blank-course "></section>
<section class="page">
    <div class="container">
     
      <div class="row justify-content-center mb-5">
        <?php 
          if(!empty($notice)){
            $i = 0;
            foreach ($notice as $key => $value) { $i++;
                ?>
               <div class="col-md-9 col-12">
                 <h5 style="color:black;"> <?php  echo $i; ?> :  <?php  echo $value['notice']; ?>  </h5>
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
 
 
</script>