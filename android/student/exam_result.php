<?php
session_start();
include '../connection.php';
    if(empty($_SESSION['enroll_id'])){
    header('location:../studentlogin.php');
  }
     $examid=  $_SESSION['examid'];
      $cand_id=$_SESSION['enroll_id'];
    // $query="SELECT * FROM `test_master` WHERE `id`='$testid'";
    // // print_r($quy);die;
    //     $run=mysqli_query($conn,$query);
            
    //         $data=mysqli_fetch_assoc($run);
    //         $time = $data['time_duration'];

            // online question particular id
     $date = date('Y-m-d');
      
    $query="SELECT * FROM `test_result`  WHERE `exam_id`='$examid' AND `candidate_id` = '$cand_id' AND `added_on`='$date' ORDER BY `pid` DESC  ";
     $run=mysqli_query($conn,$query);
     while ($data=mysqli_fetch_assoc($run)) {
       $result[] = $data;  
     }
     $correct = 0;
     $incorrect=0;
     $count = count($result);
     for($i=0; $i<$count; $i++){
        
        if($result[$i]['correct_ans'] == $result[$i]['answer']){
            $correct=$correct+1;
            // print_r($correct);
        }
        else {
            $incorrect=$incorrect+1;
            // print_r($incorrect);
        }

       
     }
     print_r('correct='.$correct);
     print_r('incorrect='.$incorrect);
      

die;
     

     
    
     

 ?>
 <?php include 'header-links.php'; ?>

<?php include 'header.php'; ?>