<?php 
session_start();
include 'connection.php';
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

//////pdf upload
function Pdfupload($dir,$inputname,$allext,$pass_width,$pass_height,$pass_size,$newname){
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
				$extension[1]="pdf";
				$name=$newname.".".$extension[1];
				if(move_uploaded_file($tmp, "$dir" .$name)){
					return true;
				}

			}
			else{
				$error .="Please upload pdf size of $pass_width X $pass_height !!!";
			}
		}
		else{
			$error .="Please upload an pdf !!!";
		}
	}
	else{
		$error .="Please Select an pdf !!!";
	}
	return $error;
}
// '''''''''''''''''''''''''''''''''''''''
if(isset($_POST['studentregister'])){
	// echo '<pre>';
	// print_r($_POST);die;
	$username = $_POST['username'];
	$applicantname = $_POST['applicantname'];
	$email = $_POST['email'];
	$con_email = $_POST['con_email'];
	$password = $_POST['password'];
	$con_password = $_POST['con_password'];
	$mobile = $_POST['mobile'];
	$con_mobile = $_POST['con_mobile'];
	$added_on = date('Y-m-d');
	$query="SELECT * FROM `student_register` WHERE `email`='$email'";
	$run=mysqli_query($conn,$query);
	$num=mysqli_num_rows($run);
	if($num){
		$_SESSION['msg']='You have Already Registered !';
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}else{
		if($email==$con_email && $password==$con_password && $mobile==$con_mobile){
			$query="INSERT INTO `student_register`(`username`,`student_name`,`email`,`password`,`mobile`,`added_on`) VALUES ('$username','$applicantname','$email','$password','$mobile','$added_on')";
			$sql=mysqli_query($conn,$query);
			if($sql){
				header("Location:index.php");
				$_SESSION['msg']="Successfully Added!!!";	
			}
			else{
				$_SESSION['msg']="Not added !!!";
				header("Location:$_SERVER[HTTP_REFERER]");
			}
		}
		else{
			    $_SESSION['msg']="Something Error !!!";
			    header("Location:$_SERVER[HTTP_REFERER]");
		}
		
	}
}
if(isset($_POST['adminlogin'])){
	// echo '<pre>';
	// print_r($_POST);die;
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$query="SELECT * FROM `admin` WHERE `email`='$email' and `password`='$pass'";
	$run=mysqli_query($conn,$query);
	$num=mysqli_num_rows($run);
	if($num){
		$data=mysqli_fetch_assoc($run);
		// echo '<pre>';
		// print_r($data);die;
		$_SESSION['id'] = $data['id'];
		$_SESSION['name'] = $data['name'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['password'] = $data['password'];
		// $_SESSION['mobile'] = $data['mobile'];
		$_SESSION['role'] = $data['role'];
		header('location:dashboard.php');		
	}
	else{
		$_SESSION['msg']='Invalid details !!!';
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
}

if(isset($_POST['add_notice'])){

	$notice_id = $_POST['notice_id'];
	$notice_title = $_POST['notice_title'];
	$notice = $_POST['notice'];
	$principal_name= $_POST['principal_name'];
	$added_on = date('Y-m-d');
	$query="SELECT * FROM `student_register` WHERE `email`='$email'";
	$run=mysqli_query($conn,$query);
	$num=mysqli_num_rows($run);
	if($num){
	$query="INSERT INTO `principal_notice`(`notice_id`,`notice_heading`,`notice`,`principal_name`,`added_on`) VALUES ('$notice_id','$notice_title','$notice','$principal_name','$added_on')";
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
		$_SESSION['msg']='Notice Id Already Exist !';
		header("Location: ".$_SERVER['HTTP_REFERER']);
	}
}

if(isset($_POST['uploadfiles'])){
	
	$course=$_POST['course'];
	$photo = $_FILES['upload_image']['name'];
		$photo = explode('.',$photo);
		$image= time().$photo[0];
		$imagename = $_FILES['upload_image']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['upload_image']['tmp_name']);
		$dir="uploads/";
		$allext=array("pdf");
		$check = Pdfupload($dir,'upload_image',$allext,"1800000","1800000",'100000000',$image);
		if($check===true){
			$pdf = $image.".pdf";	
			$query="INSERT INTO `material_upload`(`course`,`upload_pdf`) VALUES ('$course','$pdf')";
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


if(isset($_POST['update_notice'])){
	// echo '<pre>';
	// print_r($_POST);die;
	$id = $_POST['id'];
	$notice_id = $_POST['notice_id'];
	$notice_title = $_POST['notice_title'];
	$notice = $_POST['notice'];
	$query="UPDATE `principal_notice` SET `notice_id`='$notice_id',`notice_heading`='$notice_title',`notice`='$notice' WHERE `id`='$id'";
				$run=mysqli_query($conn,$query);
				if($run){
					 header('Location:view_notice.php');
					$_SESSION['msg']="Notice Update Successfully !!!";	
				}
				else{
					$_SESSION['msg']="Notice Not Updated!!!";
					header("location:$_SERVER[HTTP_REFERER]");
				}
}

if(isset($_POST['del_notice'])){
	$id = $_POST['id'];	
	$query="DELETE FROM `principal_notice` WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
		 header('Location:view_notice.php');
		$_SESSION['msg']="Notice Deleted Successfully !!!";	
	}
	else{
		$_SESSION['msg']="Notice Not Deleted!!!";
		header("location:$_SERVER[HTTP_REFERER]");
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

   if(isset($_POST['add_test'])){
   	
   	$test_name = $_POST['test_name'];
   	$no_question = $_POST['no_question'];
   	$total_marks = $_POST['total_marks'];
   	$time_duration = $_POST['time_duration'];
   	$added_on = date('Y-m-d');
   	$query="INSERT INTO `test_master`(`test_name`,`no_question`,`total_marks`,`time_duration`,`added_on`) VALUES ('$test_name','$no_question','$total_marks','$time_duration','$added_on')";
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



    if(isset($_POST['submit_question'])){
    	// echo '<pre>';
    	// print_r($_POST);die;
    	$course = $_POST['course'];
    	$question = $_POST['question'];
    	$option_a = $_POST['option_a'];
    	$option_b = $_POST['option_b'];
    	$option_c = $_POST['option_c'];
    	$option_d = $_POST['option_d'];
    	$correct_ans = $_POST['correct_ans'];
    	$marks = $_POST['marks'];
    	$added_on = date('Y-m-d');

    	$query="INSERT INTO `online_question`(`course`,`question`,`option_a`,`option_b`,`option_c`,`option_d`,`correct_ans`,`marks`,`added_on`) VALUES ('$course','$question','$option_a','$option_b','$option_c','$option_d','$correct_ans','$marks','$added_on')";	
			$sql=mysqli_query($conn,$query);
			if($sql){
				 header("Location:$_SERVER[HTTP_REFERER]");
				$_SESSION['msg']="Question Successfully Added!!!";	
			}
			else{
				$_SESSION['msg']="Not added Question !!!";
				header("Location:$_SERVER[HTTP_REFERER]");
			}
    }


	// '''''''''''''''''Department area start''''''''''''''''''''''
	if(isset($_POST['add-department'])){

		$department = $_POST['department'];
		$added_on = date('Y-m-d');
		;
		$query="INSERT INTO `department_master`(`department`,`added_on`) VALUES ('$department','$added_on')";
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

	if(isset($_POST['add-duration'])){
		$department_id = $_POST['department_id'];
		$depart_duration = $_POST['depart_duration'];
		$added_on = date('Y-m-d');
		$query="INSERT INTO `duration_master`(`department_id`,`depart_duration`,`added_on`) VALUES ('$department_id','$depart_duration','$added_on')";
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

	if(isset($_POST['add-Student'])){
		// echo '<pre>';
		// print_r($_POST);die;
		$name = $_POST['name'];
		$father_name = $_POST['father_name'];
		$mother_name = $_POST['mother_name'];
		$mobile_no = $_POST['mobile_no'];
		$aadhar_no = $_POST['aadhar_no'];
		$email_id = $_POST['email_id'];
		$vill_city = $_POST['vill_city'];
		$post = $_POST['post'];
		$landmark = $_POST['landmark'];
		$dist = $_POST['dist'];
		$state = $_POST['state'];
		$pin = $_POST['pin'];
		$heighest = $_POST['heighest'];
		$department_id = $_POST['department_id'];
		$added_on = date('Y-m-d');
		$query="INSERT INTO `student`(`name`,`father_name`,`mother_name`,`mobile_no`,`aadhar_no`,`email_id`,`vill_city`,`post`,`landmark`,`dist`,`state`,`pin`,`heighest`,`department_id`,`added_on`) VALUES ('$name','$father_name','$mother_name','$mobile_no','$aadhar_no','$email_id','$vill_city','$post','$landmark','$dist','$state','$pin','$heighest','$department_id','$added_on')";
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

	if(isset($_POST['add-Faculty'])){
		// echo '<pre>';
		// print_r($_POST);die;
		$name = $_POST['name'];
		$mobile_no = $_POST['mobile_no'];
		$alt_mobile = $_POST['alt_mobile'];
		$aadhar_no = $_POST['aadhar_no'];
		$email_id = $_POST['email_id'];
		$panno = $_POST['panno'];
		$vill_city = $_POST['vill_city'];
		$post = $_POST['post'];
		$landmark = $_POST['landmark'];
		$dist = $_POST['dist'];
		$state = $_POST['state'];
		$pin = $_POST['pin'];
		$heighest = $_POST['heighest'];
		$passing_date = $_POST['passing_date'];
		$rank = $_POST['rank'];
		$department_id = $_POST['department_id'];
		$added_on = date('Y-m-d');
		$query="INSERT INTO `faculty`(`faculty_name`,`mobile_no`,`alt_mobile`,`aadhar`,`email`,`pan_no`,`village`,`post`,`landmark`,`dist`,`state`,`pin`,`highest`,`passing_date`,`grade`,`department_id`,`added_on`) VALUES ('$name','$mobile_no','$alt_mobile','$aadhar_no','$email_id','$panno','$vill_city','$post','$landmark','$dist','$state','$pin','$heighest','$passing_date','$rank','$department_id','$added_on')";
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
	
   


   // ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''Center Area Start'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
   
?>