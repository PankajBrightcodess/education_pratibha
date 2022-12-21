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
  <title>Student Wallet</title>
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
                <h3 class="card-title">Student Wallet</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-md-3">
                  <form role="form" action="action.php" method="post">
                    <input type="hidden" name="type" value="student">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Wallet</label>
                          <input type="text" name="amount" class="form-control" required="" placeholder="Wallet amount:">
                        </div>
                        <div class="col-md-12">
                          <label>Student Email</label>
                          <select name="user_id" class="form-control">
                             <?php 
                               $query = "SELECT master_result.*, student.id AS student_id, student.name AS student_name, student.email AS student_email, test_master.id AS testmaster_id, test_master.test_name AS testmaster_name FROM master_result LEFT JOIN student ON master_result.candi_id=student.id LEFT JOIN test_master ON master_result.exam_id = test_master.id ORDER BY master_result.percentage DESC LIMIT 5";
                                 $res = mysqli_query($conn,$query);
                                 while ($data = mysqli_fetch_assoc($res)) {
                                        $result[] = $data;
                                 } 

                                if(!empty($result)){$sn=0;
                                foreach ($result as $key => $row) {$sn++;  $id=$row['id'];?>
                            <option value="<?php echo $row['candi_id']; ?>"><?php echo $row['student_email']; ?>&nbsp;&nbsp;Rank :<?php echo $sn; ?></option>
                                <?php  }
                              } ?>
                          </select>
                          
                                
                        </div>
                        <div class="col-md-12">
                          <label>Description</label>
                          <textarea  type="text" name="description" class="form-control" required="" placeholder="Description for purpose:"></textarea>
                        </div>
                        
                        <div class="col-md-4">
                          <button class="btn btn-primary btn-sm btn-block" type="submit" name="add_student_wallet" style="margin-top: 10px;">Save</button>
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
                    <th>Name</th>
                     <th>Email</th>
                    <th>Amount</th>
                    <th>Description</th>
                   <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php 
                 $query = "SELECT student.id, wallet.user_id,wallet.amount, wallet.description, wallet.date,student.name,student.email FROM student INNER JOIN wallet ON student.id=wallet.user_id WHERE wallet.type= 'student'";
                  $res = mysqli_query($conn,$query);
                  while($data = mysqli_fetch_assoc($res)){
                    $list[]=$data;
                  } 
                 if(!empty($list)){$sn=0;
                  foreach ($list as $key => $row) {$sn++;  $id=$row['id'];?>
                        <tr>
                          <td><?php echo $sn; ?></td>
                          <td><?php echo $row['name']; ?></td>  
                          <td><?php echo $row['email']; ?></td>      
                          <td><?php echo $row['amount']; ?></td>
                          <td><?php echo $row['description']; ?></td>
                          <td><?php echo date('d-m-y', strtotime($row['date'])); ?></td>
                          <td>
                            <!-- <button class="btn btn-sm btn-success editwallet" data-toggle="modal" 
                            data-id="<?php echo $row['id']; ?>" 
                            data-user_id ="<?php echo $row['user_id']; ?>"
                            data-amount="<?php echo $row['amount']; ?>"
                            data-description="<?php echo $row['description']; ?>"
                            data-target="#departmentModal">&nbsp;&nbsp;<i class="far fa-edit nav-icon"></i>&nbsp;Edit</button>  --> <a href="action.php?deletestudentwallet=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" >Delete</a>
                          </td>
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
        <h5 class="modal-title" id="exampleModalLabel"><b>Edit wallet</b></h5>
        
      </div>
       <form action="action.php" method="post">
        <div class="modal-body">
           <input type="hidden" name="SnoEdit" id="SnoEdit" class="form-control"> 
        </div>
         <div class="col-md-12">
              <label>Wallet</label>
              <input type="text" id="amount" name="amount" class="form-control" placeholder="Test Total Marks:">
        </div>
       
         <div class="col-md-12">
                          <label>Time Duration</label>
                         <select name="user_id" id="user_id" class="form-control">
                           <?php 
                               $query = "SELECT master_result.*, student.id AS student_id, student.name AS student_name, student.email AS student_email, test_master.id AS testmaster_id, test_master.test_name AS testmaster_name FROM master_result LEFT JOIN student ON master_result.candi_id=student.id LEFT JOIN test_master ON master_result.exam_id = test_master.id ORDER BY master_result.percentage DESC LIMIT 5";
                                 $res = mysqli_query($conn,$query);
                                 while ($data = mysqli_fetch_assoc($res)) {
                                        $result1[] = $data;
                                 } 

                                if(!empty($result1)){$sn1=0;
                                foreach ($result1 as $key => $row) {$sn1++;  $id=$row['id'];?>
                                 <option value="<?php echo $row['candi_id']; ?>"><?php echo $row['student_email']; ?>&nbsp;&nbsp;Rank :<?php echo $sn1; ?></option>
                                <?php  }
                              } ?>
                          </select>
                          <!-- <input type="time" name="time_duration" id="time_duration" class="form-control" required="" > -->
                        </div>
                         <div class="col-md-12">
              <label>Description</label>
              <textarea type="textarea" id="description" name="description" class="form-control"></textarea>
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="update_wallet" class="btn btn-primary">Save changes</button>
        </div>
       </form>
    </div>
  </div>
</div>
 <script type="text/javascript">
   $(document).ready(function(){
      $('body').on('click','.editwallet',function(){
        $('#SnoEdit').val($(this).data('id'));
        $('#user_id').val($(this).data('user_id'));
        $('#amount').val($(this).data('amount'));
        $('#description').val($(this).data('description'));
        
      });
   });
 </script>
</body>
</html>
