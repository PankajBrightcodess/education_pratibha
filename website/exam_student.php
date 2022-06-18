<?php 
session_start();
include 'connection.php';
 $query = "SELECT master_result.*, student.id AS student_id, student.name AS student_name, student.email AS student_email, test_master.id AS testmaster_id, test_master.test_name AS testmaster_name FROM master_result LEFT JOIN student ON master_result.candi_id=student.id LEFT JOIN test_master ON master_result.exam_id = test_master.id";
     $res = mysqli_query($conn,$query);
     while ($data = mysqli_fetch_assoc($res)) {
            $result[] = $data;
     }

?>
  
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<style type="text/css">
  .form-control {
    /* font-size: 10px; */
    /* border: 1px solid #e10a0a; */
    border-radius: 0.25rem;
}
</style>
<section class="blank-course "></section>
 <section class="page">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-secondary text-light"><h4>Appearing Student List</h4></div>
            <div class="card-body">
  
      <div class="row">  
        <div class="col-md-12 col-12">
          <div class="table-responsive-sm">
            <table id="datatable" class="table table-hovered table-bordered" width="100%">
                      <thead>
                        <tr class="bg-dark text-light">
                          <th>Sno</th>
                          <th>Student's Name</th>
                          <th>Student's email</th>
                          <th>Test Name</th>
                          <th>Total Marks</th>
                          <th>Score</th>
                           
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            if(!empty($result)){ $i=0;  
                              foreach ($result as $displayresult) { $i++; ?>
                        <tr>
                           <td><?php echo $i; ?></td>
                          <td><?php echo $displayresult['student_name']; ?></td>
                          <td><?php echo $displayresult['student_email']; ?></td>  
                          <td><?php echo $displayresult['testmaster_name']; ?></td>
                           <td><?php echo $displayresult['total_marks']; ?></td>
                          <td><?php echo $displayresult['correct_marks']; ?>/<?php echo $displayresult['total_marks']; ?></td>
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
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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