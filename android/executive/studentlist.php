<?php 
session_start();
include_once('../connection.php');
$msg = "";
  if (isset($_SESSION['msg'])) {
    $msg=$_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  if ($msg != "") {
    echo "<script> alert('$msg') </script>";
  }
  if($_SESSION['role']!='2'){
    header('location:index.php');
  }
  // $id = $_SESSION['cent_id'];
// $query="SELECT * FROM `result` WHERE `center_id`=$id";
// $run=mysqli_query($conn,$query);
// while ($data=mysqli_fetch_assoc($run)) {
//   $center[]=$data;
// }
?>
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
 <section class="page">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-secondary text-light"><h4>Student List</h4></div>
            <div class="card-body">
              <div class="row">
               <div class="col-md-5 mb-5">
          <!-- <div class="col-md-12 dashboard mb-3">
            <h1 style="color:#403226; margin-top: 2rem; text-align: center;"><?php print_r($_SESSION['id'])?></h1>
          </div> -->
         <!--  <form method="POST" action="action.php" enctype="multipart/form-data"> 
            <div class="col-md-12">
              <label>Enroll. No. </label>
              <input type="text" name="enroll" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
              <label>Course </label>
              <input type="text" name="course" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
              <label>Name </label>
              <input type="text" name="name" class="form-control">
              <input type="hidden" name="center_id" value="<?php echo $_SESSION['cent_id']?>" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
              <label>Upload Result </label>
              <input type="file" name="upload_image" class="form-control">
            </div>
            <div class="col-md-12">
              <input type="submit" name="resultupload" class="btn btn-sm btn-success">
            </div>
          </form> -->
          
        </div>
        <div class="col-md-7">
                  <table id="datatable" class="table table-hovered table-responsive table-bordered">
                      <thead>
                        <tr class="bg-dark text-light">
                          <th>#</th>
                          <th>Enorll No</th>
                          <th>Course</th>
                          <th>Student's Name</th>
                          <!-- <th>Result</th>
                          <th>Action</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($center)){ $i=0;  foreach ($center as $uploadresult) { ++$i; ?>
                        <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $uploadresult['enroll']; ?></td>
                          <td><?php echo $uploadresult['course']; ?></td>
                          <td><?php echo $uploadresult['name']; ?></td>
                         <!--  <td><img src="../../upload/<?php echo $uploadresult['upload_image']; ?>" height="100" width="100" class="img-fluid"></td>
                          <td>
                             <a class=" btn btn-sm btn-danger delete" data-id="<?php echo $uploadresult['id'] ?>"><i class="fa fa-trash-alt btn btn-sm btn-danger"></i></a></td> -->
                        </tr>  
                        <?php } }?>
                      </tbody>
                    </table>
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
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>
<script type="text/javascript">
   

  //   $('.updt').click(function(e){
  //   var id = $(this).data('id');
  //   var cent_code = $(this).data('cent_code');
  //   var cent_name = $(this).data('cent_name');
  //   var address = $(this).data('address');
  //   var mobile = $(this).data('mobile');
  //   var mail = $(this).data('email');
  //   var pass = $(this).data('password');
    
  //   $('#id').val(id);
  //   $('#cent_code').val(cent_code);
  //   $('#cent_name').val(cent_name);
  //   $('#address').val(address);
  //   $('#mobile').val(mobile);
  //   $('#mail').val(mail);
  //   $('#pass').val(pass);
    
  // });

    $('.delete').click(function(e){
         var id=$(this).attr('data-id');
        $.ajax({
                type:'POST',
                url:'action.php',
               data:{id:id,del_result:'del_result'},
                success: function(result){
                    // alert(result);
                    console.log(result);
                    location.reload();
                    },
                    error: function(){
                    alert("error");
                    },
        });
    return false;
    });
  $(document).ready(function(){
    $('#datatable').DataTable();

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