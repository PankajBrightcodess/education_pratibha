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
                 $sql = "SELECT * FROM `winner` WHERE `status`='1'";
                 
                  $res = mysqli_query($conn,$sql);
                  while($data = mysqli_fetch_assoc($res)){
                    $winner[]=$data;
                  } ?>

 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">                 
<section class="page">
    <div class="container-fluid">
      <div class="row">
        <?php 
          if(!empty($winner)){
            foreach ($winner as $key => $value) {
                ?>
               <div class="col-md-9 mb-3">
                  <div class="card">
                   <div class="card-header bg-secondary text-light text-center"><span><strong>Winner</strong></span></div>
                    <div class="card-body">
                      <div class="row">
                       <div class="col-md-9 col-9 mb-5">
                          <h6><?php echo $value['name'];?> <br>(<?php echo date('Y',strtotime($value['year']));?>)</h6>
                       </div>
                       
                       <div class="col-md-3 col-3"> 
                        <p><?= $value['Rank']; 
                             $rank= $value['Rank'];
                             if($rank == 1){ ?>
                              <i class='fas fa-medal' style='font-size:24px;color:gold'></i>
                           <?php  }
                           elseif ($rank == 2) { ?>
                             <i class='fas fa-medal' style='font-size:24px;color:#e6e1e1'></i>
                          <?php }
                          elseif ($rank == 3) { ?>
                           <i class='fas fa-medal' style='font-size:24px;color:#CD7F32'></i>
                         <?php }
                          else{ ?>
                               
                                <i class='fa fa-thumbs-up' style='font-size:24px;color:green'></i>

                     <?php     }

                        ?>
                        <!-- <i class='fas fa-medal' style='font-size:24px;color:gold'></i> --></p>
                          
                      </div>
                         <!--  <div class="col-4" style="font-size: 10px;"><strong>10 Questions</strong></div>
                          <div class="col-4" style="font-size: 10px;"><strong>20 Marks</strong></div>
                          <div class="col-4" style="font-size: 10px;"><strong>10 Minutes</strong></div> -->
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