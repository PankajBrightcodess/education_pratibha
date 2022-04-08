<?php 
session_start();
include '../connection.php';
function Imageupload($dir,$inputname,$allext,$pass_width,$pass_height,$pass_size,$newname){
	// print_r($inputname);
	// print_r($_FILES["$inputname"]["tmp_name"]);die;
	if(file_exists($_FILES["$inputname"]["tmp_name"])){
		// do this contain any file check
		$file_extension = strtolower( pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
		$error="";
			// print_r($file_extension);die;
		if(in_array($file_extension, $allext)){
			// file extension check
			list($width, $height, $type, $attr) = getimagesize($_FILES["$inputname"]["tmp_name"]);
			$image_weight = $_FILES["$inputname"]["size"];
			if($width <= "$pass_width" && $height <= "$pass_height" && $image_weight <= "$pass_size"){
				// dimension check
				$tmp = $_FILES["$inputname"]["tmp_name"];
				$extension[1]="jpg";
				$name=$newname.".".$extension[1];
				if(move_uploaded_file($tmp, "$dir" .$name)){
					return true;
				}

			}
			else{
				$error .="Please upload photo size of $pass_width X $pass_height !!!";
			}
		}
		else{
			$error .="Please upload an image !!!";
		}
	}
	else{
		$error .="Please Select an image !!!";
	}
	return $error;
}
// '''''''''''''''''''''''''''''''''''''''
 if(isset($_POST['payment']))
   {  $id = $_SESSION['enroll_id'];
   	 $amount = $_POST['amount'];
   	 $added_on = date('Y-m-d');
	 $sql="UPDATE `student` SET `amount`='$amount',`pay-date`='$added_on' WHERE `id`='$id'";
				// print_r($query);die;
	 if (mysqli_query($conn,$sql)) {
		
       header('location:payment.php');
	 } else {
		// $_SESSION['msg']="Records Not Added !!!";
       header('header:registrationform.php');
	 }
   		
  }
if(isset($_POST['studentlogin'])){
	
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$query="SELECT * FROM `student` WHERE `email`='$email' and `password`='$pass'";
	$run=mysqli_query($conn,$query);
	$num=mysqli_num_rows($run);
	// print_r($num);die;
	if($num){
		$data=mysqli_fetch_assoc($run);
		// $_SESSION['enroll_no'] = $data['enroll_no'];
		$_SESSION['enroll_id'] = $data['id'];
		$_SESSION['name'] = $data['name'];
		$_SESSION['course'] = $data['course'];
		$_SESSION['role'] = $data['role'];
		$_SESSION['executive_id'] = $data['executive_id'];

		header('location:dashboard.php');		
	}
	else{
		// $_SESSION['msg']='Invalid details !!!';
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
}

if(isset($_POST['online_text_paid'])){
	// $course = $_POST['course'];
	$amount = $_POST['amount'];
	$id = $_POST['id'];
	if(!empty($id)){
		$query="SELECT * FROM `student` WHERE `id`='$id'";
        $run=mysqli_query($conn,$query);
        $data=mysqli_fetch_assoc($run);
        $name = $data['name'];
        $mobile = $data['mobile'];
        $email = $data['email'];
        $student_id = $data['id'];
        $added_on =date('Y-m-d');
        $length = 15;
        $request_no=substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
        $query="INSERT INTO `paid_student`(`name`,`student_id`,`mobile`,`email`,`added_on`,`amount`,`request_no`) VALUES ('$name','$student_id','$mobile','$email','$added_on','$amount','$request_no')";
			if(mysqli_query($conn,$query)){
			$_SESSION['last_ins_id']=$conn->insert_id; 
				header('location:../payment.php');
					
			}
			else{
				$_SESSION['msg']="Not added result !!!";
				header("Location:$_SERVER[HTTP_REFERER]");
			}

	}else{
		header('Location:studentlogin.php');
	}
}

if(isset($_POST['change_student_exe'])){
	    // print_r($_POST);die;
	   	$email = $_POST['email'];
		$query="SELECT * FROM `student` WHERE `email`='$email' AND `role`='3'";
	// print_r($quy);die;
		$run=mysqli_query($conn,$query);
			$num=mysqli_num_rows($run);
			if($num){
			$data=mysqli_fetch_assoc($run);
			$_SESSION['id'] = $data['id'];
			$_SESSION['role'] = $data['role'];
			if($_SESSION['role']==3){
				echo '1';
			}
			else{
				echo '0';
			}
			 }	
			else{
				 // $_SESSION['msg']="Please Enter Correct Email id";
				header("Location: " . $_SERVER['HTTP_REFERER']);
			}
   }

   if(isset($_POST['update_password_student'])){
		   if($_POST['new_pass']==$_POST['con_pass']){
		   	   $pass = $_POST['con_pass'];
				$id = $_SESSION['id'];
				$otp ='';
				$query="UPDATE `student` SET `password`='$pass' WHERE `id`='$id'";
				// print_r($query);die;
				$run=mysqli_query($conn,$query);
				$query="UPDATE `student` SET `otp`='$otp' WHERE `id`='$id'";
		    $sql=mysqli_query($conn,$query);
				if($run){
					echo '1';	 
				}
				else{
					$msg = "Not updated !";
					echo $msg; 
				}
			}
			else{
				    $msg = "Password Not Match !";
					echo $msg; 
				// header("Location: " . $_SERVER['HTTP_REFERER']);
			}
	}
	if(isset($_POST['deleteotp'])){
		$id = $_SESSION['id'];
		$otp ='';
		$query="UPDATE `student` SET `otp`='$otp' WHERE `id`='$id'";
		$sql=mysqli_query($conn,$query);
	}


if(isset($_POST['resultupload'])){
	
		$enroll=$_POST['enroll'];
		$course=$_POST['course'];
		$name=$_POST['name'];
		$center_id=$_POST['center_id']; 
		$added_on=date('Y-m-d');
		$photo = $_FILES['upload_image']['name'];
		$photo = explode('.',$photo);
		$image= time().$photo[0];
		$imagename = $_FILES['upload_image']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['upload_image']['tmp_name']);
		$dir="../upload/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check = Imageupload($dir,'upload_image',$allext,"1800000","1800000",'100000000',$image);	
			// print_r($check);die;
		if($check===true){
			$image = $image.".jpg";	
			$query="INSERT INTO `result`(`enroll`,`course`,`name`,`upload_image`,`added_on`,`center_id`) VALUES ('$enroll','$course','$name','$image','$added_on','$center_id')";
			$sql=mysqli_query($conn,$query);
			if($sql){
				 header("Location:$_SERVER[HTTP_REFERER]");
				$_SESSION['msg']="Successfully Added!!!";	
			}
			else{
				$_SESSION['msg']="Not added result !!!";
				header("Location:$_SERVER[HTTP_REFERER]");
			}
		}
		else{
			$_SESSION['msg']=$check;
			header("location:$_SERVER[HTTP_REFERER]");	
		}
}


if(isset($_POST['del_result'])){
		
	$id = $_POST['id'];	
	$query="DELETE FROM `result` WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
		 header('Location:uploadresult.php');
		$_SESSION['msg']="Center Deleted Successfully !!!";	
	}
	else{
		$_SESSION['msg']="Center Not Deleted!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
   }


   if(isset($_POST['change_student_pass'])){
   	// print_r($_POST);die;
   	   $email = $_POST['email'];
   	   $otp = rand(100000, 999999);
	$query="SELECT * FROM `student` WHERE `email`='$email'";
	$run=mysqli_query($conn,$query);
		$num=mysqli_num_rows($run);
		if($num){
			$data=mysqli_fetch_assoc($run);
			$_SESSION['id'] = $data['id'];
			$_SESSION['enroll_no'] = $data['enroll_no'];
			$id = $_SESSION['id'];
			if(!empty($_SESSION['id'])){
				$message = "your one time email verification" . $otp;
				$sub = "Forget Password From Pratibha Darpan";
				$headers = "From: hupukumar395@gmail.com" . "\r\n" .
	                 "CC: hupukumar395@gmail.com";
				
	      $query="UPDATE `student` SET `otp`='$otp' WHERE `id`='$id'";
				    $sql=mysqli_query($conn,$query);   
				if($sql){
					$retval = mail($email,$sub,$message,$headers);
					$_SESSION['msg']="Otp Send On Mail !";
					// header('location:newpassword_student.php');
						echo "1";
				}
				else{
			     $_SESSION['msg']="Otp Not Sent On Mail!!!";
			     header("location:$_SERVER[HTTP_REFERER]");
				}
				
			}
			else{
				$_SESSION['msg']="Please Enter Correct Email id";
				header("Location: " . $_SERVER['HTTP_REFERER']);
			}
		 }	
		else{
			$_SESSION['msg']="Please Enter Correct Email id";
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
   }

 //   if(isset($_POST['update_password_student'])){
 //   	// echo '<pre>';
 //   	// print_R($_POST);die;
		
	// 	   if($_POST['new_pass']==$_POST['con_pass']){
	// 	   	   $pass = $_POST['con_pass'];
	// 			$id = $_SESSION['id'];
	// 			$query="UPDATE `student` SET `password`='$pass' WHERE `id`='$id'";
	// 			$run=mysqli_query($conn,$query);
	// 			if($run){
	// 				 header('Location:index.php');
	// 				$_SESSION['msg']="Password Updated Successfully !!!";	
	// 			}
	// 			else{
	// 				$_SESSION['msg']="Password Not Updated!!!";
	// 				header("location:$_SERVER[HTTP_REFERER]");
	// 			}
	// 		}
	// 		else{
	// 			$_SESSION['msg']="Please Enter Correct Password";
	// 			header("Location: " . $_SERVER['HTTP_REFERER']);
	// 		}
	// }
	
   


   // ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''Center Area Start'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
   
?>