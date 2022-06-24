<?php
session_start();
if($_SESSION['role']!='1'){
    header('location:index.php');
  }
include'connection.php';
$msg = "";
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if ($msg != "") {
        echo "<script> alert('$msg')</script>";
    }       
    $query = "SELECT master_result.*, student.id AS student_id, student.name AS student_name, student.email AS student_email, test_master.id AS testmaster_id, test_master.test_name AS testmaster_name FROM master_result LEFT JOIN student ON master_result.candi_id=student.id LEFT JOIN test_master ON master_result.exam_id = test_master.id";
     $res = mysqli_query($conn,$query);
     while ($data = mysqli_fetch_assoc($res)) {
            $result[] = $data;
     }
    $sql = "SELECT * FROM `test_master` WHERE `status`='1'";
                  $res = mysqli_query($conn,$sql);
                  while($data = mysqli_fetch_assoc($res)){
                    $testmaster[]=$data;
                  } 
   
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Exam  Appearing list</title>
  <?php include'includes/header-links.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include'includes/top-header.php'; ?>
    <?php include'includes/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <?php include'includes/page-header.php'; ?>

    <!-- Main content -->
   
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Student Appearing List</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                
                <div class="col-md-12">
                  <div class="department-list">
                     <div class="card">
              <div class="card-header">
                <h5 style="font-weight: bold;">Student List</h5>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    <th>Student Name</th>
                    <th>Student Email</th>
                    <th>Test Name</th>
                    <th>Total Marks</th>
                    <th>Score</th>
                   
                    
                  </tr>
                  </thead>
                  <tbody>

                    <?php 
                        if(!empty($result)){$sn=0;
                          foreach ($result as $key => $value) {$sn++;
                            // $_SESSION['exam_id_id'] = $value['exam_id']
                            $abc[] = $value['exam_id'];
                            ?>
                             <tr>
                                <td><?php echo $sn; ?></td>
                             
                          <td><?php echo $value['student_name']; ?></td>
                          <td><?php echo $value['student_email']; ?></td>  
                          <td><?php echo $value['testmaster_name']; ?></td>
                           <td><?php echo $value['total_marks']; ?></td>
                          <td><?php echo $value['correct_marks']; ?>/<?php echo $value['total_marks']; ?></td>
                               
                            </tr>

 

                            <?php
                          }
                       
                          $_SESSION['exam_id_id'] = json_encode($abc);
                        }


                    ?>
                
                       
                     
                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <button class="btn btn-block btn-danger"data-toggle="modal" data-target="#departmentModal">Delete All Student List By Test Wise</button>







    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include'includes/copyright.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

 <?php include'includes/footer-links.php'; ?>
 <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>

<!-- Modal -->
<div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel"><b>Delete Test Wise Student</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php  
      $idexam= array();
      $idexam = json_decode($_SESSION['exam_id_id']);
         $count =   count($idexam);

         for ($i=0; $i < $count; $i++) {  
            $id = $idexam[$i];
           if($id!=0){
               $sql111 = "SELECT * FROM `test_master` WHERE `id`='$id'";
               $res1 = mysqli_query($conn,$sql111);
               while($data = mysqli_fetch_assoc($res1)){
                 $record[] = $data;
               }
                

           }

            
         }
                ?>
         <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    
                    <th>Test List</th>
                   
                    
                  </tr>
                  </thead>
                  <tbody>

                    <?php 
                        if(!empty($record)){$sn=0;
                          foreach ($record as $key => $valuetest) {$sn++;
                            ?>
                             <tr>
                                <td><?php echo $sn; ?></td>
                             
                          <td>  <a href="action.php?deletetestresult=<?php echo $valuetest['id']; ?>" class="btn btn-sm btn-danger" >Delete<?php echo $valuetest['test_name'];  ?></a></td>
                         
                               
                            </tr>

 

                            <?php
                          }
                        }


                    ?>
                
                       
                     
                 
                </table>
              </div>
    </div>
  </div>
</div>
 
</body>
</html>