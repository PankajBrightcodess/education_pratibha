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
    $query="SELECT * FROM `winner` WHERE `status`='1'";
    $run=mysqli_query($conn,$query);
    while ($data=mysqli_fetch_assoc($run)) {
      $winner_list[]=$data;
    }
    // echo '<pre>';
    // print_r($executive);die;
 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" contact_us="IE=edge">
  <title>Student Winner List</title>
  <?php include'includes/header-links.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <?php include'includes/top-header.php'; ?>
    <?php include'includes/sidebar.php'; ?>

  <!-- contact_us Wrapper. Contains page contact_us -->
  <div class="content-wrapper">
   <?php include'includes/page-header.php'; ?>

    <!-- Main contact_us -->
   
  <section class="contact_us">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger  ">
              <div class="card-header">
                <h3 class="card-title">Winner list</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                   <div class="col-md-3">
                  <form role="form" action="action.php" id="form_data" enctype="multipart/form-data" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12 mb-2">
                         <label>Student Name<span style="color:red;">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Enter student name" class="form-control">
                        </div>
                        <div class="col-md-12 mb-2">
                         <label>Father Name<span style="color:red;">*</span></label>
                        <input type="text" name="father_name" id="father_name" placeholder="Enter father name" class="form-control">
                        </div>
                        <div class="col-md-12 mb-2">
                         <label>Mother Name<span style="color:red;">*</span></label>
                        <input type="text" name="mother_name" id="father_name" placeholder="Enter mother name" class="form-control">
                        </div>
                    

                         <div class="col-md-12 mb-2">
                          <label>percentage<span style="color:red;">*</span></label>
                         <input type="text" name="percentage" id="percentage"class="form-control" placeholder="Enter the percentage">
                        </div>
                        <div class="col-md-12 mb-2">
                          <label>Winner Year<span style="color:red;">*</span></label>
                         <input type="date" name="year" id="year"class="form-control" placeholder="Y-M-D">
                        </div>
                          <div class="col-md-12 mb-2">
                          <label>Rank<span style="color:red;">*</span></label>
                         <input type="number" name="rank" id="rank"class="form-control" placeholder="Enter rank no">
                        </div>
                          <button class="btn btn-info btn-sm btn-block formdata" type="submit" name="add_winner" style="margin-top: 10px;">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
               
                
                <div class="col-md-9">
                  <div class="department-list">
                     <div class="card">
              <div class="card-header">
                <h5 style="font-weight: bold;">Winner List</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No.:</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Percentage</th>
                    <th>Winner Year</th>
                    <th>Rank</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody >
                 <?php 
                 $sql = "SELECT * FROM `winner` WHERE `status`='1'";
                  $res = mysqli_query($conn,$sql);
                  while($data = mysqli_fetch_assoc($res)){
                    $winner[]=$data;
                  } 
                 if(!empty($winner)){$sn=0;
                  echo '<pre>';
                  // print_r($gallery);
                  foreach ($winner as $key => $row) {$sn++;  $id=$row['pid'];?>
                      <tr>
                        <td><?php echo $sn; ?></td>
                        <td><p ><?php echo $row['name']; ?></p></td>
                        <td><?php echo $row['father_name']; ?></td>
                        <td><?php echo $row['mother_name']; ?></td>
                        <td><?php echo $row['percentage']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><?php echo $row['Rank']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><button class="btn btn-sm btn-success editwinner" data-pid="<?php echo $row['pid']; ?>" data-name="<?php echo $row['name']; ?>"
                           data-father_name="<?php echo $row['father_name']; ?>"
                           data-mother_name="<?php echo $row['mother_name']; ?>"
                           data-rank="<?php echo $row['Rank']; ?>"
                           data-percentage="<?php echo $row['percentage']; ?>"
                           data-year="<?php echo $row['year']; ?>"
                          
                           data-toggle="modal" data-target="#exampleModal" >&nbsp;&nbsp;<i class="far fa-edit nav-icon" ></i> &nbsp;Edit</button> <a href="action.php?deletewinner=<?php echo $row['pid']; ?>" class="btn btn-sm btn-danger" >Delete</a></td>
                         

                    <?php
                  }
                 }
                         
                ?>
                        
                            
                        </tr>
                 
                    </tbody>
                 
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
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background:white;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">winner Edit</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="action.php" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="row">
         <div class="col-md-12 col-lg-12 col-12 mb-2">
            <input type="hidden" name="snoEdit" id="snoEdit">
         
           
       </div>
       <div class="col-md-12 col-lg-12 col-12 mb-2">
            <label>Name<span style="color:red;">*</span></label>
            <input class="form-control" type="text" name="name-edit" id="name-edit">
       </div>
        <div class="col-md-12 col-lg-12 col-12 mb-2">
            <label>Father Name<span style="color:red;">*</span></label>
            <input class="form-control" type="text" name="father_name-edit" id="father_name-edit">
            
       </div>
        <div class="col-md-12 col-lg-12 col-12 mb-2">
            <label>Mother mother-Name<span style="color:red;">*</span></label>
            <input class="form-control" type="text" name="mother_name-edit" id="mother_name-edit">
            
       </div>
        <div class="col-md-12 col-lg-12 col-12 mb-2">
            <label>Percentage<span style="color:red;">*</span></label>
            <input class="form-control" type="text" name="percentage-edit" id="percentage-edit">
            
       </div>
        <div class="col-md-12 col-lg-12 col-12 mb-2">
            <label>Winner year<span style="color:red;">*</span></label>
            <input class="form-control" type="date" name="year-edit" id="year-edit">
            
       </div>
       <div class="col-md-12 col-lg-12 col-12 mb-2">
          <label>Rank<span style="color:red;">*</span></label>
          <input type="number" name="Rank-edit" id="Rank-edit" class="form-control" >
       </div>
      

  
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_winner" class="btn btn-info updatedata">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>






    <!-- /.contact_us -->
  </div>
  <!-- /.contact_us-wrapper -->
 <?php include'includes/copyright.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar contact_us goes here -->
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

<script type="text/javascript">
  
  $('.formdata').click(function(e){
    debugger;
    // var name = $('#name').val();  
    // var fname = $('#fname').val();
    // var address = $('#address').val();
    // var event = $('#event').val();
    // var city = $('#city').val();
    // var mobile = $('#mobile').val();
    // var alt_mobile = $('#alt_mobile').val();
    // var email = $('#email').val();
    // var aadhar = $('#aadhar').val();
    // var password = $('#password').val();
    // var upload_image = $('#upload_image').val();
    var address = $('#address').val();
    var mobile = $('#mobile').val();
    var email = $('#email').val();
    
    $.ajax({
      type:'POST',
      url:'action.php',
      data:{address:address,mobile:mobile,email:email,add_contact_us='add_contact_us'},
       success: function(result){
                    
                   location.reload();
                    },

                    error: function(){ 
                       alert("error");
                    },
    })
   
  });

   $('.updatedata').click(function(e){
      // debugger;
    // var name = $('#name').val();  
    // var fname = $('#fname').val();
    // var address = $('#address').val();
    // var event = $('#event').val();
    // var city = $('#city').val();
    // var mobile = $('#mobile').val();
    // var alt_mobile = $('#alt_mobile').val();
    // var email = $('#email').val();
    // var aadhar = $('#aadhar').val();
    // var password = $('#password').val();
    // var upload_image = $('#upload_image').val();
    var id = $('#snoEdit').val();
    var contact_us_edit = $('#contact_us-edit').val();
    $.ajax({
      type:'POST',
      url:'action.php',
      data:{id:id,contact_us_edit:contact_us_edit, update_contact_us='update_contact_us'},
       success: function(result){
                  
                   location.reload();
                    },

                    error: function(){ 
                       alert("error");
                    },
    })
   
  });


  // $('.event').change(function(e){
   
  //   var id = $(this).val();  
    
  //   $.ajax({
  //     type:'POST',
  //     url:'action.php',
  //     data:{id:pid,upload_image:'upload_image'},
  //      success: function(result){
  //                   console.log(result);
  //                         $('.city').html(result);
  //                   },

  //                   error: function(){ 
  //                      alert("error");
  //                   },
  //   })
   
  // });
</script>
 <script type="text/javascript">
   $(document).ready(function(){
      $('body').on('click','.editwinner',function(){
        //debugger;
        $('#snoEdit').val($(this).data('pid'));
        $('#name-edit').val($(this).data('name'));
        $('#father_name-edit').val($(this).data('father_name'));
        $('#mother_name-edit').val($(this).data('mother_name'));
        $('#percentage-edit').val($(this).data('percentage'));
        $('#year-edit').val($(this).data('year'));
        $('#Rank-edit').val($(this).data('rank'));
        
      
      
       
      });
   });
 </script>
</body>
</html>
