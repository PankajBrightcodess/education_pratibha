<?php
error_reporting(0);
session_start();
include '../connection.php';
    if(empty($_SESSION['enroll_id'])){
    header('location:../studentlogin.php');
  }  
  $id=$_SESSION['enroll_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="bootstrap/css/modern-business.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="bootstrap/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css" />

<script src="jquery-3.1.0.js"></script>
<title>Fee Details</title>
<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin:0;  /* this affects the margin in the printer settings */
}
@media print{
    #buttons{
            display:none;
        }
    #invoice{
    width: 720px;
   
    margin-top:-170px;
    margin-right: 40px;
  }
    }
</style>
</head>

<body>
    <div class="container">
     <div class="row" style="margin-top:50px;">
       <div class="col-md-12 mb-5">
            <center>
                <strong><font size="+2">Pratibha Darpan</font></strong><br />
                <strong><font size="+1">Ranchi , SHOPPING CENTRE , SHOP NO - 24 , jharkhand</font></strong><br />
                <strong><font size="+1">Ranchi – 827012(Jharkhand)</font></strong><br />
                <strong><font size="+1">An ISO 9001:2015 Certified institute</font></strong><br />
            </center>
       </div><!-- col-md-12 closed -->
     </div><!-- End of row-->
 
     <div class="row">
      <div class="col-md-1 mb-5"></div>
       <div class="col-md-7">
          <center> <table border="1" width="100%" height="100px">
             <thead bgcolor="#D6C9C9">
                <th  style="text-align:center;"><font size="+1">Name</font></th>
                <th  style="text-align:center;"><font size="+1">Payment Id</font></th>
                <th  style="text-align:center;"><font size="+1">Payment</font></th>
                <th  style="text-align:center;"><font size="+1">Status</font></th>
                    
             </thead>
             <?php 
            
              $query="SELECT * FROM `student` WHERE `id`='$id'";
              $run=mysqli_query($conn,$query);
              // echo '<pre>';
              // print_r($);die;
             
              while ($data=mysqli_fetch_assoc($run)) {
                         $onlinetest[]=$data;
                   }
                   if(!empty($onlinetest)){
                    foreach ($onlinetest as $key => $value) {
                        // code...
                   
   
              ?>

             <tr style="text-align:start;" valign="middle">
               <td style="text-align:center;"><?php echo $value['name'];?></td>
               <td style="text-align:center"><?php echo $value['payment_id'];?></td>
               <td style="text-align:center"><?php echo $value['amount'].'/-';?></td>
               <td style="text-align:center"><?php echo 'Success';?></td>
             </tr>
        <?php
         }
                   }
                   ?>
               
           </table></center>
       </div><!-- col-md-12 closed -->

      <div class="col-md-1"></div>
     </div>
     <br /><div id="buttons">
     <center>
      <button type="button" class="btn btn-danger" onclick="window.print();" >Print</button>
     <a href="index.php"><button type="button" onclick="closeThis('<?php echo $pre; ?>');" class="btn btn-default">Close</button></a>
     </center></div>
   </div><!-- coantainer closed-->
<script>
  var a=$("#content").val();
 // alert(a);
 
 function closeThis(data){
     page=data;
     if(page==""){
         window.location="caste_wise_report.php?pagename=caste-report";
     }
     else{
         window.location="caste_wise_report.php?pagename=caste-report&caste=<?php echo $caste; ?>";
     }
 }
</script>
</body>
</html>