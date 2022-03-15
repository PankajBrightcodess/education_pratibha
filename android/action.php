center_login<?php 
session_start();
include 'connection.php';
function Imageupload($dir,$inputname,$allext,$pass_width,$pass_height,$pass_size,$newname){
	if(file_exists($_FILES["$inputname"]["tmp_name"])){
		// do this contain any file check
		$file_extension = strtolower( pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
		$error="";
		if(in_array($file_extension, $allext)){
			// file extension check
			list($width, $height, $type, $attr) = getimagesize($_FILES["$inputname"]["tmp_name"]);
			$image_weight = $_FILES["$inputname"]["size"];
			if($width <= "$pass_width" && $height <= "$pass_height" && $image_weight <= "$pass_size"){
				// dimension check
				$tmp = $_FILES["$inputname"]["tmp_name"];
				// print_r($extension);die;
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
// ''''''''''''''''''''''''''''''''pdf''''''''''''''''''''''''''''''''''''''''''''
function Pdfupload($dir,$inputname,$allext,$pass_width,$pass_height,$pass_size,$newname){
	if(file_exists($_FILES["$inputname"]["tmp_name"])){
		// do this contain any file check
		$file_extension = strtolower(pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
		$error="";
		if(in_array($file_extension, $allext)){
			// file extension check
			list($width, $height, $type, $attr) = getimagesize($_FILES["$inputname"]["tmp_name"]);
			$pdf_weight = $_FILES["$inputname"]["size"];
			if($width <= "$pass_width" && $height <= "$pass_height" && $pdf_weight <= "$pass_size"){
				// dimension check
				$tmp = $_FILES["$inputname"]["tmp_name"];
				// print_r($extension);die;
				$extension[1]="pdf";
				
				$name=$newname.".".$extension[1];
				if(move_uploaded_file($tmp, "$dir" .$name)){
					return true;
				}
			}
			else{
				$error .="Please upload Pdf size of $pass_width X $pass_height !!!";
			}
		}
		else{
			$error .="Please upload an Pdf !!!";
		}
	}
	else{
		$error .="Please Select an Pdf !!!";
	}
	return $error;
}
// '''''''''''''''''''''''''''''''''''''''video'''''''''''''''''''''''''''''''''''''''''
function videoupload($dir,$inputname,$allext,$pass_width,$pass_height,$pass_size,$newname){
	if(file_exists($_FILES["$inputname"]["tmp_name"])){
		// do this contain any file check
		$file_extension = strtolower(pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
		$error="";
		if(in_array($file_extension, $allext)){
			// file extension check
			list($width, $height, $type, $attr) = getimagesize($_FILES["$inputname"]["tmp_name"]);
			$pdf_weight = $_FILES["$inputname"]["size"];
			if($width <= "$pass_width" && $height <= "$pass_height" && $pdf_weight <= "$pass_size"){
				// dimension check
				$tmp = $_FILES["$inputname"]["tmp_name"];
				// print_r($extension);die;
				$extension[1]="mp4";
				
				$name=$newname.".".$extension[1];
				if(move_uploaded_file($tmp, "$dir" .$name)){
					return true;
				}
			}
			else{
				$error .="Please upload Video size of $pass_width X $pass_height !!!";
			}
		}
		else{
			$error .="Please upload an Video !!!";
		}
	}
	else{
		$error .="Please Select an Video !!!";
	}
	return $error;
}
// '''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
if(isset($_POST['login'])){

	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$query="SELECT * FROM `admin` WHERE `email`='$email' and `password`='$pass' and `status`='1'";
	$run=mysqli_query($conn,$query);
	$num=mysqli_num_rows($run);
	if($num){
		$data=mysqli_fetch_assoc($run);
		$_SESSION['role'] = $data['role'];
		$_SESSION['id'] = $data['id'];
		$_SESSION['cent_id'] = $data['cent_id'];
		if($_SESSION['role']==1){
			header('location:dashboard.php');
		}
			
	}
	else{
		$_SESSION['msg']='Invalid details !!!';
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}
}

if(isset($_POST['field_excutive'])){
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$location=$_POST['location'];
	$city=$_POST['city'];
	$state=$_POST['state'];
	$pincode=$_POST['pincode'];
	// $precenter=$_POST['precenter'];
	$password=$_POST['password'];
	$con_password=$_POST['con_password'];
	$added_on=date('Y-m-d');
	
	if(!empty($email)){
	   	$query="SELECT * FROM `field_excutive` WHERE `email`='$email'";
	    $run=mysqli_query($conn,$query);
	    $num=mysqli_num_rows($run);
	    if($num==0){
	    	if($password==$con_password){
	    		$query="INSERT INTO `field_excutive`(`name`,`gender`,`dob`,`mobile`,`email`,`location`,`city`,`state`,`pincode`,`password`,`added_on`) VALUES ('$name','$gender','$dob','$mobile','$email','$location','$city','$state','$pincode','$password','$added_on')";
	    		
	    	    $sql=mysqli_query($conn,$query);
	    	    if($sql){
					echo $sql;
				}
				else{
					$_SESSION['msg']="Center Not Added !!!";
					header("location:$_SERVER[HTTP_REFERER]");
				}
	    	}
	    	else{
	    		$_SESSION['msg']='password Not Match !!!';
		        header("Location: " . $_SERVER['HTTP_REFERER']);
	    	}
	    }
	    else{
	    	$_SESSION['msg']='Email Already Used !!!';
		    header("Location: " . $_SERVER['HTTP_REFERER']);
	    }
	}

}

if(isset($_POST['add_center'])){

	$cent_code = $_POST['cent_code'];
	$cent_name = $_POST['cent_name'];
	$address = $_POST['address'];
	$mobile = $_POST['mobile'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	$role = $_POST['role'];
	$added_on = date('Y-m-d');

	$query="INSERT INTO `sh_addcenter`(`cent_code`,`cent_name`,`address`,`mobile`,`email`,`password`,`added_on`) VALUES ('$cent_code','$cent_name','$address','$mobile','$mail','$pass','$added_on')";
	
	$sql=mysqli_query($conn,$query);
		if($sql){
			$last_id = $conn->insert_id;
			// print_r($last_id);die;
			$query1="INSERT INTO `admin`(`name`,`email`,`password`,`role`,`cent_id`) VALUES ('$cent_name','$mail','$pass','$role','$last_id')";
			$sql1=mysqli_query($conn,$query1);
				if($sql1){
					header('Location:add_center.php');
					$_SESSION['msg']="Center Added Successfully !!!";
				}
				else{
					$_SESSION['msg']="Center Not Added !!!";
					header("location:$_SERVER[HTTP_REFERER]");
				}
			}
		else{
			        $_SESSION['msg']="Center Not Added !!!";
			        header("location:$_SERVER[HTTP_REFERER]");
		   }
	}
	if(isset($_POST['del_center'])){
		
	$id = $_POST['id'];
	$ids = $_POST['id'];	
	$query="DELETE FROM `admin` WHERE `cent_id`='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
	    $query1="DELETE FROM `sh_addcenter` WHERE `id`='$ids'";
	    $sql1=mysqli_query($conn,$query1);
	    if($sql1){
	    	$_SESSION['msg']="Center Deleted Successfully !!!";
	    	header("location:$_SERVER[HTTP_REFERER]");
	    }
	    else{
	    	$_SESSION['msg']="Center Not Deleted!!!";
		    header("location:$_SERVER[HTTP_REFERER]");
	    }
			
	}
	else{
		$_SESSION['msg']="Center Not Deleted!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
   }

	
	if(isset($_POST['del'])){
		
	$id = $_POST['id'];	
	// print_r($id);die;
	$query="DELETE FROM `result` WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	
   }


   	if(isset($_POST['update_center'])){
  //  		echo '<pre>';
		// print_r($_POST);die;
	$id=$_POST['id'];
	$cent_code = $_POST['cent_code'];
	$cent_name = $_POST['cent_name'];
	$address = $_POST['address'];
	$mobile = $_POST['mobile'];
	$mail = $_POST['mail'];
	$pass = $_POST['pass'];
	$role = $_POST['role'];
	// print_R($_POST);die;
    $query="UPDATE `sh_addcenter` SET `cent_code`='$cent_code',`cent_name`='$cent_name',`address`='$address',`email`='$mail',`password`='$pass',`mobile`='$mobile' WHERE `id`='$id'";
	$run=mysqli_query($conn,$query);	
	if($run==true)
	{
		if(!empty($mail) && !empty($pass)){
			$query="SELECT * FROM `admin` WHERE `cent_id`='$id' and `status`='1'";
	        $run=mysqli_query($conn,$query);
	        $num=mysqli_num_rows($run);
	        if($num){
	        	$query1="UPDATE `admin` SET `name`='$cent_name',`email`='$mail',`password`='$pass',`role`='$role' WHERE `cent_id`='$id'";
	             $run1=mysqli_query($conn,$query1);
	            if($run1){
	         	$_SESSION['msg']="Successfully Updated!!!";	
		        header('Location:add_center.php');
	            }

	        }
	        else{
	        	$query1="INSERT INTO `admin`(`name`,`email`,`password`,`role`,`cent_id`) VALUES ('$cent_name','$mail','$pass','$role','$id')";
			    $sql1=mysqli_query($conn,$query1);
			    if($sql1){
					header('Location:add_center.php');
					$_SESSION['msg']="Center Added Successfully !!!";
				}
				else{
					$_SESSION['msg']="Center Not Updated !!!";
					header("location:$_SERVER[HTTP_REFERER]");
				}
	        }	 
		}
	 	$_SESSION['msg']="Updated!!!";	
		header('Location:add_center.php');	
	}
	else{
	    $_SESSION['msg']="Recoard Updation Cancel!!!";	
	 }
   }

   if(isset($_POST['resultupload'])){
	    // echo '<pre>';
	 //    print_r($_FILES['upload_image']['name']);
		// print_r($_POST);die;
		$enroll=$_POST['enroll'];
		$course=$_POST['course'];
		$name=$_POST['name'];
		$center_id=$_POST['center_id']; 
		$added_on=date('Y-m-d');
		$photo = $_FILES['upload_image']['name'];
		$photo = explode('.',$photo);
		// print_r($photo);
		$image= time().$photo[0];
		$extension = $photo[1];
		$imagename = $_FILES['upload_image']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['upload_image']['tmp_name']);
		$dir="../upload/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check = Imageupload($dir,'upload_image',$allext,"1800000","1800000",'100000000',$image,$extension);	
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

if(isset($_POST['del_result_admin'])){
		
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

	if(isset($_POST['del_list'])){
		
	$id = $_POST['id'];	
	// print_r($id);die;
	$query="DELETE FROM `result` WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	
   }

   if(isset($_POST['del_franchise'])){
		
	$id = $_POST['id'];	
	// print_r($id);die;
	$query="DELETE FROM `centre_request` WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	
   }



   if(isset($_POST['center_request'])){
	   	// echo '<pre>';
	   	// print_r($_POST);die;
	   	$name=$_POST['name'];
		$gender=$_POST['gender'];
		$dob=$_POST['dob'];
		$mobile=$_POST['mobile']; 
		$email=$_POST['email']; 
		$location_address=$_POST['location']; 
		$city=$_POST['city']; 
		$state=$_POST['state']; 
		$pin=$_POST['pincode']; 
		$precenter=$_POST['precenter']; 
		$languages=$_POST['language']; 
		$otherinfo=$_POST['otherinfo']; 
		$added_on=date('Y-m-d'); 
		$query="INSERT INTO `centre_request`(`name`,`dob`,`gender`,`mobile`,`email`,`location`,`city`,`state`,`pincode`,`precenter`,`language`,`other_info`,`added_on`) VALUES ('$name','$dob','$gender','$mobile','$email','$location_address','$city','$state','$pin','$precenter','$languages','$otherinfo','$added_on')";
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

   if(isset($_POST['student_enquiry'])){
   	// echo '<pre>';
   	// print_r($_POST);die;
   	    $name=$_POST['name'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$ac_qualify=$_POST['ac_qualify']; 
		$course=$_POST['course']; 
		$mode=$_POST['mode']; 
		$added_on = date('Y-m-d');
		$query="INSERT INTO `admission_enquiry`(`name`,`mobile`,`email`,`academic_qualification`,`course`,`training_mode`,`added_on`) VALUES ('$name','$mobile','$email','$ac_qualify','$course','$mode','added_on')";
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

   if(isset($_POST['del_admission'])){
		
	$id = $_POST['id'];	
	// print_r($id);die;
	$query="DELETE FROM `admission_enquiry` WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
		 header('Location:student_enquiry.php');
		// $_SESSION['msg']="Enquiry Deleted Successfully !!!";	
	}
	else{
		// $_SESSION['msg']="Enquiry Not Deleted!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
	
   }

   if(isset($_POST['getresult'])){
   	// echo '<pre>';
   	// print_r($_POST);die;
   	$enroll = $_POST['enroll'];	
   	$query="SELECT * FROM `result` WHERE `enroll`='$enroll'";
	$run=mysqli_query($conn,$query);
	$num=mysqli_num_rows($run);
	if($num){
		$data=mysqli_fetch_assoc($run);
		$_SESSION['enroll'] = $data['enroll'];
		
		if(!empty($_SESSION['enroll'])){
			header('location:../studentsDetails.php');
		}
			
	}
	else{
		// $_SESSION['msg']='Invalid details !!!';
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}
   }

   if(isset($_POST['addtestim'])){
   	// echo '<pre>';
   	// print_r($_POST);die;
   	$testimonial = $_POST['testimonial'];	
   	$testi_name = $_POST['testi_name'];	
   	$added_on = date('Y-m-d');
   	$query="INSERT INTO `testimonial`(`testimonial`,`testi_name`,`added_on`) VALUES ('$testimonial','$testi_name','$added_on')";
		$sql=mysqli_query($conn,$query);
		if($sql){
			 header("Location:$_SERVER[HTTP_REFERER]");
			// $_SESSION['msg']="Successfully Added!!!";	
		}
		else{
			// $_SESSION['msg']="Not added Testimonial !!!";
			header("Location:$_SERVER[HTTP_REFERER]");
		}
   }

   
   if(isset($_POST['del_testimonial'])){
		
	$id = $_POST['id'];	
	// print_r($id);die;
	$query="DELETE FROM `testimonial` WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
		 header('Location:add_testimonial.php');
		// $_SESSION['msg']="Testimonial Deleted Successfully !!!";	
	}
	else{
		// $_SESSION['msg']="Testimonial Not Deleted!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
	
   }

   if(isset($_POST['update_testimonial'])){
   	// echo '<pre>';
   	// print_r($_POST);die;
   	$id = $_POST['id'];	
   	$testimonial = $_POST['testimonial'];	
   	$testi_name = $_POST['testi_name'];	
   	 $query="UPDATE `testimonial` SET `testimonial`='$testimonial',`testi_name`='$testi_name' WHERE `id`='$id'";
	$run=mysqli_query($conn,$query);
	if($run){
		 header('Location:add_testimonial.php');
		// $_SESSION['msg']="Testimonial Updated Successfully !!!";	
	}
	else{
		// $_SESSION['msg']="Testimonial Not Updated!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}	
   }



   if(isset($_POST['payment']))
   {

   	$category = $_POST['category'];
   	 $name = $_POST['name'];
   	 $email = $_POST['email'];
   	 $phone = $_POST['phone'];
   	 $course = $_POST['course'];
   	 $istname = $_POST['istname'];
   	 $amount = $_POST['amount'];
   	 $added_on = date('Y-m-d');
   	 $length = 15;
	 $request_no=substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
	 $sql = "INSERT INTO  `addpayment` (`category`,`name`,`email`,`phone`,`ins_name`,`course`,`amount`,`request_no`,`added_on`)VALUES ('$category','$name','$email','$phone','$istname','$course','$amount','$request_no','$added_on')";
	 // print_r($sql);die;
	 if (mysqli_query($conn,$sql)) {
		// $_SESSION['msg']="Records Added Successfully !!!";
		$_SESSION['last_inst_id']=$conn->insert_id; 
		// print_r($_SESSION['last_inst_id']);die;
       header('location:payment.php');
	 } else {
		// $_SESSION['msg']="Records Not Added !!!";
       header('header:pay.php');
	 }
   		
  }

  

  if(isset($_POST['del_finallist'])){
		
	$id = $_POST['id'];	
	// print_r($id);die;
	$query="DELETE FROM `addpayment` WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
		 header('Location:final_franchiselist.php');
		// $_SESSION['msg']="Franchise Deleted Successfully !!!";	
	}
	else{
		// $_SESSION['msg']="Franchise Not Deleted!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
	
   }

   // '''''''''''''''add study material''''''''''''''''
   if(isset($_POST['material_upload'])){
     	$course=$_POST['course'];
		$topic_name=$_POST['topic_name'];
		
		
		$added_on=date('Y-m-d');
		// ---------------image upload-----------------
		if($_FILES['upload_image']['name']!=''){
			$photo = $_FILES['upload_image']['name'];
			$photo = explode('.',$photo);
			// print_r($photo);
			$image= time().$photo[0];
			$imagename = $_FILES['upload_image']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['upload_image']['tmp_name']);
			$dir="../study_material/image/";
			$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
			$check = Imageupload($dir,'upload_image',$allext,"1800000","1800000",'100000000',$image);
			$image = $image.".jpg";	
		}else{
			$_FILES['upload_image']['name']='';
		}
		if($_FILES['upload_pdf']['name']!=''){
			$pdfs = $_FILES['upload_pdf']['name'];
			$pdfs = explode('.',$pdfs);
			// print_r($pdfs);
			$pdf= time().$pdfs[0];
			$pdfname = $_FILES['upload_pdf']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['upload_pdf']['tmp_name']);
			$dir="../study_material/pdf/";
			$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
			$check1 = Pdfupload($dir,'upload_pdf',$allext,"1800000","1800000",'100000000',$pdf);
			$pdf = $pdf.".pdf";	

		}
		else{
			$_FILES['upload_image']['name']='';

		}

		if($_FILES['video_link']['name']!=''){
			// print_r($_FILES['video_link']['name']);die;
			$videos = $_FILES['video_link']['name'];
			$videos = explode('.',$videos);
			// print_r($videos);
			$video= time().$videos[0];
			$videoname = $_FILES['video_link']['tmp_name'];
			list($width,$height)=getimagesize($_FILES['video_link']['tmp_name']);
			$dir="../study_material/video/";
			$allext=array("mp4");
			$check1 = videoupload($dir,'video_link',$allext,"18000000000","1800000000",'100000000',$video);
			$video_link = $video.".mp4";	

		}
		else{
			$_FILES['upload_image']['name']='';

		}
		
		// ---------------------pdf upload--------------------	
		
			// print_r($check);die;
		if($check===true || $check1===true){
			
			$query="INSERT INTO `material_upload`(`course`,`topic_name`,`upload_image`,`upload_pdf`,`video`,`added_on`) VALUES ('$course','$topic_name','$image','$pdf','$video_link','$added_on')";
			$sql=mysqli_query($conn,$query);
			if($sql){
				 header("Location:$_SERVER[HTTP_REFERER]");
				$_SESSION['msg']="Successfully Added!!!";	
			}
			else{
				// $_SESSION['msg']="Not added result !!!";
				header("Location:$_SERVER[HTTP_REFERER]");
			}
		}
		else{
			// $_SESSION['msg']=$check;
			header("location:$_SERVER[HTTP_REFERER]");	
		}
   }

  if(isset($_POST['del_material'])){
		
	$id = $_POST['id'];	
	// print_r($id);die;
	$query="DELETE FROM `material_upload` WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
		 header('Location:add_studymetrial.php');
		// $_SESSION['msg']="Material Deleted Successfully !!!";	
	}
	else{
		// $_SESSION['msg']="Material Not Deleted!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
	
   }
   
if(isset($_POST['add_student'])){
	$enroll_no = $_POST['enroll_no'];	
	$std_name = $_POST['std_name'];	
	$dob = $_POST['dob'];	
	$cntr_name = $_POST['cntr_name'];	
	$course = $_POST['course'];	
	$address = $_POST['address'];	
	$mobile = $_POST['mobile'];	
	$email = $_POST['email'];	
	$pass = $_POST['pass'];
	$added_on = date('Y-m-d');
	$query="INSERT INTO `student`(`enroll_no`,`std_name`,`dob`,`cntr_name`,`course`,`address`,`mobile`,`email`,`pass`,`added_on`) VALUES ('$enroll_no','$std_name','$dob','$cntr_name','$course','$address','$mobile','$email','$pass','$added_on')";
			$sql=mysqli_query($conn,$query);
		if($sql){
			 header('Location:add_student.php');
			// $_SESSION['msg']="Student added Successfully !!!";	
		}
		else{
			// $_SESSION['msg']="Student Not added!!!";
			header("location:$_SERVER[HTTP_REFERER]");
		}		
}

if(isset($_POST['update_student'])){
	$id = $_POST['id'];	
	$enroll_no = $_POST['enroll_no'];	
	$std_name = $_POST['std_name'];	
	$dob = $_POST['dob'];	
	$cntr_name = $_POST['cntr_name'];	
	$course = $_POST['course'];	
	$address = $_POST['address'];	
	$mobile = $_POST['mobile'];	
	$email = $_POST['email'];	
	$pass = $_POST['pass'];
	$query="UPDATE `student` SET `enroll_no`='$enroll_no',`std_name`='$std_name',`dob`='$dob',`cntr_name`='$cntr_name',`course`='$course',`address`='$address',`mobile`='$mobile',`email`='$email',`pass`='$pass' WHERE `id`='$id'";
	$run=mysqli_query($conn,$query);
	if($run){
		 header('Location:add_student.php');
		// $_SESSION['msg']="Student Updated Successfully !!!";	
	}
	else{
		// $_SESSION['msg']="Student Not Updated!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}	
}


  if(isset($_POST['del_student'])){
		
	$id = $_POST['id'];	
	// print_r($id);die;
	$query="DELETE FROM `student` WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
		 header('Location:add_student.php');
		// $_SESSION['msg']="Student Deleted Successfully !!!";	
	}
	else{
		// $_SESSION['msg']="Student Not Deleted!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
	
   }


   if(isset($_POST['change_admin_pass'])){
   	    $email = $_POST['email'];
	   	$query="SELECT * FROM `admin` WHERE `email`='$email' AND `role`='1'";
		$run=mysqli_query($conn,$query);
		$num=mysqli_num_rows($run);
		if($num){
		$data=mysqli_fetch_assoc($run);
		$_SESSION['id'] = $data['id'];
		$_SESSION['role'] = $data['role'];
		if($_SESSION['role']==1){
			header('location:newpassword.php');
		}
		else{
			// $_SESSION['msg']="Please Enter Correct Email id";
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
		 }	
		else{
			// $_SESSION['msg']="Please Enter Correct Email id";
			header("Location: " . $_SERVER['HTTP_REFERER']);
		}
	}

	if(isset($_POST['update_password_admin'])){
		
		   if($_POST['new_pass']==$_POST['con_pass']){
		   	$pass = $_POST['con_pass'];
				$id = $_SESSION['id'];
				$query="UPDATE `admin` SET `password`='$pass' WHERE `id`='$id'";
				$run=mysqli_query($conn,$query);
				if($run){
					 header('Location:index.php');
					// $_SESSION['msg']="Password Updated Successfully !!!";	
				}
				else{
					// $_SESSION['msg']="Password Not Updated!!!";
					header("location:$_SERVER[HTTP_REFERER]");
				}
			}
			else{
				// $_SESSION['msg']="Please Enter Correct Password";
				header("Location: " . $_SERVER['HTTP_REFERER']);
			}
	}

	


// '''''''''''''''''''''''''''''''''''''''''''''Payment'''''''''''''''''''''''''''''''''''''''''''''
	 if(isset($_POST['payment']))
   {

   	$category = $_POST['category'];
   	 $name = $_POST['name'];
   	 $email = $_POST['email'];
   	 $phone = $_POST['phone'];
   	 $course = $_POST['course'];
   	 $istname = $_POST['istname'];
   	 $amount = $_POST['amount'];
   	 $added_on = date('Y-m-d');
   	 $length = 15;
	 $request_no=substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
	 $sql = "INSERT INTO  `addpayment` (`category`,`name`,`email`,`phone`,`ins_name`,`course`,`amount`,`request_no`,`added_on`)VALUES ('$category','$name','$email','$phone','$istname','$course','$amount','$request_no','$added_on')";
	 // print_r($sql);die;
	 if (mysqli_query($conn,$sql)) {
		// $_SESSION['msg']="Records Added Successfully !!!";
		$_SESSION['last_inst_id']=$conn->insert_id; 
		// print_r($_SESSION['last_inst_id']);die;
       header('location:payment.php');
	 } else {
		// $_SESSION['msg']="Records Not Added !!!";
       header('header:registrationform.php');
	 }
   		
  }
?>