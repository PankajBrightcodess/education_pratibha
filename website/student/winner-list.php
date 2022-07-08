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
<!-- <?php 
                 $sql = "SELECT * FROM `winner` WHERE `status`='1'";
                 
                  $res = mysqli_query($conn,$sql);
                  while($data = mysqli_fetch_assoc($res)){
                    $winner[]=$data;
                  } ?> -->
                <?php   $query = "SELECT master_result.*, student.id AS student_id, student.name AS student_name, student.email AS student_email, test_master.id AS testmaster_id, test_master.test_name AS testmaster_name FROM master_result LEFT JOIN student ON master_result.candi_id=student.id LEFT JOIN test_master ON master_result.exam_id = test_master.id ORDER BY master_result.percentage DESC LIMIT 5";
     $res = mysqli_query($conn,$query);
     while ($data = mysqli_fetch_assoc($res)) {
            $result[] = $data;
     } ?>

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">                 
<section class="page">
    <div class="container-fluid">
      <div class="row">
        <?php 
          if(!empty($result)){ $i=0;
            foreach ($result as $key => $value) { $i++;
                ?>
               <div class="col-md-12 mb-3">
                  <div class="card">
                   <div class="card-header bg-secondary text-light text-center"><span><strong>Winner</strong></span></div>
                    <div class="card-body">
                      <div class="row winnerlist">
                       <div class="col-md-9 col-9 mb-5">
                          <h6><?php echo $value['student_name'];?> <br>(<?php echo date('d-m-Y',strtotime($value['added_on']));?>)</h6>
                       </div>
                       
                       <div class="col-md-3 col-3 medal"> 
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



<!-- <section>
  <div class="container">
    <div class="row">
      <div class="col-md-12 dashboard mb-3">
        <h4 style="color:#403226; margin-top: 2rem; text-align: center;"><?php print_r($_SESSION['name'])?>
        
        </h4>

             <div class="col-md-9">
                  <div class="department-list">
                     <div class="card">
              <div class="card-header">
                <h5 style="font-weight: bold;">Student Assessment List</h5>
              </div>
              <!-- /.card-header -->
              <!-- <div class="card-body">
              
                <table  class="table  ">
                  <thead>
                  <tr>
                    <th>S.No.:</th>
                   <th>Teacher name</th>
                    <th>Assessement</th>
                    <th>Date</th>
                  </tr>
                  </thead>
                  <tbody > -->
                 <!-- <?php 
                 // $sql = "SELECT * FROM `homework` WHERE `status`='1'";
                 $sql = "SELECT `homework`.`pid`, `field_excutive`.`name`, `homework`.`assessment`,`homework`.`date` 
                 FROM `homework`
                  INNER JOIN `field_excutive` ON `homework`.`executive_id`=`field_excutive`.`id`;";
                  $res = mysqli_query($conn,$sql);
                  while($data = mysqli_fetch_assoc($res)){
                    $homework[]=$data;
                  } 
                 if(!empty($homework)){$sn=0;
                  echo '<pre>';
                  // print_r($gallery);
                  foreach ($homework as $key => $row) {$sn++;  $id=$row['pid'];?>
                      <tr>
                        <td><?php echo $sn; ?></td>
                        <td><p ><?php echo $row['name']; ?></p></td>
                        <td><a href="../executive/uploads/homework/<?php echo $row['assessment']; ?>"><i class="fa fa-file-pdf-o" style="font-size:24px"></i></a>  </td>
                        <td><?php echo $row['date']; ?></td>
                 
                    <?php
                  }
                 }
                         
                ?> -->
                        
                            
                        <!-- </tr>
                 
                    </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
              
            <!-- </div>
                  </div>
                </div>
      </div>
    </div>
    <div class="row">

        </div>
  </div>
</section> -->
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>