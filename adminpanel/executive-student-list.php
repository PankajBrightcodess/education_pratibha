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
    if(isset($_GET['executice_student_list'])){
    $id=$_GET['executice_student_list'];
    $query="SELECT * FROM `student` WHERE `executive_id`='$id'";
    // echo $query;die; 
    $run=mysqli_query($conn,$query);
     while ($data=mysqli_fetch_assoc($run)) {
      $executive[]=$data;
    } 
} 
   
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Executive student list</title>
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
                <h3 class="card-title">Executive student list</h3>
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
                <?php
                  
                  $sql0="SELECT * FROM `student` WHERE `payment_status` = '0'";
                  $res0=mysqli_query($conn,$sql0);
                  $nm0=mysqli_num_rows($res0);
                  $sqll="SELECT * FROM `student` WHERE `payment_status` = '1'";
                  $res1=mysqli_query($conn,$sqll);
                  $nm1=mysqli_num_rows($res1);
                  ?>
                  <div class="row" style="padding:19px;"> 
                    <div class="col-6" style="background-color: #20c997; color: white; text-align: center;">
                      <a href="executive-student-pay.php?executice_student_pay=1" style="color: white;" >
                      Paid Student: <h3><br><?php echo $nm1 ; ?></h3></a>
                    </div>
                     
                     <div class="col-6" style="background-color:#ca4653;; color:white; text-align: center;">
                      <a href="executive-student-pay.php?executice_student_pay=0" style="color: white;" >
                      Unpaid Student: <h3> <br><?php echo $nm0 ; ?></h3> </a>
                    </div>
                 
                </div>



                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>mobile no</th>
                    <th>Date</th>
                   
                    
                  </tr>
                  </thead>
                  <tbody>

                    <?php 
                        if(!empty($executive)){$sn=0;
                          foreach ($executive as $key => $value) {$sn++;
                            ?>
                             <tr>
                                <td><?php echo $sn; ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                <td><?php echo $value['mobile']; ?></td>
                                <td><?php echo $value['added_on']; ?></td>
                               
                            </tr>



                            <?php
                          }
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

 
</body>
</html>