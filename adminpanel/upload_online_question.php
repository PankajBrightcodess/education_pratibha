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
    // $query="SELECT * FROM `online_question` WHERE `status`='1'";
    // $run=mysqli_query($conn,$query);
    // while ($data=mysqli_fetch_assoc($run)) {
    //   $material[]=$data;
    // }
    // TEST MASTER KEY
    $query="SELECT * FROM `test_master`";
    $run=mysqli_query($conn,$query);
    while ($datamaster=mysqli_fetch_assoc($run)) {
      $testmaster[]=$datamaster;
    }



   $query=" SELECT online_question.*, test_master.test_name AS test_name FROM online_question INNER JOIN test_master ON online_question.test_id=test_master.id WHERE online_question.status='1'";
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
                       <label>Test</label>
                       <select name="test" id="test" class="form-control">
                      <?php
                            if($testmaster){
                              foreach ($testmaster as $key => $testvalue) { ?>
                                 <option value="<?= $testvalue['id']; ?>"><?= $testvalue['test_name']; ?></option>
                         <?php     
                       }
                         }

                     ?>
                     
                     </select>
                </div>
                <div class="col-md-12 mb-3  ">
                   <label>Question</label>
                     <textarea name="question" placeholder="Enter Question" class="form-control" id="editor" rows="4"></textarea>
                </div>
                <div class="col-md-6">
                   <label>a)</label>
                     <input type="text" name="option_a" placeholder="Enter Option A" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                   <label>b)</label>
                     <input type="text" name="option_b" placeholder="Enter Option B" class="form-control">
                </div>
                <div class="col-md-6">
                   <label>c)</label>
                     <input type="text" name="option_c" placeholder="Enter Option C" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                   <label>d)</label>
                     <input type="text" name="option_d" placeholder="Enter Option D"  class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                   <label>Correct Answer</label>
                     <input type="text" name="correct_ans" placeholder="Enter Correct Answer" class="form-control">
                </div>
                   <div class="col-md-12 mb-5">
                   <label>Marks</label>
                     <input type="text" name="marks" placeholder="Enter Marks" class="form-control">
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
                <h5 style="font-weight: bold;">Online Question List</h5>
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
                     <th>Correct Answer</th>
                      <th>option_a</th>
                       <th>option_b</th>
                        <th>option_c</th>
                         <th>option_d</th>

                    <th>upload date</th>
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
                              <td><?php echo $value['test_name']; ?></td>
                               <td><?php echo $value['question']; ?></td>
                                <td><?php echo $value['marks']; ?></td>
                                <td><?php echo $value['correct_ans']; ?></td>
                                 <td><?php echo $value['option_a']; ?></td>
                                  <td><?php echo $value['option_b']; ?></td>
                                   <td><?php echo $value['option_c']; ?></td>
                                    <td><?php echo $value['option_d']; ?></td>
                                  <td><?php echo $value['added_on']; ?></td>
                                <td><button class="btn btn-sm btn-success editquestion" 
                           data-id="<?php echo $value['id']; ?>" 
                           data-test_id="<?php echo $value['test_id']; ?>"
                           data-question="<?php echo $value['question']; ?>"
                           data-option_a="<?php echo $value['option_a']; ?>"
                           data-option_b="<?php echo $value['option_b']; ?>"
                           data-option_c="<?php echo $value['option_c']; ?>"
                           data-option_d="<?php echo $value['option_d']; ?>"
                           data-correct_ans="<?php echo $value['correct_ans']; ?>"
                           data-marks="<?php echo $value['marks']; ?>"
                           data-toggle="modal" data-target="#exampleModal" >&nbsp;&nbsp;<i class="far fa-edit nav-icon btn-success" ></i> &nbsp;Edit</button> <a href="action.php?deletequestion=<?php echo $value['id']; ?>" class="btn btn-sm btn-danger" >Delete</a></td>
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
<!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background:white;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Question Edit</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <form method="post" action="action.php" enctype="multipart/form-data">
                <div class="row">
                  <!-- <div class="col-md-12"> -->

                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <div class="col-md-12 mb-3">
                       <label>Test</label>
                       <select name="test_name-edit" id="test_name-edit" class="form-control">
                      <?php
                            if($testmaster){
                              foreach ($testmaster as $key => $testvalue) { ?>
                                 <option value="<?= $testvalue['id']; ?>"><?= $testvalue['test_name']; ?></option>
                         <?php     
                       }
                         }

                     ?>
                     
                     </select>
                </div>
                <div class="col-md-12 mb-3  ">
                   <label>Question</label>
                     <textarea name="question-edit" placeholder="Enter Question" class="form-control" id="question-edit" rows="4"></textarea>
                </div>
                <div class="col-md-6">
                   <label>a)</label>
                     <input type="text" name="option_a-edit" id="option_a-edit" placeholder="Enter Option A" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                   <label>b)</label>
                     <input type="text" name="option_b-edit" id="option_b-edit" placeholder="Enter Option B" class="form-control">
                </div>
                <div class="col-md-6">
                   <label>c)</label>
                     <input type="text" name="option_c-edit" id="option_c-edit" placeholder="Enter Option C" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                   <label>d)</label>
                     <input type="text" name="option_d-edit" id="option_d-edit" placeholder="Enter Option D"  class="form-control">
                </div>
                <div class="col-md-12 mb-3">
                   <label>Correct Answer</label>
                     <input type="text" name="correct_ans-edit" id="correct_ans-edit" placeholder="Enter Correct Answer" class="form-control">
                </div>
                   <div class="col-md-12 mb-5">
                   <label>Marks</label>
                     <input type="text" name="marks-edit" id="marks-edit" placeholder="Enter Marks" class="form-control">
                </div>
                  <!-- </div> -->
                  <div class="col-md-12"><input type="submit" name="update_question" class="btn btn-sm btn-success"></div>
                </div>
                  </form>
    </div>
  </div>
</div>


<!-- end modal -->



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
      $('body').on('click','.editquestion',function(){
        //debugger;
        $('#snoEdit').val($(this).data('id'));
        $('#test_name-edit').val($(this).data('test_id'));
        $('#question-edit').val($(this).data('question'));
        $('#option_a-edit').val($(this).data('option_a'));
        $('#option_b-edit').val($(this).data('option_b'));
        $('#option_c-edit').val($(this).data('option_c'));
        $('#option_d-edit').val($(this).data('option_d'));
        $('#correct_ans-edit').val($(this).data('correct_ans'));
        $('#marks-edit').val($(this).data('marks'));
      });
   });
 </script>
</body>
</html>
