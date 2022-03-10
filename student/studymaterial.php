<?php 
session_start();
include_once('../admin/connection.php');
$msg = "";
  if (isset($_SESSION['msg'])) {
    $msg=$_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  if ($msg != "") {
    echo "<script> alert('$msg') </script>";
  }
  if(empty($_SESSION['enroll_no'])){
    header('location:index.php');
  }
  $courseid = $_SESSION['course'];

$query="SELECT * FROM `material_upload` WHERE `course`='$courseid'";
$run=mysqli_query($conn,$query);
while ($data=mysqli_fetch_assoc($run)) {
  $selectcourse[]=$data;
}
// echo '<pre>';
// echo print_r($selectcourse);die;
?>

<!DOCTYPE html>
<html>
<head lang="en">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php include '../admin/header-links.php'; ?>
  <title>Study Material |  Shivanya Computer</title>
</head>
<body>
  <?php include 'menu.php'; ?>
  <section class="page">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-secondary text-light"><h4>Study Material</h4></div>
            <div class="card-body">
              <div class="row">
               
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table id="datatable" class="table table-hovered table-bordered">
                      <thead>
                        <tr class="bg-dark text-light">
                          <th>#</th>
                          <th>Course</th>
                          <th>Topic</th>
                          <th>Download Image</th>
                          <th>Download PDF</th>
                          <th>wathcing Video</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=0; foreach ($selectcourse as $course) { ++$i; ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $course['course']; ?></td>
                          <td><?php echo $course['topic_name']; ?></td>
                           <td>
                            <?php
                            if($course['upload_image']!=''){
                                    ?><a href="../study_material/image/<?php echo $course['upload_image']; ?>" class="btn btn-sm btn-warning">Image Download</a>
                                    <?php } ?>
                          </td>
                           <td>
                              <?php
                              if($course['upload_pdf']!=''){
                                    ?><a href="../study_material/pdf/<?php echo $course['upload_pdf']; ?>" class="btn btn-sm btn-success">Pdf Download</a>
                                    <?php } ?>
                           </td>
                            <td>
                            <?php
                              if(!empty($course['video'])){
                                ?>
                                  <video width="320" height="240" controls>
                                     <source src="../study_material/video/<?php echo $course['video']; ?>" type="video/mp4">
                                   </video>
                                <?php
                              }
                              else{
                                ?><h6>Comming Soon...</h6><?php
                              }
                            ?>
                            </td>
                          <!-- <td><?php echo $course['mobile']; ?></td>
                          <td><?php echo $course['email']; ?></td> -->
                          
                        </tr>  
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- --------------------------------------------Modal----------------------------------------------- -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update News</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="action.php" method="POST" enctype="multipart/form-data">
                     <div class="form-group row">
                         <div class="col-sm-12 mb-3">
                          <label class="label">Center Code</label>
                         <input type="text" class="form-control" name="cent_code" id="cent_code" placeholder="Enter Center Code">
                         <input type="hidden" class="form-control" name="id" id="id">
                          </div> 
                          <div class="col-sm-12 mb-3">
                            <label class="label">Center Name</label>
                           <input type="text" class="form-control" name="cent_name" id="cent_name" placeholder="Enter Center Name">
                          </div> 
                          <div class="col-sm-12 mb-3">
                            <label class="label">Address</label>
                            <textarea class="form-control" name="address" id="address" rows="3" col="12"></textarea>
                          </div>   
                          <div class="col-sm-12 mb-3">
                            <label class="label">Contact No.</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Center Name">
                          </div>                                
                          <div class="col-sm-12 mb-3">
                            <label class="label">Email</label>
                            <input type="mail" class="form-control" name="mail" id="mail" placeholder="Enter Email">
                          </div>
                             <div class="col-sm-12 mb-3">
                            <label class="label">Password</label>
                            <input type="text" class="form-control" name="pass" id="pass" placeholder="Enter Password">
                          </div>
                          <div class="col-sm-12 mb-3">
                            <label class="label">Role</label>
                            <select name="role" class="form-control">
                              <option >---Select---</option>
                              <option value="2" selected>Center</option>
                            </select>
                          </div>
                      </div>
                    <input type="submit" name="update_center" class="btn btn-warning" value="Update">
                  </form>



      </div>
   <!--    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Update</button>
      </div> -->
    </div>
  </div>
</div>
<!-- --------------------------------------------Modal End------------------------------------------- -->
</body>
<?php include 'footer-links.php'; ?>
<script type="text/javascript">
   

    $('.updt').click(function(e){
    var id = $(this).data('id');
    var cent_code = $(this).data('cent_code');
    var cent_name = $(this).data('cent_name');
    var address = $(this).data('address');
    var mobile = $(this).data('mobile');
    var mail = $(this).data('email');
    var pass = $(this).data('password');
    
    $('#id').val(id);
    $('#cent_code').val(cent_code);
    $('#cent_name').val(cent_name);
    $('#address').val(address);
    $('#mobile').val(mobile);
    $('#mail').val(mail);
    $('#pass').val(pass);
    
  });

    $('.delete').click(function(e){
        debugger;
        // var id=$(this).closest('tr').find('.delete').val();
         var id=$(this).attr('data-id');
        if(confirm('Are you Sure !')){
        $.ajax({
                type:'POST',
                url:'action.php',
               data:{id:id,del_center:'del_center'},
                success: function(result){
                    // alert(result);
                    console.log(result);
                    location.reload();
                    },

                    error: function(){ 
                       alert("error");
                    },
        });
    }
    return false;
    });
  $(document).ready(function(){
    $('#datatable').DataTable();



    // $("body").on("click",".del",function(){
    //   debugger;
    //   var id=$(this).attr('data-id');
    //   if (confirm('You want to delete !!!')) {
    //     $.ajax({
    //       url:"action.php",
    //       type:"POST",
    //       data:{id:id,del_center:'del_center'},
    //       success: function(data){
    //         location.reload();
    //       }
    //     });
    //   }
    //   else{
    //     alert('Record Deletion Cancel!');
    //   }
    // });

    var table=$('.data-table').DataTable({
      scrollCollapse: true,
      autoWidth: false,
      responsive: true,
      columnDefs: [{
        targets: "no-sort",
        orderable: false,
      }],
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      "language": {
        "info": "_START_-_END_ of _TOTAL_ entries",
        searchPlaceholder: "Search"
      },
    });


let editor;
    ClassicEditor
        .create(document.querySelector('#editor1'), {

        })
        .then(newEditor => {
            editor = newEditor;
            //console.log(editor.config._config.toolbar); 
        }, editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

        $('.hoverable').mouseenter(function(){
            //$('[data-toggle="popover"]').popover();
            $(this).popover('show');                    
        }); 

        $('.hoverable').mouseleave(function(){
            $(this).popover('hide');
        });

        function convertToSlug(Text) {
  return Text.toLowerCase()
             .replace(/[^\w ]+/g, '')
             .replace(/ +/g, '-');
}





  });

</script>
</html>