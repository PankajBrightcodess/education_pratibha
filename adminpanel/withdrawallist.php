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
    
    // echo "<pre>";
    // print_r($details_payment);die;
    
   
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Withrawal List</title>
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
                <h5 style="font-weight: bold;">Withdrawal List</h5>
              </div>
              <div class="row">
                <div class="col-md-3 col-3"></div>
                <div class="col-md-2" style="font-weight: 700;">
                  Select Field Executive
                </div>
                <div class="col-md-3 col-4">
                 <form method="post" action="withdrawallist.php">
                    <select class="form-control" name="table" >
                      <option>--Select Option--</option>
                     <option value="student">Student</option>
                     <option value="field_excutive">Field Executive</option>
                  </select>
                
                    <button class="btn btn-sm btn-success" name="search">submit</button>
                
                 </form>
                </div>
                <div class="col-md-3 col-3"></div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                  $sql2 = "SELECT SUM(withdrawal.amount) as total FROM `withdrawal` WHERE `payment_status` = '1'";
                  $res2 = mysqli_query($conn,$sql2);
                  $data=mysqli_fetch_assoc($res2);
                  $total = $data['total'];



                  if(isset($_POST['search'])){
                    $table = $_POST['table'];

                 if(!empty($table)){
                  $query="SELECT $table.*, withdrawal.user_id, withdrawal.id as withdrawalid,withdrawal.unique_id, withdrawal.type, withdrawal.unique_id,withdrawal.amount,withdrawal.added_on as withdrawal_added,withdrawal.transactionid,withdrawal.payment_status as withdrawal_payment_status FROM $table INNER JOIN withdrawal ON $table.id=withdrawal.user_id WHERE $table.status='1'";
                  $run=mysqli_query($conn,$query);
                  while ($data=mysqli_fetch_assoc($run)){
                     $details_payment[]=$data;
                  }
                }
                  else{

                 $query="SELECT field_excutive.*, withdrawal.user_id, withdrawal.id as withdrawalid,withdrawal.unique_id, withdrawal.type, withdrawal.unique_id,withdrawal.amount,withdrawal.added_on as withdrawal_added,withdrawal.transactionid,withdrawal.payment_status as withdrawal_payment_status FROM field_excutive INNER JOIN withdrawal ON field_excutive.id=withdrawal.user_id WHERE field_excutive.status='1'";
                  $run=mysqli_query($conn,$query);
                  while ($data=mysqli_fetch_assoc($run)){
                     $details_payment[]=$data;
                  }

                  }
                 }
                 
                  ?>
                  <div class="row" >

                    <div class="col-12" style="text-align: center; color: #20c997; font-size: 35px;font-weight: 500;">Total Withdrawal : <?php echo $total; ?></div>
                  </div>
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S. No.:</th>
                    <th>Type</th>
                     <th>Uniqueid</th>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Date</th>
                     <th>Bank Name</th>
                    <th>Bank Account</th>
                    <th>IFSC</th>
                    <th>Show TransactionId</th>
                    <th>Transaction Id</th>
                     <th>Payment Aprroved</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        if(!empty($details_payment)){ $sn=0;
                          foreach ($details_payment as $key => $value) {$sn++; $id=$value['id']; ?>
                            <tr>
                              <td><?php echo $sn; ?></td>
                              <td><?php echo $value['type']; ?></td>
                              <td><?php echo $value['unique_id']; ?></td>
                              <td><?php echo $value['name']; ?></td>
                              <td><?php echo $value['mobile']; ?></td>
                              <td><?php echo $value['email']; ?></td>
                              <td><?php echo $value['amount']; ?></td>
                              <td><?php echo date('d-m-Y', strtotime($value['withdrawal_added'])); ?></td>
                              <td><?php echo $value['bankname']; ?></td>
                               <td><?php echo $value['bankaccount']; ?></td> 
                               <td><?php echo $value['ifsc']; ?></td>
                               <td><?php echo $value['transactionid']; ?></td>
                             
                              <td><form method="post" action="action.php">
                                <div class="row"> 
                                  <div class="col-md-6 col-6">
                                    <input type="hidden" name="id" value="<?php echo $value['withdrawalid']; ?>">
                                   <input type="text" name="transactionid" class="form-control">
                                   <input type="hidden" name="type" value="<?php echo $value['type']; ?>">
                                  </div>
                                  <div class="col-6 col-md-6">
                                      <button type="submit" class="btn btn-sm btn-success" name="transaction">submit</button>
                                  </div></div>
                              
                              </form></td>
                              <td>
                             <?php
                             $status= $value['withdrawal_payment_status'];
                                      if( $status == 1){ ?>
                                          <a  class="btn btn-sm btn-success" style="background-color: #20c997; color: white; text-align: center;">Paid</a>
                                    <?php   }

                                      else{ ?>
                                        <a href="action.php?approved_transaction=<?php echo $value['withdrawalid']; ?>/<?php echo $value['type']; ?>"  class="btn btn-sm btn-danger" style="background-color:#ca4653;; color:white; text-align: center;">Unpaid</a>
                                  <?php    }


                          //            if($status == 1){
                          //            $rowcount = count( $status );
                          //            echo '<pre>';
                          //            print_r($rowcount);die;

                          // }
                          // elseif(($status == 0) && ($status == null)){

                          //     $rowcount = count( $status );
                          //     echo $rowcount;
                          // }

         
                              ?>
                             </td>
                               
                             
                           </tr>
                          <?php

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
