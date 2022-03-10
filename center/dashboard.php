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
		header('location:../centrelogin.php');
	}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include '../admin/header-links.php'; ?>
	<title>Admin Login | Shivanya Computer Education</title>
</head>
<body style="background:#e8e7e5;">
<?php include 'menu.php'; ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12 dashboard mb-3">
				<h1 style="color:#403226; margin-top: 2rem; text-align: center;"><?php print_r($_SESSION['name'])?></h1>
			</div>
		</div>
		<div class="row">

        </div>
	</div>
</section>
	<?php include '../admin/footer-links.php'; ?>
</body>
</html>