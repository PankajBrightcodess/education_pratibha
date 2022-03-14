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
    $query="SELECT * FROM `department_master` WHERE `status`='1'";
    $run=mysqli_query($conn,$query);
    while ($data=mysqli_fetch_assoc($run)) {
      $department[]=$data;
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Faculty</title>
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
                <h3 class="card-title">Master Key of Add Faculty</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-md-12">
                  <form role="form" action="action.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">Faculty Name<span style="color:red;">*</span></label>
                          <input type="text" name="name" class="form-control" placeholder="Faculty Name:" required>
                        </div>
                       
                        <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">Mobile No.<span style="color:red;">*</span></label>
                            <input type="text" name="mobile_no" class="form-control" placeholder="Mobile No.:" required>
                        </div>
                        <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">Alternate Mobile No.</label>
                            <input type="text" name="alt_mobile" class="form-control" placeholder="Alternate Mobile No.:" required>
                        </div>
                        <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">Aadhar No<span style="color:red;">*</span></label>
                            <input type="text" name="aadhar_no" class="form-control" placeholder="Aadhar Number:" required>
                        </div>
                        <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">Email Id <span style="color:red;">*</span></label>
                            <input type="email" name="email_id" class="form-control" placeholder="Email Id.:" required>
                        </div>
                         <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">PAN No. <span style="color:red;">*</span></label>
                            <input type="taxt" name="panno" class="form-control" placeholder="PAN No.:" required>
                        </div>
                        <div class="col-md-12">
                          <h4 style="margin-bottom: 3px; margin-top: 8px;">Address</h4>
                        </div>
                        <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">Village/City<span style="color:red;">*</span></label>
                            <input type="text" name="vill_city" class="form-control" placeholder="Village/City:" required>
                        </div>
                         <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">Post<span style="color:red;">*</span></label>
                            <input type="text" name="post" class="form-control" placeholder="Post:" required>
                        </div>
                        <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">Land Mark<span style="color:red;">*</span></label>
                            <input type="text" name="landmark" class="form-control" placeholder="Land Mark:" required>
                        </div>
                        <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">Dist<span style="color:red;">*</span></label>
                            <input type="text" name="dist" class="form-control" placeholder="Dist:" required>
                        </div>
                        <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">State<span style="color:red;">*</span></label>
                            <input type="text" name="state" class="form-control" placeholder="State:" required>
                        </div>
                        <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">Pin<span style="color:red;">*</span></label>
                            <input type="text" name="pin" class="form-control" placeholder="Pin:" required>
                        </div>
                        <div class="col-md-12">
                          <h4 style="margin-bottom: 3px; margin-top: 8px;">Qualification</h4>
                        </div>
                        <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">Heighest Qualification<span style="color:red;">*</span></label>
                            <input type="text" name="heighest" class="form-control" placeholder="Heighest Qualification" required>
                        </div>
                        <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">Passing Date<span style="color:red;">*</span></label>
                            <input type="date" name="passing_date" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                          <label style="margin-bottom: 3px; margin-top: 8px;">Grade<span style="color:red;">*</span></label>
                            <input type="text" name="rank" class="form-control" placeholder="Grade :" required>
                        </div>
                        <div class="col-md-12">
                          <h4 style="margin-bottom: 3px; margin-top: 8px;">Department</h4>
                        </div>
                        <div class="col-md-4">
                            <label style="margin-bottom: 3px; margin-top: 8px;">Choose Department<span style="color:red;">*</span></label>
                              <select class="form-control" required name="department_id">
                              <option>--SELECT--</option>
                              <?php 
                                foreach ($department as $key => $value) {
                                  ?><option value="<?php echo $value['id']?>"><?php echo $value['department']?></option><?php
                                }
                              ?>
                            </select>
                        </div>
                        <div class="col-12"><hr></div>
                        <div class="cl-md-2">
                          <button type="submit" name="add-Faculty" class="btn btn-sm btn-success mt-3">Submit</button>
                        </div>
                      </div>
                    </div>
                  </form>
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
 <script type="text/javascript">
    $(document).ready(function(){
      $('#cat_id').on('change', function(){
        var cat = $(this).val();
        // alert(cat);
         $.ajax({
          type: "POST",
          url: "ajax.php",
          data: {cat:cat},
          success: function (data) {
            // console.log(data);
            var val = JSON.parse(data);
            var opt = "<option value=''>----Select Subcategory----</option>";
            $.each(val,function(k,v){
              // console.log(v.subcategory);
                opt += "<option value='"+v.subcat_id+"'>"+v.subcategory+"</option>";
            });
            $('#subcategory').html(opt);
          }
        });
      });
   });
 </script>
</body>
</html>
