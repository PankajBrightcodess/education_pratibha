<?php
session_start();
include '../connection.php';
    if(empty($_SESSION['enroll_id'])){
    header('location:../studentlogin.php');
  }
     $testid= $_GET['id'];
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
        <form method="post" id="submitAnswerFrm">
            <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $examId; ?>">
            <input type="hidden" name="examAction" id="examAction" >
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
                            <div class="col-md-4 float-left">
                              <div class="form-group pl-4 ">
                                <input name="answer" value="<?php echo $value['option_a']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $value['option_a']; ?>
                                </label>
                              </div>  

                              <div class="form-group pl-4">
                                <input name="answer" value="<?php echo $value['option_b']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $value['option_b']; ?>
                                </label>
                              </div>   
                            </div>
                            <div class="col-md-8 float-left">
                             <div class="form-group pl-4">
                                <input name="answer" value="<?php echo $value['option_c']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >
                               
                                <label class="form-check-label" for="invalidCheck">
                                    <?php echo $value['option_c']; ?>
                                </label>
                              </div>  

                              <div class="form-group pl-4">
                                <input name="answer" value="<?php echo $value['option_d']; ?>" class="form-check-input" type="radio" value="" id="invalidCheck" required >
                               
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
                               <a href="#" class="btn btn-sm btn-warning">&laquo; Previous</a>
                     <a href="#" class="btn btn-sm btn-success">Next &raquo;</a>
                                 <button type="button" class="btn btn-xlg btn-warning p-3 pl-4 pr-4" id="resetExamFrm">Reset</button>
                                 <input name="submit" type="submit" value="Submit" class="btn btn-xlg btn-primary p-3 pl-4 pr-4 float-right" id="submitAnswerFrmBtn">
                             </td>
                         </tr>

               

             
              </table>

        </form>
    </div>








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
  alert('Timeout for otp');
}
var time = "<?= $time; ?>";
var time = time*60;
 timer(time);
</script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>