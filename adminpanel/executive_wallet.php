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
  <title>Executive wallet</title>
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
                <h3 class="card-title">Executive Wallet</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-md-3">
                  <form role="form" action="action.php" method="post">
                    <input type="hidden" name="type" value="field_executive">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <label>Wallet</label>
                          <input type="text" name="amount" class="form-control" required="" placeholder="Wallet amount:">
                        </div>
                        <div class="col-md-12">
                          <label>Executive Email</label>
                          <select name="user_id" class="form-control">
                             <?php 
                               $query="SELECT * FROM `field_excutive` WHERE `status`='1'";
                                $run=mysqli_query($conn,$query);
                                while ($data=mysqli_fetch_assoc($run)) {
                                  $executive[]=$data;
                                }
                                if(!empty($executive)){$sn=0;
                                foreach ($executive as $key => $row) {$sn++;  $id=$row['id'];?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['email']; ?>&nbsp;&nbsp;name :<?php echo $row['name']; ?></option>
                                <?php  }
                              } ?>
                          </select>
                          
                                
                        </div>
                        <div class="col-md-12">
                          <label>Description</label>
                          <textarea  type="text" name="description" class="form-control" required="" placeholder="Description for purpose:"></textarea>
                        </div>
                        
                        <div class="col-md-4">
                          <button class="btn btn-primary btn-sm btn-block" type="submit" name="add_executive_wallet" style="margin-top: 10px;">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-9">
                  <div class="department-list">
                     <div class="card">
              <div class="card-header">
                <h5 style="font-weight: bold;">Executive Wallet</h5>
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
                 $query = "SELECT field_excutive.id, wallet.user_id,wallet.amount, wallet.description, wallet.date,field_excutive.name,field_excutive.email FROM field_excutive INNER JOIN wallet ON field_excutive.id=wallet.user_id WHERE wallet.type= 'field_executive'";
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
                          <td><?php echo $row['description']; ?>Minutes</td>
                          <td><?php echo date('d-m-y', strtotime($row['date'])); ?></td>
                          <td>
                            <button class="btn btn-sm btn-success editwallet" data-toggle="modal" 
                            data-id="<?php echo $row['id']; ?>" 
                            data-user_id ="<?php echo $row['user_id']; ?>"
                            data-amount="<?php echo $row['amount']; ?>"
                            data-description="<?php echo $row['description']; ?>"
                            data-target="#departmentModal">&nbsp;&nbsp;<i class="far fa-edit nav-icon"></i>&nbsp;Edit</button>  <a href="action.php?deletemaster=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" >Delete</a>
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
                          <label>Email/Name</label>
                         <select name="user_id" id="user_id" class="form-control">
                           <?php 
                               $query="SELECT * FROM `field_excutive` WHERE `status`='1'";
                                $run=mysqli_query($conn,$query);
                                while ($data=mysqli_fetch_assoc($run)) {
                                  $executive1[]=$data;
                                }
                                if(!empty($executive1)){$sn=0;
                                foreach ($executive1 as $key => $row1) {$sn++;  $id=$row1['id'];?>
                            <option value="<?php echo $row1['id']; ?>"><?php echo $row1['email']; ?>&nbsp;&nbsp;name :<?php echo $row1['name']; ?></option>
                                <?php  }
                              } ?>
                          </select>
                         
                        </div>
                         <div class="col-md-12">
              <label>Description</label>
              <textarea type="textarea" id="description" name="description" class="form-control"></textarea>
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="update_executive_wallet" class="btn btn-primary">Save changes</button>
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
