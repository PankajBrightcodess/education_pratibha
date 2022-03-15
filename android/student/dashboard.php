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
	if(empty($_SESSION['enroll_id'])){
		header('location:../studentlogin.php');
	}
?>
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 dashboard mb-3">
				<h4 style="color:#403226; margin-top: 2rem; text-align: center;"><?php print_r($_SESSION['name'])?></h4>
			</div>
		</div>
		<div class="row">

        </div>
	</div>
</section>
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>