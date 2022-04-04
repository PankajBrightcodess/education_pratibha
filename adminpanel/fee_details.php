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
    $query="SELECT * FROM `addpayment` WHERE `status`='1'";
    $run=mysqli_query($conn,$query);
    while ($data=mysqli_fetch_assoc($run)) {
      $details_payment[]=$data;
    }
    // echo '<pre>';
    // print_r($executive);die;

   
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Field Executive List</title>
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
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                
                <div class="col-md-12">
                  <div class="department-list">
                     <div class="card">
              <div class="card-header">
                <h5 style="font-weight: bold;">Fee details List</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    <th>Student Name</th>
                    <th>Phone No</th>
                    <th>Student Fee</th>
                    <th>Date</th>
                    <th>Fee Detail</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        if(!empty($details_payment)){ $sn=0;
                          foreach ($details_payment as $key => $value) {$sn++; $id=$value['id']; ?>
                            <tr>
                              <td><?php echo $sn; ?></td>
                              <td><?php echo $value['name']; ?></td>
                              <td><?php echo $value['phone']; ?></td>
                              <td><?php echo $value['amount']; ?></td>
                              <td><?php echo date('d-m-Y', strtotime($value['added_on'])); ?></td>
                             <!--  <td><?php echo $value['added_on']; ?></td> -->
                             <td>
                             <?php
                             $status= $value['payment_status'];
                                      if( $status == 1){ ?>
                                          <button class="btn btn-sm btn-success">Paid</button>
                                    <?php   }

                                      else{ ?>
                                        <button class="btn btn-sm btn-danger">Unpaid</button>
                                  <?php    }



         
                              ?>
                             </td>
                              
                             
                           </tr>
                          <?php
                          if($status == 1){
                             $rowcount = mysqli_num_rows( $result );
                             echo $rowcount;

                          }
                          elseif(($status == 0) && ($status == 0)){
                            
                          }




                          }
                        }
                    ?>

                </table>
                </div>
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
           <input type="hidden" name="id" id="id" class="form-control" value="1"> 
           <label>Name <span style="color:red;">*</span></label>
           <input type="text" name="name" id="name" class="form-control" required="" value="abc">

           <label>Gender <span style="color:red;">*</span></label>
           <select class="form-control" id="gender" name="gender"><option>--SELECT--</option><option value="male">Male</option><option value="female">Female</option></select>

           <label>DOB <span style="color:red;">*</span></label>
           <input type="date" name="dob" id="dob" class="form-control" required="" >

           <label>Mobile Number <span style="color:red;">*</span></label>
           <input type="text" name="mobile" id="mobile" class="form-control" required="" >

            <label>Email Id <span style="color:red;">*</span></label>
           <input type="text" name="email" id="email" class="form-control" required="" >

           <label>Location <span style="color:red;">*</span></label>
           <input type="text" name="location" id="location" class="form-control" required="" >

           <label>City <span style="color:red;">*</span></label>
           <input type="text" name="city" id="city" class="form-control" required="" >

           <label>State <span style="color:red;">*</span></label>
           <input type="text" name="state" id="state" class="form-control" required="" >

           <label>Pincode <span style="color:red;">*</span></label>
           <input type="text" name="pincode" id="pincode" class="form-control" required="" >

           <label>Password <span style="color:red;">*</span></label>
           <input type="text" name="password" id="password" class="form-control" required="" >

        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <button type="submit" name="update_executive" class="btn btn-primary">Save changes</button>
        </div>
       </form>
    </div>
  </div>
</div>
 <script type="text/javascript">
   $(document).ready(function(){
      $('body').on('click','.editexecutive',function(){
        $('#id').val($(this).data('id'));
        $('#name').val($(this).data('name'));
        $('#gender').val($(this).data('gender'));
        $('#dob').val($(this).data('dob'));
        $('#mobile').val($(this).data('mobile'));
        $('#email').val($(this).data('email'));
        $('#location').val($(this).data('location'));
        $('#city').val($(this).data('city'));
        $('#state').val($(this).data('state'));
        $('#pincode').val($(this).data('pincode'));
        $('#password').val($(this).data('password'));
      });
   });
 </script>
</body>
</html>
