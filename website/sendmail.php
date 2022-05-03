<?php 
session_start();
include 'admin/connection.php';

// '''''''''''''''''''''''''''''''''''''''

   if(isset($_POST['SendMessage'])){
   	
	    $to="pankaj.tiwari@brightcodess.com";  
	    // support@shivanyacomputer.com
	    $name = $_POST['name'];
	    $mobile = $_POST['contact'];
	    $email = $_POST['email'];
	    $comment = $_POST['query'];
	    $selectedProjects  = 'None';
	    
	    $body = 'Shivanya Computer Education(Enquiry): ' . $selectedProjects;
	    $subject = "Regarding Contact Inquiry";
	    $from = $email;
	    $message = "Name: ".$name."\n Mobile: ".$mobile."\n E-mail: ".$email."\n".$body."\n Comment: ".$comment;
	    $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	    $headers = "From:" . $from;
	    // print_r($message);die;

	    $send =mail($to, $subject, $message, $headers);
	    // print_r($send);die;
	    if ($send){
	     $_SESSION['msg']="Sent Succesfully!!! Thank You ".$name."";
	      header("location:$_SERVER[HTTP_REFERER]");
	    }
	    else {
	       $_SESSION['msg']="Something went Wrong !!!";
	      header("location:$_SERVER[HTTP_REFERER]");
	    }
}

// '''''''''''''''''''''''''feedback mail''''''''''''''''''''''
if(isset($_POST['feedback'])){
	// echo '<pre>';
 //   	print_r($_POST);die;
	    $to="support@shivanyacomputer.com";   
	    // 
	    $name = $_POST['name'];
	    $mobile = $_POST['contact'];
	    $email = $_POST['email'];
	    $comment = $_POST['message'];
	    $selectedProjects  = 'None';
	    
	    $body = 'Shivanya Computer Education(Feedback): ' . $selectedProjects;
	    $subject = "Regarding Contact Inquiry";
	    $from = $email;
	    $message = "Name: ".$name."\n Mobile: ".$mobile."\n E-mail: ".$email."\n".$body."\n Comment: ".$comment;
	    $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	    $headers = "From:" . $from;
	    // print_r($message);die;

	    $send =mail($to, $subject, $message, $headers);
	    // print_r($send);die;
	    if ($send){
	     $_SESSION['msg']="Sent Succesfully!!! Thank You ".$name."";
	      header("location:$_SERVER[HTTP_REFERER]");
	    }
	    else {
	       $_SESSION['msg']="Something went Wrong !!!";
	      header("location:$_SERVER[HTTP_REFERER]");
	    }
}

// ''''''''''''''''''''''''''''''''''''''contact no''''''''''''''''''''''''''''''''''''''''''''
if(isset($_POST['contactus'])){
	   // echo '<pre>';
   	// print_r($_POST);die;
	    $to="support@shivanyacomputer.com";   
	    // /support@shivanyacomputer.com/ 
	    $name = $_POST['name'];
	    $mobile = $_POST['contact'];
	    $email = $_POST['email'];
	    $comment = $_POST['message'];
	    $selectedProjects  = 'None';
	    
	    $body = 'Shivanya Computer Education(Contact Us): ' . $selectedProjects;
	    $subject = "Regarding Contact Enquiry";
	    $from = $email;
	    $message = "Name: ".$name."\n Mobile: ".$mobile."\n E-mail: ".$email."\n".$body."\n Comment: ".$comment;
	    $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	    $headers = "From:" . $from;
	    // print_r($message);die;

	    $send =mail($to, $subject, $message, $headers);
	    // print_r($send);die;
	    if ($send){
	     $_SESSION['msg']="Sent Succesfully!!! Thank You ".$name."";
	      header("location:$_SERVER[HTTP_REFERER]");
	    }
	    else {
	       $_SESSION['msg']="Something went Wrong !!!";
	      header("location:$_SERVER[HTTP_REFERER]");
	    }
}

?>