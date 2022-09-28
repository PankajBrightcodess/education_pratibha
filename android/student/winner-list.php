<?php 
session_start();
include '../../adminpanel/connection.php';
$msg = "";
  if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  if($msg != ""){
    echo "<script> alert('$msg') </script>";
  }
  // print_r($_SESSION['role']);die;
  
?>
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
<?php 
                 
   $query = "SELECT master_result.*, student.id AS student_id, student.name AS student_name, student.email AS student_email, student.school_name AS schoolname, student.fathername AS student_father, test_master.id AS testmaster_id, test_master.test_name AS testmaster_name FROM master_result LEFT JOIN student ON master_result.candi_id=student.id LEFT JOIN test_master ON master_result.exam_id = test_master.id ORDER BY master_result.percentage DESC LIMIT 5";
     $res = mysqli_query($conn,$query);
     while ($data = mysqli_fetch_assoc($res)) {
            $result[] = $data;
     } 
                   ?>

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">                 
<section class="page">
    <div class="container-fluid">
      <div class="row">
        <?php 
          if(!empty($result)){ $i=0;
            foreach ($result as $key => $value) { $i++;
                ?>
               <div class="col-md-9 mb-3">
                  <div class="card">
                   <div class="card-header bg-secondary text-light text-center"><span><strong>Winner</strong></span></div>
                    <div class="card-body">
                      <div class="row">
                       <div class="col-md-9 col-9 mb-5">
                          <h6><?php echo $value['student_name'];?> <br>(<?php echo date('d-m-Y',strtotime($value['added_on']));?>) <br>
                           <?php    echo $value['student_father']; ?> <br> <?php    echo $value['schoolname']; ?> </h6>
                       </div>
                       
                       <div class="col-md-3 col-3"> 
                        <p> <?php 
                             if($i == 1){ 
                              echo $i; ?>
                              <i class='fas fa-medal' style='font-size:24px;color:gold'></i>
                           <?php echo $value['testmaster_name']; }
                           elseif ($i == 2) { 
                            echo $i; ?>
                             <i class='fas fa-medal' style='font-size:24px;color:#e6e1e1'></i>
                          <?php echo $value['testmaster_name']; }
                          elseif ($i == 3) { 
                            echo $i;
                             ?>
                           <i class='fas fa-medal' style='font-size:24px;color:#CD7F32'></i>
                         <?php echo $value['testmaster_name']; }
                          else{ 
                            echo $i; ?>
                               
                                <i class='fa fa-thumbs-up' style='font-size:24px;color:green'></i>

                     <?php echo $value['testmaster_name']; }

                        ?>
                      <!-- <i class='fas fa-medal' style='font-size:24px;color:gold'></i> --> </p>
                          
                      </div>
                          <div class="col-4" style="font-size: 10px;"><strong>Percentage:<?php echo $value['percentage']; ?>%</strong></div>
                          <div class="col-4" style="font-size: 10px;"><strong><?php echo $value['student_email']; ?></strong></div>
                          <div class="col-4" style="font-size: 10px;"><strong>Score<?php echo $value['correct_marks']; ?>/<?php echo $value['total_marks']; ?></strong></div>
                    </div>
                  </div>

                </div>
              </div>

                <?php
            }
          }



        ?>
    </div>
  </section>
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>