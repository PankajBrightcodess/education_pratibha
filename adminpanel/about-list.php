<?php
session_start();

include'connection.php';
$msg = "";
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if ($msg != "") {
        echo "<script> alert('$msg')</script>";
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
                <h3 class="card-title">About Us</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="row">
                <div class="col-md-3">
                  <form action="action.php" id="form_data" enctype="multipart/form-data" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12 mb-2">
                         <label>About Text1</label>
                         <textarea class="form-control" name="about" id="about" placeholder="Enter about text" height="30;" width="40" required="false"> </textarea>
                        
                        </div>
                         <div class="col-md-12 mb-2">
                         <label>About Text2</label>
                         <textarea class="form-control" name="about2" id="about2" placeholder="Enter about text" height="30;" width="40" required="false"> </textarea>
                        
                        </div>
                         <div class="col-md-12 mb-2">
                          <label>Upload Image</label>

                          <input type="file" name="upload_image" id="upload_image" class="form-control">
                          
                        </div>
                          <button class="btn btn-info btn-sm btn-block formdata" type="submit" name="add_about" style="margin-top: 10px;">Save</button>
                        </div>
                      </div>
                    </div>
                  </form>
           
               
                
                <div class="col-md-9">
                  <div class="department-list">
                     <div class="card">
              <div class="card-header">
                <h5 style="font-weight: bold;">About list</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No.:</th>
                    <th>About Text</th>
                      <th>About Text2</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody >
                 <?php 
                 $sql = "SELECT * FROM `about_us` WHERE `status`='1'";
                  $res = mysqli_query($conn,$sql);
                  while($data = mysqli_fetch_assoc($res)){
                    $about_us[]=$data;
                  } 
                 if(!empty($about_us)){$sn=0;
                  echo '<pre>';
                  // print_r($gallery);
                  foreach ($about_us as $key => $row) {$sn++;  $id=$row['id'];?>
                      <tr>
                        <td><?php echo $sn; ?></td>
                        <td><?php echo $row['text']; ?></td>
                        <td><?php echo $row['text2']; ?></td>
                        <td><img src="uploads/gallery/<?php echo $row['images']; ?>" height="200" width="300"></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><button class="btn btn-sm btn-success editabout" 
                          data-id="<?php echo $row['id']; ?>"
                          data-text="<?php echo $row['text']; ?>"
                          data-text2="<?php echo $row['text2']; ?>"  
                          data-images="uploads/gallery/<?php echo $row['images']; ?>" 
                          data-toggle="modal" data-target="#exampleModal" >&nbsp;&nbsp;<i class="far fa-edit nav-icon" ></i> &nbsp;Edit</button>
                        <a href="action.php?aboutdelete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" >Delete</a>
                        </td> 
                    
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
      <form role="form" action="action.php" id="form_data" enctype="multipart/form-data" method="post">
      <div class="modal-body">
      <div class="row">
         <div class="col-md-12 col-lg-12 col-12 mb-2">
            <input type="hidden" name="snoEdit" id="snoEdit"> 
         </div>
          <div class="col-md-12 col-lg-12 col-12 mb-2">
            <label>About Text</label>
            <textarea class="form-control" name="about-edit" id="about-edit" required="false"></textarea>
           
          </div>
          <div class="col-md-12 col-lg-12 col-12 mb-2">
            <label>About Text2</label>
            <textarea class="form-control" name="about2-edit" id="about2-edit" required="false"></textarea>
          </div>
          <div class="col-md-12 mb-2">
            <label>Upload Image.</label>
            <input type="file" name="upload_image" id="upload_image" class="form-control">              
          </div>
      
  
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="update_about" class="btn btn-info updatedata">Update</button>
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
   $(document).ready(function(){
      $('body').on('click','.editabout',function(){
        // debugger;
        $('#snoEdit').val($(this).data('id'));
        $('#about-edit').val($(this).data('text'));
        $('#about2-edit').val($(this).data('text2'));
        $('#upload_image').val($(this).data('images'));
       
      });
   });
 </script>

 
</body>
</html>
