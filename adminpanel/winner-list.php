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
               
                
                <div class="col-md-12">
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
                    <th>Email</th>
                    <th>Test</th>
                    <th>Total marks</th>
                    <th>Result</th>
                    <th>Percentage</th>
                    <th>Rank</th>
                    <th>Date</th>
                    
                  </tr>
                  </thead>
                  <tbody >
                 <?php 
                 $query = "SELECT master_result.*, student.id AS student_id, student.name AS student_name, student.email AS student_email, test_master.id AS testmaster_id, test_master.test_name AS testmaster_name FROM master_result LEFT JOIN student ON master_result.candi_id=student.id LEFT JOIN test_master ON master_result.exam_id = test_master.id ORDER BY master_result.percentage DESC LIMIT 5";
     $res = mysqli_query($conn,$query);
     while ($data = mysqli_fetch_assoc($res)) {
            $result[] = $data;
     } 
                 if(!empty($result)){$sn=0;
                
                  foreach ($result as $key => $row) {$sn++; ?>
                      <tr>
                       <td><?php echo $sn; ?></td>
                        <td><p ><?php echo $row['student_name']; ?></p></td>
                        <td><?php echo $row['student_email']; ?></td>
                        <td><?php echo $row['testmaster_name']; ?></td>
                        <td><?php echo $row['total_marks']; ?></td>
                        <td><?php echo $row['correct_marks']; ?>/<?php echo $row['total_marks']; ?></td>
                        <td><?php echo $row['percentage']; ?>%</td>
                        <td><?php echo $sn; ?></td>
                       
                        <td><?php echo $row['added_on']; ?></td>
                       <!--  <td><button class="btn btn-sm btn-success editwinner" data-pid="<?php echo $row['pid']; ?>" data-name="<?php echo $row['name']; ?>"
                           data-father_name="<?php echo $row['father_name']; ?>"
                           data-mother_name="<?php echo $row['mother_name']; ?>"
                           data-rank="<?php echo $row['Rank']; ?>"
                           data-percentage="<?php echo $row['percentage']; ?>"
                           data-year="<?php echo $row['year']; ?>"
                          
                           data-toggle="modal" data-target="#exampleModal" >&nbsp;&nbsp;<i class="far fa-edit nav-icon" ></i> &nbsp;Edit</button> <a href="action.php?deletewinner=<?php echo $row['pid']; ?>" class="btn btn-sm btn-danger" >Delete</a></td> -->
                         

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
