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
    $query="SELECT * FROM `online_question` WHERE `status`='1'";
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
  <title>Add Online Question</title>
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
                <h3 class="card-title">Add Online Question</h3>
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
                  <form method="POST" action="action.php" enctype="multipart/form-data">
                <div class="row">
                  <!-- <div class="col-md-12"> -->
                    <div class="col-md-12 mb-3">
                      <label>Test<span style="color: Red;">*</span></label>
                     <input type="text" name="course" class="form-control" placeholder="Enter Test Name">
                </div>
                <div class="col-md-12 mb-3  ">
                   <label>Question<span style="color: Red;">*</span></label>
                     <textarea name="question" placeholder="Enter Question" class="form-control" id="editor" rows="4"></textarea>
                </div>
                <div class="col-md-6">
                   <label>a)<span style="color: Red;">*</span></label>
                     <input type="text" name="option_a" placeholder="Enter Option A" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                   <label>b)<span style="color: Red;">*</span></label>
                     <input type="text" name="option_b" placeholder="Enter Option B" class="form-control">
                </div>
                <div class="col-md-6">
                   <label>c)<span style="color: Red;">*</span></label>
                     <input type="text" name="option_c" placeholder="Enter Option C" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                   <label>d)<span style="color: Red;">*</span></label>
                     <input type="text" name="option_d" placeholder="Enter Option D"  class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                   <label>Correct Answer<span style="color: Red;">*</span></label>
                     <input type="text" name="correct_ans" placeholder="Enter Correct Answer" class="form-control">
                </div>
                   <div class="col-md-12 mb-5">
                   <label>Marks<span style="color: Red;">*</span></label>
                     <input type="text" name="marks" placeholder="Enter Marks" class="form-control">
                </div>
                                   <div class="col-md-12 mb-5">
                   <label>Timer<span style="color: Red;">*</span></label>
                     <input type="time" name="timer" class="form-control">
                </div>
                  <!-- </div> -->
                  <div class="col-md-12"><input type="submit" name="submit_question" class="btn btn-sm btn-success"></div>
                </div>
                  </form>
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
                <h5 style="font-weight: bold;">Study Material List</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped text-uppercase">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    <th>Test Name</th>
                    <th>Questions</th>
                    <th>Marks</th>
                    <th>Timer</th>
                    <th>upload date</th>
                    
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
                              <td><?php echo $value['course']; ?></td>
                               <td><?php echo $value['question']; ?></td>
                                <td><?php echo $value['marks']; ?></td>
                                 <td><?php echo $value['timer']; ?></td>
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
  <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
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
