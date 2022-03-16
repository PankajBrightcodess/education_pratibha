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
    $query="SELECT * FROM `field_excutive` WHERE `status`='1'";
    $run=mysqli_query($conn,$query);
    while ($data=mysqli_fetch_assoc($run)) {
      $executive[]=$data;
    }
    // echo '<pre>';
    // print_r($executive);die;

   
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Felid Executive List</title>
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
                <h5 style="font-weight: bold;">Feild Executive List</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Mobile Number</th>
                    <th>Email Id</th>
                    <th>Location</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Pincode</th>
                    <th>Password</th>
                    <th>Reg Date</th>                    <!-- <th>Action</th> -->
                    <th>Action</th>                    <!-- <th>Action</th> -->
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        if(!empty($executive)){ $sn=0;
                          foreach ($executive as $key => $value) {$sn++;
                            ?>
                            <tr>
                              <td><?php echo $sn; ?></td>
                              <td><?php echo $value['name']; ?></td>
                              <td><?php echo $value['gender']; ?></td>
                              <td><?php echo date('d-m-Y', strtotime($value['dob'])); ?></td>
                              <td><?php echo $value['mobile']; ?></td>
                              <td><?php echo $value['email']; ?></td>
                              <td><?php echo $value['location']; ?></td>
                              <td><?php echo $value['city']; ?></td>
                              <td><?php echo $value['state']; ?></td>
                              <td><?php echo $value['pincode']; ?></td>
                              <td><?php echo $value['password']; ?></td>
                              <td><?php echo date('d-m-Y', strtotime($value['added_on'])); ?></td>
                              <td> <button class="btn btn-sm btn-success editexecutive" data-toggle="modal" data-id="<?php echo $value['id']; ?>" data-name="<?php echo $value['name']; ?>" data-gender="<?php echo $value['gender']; ?>" data-dob="<?php echo $value['dob']; ?>" data-mobile="<?php echo $value['mobile']; ?>" data-email="<?php echo $value['email']; ?>" data-location="<?php echo $value['location']; ?>" data-city="<?php echo $value['city']; ?>" data-state="<?php echo $value['state']; ?>" data-pincode="<?php echo $value['pincode']; ?>" data-password="<?php echo $value['password']; ?>" data-target="#departmentModal">&nbsp;&nbsp;<i class="far fa-edit nav-icon"></i>&nbsp;Edit</button></td>
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
