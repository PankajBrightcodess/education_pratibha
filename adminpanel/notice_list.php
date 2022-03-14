<?php
session_start();
if($_SESSION['role']!='1'){
    header('location:index.php');
  }
include'../connection.php';
$msg = "";
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if ($msg != "") {
        echo "<script> alert('$msg')</script>";
    }
    $query="SELECT * FROM `principal_notice` WHERE `status`='1' ORDER BY `id`  DESC;";
    $run=mysqli_query($conn,$query);
    while ($data=mysqli_fetch_assoc($run)) {
      $principal_notice[]=$data;
    }

   
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Notes</title>
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
                <h3 class="card-title">Master Key Notice</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                
                <div class="col-md-12">
                  <div class="department-list">
                     <div class="card">
              <div class="card-header">
                <h5 style="font-weight: bold;">Notice List</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    <th>Notice Id</th>
                    <th>Notice Title</th>
                    <th>Notice</th>
                    <th>Principal Name</th>
                    <th>Notice date</th>
                   <!--  <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if(!empty($principal_notice)){
                      $sn=0;
                      foreach ($principal_notice as $key => $row) { $sn++;
                        ?>
                          <tr>
                            <td><?php echo $sn; ?></td>
                            <td><?php echo $row['notice_id']; ?></td>
                            <td><?php echo $row['notice_heading']; ?></td>
                            <td><?php echo $row['notice']; ?></td>
                            <td><?php echo $row['principal_name']; ?></td>
                            <td><?php echo date('d-m-Y', strtotime($row['added_on'])); ?></td>
                           <!--  <td>
                              <button class="btn btn-sm btn-success editdepartment" data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-notice_id="<?php echo $row['notice_id']; ?>" data-notice_heading="<?php echo $row['notice_heading']; ?>" data-notice="<?php echo $row['notice']; ?>"  data-target="#departmentModal">&nbsp;&nbsp;<i class="far fa-edit nav-icon"></i>&nbsp;Edit</button>
                            </td> -->
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
<div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Notice Update</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="action.php" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
              <input type="hidden" name="id" id="id" class="form-control" value="1"> 
             <label>Notice Id <span style="color:red;">*</span></label>
             <input type="text" name="notice_id" id="notice_id" class="form-control" required="">
            </div>
            <div class="col-md-12">
             <label>Notice Title <span style="color:red;">*</span></label>
             <input type="text" name="notice_title" id="notice_title" class="form-control" required="">
            </div>
            <div class="col-md-12">
             <label>Notice<span style="color:red;">*</span></label>
             <textarea class="form-control" name="notice" id="notice" rows="8" cols="50"></textarea>
            </div>
           
         </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="update-notice" class="btn btn-primary">Save changes</button>
        </div>
       </form>
    </div>
  </div>
</div>
 <script type="text/javascript">
   $(document).ready(function(){
      $('body').on('click','.editdepartment',function(){
        $('#id').val($(this).data('id'));
        $('#notice_id').val($(this).data('notice_id'));
        $('#notice_title').val($(this).data('notice_heading'));
        $('#notice').val($(this).data('notice'));
      });
   });
 </script>
</body>
</html>
