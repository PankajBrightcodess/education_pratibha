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

   
    $query="SELECT student.*, field_excutive.name AS exe_name FROM student INNER JOIN field_excutive ON student.executive_id=field_excutive.id WHERE student.status='1'";
    $run=mysqli_query($conn,$query);
    while ($data=mysqli_fetch_assoc($run)) {
      $student[]=$data;
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
                <h3 class="card-title">Master Key Student</h3>
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
                <table id="example1 datatable" class="table table-bordered table-hovered">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Father Name</th>
                    <th>Bank Name</th>
                    <th>Bank Account</th>
                    <th>IFSC</th>
                    <th>Address</th>
                    <th>Field Executive</th>
                    <th>Mobile Number</th>
                    <th>Email Id</th>
                    <th>Password</th>
                    <th>Addmission Date</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>

                    <?php 
                        if(!empty($student)){$sn=0;
                          foreach ($student as $key => $value) {$sn++;
                            ?>
                             <tr>
                                <td><?php echo $sn; ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($value['dob'])); ?></td>
                                <td><?php echo $value['fathername']; ?></td>
                                <td><?php echo $value['bankname']; ?></td>
                                <td><?php echo $value['bankaccount']; ?></td>
                                <td><?php echo $value['ifsc']; ?></td>
                                <td><?php echo $value['address']; ?></td>
                                <td><?php echo $value['exe_name']; ?></td>
                                <td><?php echo $value['mobile']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                <td><?php echo $value['password']; ?></td>
                                <!-- <td><?php echo $value['course']; ?></td> -->
                                <td><?php echo date('d-m-Y', strtotime($value['added_on'])); ?></td>
                               <td> <button class="btn btn-sm btn-success editexecutive" data-toggle="modal" data-id="<?php echo $value['id']; ?>" data-name="<?php echo $value['name']; ?>"  
                                data-dob="<?php echo $value['dob']; ?>" 
                               data-fathername="<?php echo $value['fathername']; ?>"
                               data-bankname="<?php echo $value['bankname']; ?>"
                               data-bankaccount="<?php echo $value['bankaccount']; ?>"
                               data-ifsc="<?php echo $value['ifsc']; ?>" data-mobile="<?php echo $value['mobile']; ?>" data-email="<?php echo $value['email']; ?>" data-address="<?php echo $value['address']; ?>" data-executive_id="<?php echo $value['executive_id']; ?>"  data-password="<?php echo $value['password']; ?>" data-target="#departmentModal">&nbsp;&nbsp;<i class="far fa-edit nav-icon"></i>&nbsp;Edit</button></td>
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
           <input type="hidden" name="id" id="id" class="form-control"> 
           <label>Name </label>
           <input type="text" name="name" id="name" class="form-control" required="" value="abc">

          

           <label>DOB </label>
           <input type="date" name="dob" id="dob" class="form-control" required="" >

            <label>Father Name</label>
           <input type="text" name="fathername" id="fathername" class="form-control" required="" >

           <label>Bank Name</label>
           <input type="text" name="bankname" id="bankname" class="form-control" required="" >
           
           <label>Bank Account</label>
           <input type="text" name="bankaccount" id="bankaccount" class="form-control" required="" >

           <label>IFSC</label>
           <input type="text" name="ifsc" id="ifsc" class="form-control" required="" >

            <label>Address </label>
           <input type="text" name="address" id="address" class="form-control" required="" >

            <label>Feild Executive </label>
           <select class="form-control" id="executive_id" name="executive_id">
                <option>---SELECT---</option>
                <?php 
                    if(!empty($executive)){
                        foreach ($executive as $key => $value) {
                           ?><option value="<?php echo $value['id'];?>" ><?php echo $value['name'];?></option><?php
                        }
                    }


                ?>
            </select>

           <label>Mobile Number </label>
           <input type="text" name="mobile" id="mobile" class="form-control" required="" >

            <label>Email Id </label>
           <input type="text" name="email" id="email" class="form-control" required="" >

           <label>Password </label>
           <input type="text" name="password" id="password" class="form-control" required="" >

        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <button type="submit" name="update_student" class="btn btn-primary">Save changes</button>
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
        $('#fathername').val($(this).data('fathername'));
        $('#bankname').val($(this).data('bankname'));
        $('#bankaccount').val($(this).data('bankaccount'));
        $('#ifsc').val($(this).data('ifsc'));
        $('#mobile').val($(this).data('mobile'));
        $('#email').val($(this).data('email'));
        $('#address').val($(this).data('address'));
        $('#city').val($(this).data('city'));
        $('#state').val($(this).data('state'));
        $('#executive_id').val($(this).data('executive_id'));
        $('#pincode').val($(this).data('pincode'));
        $('#password').val($(this).data('password'));
      });
   });
 </script>
 
</body>
</html>