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
                <h3 class="card-title">Master Key Test</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-md-3">
                  <form role="form" action="action.php" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Test Name <span style="color:red;">*</span></label>
                          <input type="text" name="test_name" class="form-control" required="" placeholder="Test Name:">
                        </div>
                        <div class="col-md-12">
                          <label>No. Of Questions<span style="color:red;">*</span></label>
                          <input type="text" name="no_question" class="form-control" required="" placeholder="Test Name:">
                        </div>
                        <div class="col-md-12">
                          <label>Total Marks<span style="color:red;">*</span></label>
                          <input type="text" name="total_marks" class="form-control" required="" placeholder="Test Name:">
                        </div>
                        <div class="col-md-12">
                          <label>Time Duration<span style="color:red;">*</span></label>
                          <input type="text" name="time_duration" class="form-control" required="" placeholder="Test Name:">
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
                        $sql = "select * from test_master where status = '1'";
                        $res = mysqli_query($conn,$sql);
                        $sn=0;
                        while($row = mysqli_fetch_assoc($res)){ $sn++;
                      ?>
                        <tr>
                          <td><?php echo $sn; ?></td>
                          <td><?php echo $row['test_name']; ?></td>
                          <td><?php echo $row['no_question']; ?></td>
                          <td><?php echo $row['total_marks']; ?></td>
                          <td><?php echo $row['time_duration']; ?></td>
                          <td><?php echo $row['added_on']; ?></td>
                          <td>
                            <button class="btn btn-sm btn-success editdepartment" data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-department="<?php echo $row['department']; ?>" data-target="#departmentModal">&nbsp;&nbsp;<i class="far fa-edit nav-icon"></i>&nbsp;Edit</button>
                          </td>
                        </tr>
                      <?php } ?>
                 
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
        <h5 class="modal-title" id="exampleModalLabel"><b>Department Update</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="action.php" method="post">
        <div class="modal-body">
           <input type="hidden" name="cat_id" id="cat_id" class="form-control" value="1"> 
           <label>Department <span style="color:red;">*</span></label>
           <input type="text" name="department" id="department" class="form-control" required="" value="abc">

        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <button type="submit" name="change-department" class="btn btn-primary">Save changes</button>
        </div>
       </form>
    </div>
  </div>
</div>
 <script type="text/javascript">
   $(document).ready(function(){
      $('body').on('click','.editdepartment',function(){
        $('#cat_id').val($(this).data('id'));
        $('#department').val($(this).data('department'));
      });
   });
 </script>
</body>
</html>