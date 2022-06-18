<?php
session_start();
include '../connection.php';
    if(empty($_SESSION['enroll_id'])){
    header('location:../studentlogin.php');
  }       
         $testid= $_GET['id'];
         $cand_id=$_SESSION['enroll_id'];
        $_SESSION['examid'] =$_GET['id'];

        // check the exam held or not already

        $student= "SELECT * FROM `master_result` WHERE `candi_id`='$cand_id' AND `exam_id` = '$testid'";
        $sql =  mysqli_query($conn,$student);
        $num=mysqli_num_rows($sql);
       if($num > 0){
          header('location:message.php');
       }
    $query="SELECT * FROM `test_master` WHERE `id`='$testid'";
    // print_r($quy);die;
        $run=mysqli_query($conn,$query);
            
            $data=mysqli_fetch_assoc($run);
            $time = $data['time_duration'];

            // online question particular id
      
    $query1="SELECT * FROM `online_question` WHERE `test_id`='$testid'";
     $run1=mysqli_query($conn,$query1);
     while ($data1=mysqli_fetch_assoc($run1)) {
       $ques[] = $data1;
      
     }

 ?>
 <?php include 'header-links.php'; ?>

<?php include 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<section class="blank-course "></section>
<h5>Remaining Time: <span id="timer"></span></h5>
                   

<div class="col-md-12 p-0 mb-4">
        <form method="post" action="action.php">
            <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $testid; ?>">
             <input type="hidden" name="candidate_id" id="candidate_id" value="<?php echo $cand_id; ?>">
           
        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
        <?php 
          if(!empty($ques)){ $i=0;
            // echo '<pre>';
            // print_r($ques);die;
            foreach ($ques as $key => $value) { $i++; 
                ?>
                    <tr>
                        <td>
                            <p><b><?php echo $i ; ?> .) <?php echo $value['question']; ?></b></p>
                              <input name="ques_id[]" value="<?php echo $value['id']; ?>" class="form-check-input" type="hidden" value=""  required >
                               
                            <div class="col-md-4 float-left">
                              <div class="form-group pl-4 ">
                                <input name="answer[<?php echo $value["id"]; ?>]" value="<?php echo $value['option_a']; ?>" class="form-check-input" type="radio" value=""  required >
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $value['option_a']; ?>
                                </label>
                                <input name="correct_ans[]" value="<?php echo $value['correct_ans']; ?>" class="form-check-input" type="hidden" value=""  required >
                               
                              </div>  

                              <div class="form-group pl-4">
                                <input name="answer[<?php echo $value["id"]; ?>]" value="<?php echo $value['option_b']; ?>" class="form-check-input" type="radio" value=""  required >
                               
                                <label class="form-check-label" for="invalidCheck2">
                                    <?php echo $value['option_b']; ?>
                                </label>
                              </div>   
                            </div>
                            <div class="col-md-8 float-left">
                             <div class="form-group pl-4">
                                <input name="answer[<?php echo $value["id"]; ?>]" value="<?php echo $value['option_c']; ?>" class="form-check-input" type="radio" value=""  required >
                               
                                <label class="form-check-label" for="invalidCheck3">
                                    <?php echo $value['option_c']; ?>
                                </label>
                              </div>  

                              <div class="form-group pl-4">
                                <input name="answer[<?php echo $value["id"]; ?>]" value="<?php echo $value['option_d']; ?>" class="form-check-input" type="radio" value=""  required >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $value['option_d']; ?>
                                </label>
                              </div>   
                            </div>
                            </div>
                             

                        </td>
                    </tr>
                   
                <?php 
            }
            }
                ?>
                       <tr>
                             <td style="padding: 20px;">
                              <!--  <a href="#" class="btn btn-sm btn-warning">&laquo; Previous</a>
                     <a href="#" class="btn btn-sm btn-success">Next &raquo;</a> -->
                                 <button type="button" class="btn btn-xs btn-warning p-3 pl-4 pr-4" id="resetExamFrm">Reset</button>
                                 <input name="submitAnswer" type="submit" value="Submit" class="btn btn-xs btn-primary p-3 pl-4 pr-4 float-right" id="submitAnswer">
                             </td>
                         </tr>

               

             
              </table>

        </form>
    </div>

<!-- <script type="text/javascript">
      $(document).ready(function(e) {
    $('body').on('click','#submitAnswer',function(){
     // $('.student_reg').click(function(e){
            // debugger;
        
        $.ajax({
                type:'POST',
                url:'action.php',
                data:{submitAnswer:'submitAnswer'},
                success: function(result){
                    // alert(result);
                    // console.log(result);
                    if(result){
                        swal("Good!", "Test Submitted!", "success");
                        window.location = "exam_result.php";
                    }
                    else{
                        swal("Opps!", "Something Error!", "error");
                        window.location = "onlineexam.php";
                      
                    }
                      
                    },
                    error: function(){ 
                       alert("email already used");
                    },
        });
    return false;  
    });
});
</script> -->


<script type="text/javascript">
  let timerOn = true;

function timer(remaining) {
  var m = Math.floor(remaining / 60);
  var s = remaining % 60;
  
  m = m < 10 ? '0' + m : m;
  s = s < 10 ? '0' + s : s;
  document.getElementById('timer').innerHTML = m + ':' + s;
  remaining -= 1;
  
  if(remaining >= 0 && timerOn) {
    setTimeout(function() {
        timer(remaining);
    }, 1000);
    return;
  }

  if(!timerOn) {
    // Do validate stuff here
    return;
    deletedata();

  }
  
  // Do timeout stuff here
  alert('Timeout for exam');
}
var time = "<?= $time; ?>";
var time = time*60;
 timer(time);
</script>

<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>