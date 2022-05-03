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

<?php include 'header.php'; ?>
<section class="blank-course "></section>

<style type="text/css">
  .banner-bottom i{
    font-size:30px;
   
    text-shadow:2px 2px 4px #000000;
  }
  
</style>

 <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <section style="background:#182458;margin-top: -33px; padding-top: 12px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-1">
            <a href="dashboard.php"><i class='fas fa-arrow-left' style='font-size:24px; color: white;'></i></a>
          </div>
          <div class="col-9">
            <h4 style="color:white">Settings</h4>
          </div>
          <div class="col-1">
           <a href="action.php?settinglogout=<?php echo $_SESSION['enroll_id']; ?>"><i class="fa fa-power-off" style="font-size:24px; color: white;"></i></a>
          </div>
        </div>
      </div>
    </section>
    <section> 
      <div class="container-fluid" >
        <div class="row" style="background:#dedede;">
          <div class="col-12">
            <?= $_SESSION['name']; ?>
          </div>
        </div>
      </div>
    </section>


    <section style="padding-top:30px;padding-bottom: 11px;">
      <div class="container-fluid">
        <h5 style="color:#ec870f">Change Password</h5>
        <div class="row">
          <form method="POST" action="">
            <div class="col-12">
              <input type="hidden" name="ids" id="ids" value="<?= $_SESSION['enroll_id']; ?>">
              <input type="text" name="current_password" id="current_password" placeholder="Current Password" class="form-control" style="margin-bottom:10px">
            </div>
            <div class="col-12">
              <input type="text" name="new_password" id="new_password" placeholder="New Password" class="form-control" style="margin-bottom:10px">
            </div>
             <div class="col-12">
              <input type="text" name="confirm_new_password" id="confirm_new_password" placeholder="Confirm New Password" class="form-control" style="margin-bottom:10px">
            </div>
            <div class="col-12">
             <!--  <buttton class="btn btn-block" style="color: #06bebe;" type="submit" name="setting_change_password">Submit</buttton> -->
               <!-- <a href="" type="submit" name="setting_change_password"><img src="../../images/submit.jpg" width="100%"></a> -->
               <button type="button" name="setting_change_password" class="setting_password" style="border:none; background:#9ad9ea"><img src="../../images/submit.jpg" width="100%"> </button>
            </div>
          </form>
        </div>
      </div>
    </section>





<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>
<script type="text/javascript">
  $('body').on('click','.setting_password',function(){
      // debugger;
       var id=$('#ids').val();
       var current_password=$('#current_password').val();
         var new_password=$('#new_password').val();
         var confirm_new_password=$('#confirm_new_password').val();
         
        $.ajax({
                type:'POST',
                url:'action.php',
                data:{id:id,current_password:current_password,new_password:new_password,confirm_new_password:confirm_new_password,setting_change_password:'setting_change_password'},
                success: function(result){
                  // alert(result);
                    // console.log(result);
                    if(result == 1){
                
                        swal("Good job!", "Updated Successfully!", "success");
                        window.location.href = "../studentlogin.php";
                     
                    }
                    else{
                          swal("Opps!", "Something Error!", "error");
                          window.location.href = "setting.php";
                         
                    }
                      
                 },
                    error: function(){ 
                       swal("Opps!", " updated Error!", "error");
                    },
        });
    return false;  
    });
</script>