<?php 
session_start();
include '../connection.php';
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

function Fileupload($dir,$inputname,$allext,$pass_size,$newname){
            //print_r($_FILES);
            if (file_exists($_FILES["$inputname"]["tmp_name"])) {
                //do this contain any file check
                $file_extension = strtolower( pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
                $error = "";
               if( in_array($file_extension, $allext)){
                   //file extension check
                $size = $_FILES["$inputname"]["size"];
                
                if ($size <= "$pass_size") {
                        //dimension check
                        $tmp=$_FILES["$inputname"]["tmp_name"];
                        
                        $extension = end(explode(".", $_FILES["$inputname"]["name"]));                      
                        $name=$newname.".".$extension;
                        //$extension[1] ="jpg";               
                        if(move_uploaded_file($tmp, "$dir"."$name")){
                            return true;
                            //echo "$dir $newname.$extension[1]";
                        }
                    } 
                    else{
                        $error .= "Please upload file size must be less than 30MB";
                        //echo $error;
                    }
               } else{
                $error .="Please Upload a PDF";
                //echo $error;
               }
            } else{
                //print_r($_FILES);
                $error .="Please Select an Document";
                // $error;
            }
            return $error;
        }




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
if(isset($_POST['executive_login'])){
	
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$query="SELECT * FROM `field_excutive` WHERE `email`='$email' and `password`='$pass' and `status`='1'";
	// print_r($query);die;
	$run=mysqli_query($conn,$query);
	$num=mysqli_num_rows($run);
	
	if($num){
		$data=mysqli_fetch_assoc($run);

		$_SESSION['role'] = $data['role'];
		$_SESSION['exe_id'] = $data['id'];
		$_SESSION['name'] = $data['name'];
		if($_SESSION['role']==2){
			header('location:dashboard.php');
		}
		else{
			header('location:../executivelogin.php');
		}		
	}
	else{
		 // $_SESSION['msg']='Invalid details !!!';
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}
}
if(isset($_POST['change_center_exe'])){
	// echo '<pre>';
	  $email = $_POST['email'];
	  $otp = rand(100000, 999999);
		$query="SELECT * FROM `field_excutive` WHERE `email`='$email'";
		$run=mysqli_query($conn,$query);
		$num=mysqli_num_rows($run);
		if($num){
			$data=mysqli_fetch_assoc($run);
			$_SESSION['id'] = $data['id'];
			 $id= $data['id'];
			if(!empty($id)){
				$query="UPDATE `field_excutive` SET `otp`='$otp' WHERE `id`='$id'";
				$sql=mysqli_query($conn,$query);
				 // print_r($sql);die;
				if($sql){
					$from = "educollectionpratibhadarpan@gmail.com";
					$name = "Educollection Pratibha Darpan";
					$message = "your one time otp change password: ".$otp."";
					$subject = "Forget Password From Educollection Pratibha Darpan";
					$headers  = 'MIME-Version: 1.0' . "\r\n";
	        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
	        $headers .= "From: $name <$from>  \r\n"."Cc: $email \r\n"."Bcc: $email \r\n"."Reply-To: $name 
	        <$from>\r\n" ."Return-Path:  <$email>\r\n" .'X-Mailer: PHP/' . phpversion();
	        $mail = @mail($email, $subject, $message, $headers);
	        if($mail){
	        	echo "1";
	        }
	        else{
	        	echo "0";
	        }
        
				}
       else{
       	 echo "0";
       }

        
			}
			else{
				echo "0";
			}
			
		}	
		else{
		 	echo "0";
		}
   }

   if(isset($_POST['update_password_executive'])){
		   if($_POST['new_pass']==$_POST['con_pass']){
		   	  $otp =$_POST['otp'];
		   	   $pass = $_POST['con_pass'];
			   $id = $_SESSION['id'];
			   $query="SELECT * FROM `field_excutive` WHERE `id`='$id' AND `otp`='$otp'";
        $run=mysqli_query($conn,$query);
        $data=mysqli_num_rows($run);
        if($data>0){
        	$otps ='';
				  $query="UPDATE `field_excutive` SET `password`='$pass',`otp`='$otps' WHERE `id`='$id'";
					// print_r($query);die;
					$run=mysqli_query($conn,$query);
					// $query="UPDATE `student` SET  WHERE `id`='$id'";
			  //   $sql=mysqli_query($conn,$query);
					if($run){
						 echo "1";
					}
					else{
						echo "0";
					}
        }
        else{
        	echo "0";
        }
				
			}
	}

	
	if(isset($_POST['deleteotp'])){
		$id = $_SESSION['id'];
		$otp ='';
		$query="UPDATE `field_excutive` SET `otp`='$otp' WHERE `id`='$id'";
		$sql=mysqli_query($conn,$query);
		if(!empty($sql)){
			echo "1";
		}
		else{
			echo "0";
		}
	}


	
if (isset($_GET['settinglogout'])) {
     $id = $_GET['settinglogout'];
        if($id == $_SESSION['exe_id']){
        	unset($_SESSION['exe_id']);
        	header("location:../index.php");
        }
   
   }
	if(isset($_POST['setting_change_password'])){
		$id = $_SESSION['exe_id'];
		$query="SELECT * FROM `field_excutive` WHERE `id`='$id'";
        $run=mysqli_query($conn,$query);
        $data=mysqli_fetch_assoc($run);
         if($_POST['current_password'] == $data['password']){
		
		       if($_POST['new_password']==$_POST['confirm_new_password']){
		
		   	 $pass = $_POST['confirm_new_password'];
				$id = $_POST['id'];
				$query="SELECT * FROM `field_excutive` WHERE `id`='$id'";
		// 		  echo '<pre>';
		// print_r($query);die;
        $run=mysqli_query($conn,$query);
       //    echo '<pre>';
		     // print_r($run);die;

        $data=mysqli_num_rows($run);
        if($data>0){
				  $query="UPDATE `field_excutive` SET `password`='$pass' WHERE `id`='$id'";
					// print_r($query);die;
					$run=mysqli_query($conn,$query);
					unset($_SESSION['exe_id']);
				
					if($run){
						 echo "1";
					}
					else{
						echo "0";
					}
        }
        else{
        	echo "0";
        }
				
			}
		}
		else{
			echo "0";
		}

	}

// 	if(isset($_POST['add_homework'])){
// 		// echo '<pre>';
// 		// print_r($_POST);die;
// 		$executive_id=$_POST['executive_id'];
// 		$date = date('Y-m-d');
// 		$assessement = $_FILES['assessement']['name'];
// 		$assessement = explode('.',$assessement);

// 		$assessement= time().$assessement[0];
// 		$dir="uploads/homework/";
// 		$allext=array("pdf","PDF");
// 		$check = Fileupload($dir,'assessement',$allext,'10000000',$assessement); 
// 		if($check===true){
// 			$assessement .= ".pdf";	
// 			$query="INSERT INTO `homework`(`executive_id`,`assessment`,`date`) VALUES ('$executive_id','$assessement','$date')";
// 			$sql=mysqli_query($conn,$query);
// 			if($sql){
// 				 header("Location:$_SERVER[HTTP_REFERER]");
// 				  $_SESSION['msg']="Successfully Added!!!";	
// 			}
// 			else{
// 				 // $_SESSION['msg']="Not added result !!!";
// 				header("Location:$_SERVER[HTTP_REFERER]");
// 				$_SESSION['msg']="Not added result !!!";
// 			}
// 		}
// 		else{
// 			 // $_SESSION['msg']=$check;
// 			header("location:$_SERVER[HTTP_REFERER]");	
// 			$_SESSION['msg']=$check;
// 		}
// }


if(isset($_POST['resultupload'])){
		// echo '<pre>';
		// print_r($_POST);die;
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
		$dir="../../upload/";
		$allext=array("png","PNG","jpg","JPG","jpeg","JPEG","GIF","gif","pdf");
		$check = Imageupload($dir,'upload_image',$allext,"1800000","1800000",'100000000',$image);	
			// print_r($check);die;
		if($check===true){
			$image = $image.".jpg";	
			$query="INSERT INTO `result`(`enroll`,`course`,`name`,`upload_image`,`added_on`,`center_id`) VALUES ('$enroll','$course','$name','$image','$added_on','$center_id')";
			$sql=mysqli_query($conn,$query);
			if($sql){
				 header("Location:$_SERVER[HTTP_REFERER]");
				 // $_SESSION['msg']="Successfully Added!!!";	
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


if(isset($_POST['del_result'])){
		
	$id = $_POST['id'];	
	$query="DELETE FROM `result` WHERE `id`='$id'";
	$sql=mysqli_query($conn,$query);
	if($sql){
		 header('Location:uploadresult.php');
		 // $_SESSION['msg']="Center Deleted Successfully !!!";	
	}
	else{
		 // $_SESSION['msg']="Center Not Deleted!!!";
		header("location:$_SERVER[HTTP_REFERER]");
	}
   }


    

 //   if(isset($_POST['update_password_center'])){
	// 	   if($_POST['new_pass']==$_POST['con_pass']){
	// 	   	   $pass = $_POST['con_pass'];
	// 			$id = $_SESSION['id'];
	// 			$query="UPDATE `admin` SET `password`='$pass' WHERE `id`='$id'";
	// 			$run=mysqli_query($conn,$query);
	// 			if($run){
	// 				$c_id = $_SESSION['cent_id'];
	// 				$query1="UPDATE `sh_addcenter` SET `password`='$pass' WHERE `id`='$c_id'";
	// 			    $run1=mysqli_query($conn,$query1);
	// 			   if($run1){
	// 			   	header('Location:index.php');
	// 			   }
	// 			   else{
	// 				header("location:$_SERVER[HTTP_REFERER]");
	// 			}	 
	// 			}
	// 			else{
	// 				// $_SESSION['msg']="Password Not Updated!!!";
	// 				header("location:$_SERVER[HTTP_REFERER]");
	// 			}
	// 		}
	// 		else{
	// 			// $_SESSION['msg']="Please Enter Correct Password";
	// 			header("Location: " . $_SERVER['HTTP_REFERER']);
	// 		}
	// }
if(isset($_POST['withdrawl_wallet'])){
		$user_id=$_POST['user_id'];
		$amount=$_POST['amount'];
		$type=$_POST['type'];
		$added_on=date('Y-m-d H:i:s');
		$review = "wallet withdrawl in bank";
		$query="INSERT INTO `withdrawal`(`user_id`,`amount`,`type`,`review`,`added_on`) VALUES ('$user_id','$amount','$type','$review','$added_on')";
			$sql=mysqli_query($conn,$query);
			if($sql){
				 header('location:profile.php?status=1');			 
			}
			else{
				
				header('location:profile.php?status=0');
			}
	}
	if(isset($_POST['Transfer_wallet'])){
	
		$amount=$_POST['amount'];
		$user_id=$_POST['user_id'];
		$type=$_POST['type'];
		$student_user_id=$_POST['student_user_id'];
		$review = "wallet money transfer from";
		$added_on=date('Y-m-d H:i:s');
		$query1="INSERT INTO `wallet`(`user_id`,`refer_user_id`,`amount`,`type`,`description`,`date`) VALUES ('$student_user_id','$user_id','$amount','$type','wallet added amount through Executive','$added_on')";
		$sql1=mysqli_query($conn,$query1);
		$review = "wallet amount transfer to student";
		$query2="INSERT INTO `withdrawal`(`user_id`,`transfer_userid`,`amount`,`type`,`review`,`added_on`) VALUES ('$user_id','$student_user_id','$amount','field_executive','$review','$added_on')";
			$sql2=mysqli_query($conn,$query2);
			if($sql1 && $sql2){
				header('location:profile.php?transfer=1');
			}
			else{
				
				header('location:profile.php?transfer=0');
			}
	}

   // ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''Center Area Start'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

   
?>