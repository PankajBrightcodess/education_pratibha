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
    $query="SELECT * FROM `homework` WHERE `status`='1'";
    $run=mysqli_query($conn,$query);
    while ($data=mysqli_fetch_assoc($run)) {
      $material[]=$data;
    }

   
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Assignment</title>
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
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Homework Upload</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
               
                <div class="col-md-12">
                  <div class="department-list">
                     <div class="card">
              <!-- <div class="card-header">
                <h5 style="font-weight: bold;">Assignment List</h5>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <form method="post" action="action.php" enctype="multipart/form-data">
                  <div class="col-md-12">    
                 <div class="col-md-12 mb-3">
                     <label>Homework Name<!-- <span style="color: Red;">*</span> --></label>
                     <input type="text" name="name" id="name" class="form-control">
                 </div>
                 <div class="col-md-12 mb-3">
                     <label>Youtube link<!-- <span style="color: Red;">*</span> --></label>
                     <input type="text" name="youtubelink"  class="form-control">
                 </div>
                 <div class="col-md-12 mb-3">
                     <label> Upload Homework <!-- <span style="color: Red;">*</span>--> </label>
                     <input type="file" name="assessement" accept="pdf" class="form-control">
                 </div>
              
                  </div>
                  <div class="col-md-12"><input type="submit" name="add_homework" class="btn btn-sm btn-success"></div>
                  </form>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">List</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
               
                <div class="col-md-12">
                  <div class="department-list">
                     <div class="card">
              <div class="card-header">
                <h5 style="font-weight: bold;">Homework List</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-uppercase">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    <th>Homework</th>
                    <th>Youtube Link</th>
                    <th>Date</th>
                    <th>Action</th>
                    
                    <!-- <th>Action</th> -->
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        if($material){$sn=0;
                          foreach ($material as $key => $value) {$sn++; 
                            ?>
                             <tr>
                              <td><?php echo $sn; ?></td>
                              <td><a href="uploads/homework/<?php echo $value['assessment']; ?>"><?php echo  $value['name']; ?></a></td>
                              <td><?php echo $value['link']; ?></td>  
                              <td><?php echo $value['date']; ?></td>
                              <td> <a href="action.php?homeworkdelete=<?php echo $value['pid']; ?>" class="btn btn-sm btn-danger" >Delete</a></td>
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
<!-- <div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Assignment Update</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="action.php" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-12">
              <input type="hidden" name="id" id="id" class="form-control"> 
              <label>Department <span style="color:red;">*</span></label>
              <select class="form-control" required id="department_id"  name="department_id">
                  <option>--SELECT--</option>
                  <?php 
                    foreach ($department as $key => $value) {
                      ?><option selected value="<?php echo $value['id']?>"><?php echo $value['department']?></option><?php
                    }
                  ?>
              </select>
            </div>
            <div class="col-md-12 col-12">
              <label>Subject <span style="color:red;">*</span></label>
              <input type="text" name="subject" id="subject" class="form-control" required="">
            </div>
             <div class="col-md-12 col-12">
              <label>Unit <span style="color:red;">*</span></label>
              <input type="text" name="unit" id="unit" class="form-control" required="">
            </div>
           
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="change-assignment" class="btn btn-primary">Save changes</button>
        </div>
       </form>
    </div>
  </div>
</div> -->
 <script type="text/javascript">
   $(document).ready(function(){
      $('body').on('click','.editdepartment',function(){
        $('#id').val($(this).data('id'));
        $('#department_id').val($(this).data('department_id'));
        $('#subject').val($(this).data('subject'));
        $('#unit').val($(this).data('unit'));
      });
   });
 </script>
</body>
</html>
