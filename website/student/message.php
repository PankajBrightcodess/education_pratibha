<?php
session_start();
include '../connection.php';
    if(empty($_SESSION['enroll_id'])){
    header('location:../studentlogin.php');
  }   
?>
<?php include 'header-links.php'; ?>

<?php include 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
    .animate-charcter
{ background-color: white;
   text-transform: uppercase;
  background-image: linear-gradient( -225deg, #dc3545 53%, #44107a 29%, #ff1361 45%, #fff800 100% );
  background-size: auto auto;
  background-clip: border-box;
  background-size: 200% auto;
  color: #fff;
  background-clip: text;
  text-fill-color: transparent;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: textclip 2s linear infinite;
  display: inline-block;
      font-size: 30px;
      font-weight: 900px;
}
@keyframes textclip {
  to {
    background-position: 200% center;
  }
}

</style>
<section style="padding-top: 150px;">
    <div class="container">
        
       <div class="col-md-12">
            <h1 class="text-center animate-charcter">
            Your Test Already Completed Please Select Other Test
        </h1>
        <a href="dashboard.php" class="btn btn-lg" style="background: #222279;">Go To Dashboard</a>
       </div>
    </div>
    



</section>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>