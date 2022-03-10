<?php 
session_start();
include '../admin/connection.php';
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
if(isset($_POST['studentlogin'])){
	// echo '<pre>';
	// print_r($_POST);die;
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$query="SELECT * FROM `student` WHERE `email`='$email' and `pass`='$pass'";
	$run=mysqli_query($conn,$query);
	$num=mysqli_num_rows($run);
	if($num){
		$data=mysqli_fetch_assoc($run);
		$_SESSION['enroll_no'] = $data['enroll_no'];
		$_SESSION['id'] = $data['id'];
		$_SESSION['std_name'] = $data['std_name'];
		$_SESSION['course'] = $data['course'];
		header('location:dashboard.php');		
	}
	else{
		$_SESSION['msg']='Invalid details !!!';
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
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
	$query="SELECT * FROM `student` WHERE `email`='$email'";
	$run=mysqli_query($conn,$query);
		$num=mysqli_num_rows($run);
		if($num){
		$data=mysqli_fetch_assoc($run);
		$_SESSION['id'] = $data['id'];
		$_SESSION['enroll_no'] = $data['enroll_no'];
		if(!empty($_SESSION['enroll_no'])){
			header('location:newpassword_student.php');
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

   if(isset($_POST['update_password_student'])){
   	// echo '<pre>';
   	// print_R($_POST);die;
		
		   if($_POST['new_pass']==$_POST['con_pass']){
		   	   $pass = $_POST['con_pass'];
				$id = $_SESSION['id'];
				$query="UPDATE `student` SET `pass`='$pass' WHERE `id`='$id'";
				$run=mysqli_query($conn,$query);
				if($run){
					 header('Location:index.php');
					$_SESSION['msg']="Password Updated Successfully !!!";	
				}
				else{
					$_SESSION['msg']="Password Not Updated!!!";
					header("location:$_SERVER[HTTP_REFERER]");
				}
			}
			else{
				$_SESSION['msg']="Please Enter Correct Password";
				header("Location: " . $_SERVER['HTTP_REFERER']);
			}
	}
	
   


   // ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''Center Area Start'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
   
?>