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


if(isset($_POST['submitAnswer'])){
		$data['ques_id']= $_POST['ques_id'];
		$data['candidate_id']= $_POST['candidate_id'];
		$data['exam_id']= $_POST['exam_id'];
		$data['correct_ans']= $_POST['correct_ans'];
		$data['answer']= $_POST['answer'];
		$data['added_on']= date('Y-m-d H');
		$count = count($data['ques_id']);
		for ($i=0; $i < $count; $i++) { 
			$arr = array('ques_id'=>$data['ques_id'][$i],'candidate_id'=>$data['candidate_id'],'exam_id'=>$data['exam_id'],'correct_ans'=>$data['correct_ans'][$i],'answer'=>$data['answer'][$data['ques_id'][$i]],'added_on'=>$data['added_on']);
			$testarray[]=$arr;
		}
		// print_r($revenuearray);die;
     foreach ($testarray as $key => $value) {
     	  $exam_id =$value['exam_id'];
     	  $candidate_id = $value['candidate_id'];
     	  $ques_id =$value['ques_id'];
     	  $answer= $value['answer'];
     	  $correct_ans=$value['correct_ans'];
     	  $added_on=$value['added_on'];

		  $query="INSERT INTO `test_result`(`exam_id`,`candidate_id`,`ques_id`,`answer`,`correct_ans`,`added_on`) VALUES ('$exam_id','$candidate_id','$ques_id','$answer',
		  	'$correct_ans','$added_on')";
		  $run=mysqli_query($conn,$query);
		  // print_r($run);die;
		}
		if($run){
			$_SESSION['msg']="exam Submitted !!!";
			header('location:exam_result.php');
		}
		else{
			$_SESSION['msg']="exam not Submitted !!!";
			header('location:onlineexam.php');
		}




	}

// if(isset($_POST['payment']))
//    {

//    	$category = $_POST['category'];
//    	 $name = $_POST['name'];
//    	 $email = $_POST['email'];
//    	 $phone = $_POST['phone'];
//    	 $course = $_POST['course'];
//    	 $istname = $_POST['istname'];
//    	 $amount = $_POST['amount'];
//    	 $added_on = date('Y-m-d');
//    	 $length = 15;
// 	 $request_no=substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
// 	 $sql = "INSERT INTO  `addpayment` (`category`,`name`,`email`,`phone`,`ins_name`,`course`,`amount`,`request_no`,`added_on`)VALUES ('$category','$name','$email','$phone','$istname','$course','$amount','$request_no','$added_on')";
// 	 // print_r($sql);die;
// 	 if (mysqli_query($conn,$sql)) {
// 		$_SESSION['msg']="Records Added Successfully !!!";
// 		$_SESSION['last_inst_id']=$conn->insert_id; 
// 		// print_r($_SESSION['last_inst_id']);die;
//         header('location:payment.php');
// 	 } else {
// 		$_SESSION['msg']="Records Not Added !!!";
//        // header('header:registrationform.php');
// 	 }
   		
//   }
if(isset($_POST['payment'])){ 

 	   $id = $_SESSION['enroll_id'];
   	 $amount = $_POST['amount'];
   	 $added_on = date('Y-m-d');
     $_SESSION['nowpay_amount'] = $amount;
   	 if($_POST['mode'] == 'online'){
   	  $length = 15;
   	  $request_no=substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
	 $sql="UPDATE `student` SET `amount`='$amount',`pay_date`='$added_on',`request_no`='$request_no' WHERE `id`='$id'";
	 $run = mysqli_query($conn,$sql);
	 if ($run) {
     header('location:qr_code.php');
     // header('location:payment.php');
	 } 
	 else {
       header('header:pay.php');
	 }

 	 }elseif($_POST['mode'] =='wallet'){
		if($_SESSION['amount'] > $amount){
			$review = "payment wallet for test series";
			$query="INSERT INTO `withdrawal`(`user_id`,`amount`,`type`,`review`,`added_on`) VALUES ('$id','$amount','student','$review','$added_on')";
			$sql=mysqli_query($conn,$query);

      $sql2="UPDATE `student` SET `amount`='$amount',`pay_date`='$added_on',`payment_status`='1' WHERE `id`='$id'";
	    $run = mysqli_query($conn,$sql2);

	    $query2="SELECT * FROM `student` WHERE `id`='$id' and `status`='1'";
	    $runs2=mysqli_query($conn,$query2);
	    $data=mysqli_fetch_assoc($runs2);
      $executive_id = $data['executive_id'];

      if(!empty($data['pay_end_date']) && $data['pay_end_date'] != NULL){
	  	  $expirydate = $data['pay_end_date'];   	
	    }


     if(!empty($data['pay_date'])){
	    	$paydate = $data['pay_date'];
	      if($expirydate >= date('Y-m-d')){
	     	$expirydate = $data['pay_end_date'];
        if($data['amount'] == 450){
         $new_expirydate = date('Y-m-d',strtotime($expirydate.'+'.'+1year'));
	      }elseif($data['amount'] == 40){
         $new_expirydate = date('Y-m-d',strtotime($expirydate.'+'.'+20days'));
	      }	
	     	$date = date('Y-m-d');
	     	$payment_times= $data['pay_times'] +1;
	     	$sql3="UPDATE `student` SET `payment_status`='1',`pay_end_date`='$new_expirydate',`pay_date`='$date',`pay_times`='$payment_times' WHERE `id`='$id'";
	      $run1 = mysqli_query($conn,$sql3); 
	     }else{
	     	$date = date('Y-m-d');
	     		$payment_times= $data['pay_times'] +1;
	     	  if($data['amount'] == 450){
         $new_expirydate = date('Y-m-d',strtotime($date.'+'.'+1year'));
	      }elseif($data['amount'] == 40){
         $new_expirydate = date('Y-m-d',strtotime($date.'+'.'+20days'));
	      }
	     	$sql3="UPDATE `student` SET `payment_status`='1',`pay_end_date`='$new_expirydate',`pay_date`='$date',`pay_times`='$payment_times' WHERE `id`='$id'";
	      $run1 = mysqli_query($conn,$sql3);
	     }
	     }else{
	      $date = date('Y-m-d');
        $payment_times= $data['pay_times'] +1;
        if($data['amount'] == 450){
         $new_expirydate = date('Y-m-d',strtotime($date.'+'.'+1year'));
	      }elseif($data['amount'] == 40){
         $new_expirydate = date('Y-m-d',strtotime($date.'+'.'+20days'));
	      }
	     	$sql3="UPDATE `student` SET `payment_status`='1',`pay_end_date`='$new_expirydate',`pay_date`='$date',`pay_times`='$payment_times' WHERE `id`='$id'";
	      $run1 = mysqli_query($conn,$sql3);
	    }


      if($run1){
      //  statrt of commition to share in student and executive
      if(isset($data['ref_id'])){
       $executive_id = $data['executive_id'];
      $refid =  $data['ref_id'];
      $amount = $data['amount'];
      $ref[] = explode("_",$refid);           
      if($ref[0][0] == 'STD'){
       $student_id = $ref[0][1];

      if($amount==40){
        $date = date('Y-m-d');
        $fieldExWallet = "INSERT INTO `wallet`(`user_id`,`refer_user_id`,`type`,`amount`,`description`,`date`) VALUES ('$executive_id','$id','field_executive','10','Amount add through student payment','$date')"; 
        $fieldExWallrun = mysqli_query($conn,$fieldExWallet);
        $stWallet = "INSERT INTO `wallet`(`user_id`,`refer_user_id`,`type`,`amount`,`description`,`date`) VALUES ('$student_id','$id','student','10','Amount add through student payment','$date')"; 
        $stWallrun = mysqli_query($conn,$stWallet); 
      }elseif($amount==450){
        $date = date('Y-m-d');
        $fieldExWallet = "INSERT INTO `wallet`(`user_id`,`refer_user_id`,`type`,`amount`,`description`,`date`) VALUES ('$executive_id','$id','field_executive','50','Amount add through student payment','$date')"; 
        $fieldExWallrun = mysqli_query($conn,$fieldExWallet);
        $stWallet = "INSERT INTO `wallet`(`user_id`,`refer_user_id`,`type`,`amount`,`description`,`date`) VALUES ('$student_id','$id','student','100','Amount add through student payment','$date')"; 
        $stWallrun = mysqli_query($conn,$stWallet); 
      }
       }elseif($ref[0][0] == 'EXC'){
         if($amount==40){
        $date = date('Y-m-d');
        $fieldExWallet = "INSERT INTO `wallet`(`user_id`,`refer_user_id`,`type`,`amount`,`description`,`date`) VALUES ('$executive_id','$id','field_executive','20','Amount add through student payment','$date')"; 
        $fieldExWallrun = mysqli_query($conn,$fieldExWallet);
      }elseif($amount==450){
        $date = date('Y-m-d');
        $fieldExWallet = "INSERT INTO `wallet`(`user_id`,`refer_user_id`,`type`,`amount`,`description`,`date`) VALUES ('$executive_id','$id','field_executive','150','Amount add through student payment','$date')"; 
        $fieldExWallrun = mysqli_query($conn,$fieldExWallet);
      } 
       }
      }else{
       if($amount==40){
        $date = date('Y-m-d');
        $fieldExWallet = "INSERT INTO `wallet`(`user_id`,`refer_user_id`,`type`,`amount`,`description`,`date`) VALUES ('$executive_id','$id','field_executive','20','Amount add through student payment','$date')"; 
        $fieldExWallrun = mysqli_query($conn,$fieldExWallet);
      }elseif($amount==450){
        $date = date('Y-m-d');
        $fieldExWallet = "INSERT INTO `wallet`(`user_id`,`refer_user_id`,`type`,`amount`,`description`,`date`) VALUES ('$executive_id','$id','field_executive','150','Amount add through student payment','$date')"; 
        $fieldExWallrun = mysqli_query($conn,$fieldExWallet);
      }        
      }
          //  end of commition to share in student and executive
      }


			if($sql && $run && $run1 && $fieldExWallrun){
				 header('location:dashboard.php?status=1');	 
			}else{	
				header('location:pay.php?status=0');
			}    
		}else{
		 header('location:pay.php?warning=0');
   }
	}else{
		header('header:pay.php');
	}
   		
}



if(isset($_POST['qr_code'])){  
 	    $id = $_SESSION['enroll_id'];
   	  $utr_no = $_POST['utr_no'];
   	  $query="SELECT * FROM `student` WHERE `id`='$id' and `status`='1'";
	    $runs=mysqli_query($conn,$query);
	    $data=mysqli_fetch_assoc($runs);
      $date = date('Y-m-d');
      $payment_times= $data['pay_times'] +1;
	      if($data['payment_id'] == $utr_no){
          header('location:qr_code.php?already=0');
	      }else{ 
        $sql="UPDATE `student` SET `payment_id`='$utr_no',`payment_status`='0',`pay_date`='$date',`pay_times`='$payment_times' WHERE `id`='$id'";
	      $run = mysqli_query($conn,$sql);
	    if ($runs  && $run) {
	   	    header('location:qr_code.php?status=1');
          // header('location:payment.php');
	    }else{
         header('header:pay.php');
	   }
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

		header('location:dashboard.php?statuss=1');		
	}
	else{
		// $_SESSION['msg']='Invalid details !!!';
		header("Location:../index.php?status=0");
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
				$_SESSION['msg']="Please check your Email";
			}
			else{
				$_SESSION['msg']="Not sent on mail";
			}
			 }	
			else{
				 // $_SESSION['msg']="Please Enter Correct Email id";
				header("Location: " . $_SERVER['HTTP_REFERER']);
			}
   }

   if(isset($_POST['update_password_student'])){
		   if($_POST['new_pass']==$_POST['con_pass']){
		   	$otp =$_POST['otp'];
		   	   $pass = $_POST['con_pass'];
				$id = $_SESSION['id'];
				$query="SELECT * FROM `student` WHERE `id`='$id' AND `otp`='$otp'";
        $run=mysqli_query($conn,$query);
        $data=mysqli_num_rows($run);
        if($data>0){
        	$otps ='';
				  $query="UPDATE `student` SET `password`='$pass',`otp`='$otps' WHERE `id`='$id'";
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
  

   if (isset($_GET['settinglogout'])) {
     $id = $_GET['settinglogout'];
        if($id == $_SESSION['enroll_id']){
        	unset($_SESSION['enroll_id']);
        	header("location:../index.php");
        }
   
   }
	if(isset($_POST['setting_change_password'])){
		$id = $_SESSION['enroll_id'];
		$query="SELECT * FROM `student` WHERE `id`='$id'";
        $run=mysqli_query($conn,$query);
        $data=mysqli_fetch_assoc($run);
         if($_POST['current_password'] == $data['password']){
		
		       if($_POST['new_password']==$_POST['confirm_new_password']){
		
		   	 $pass = $_POST['confirm_new_password'];
				$id = $_POST['id'];
				$query="SELECT * FROM `student` WHERE `id`='$id'";
		// 		  echo '<pre>';
		// print_r($query);die;
        $run=mysqli_query($conn,$query);
       //    echo '<pre>';
		     // print_r($run);die;

        $data=mysqli_num_rows($run);
        if($data>0){
				  $query="UPDATE `student` SET `password`='$pass' WHERE `id`='$id'";
					// print_r($query);die;
					$run=mysqli_query($conn,$query);
					unset($_SESSION['enroll_id']);
				
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
	if(isset($_POST['deleteotp'])){
		$id = $_SESSION['id'];
		$otp ='';
		$query="UPDATE `student` SET `otp`='$otp' WHERE `id`='$id'";
		$sql=mysqli_query($conn,$query);
		if(!empty($sql)){
			echo "1";
		}
		else{
			echo "0";
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
	  $otp = rand(100000, 999999);
		$query="SELECT * FROM `student` WHERE `email`='$email'";
		$run=mysqli_query($conn,$query);
		$num=mysqli_num_rows($run);

		if($num){
			$data=mysqli_fetch_assoc($run);
			$_SESSION['id'] = $data['id'];
			 $id= $data['id'];
			if(!empty($id)){
				$query="UPDATE `student` SET `otp`='$otp' WHERE `id`='$id'";
				$sql=mysqli_query($conn,$query);
				if($sql){
					$from = "educollectionpratibhadarpan@gmail.com";
					$name = "Educollection Pratibha Darpan";
					$message = "your one time otp change password: ".$otp."";
					$subject = "Forget Password From Educollection Pratibha Darpan";
					$headers  = 'MIME-Version: 1.0' . "\r\n";
	        $headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
	        $headers .= "From: $name <$from>  \r\n"."Cc: $email \r\n"."Bcc: $email \r\n"."Reply-To: $name <$from>\r\n" ."Return-Path:  <$email>\r\n" .'X-Mailer: PHP/' . phpversion();
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
    if(isset($_POST['withdrawl_wallet'])){

		$user_id=$_POST['user_id'];
		$amount=$_POST['amount'];
		$type=$_POST['type'];
		$added_on=date('Y-m-d H:i:s');
		$review = "wallet withdrawl in bank";
		
	$query="INSERT INTO `withdrawal`(`user_id`,`email`,`amount`,`type`,`review`,`added_on`) VALUES ('$user_id','$email','$amount','$type','$review','$added_on')";
			$sql=mysqli_query($conn,$query);
			$last_id = $conn->insert_id;
	    $uniqueid = "EDU-".$last_id;
	    $query2 = "UPDATE `withdrawal` SET `unique_id`='$uniqueid' WHERE `id`='$last_id'";
	    $sql2=mysqli_query($conn,$query2);	
			if($sql == true && $sql2 == true){
				 header('location:user_profile.php?status=1');	 
			}
			else{
				
				header('location:user_profile.php?status=0');
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