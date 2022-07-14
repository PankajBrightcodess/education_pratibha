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


     
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Department</title>
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
                <h3 class="card-title">Test Master</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-md-3">
                  <form role="form" action="action.php" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Test Name <!--  --></label>
                          <input type="text" name="test_name" class="form-control" required="" placeholder="Test Name:">
                        </div>
                        <!-- <div class="col-md-12">
                          <label>No. Of Questions</label>
                          <input type="text" name="no_question" class="form-control" required="">
                        </div> -->
                        <div class="col-md-12">
                          <label>Total Marks</label>
                          <input type="text" name="total_marks" class="form-control" required="" placeholder="Test Total Marks:">
                        </div>
                        <div class="col-md-12">
                          <label>Time Duration</label>
                         <select name="time_duration" id="time_duration" class="form-control">
                            <option value="10">10 minutes</option>
                            <option value="20">20 minutes</option>
                            <option value="30">30 minutes</option>
                            <option value="35">35 minutes</option>
                            <option value="40">40 minutes</option>
                            <option value="45">45 minutes</option>
                            <option value="50">50 minutes</option>
                            <option value="60">60 minutes</option>
                          </select>
                          <!-- <input type="time" name="time_duration" id="time_duration" class="form-control" required="" > -->
                        </div>
                        <div class="col-md-4">
                          <button class="btn btn-primary btn-sm btn-block" type="submit" name="add_test" style="margin-top: 10px;">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-9">
                  <div class="department-list">
                     <div class="card">
              <div class="card-header">
                <h5 style="font-weight: bold;">Test List</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    <th>Test Name</th>
                    <th>No Of Question</th>
                    <th>Total Marks</th>
                    <th>Time Duration</th>
                    <th>Added date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php 
                        $sql = "select * from test_master ";
                        $res = mysqli_query($conn,$sql);
                         while ($data=mysqli_fetch_assoc($res)) {
                                            $master[]=$data;
                                       }
                                       $sn=0;
                                       foreach ($master as $key => $value) { ++$sn;
                                        $id = $value['id'];
                                        $query=" SELECT test_master.*, online_question.test_id AS test_id FROM test_master inner JOIN online_question ON online_question.test_id=test_master.id WHERE online_question.test_id=$id";
                                 $run=mysqli_query($conn,$query);
                                 $nmq=mysqli_num_rows($run);
                                 $numques="UPDATE `test_master` SET `no_question`='$nmq' WHERE `id`='$id'";
                                 $run1=mysqli_query($conn,$numques);
                                   // echo '<pre>';
                                   // print_r($run1);

                                     ?>

                
                        <tr>
                          <td><?php echo $sn; ?></td>
                          <td><?php echo $value['test_name']; ?></td>
                          <td><?php echo $nmq; ?></td>
                          <td><?php echo $value['total_marks']; ?></td>
                          <td><?php echo $value['time_duration']; ?>Minutes</td>
                          <td><?php echo $value['added_on']; ?></td>
                          <td>
                            <button class="btn btn-sm btn-success editmaster" data-toggle="modal" 
                            data-id="<?php echo $value['id']; ?>" 
                            data-total_marks="<?php echo $value['total_marks']; ?>"
                            data-test_name="<?php echo $value['test_name']; ?>"
                            data-time_duration="<?php echo $value['time_duration']; ?>" 
                            data-target="#departmentModal">&nbsp;&nbsp;<i class="far fa-edit nav-icon"></i>&nbsp;Edit</button>  <a href="action.php?deletemaster=<?php echo $value['id']; ?>" class="btn btn-sm btn-danger" >Delete</a>
                            <?php if($value['status'] == 0){?>
                             <a href="action.php?testactivate=<?php echo $value['id']; ?>" class="btn btn-sm btn-warning" >Unactivate</a>
                          <?php   }
                          else{ ?>
                                 <a href="action.php?testdeactive=<?php echo $value['id']; ?>" class="btn btn-sm btn-success">Active</a>
                      <?php    } ?>
                          </td>
                        </tr>
                      <?php
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
<div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Master Update</b></h5>
        
      </div>
       <form action="action.php" method="post">
        <div class="modal-body">
           <input type="hidden" name="SnoEdit" id="SnoEdit" class="form-control"> 
        </div>
         <div class="col-md-12">
              <label>Test Name</label>
              <input type="text" id="test_name" name="test_name" class="form-control" placeholder="Test Total Marks:">
        </div>
        <div class="col-md-12">
             <label>Total Marks</label>
             <input type="text" id="total_marks" name="total_marks" class="form-control" placeholder="Test Total Marks:">
        </div>
         <div class="col-md-12">
                          <label>Time Duration</label>
                         <select name="time_duration" id="time_duration" class="form-control">
                            <option value="10">10 minutes</option>
                            <option value="20">20 minutes</option>
                            <option value="30">30 minutes</option>
                            <option value="35">35 minutes</option>
                            <option value="40">40 minutes</option>
                            <option value="45">45 minutes</option>
                            <option value="50">50 minutes</option>
                            <option value="60">60 minutes</option>
                          </select>
                          <!-- <input type="time" name="time_duration" id="time_duration" class="form-control" required="" > -->
                        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <button type="submit" name="update_master" class="btn btn-primary">Save changes</button>
        </div>
       </form>
    </div>
  </div>
</div>
 <script type="text/javascript">
   $(document).ready(function(){
      $('body').on('click','.editmaster',function(){
        $('#SnoEdit').val($(this).data('id'));
        $('#total_marks').val($(this).data('total_marks'));
        $('#test_name').val($(this).data('test_name'));
        $('#time_duration').val($(this).data('time_duration'));
        
      });
   });
 </script>
</body>
</html>
