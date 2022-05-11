<?php 
session_start();
include '../connection.php';
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
             
                  <?php
                   $ids=$_SESSION['exe_id'];
                  $sql0="SELECT * FROM `student` WHERE `executive_id`='$ids' AND `payment_status` = '0'";
                  $res0=mysqli_query($conn,$sql0);
                  $nm0=mysqli_num_rows($res0);
                  $sqll="SELECT * FROM `student` WHERE `executive_id`='$ids' AND `payment_status` = '1'";
                  $res1=mysqli_query($conn,$sqll);
                  $nm1=mysqli_num_rows($res1);
                  ?>
                <div class="row" style="padding:19px;">
                    <div class="col-6" style="background-color: #20c997; color: white; text-align: center;">
                      Paid Student: <h3><br><?php echo $nm1 ; ?></h3>
                    </div>
                     
                     <div class="col-6" style="background-color:#ca4653; color:white; text-align: center;">
                      Unpaid Student: <h3> <br><?php echo $nm0 ; ?></h3>
                    </div>
                </div>
  

      <div class="row">  
        <div class="col-md-12 col-12">
          <div class="table-responsive-sm">
            <table id="datatable" class="table table-hovered table-bordered" width="100%">
                      <thead>
                        <tr class="bg-dark text-light">
                          <th>Sno</th>
                          <th>Student's Name</th>
                          <th>Qualifaction</th>
                           <th>D O B</th>
                          <th>Mobile No</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>payment Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id=$_SESSION['exe_id'];
                        // $query = "SELECT student.*, addpayment.payment_status FROM addpayment LEFT JOIN student ON addpayment.student_id=student.id WHERE addpayment.executive_id='$id'";
                                  // print_r($query);die;
                            $query="SELECT * FROM `student` WHERE `executive_id`='$id'";
                            $run=mysqli_query($conn,$query);
                            // print_r($run);die;
                            while ($data=mysqli_fetch_assoc($run)) {
                                  $result[]=$data;
                                }
                                // print_r($result);die;
                            if(!empty($result)){ $i=0;  foreach ($result as $uploadresult) { $i++; ?>
                        <tr>
                           <td><?php echo $i; ?></td>
                          <td><?php echo $uploadresult['name']; ?></td>  
                          <td><?php echo $uploadresult['ac_qualify']; ?></td>
                          <td><?php echo $uploadresult['dob']; ?></td>
                          <td><?php echo $uploadresult['mobile']; ?></td>
                           <td><?php echo $uploadresult['email']; ?></td>
                           <td><?php echo $uploadresult['address']; ?></td>
                          <td><?php
                             $status= $uploadresult['payment_status'];
                                      if( $status == 1){ ?>
                                          <center  style="background-color: #20c997; color: white; text-align: center;">Paid
                                          </center>
                                    <?php   }

                                      else{ ?>
                                        <center style="background-color:#ca4653; color:white; text-align: center;">Unpaid
                                        </center>
                                  <?php    } ?></td>
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
    </div>
  </div>
</section>
  <!-- --------------------------------------------Modal----------------------------------------------- -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->


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