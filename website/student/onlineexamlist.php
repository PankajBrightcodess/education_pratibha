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
  if($_SESSION['role']!='3'){
    header('location:index.php');
  }
  $id = $_SESSION['enroll_id'];
   

$query="SELECT * FROM `student` WHERE `id`='$id'";
$run=mysqli_query($conn,$query);
$check=mysqli_fetch_assoc($run);
// echo '<pre>';
// print_r($check);die;
if($check['payment_status'] == '1'){
  $sql = "select * from test_master where status = '1'";
    $res = mysqli_query($conn,$sql);
    while ($data=mysqli_fetch_assoc($res)) {
      $onlinetest[]=$data;
    }
  
}
else{

header('location:pay.php');
}

?>
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
 <section class="page">
    <div class="container-fluid">
      <div class="row">
        <?php 

          if(!empty($onlinetest)){
            foreach ($onlinetest as $key => $value) {
                ?>
                <a href="onlineexam.php?id=<?php echo $value['id'];?>" style="color: black;"><div class="col-md-9 mb-3">
                  <div class="card">
                   <div class="card-header bg-secondary text-light text-center"><span><strong>Attempt</strong></span></div>
                    <div class="card-body">
                      <div class="row">
                       <div class="col-md-9 col-9 mb-5">
                          <h6><?php echo $value['test_name'];?>(<?php echo date('d M Y', strtotime($value['added_on']));?>)</h6>
                       </div>
                       
                       <div class="col-md-3 col-3">
                          <img src="../../images/logo/logo.png" class="img-fluid">
                      </div>
                          <div class="col-4" style="font-size: 10px;"><strong><?= $value['no_question']; ?> Questions</strong></div>
                          <div class="col-4" style="font-size: 10px;"><strong><?= $value['total_marks']; ?> Marks</strong></div>
                          <div class="col-4" style="font-size: 10px;"><strong><?= $value['time_duration']; ?> Minutes</strong></div>
                    </div>
                  </div>

                </div>
              </div></a>

                <?php
            }
          }



        ?>
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