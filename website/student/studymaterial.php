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
  if(empty($_SESSION['enroll_no'])){
    header('location:index.php');
  }
  $courseid = $_SESSION['course'];

$query="SELECT * FROM `material_upload` WHERE `course`='1' GROUP BY `added_on` ASC";
$run=mysqli_query($conn,$query);
while ($data=mysqli_fetch_assoc($run)) {
  $selectcourse[]=$data;
}
?>

<?php include 'header-links.php';?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
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
                                    ?><a href="https://shivanyacomputer.com/study_material/image/<?php echo $course['upload_image']; ?>" Download class="btn btn-sm btn-warning">Image Download</a>
                                    <?php } ?>
                          </td>
                           <td>
                              <?php
                              if($course['upload_pdf']!=''){
                                    ?><a href="https://shivanyacomputer.com/study_material/pdf/<?php echo $course['upload_pdf']; ?>" Download class="btn btn-sm btn-success">Pdf Download</a>
                                    <?php } ?>
                           </td>
                            <td>
                            <?php
                              if(!empty($course['video'])){
                                ?>
                                  <video width="320" height="240" controls>
                                     <source src="https://shivanyacomputer.com/study_material/video/<?php echo $course['video']; ?>" type="video/mp4">
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
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>