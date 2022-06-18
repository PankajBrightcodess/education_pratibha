<?php
session_start();
include '../connection.php';
    if(empty($_SESSION['enroll_id'])){
    header('location:../studentlogin.php');
  }
  $count=$correct=$incorrect=0;
     $examid=  $_SESSION['examid'];
      $cand_id=$_SESSION['enroll_id'];
    // $query="SELECT * FROM `test_master` WHERE `id`='$testid'";
    // // print_r($quy);die;
    //     $run=mysqli_query($conn,$query);
            
    //         $data=mysqli_fetch_assoc($run);
    //         $time = $data['time_duration'];

            // online question particular id
    
    $date = date('Y-m-d H');

     $query="SELECT * FROM `test_result` WHERE `exam_id`='$examid' AND `candidate_id` = '$cand_id' AND `added_on`='$date' ORDER BY `pid` DESC";
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

// die;
 include 'header-links.php'; 

include 'header.php'; 
?>
<style>
    .box1{
        background-color: #ff7f00!important;
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        /*display: block;*/
        margin-bottom: 20px;
        /*position: relative;*/
    }
    .box2{
        background-color: #047a19!important;
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        /*display: block;*/
        margin-bottom: 20px;
        /*position: relative;*/
    }
    .box3{
        background-color: #c2312f!important;
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        /*display: block;*/
        margin-bottom: 20px;
        /*position: relative;*/
    }
     .box4{
        background-color: #1f78a2!important;
        box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);
        /*display: block;*/
       /* margin-bottom: 20px;*/
        /*position: relative;*/
    }
    .abc{
        margin-top: 120px;
    }
    #container {
    /*background-color: #ff7f00;*/
    height: 300px;
    overflow-x: hidden;
    overflow-y: scroll;
    width: 300px;
}




</style>
<section class="abc">
   <div class="container">
       <div class="row">
          <div class="col-4">
             <div class="box1">  
               <span style="color:white">Total question:</span> 
               <h3 style="color:white"><?php echo $count;  ?></h3>  
            
             </div> 
          </div>
          <div class="col-4">
             <div class="box2">  
               <span style="color:white">Correct question:</span> 
               <h3 style="color:white"><?php echo $correct;  ?></h3>  
            
             </div> 
              
          </div>
          <div class="col-4">
             <div class="box3">  
                <span style="color:white">Incorrect question:</span> 
                <h3 style="color:white"><?php echo $incorrect;  ?></h3>  
            
             </div> 
              
          </div>                               

        </div>
   </div>
</section>
<section style="margin-top: 25px;">
<div class="container">
<div class="row">
    <div class="col-8">
        <div id="container">
            
<div class="row col-md-6">
            <div class="main-card mb-3 card">
                <div class="card-body">
                   
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                     <?php 
                     // "SELECT student.*, field_excutive.name AS exe_name FROM student INNER JOIN field_excutive ON student.executive_id=field_excutive.id WHERE student.status='1'";
                        $selQuest = "SELECT test_result.*, online_question.question, online_question.marks FROM test_result INNER JOIN online_question ON test_result.ques_id=online_question.id WHERE test_result.candidate_id='$cand_id' AND test_result.exam_id ='$examid' AND test_result.added_on = '$date' ORDER BY `pid` DESC";
                         $run1=mysqli_query($conn,$selQuest);
                          while ($data=mysqli_fetch_assoc($run1)) {
                                   $quesres[] = $data;  
                                                                 }
                       if (!empty($quesres)) { $i=0;
                           foreach ($quesres as $key => $value) {$i++; ?>
                              <tr>
                                <td>
                                    <b><p><?php echo $i ; ?> .) <?php echo $value['question']; ?></p></b>
                                    <label class="pl-4">
                                        Answer : 
                                        <?php 
                                            if($value['answer'] != $value['correct_ans'])
                                            { ?>
                                                <span style="color:red"><?php echo $value['answer']; ?></span>
                                            <?PHP }
                                            else
                                            { ?>
                                                <span class="text-success"><?php echo $value['answer']; ?></span>
                                            <?php }
                                         ?>
                                    </label>
                                    <label class="pl-4">Correct:<span class="text-success"><?php echo $value['correct_ans']; ?></span></label>
                                </td>
                            </tr>
                    <?php        }
                              }  
                              ?>
                     </table>
                </div>
                
            </div>
        </div>
  






</div>
    </div>
    <div class="col-4">
             <div class="box4">  
               <span style="color:white">Results</span> 
             <?php 
                                   $total = 0;
                                   $marks = 0;
                                  if (!empty($quesres)) {
                                  foreach ($quesres as $key => $row) {
                                    $total = $total + $row['marks'];

                                     if($row['answer'] == $row['correct_ans']){
                                        $marks = $marks + $row['marks'];

                                     }
                                 }
                             }

                            ?>
                       <h3 style="color:white">   <?php echo $marks; ?>   / <?php echo $total; ?></h3>     
             </div> 
    </div>
</div>   
</div>  
</section>
<?php
  $added_on = date('Y-m-d');
  $query1="INSERT INTO `master_result`(`exam_id`,`candi_id`,`total_marks`,`correct_marks`,`added_on`) VALUES ('$examid','$cand_id','$total','$marks','$added_on')";
    $run2=mysqli_query($conn,$query1);


?>
<br><br>
<a href="dashboard.php" class="btn btn-sm btn-warning text-center">Submitted Exam</a>

<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>