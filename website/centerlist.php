<?php 
session_start();
  include_once('connection.php');
  $msg = "";
  if (isset($_SESSION['msg'])) {
    $msg=$_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  if ($msg != "") {
    echo "<script> alert('$msg') </script>";
  }
  $query="SELECT * FROM `sh_addcenter`";
  $run=mysqli_query($conn,$query);
  while ($data=mysqli_fetch_assoc($run)) {
    $center[]=$data;
  }
  // echo '<pre>';
  // print_r($center);die;
?>
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>

   
<section class="pages">
        <div class="container">
            <div class="text-center text-info"><h2>Center List</h2><hr class="border-warning"></div>
            <div class="row">
               <div class="col-md-12 col-12 table-responsive">
                   <table class="table" style="border-radius: 20px; border: 1px;">
                   <thead>
                       <tr style="background: #856C96; border-radius:10px; border:1px;color: white;" >
                           <th>S.N.</th>
                           <th>CENTER CODE</th>
                           <th>CENTER NAME</th>
                           <th>ADDRESS</th>
                           <th>CONTACT NUMBER</th>
                       </tr>
                   </thead>
                   <tbody style="background:white;">
                    <?php
                        if(!empty($center)){
                            $i=0;
                            foreach ($center as $key => $value) {
                                $i++;
                                ?>
                                <tr>
                                   <td><?php echo $i.'.';?></td>
                                   <td><?php echo $value['cent_code']?></td>
                                   <td><?php echo $value['cent_name']?></td>
                                   <td><?php echo $value['address']?></td>
                                   <td><?php echo $value['mobile']?></td>
                                </tr>



                                <?php
                            }
                        }
                    ?> 
                   </tbody>
               </table> 
               </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php';?>
<?php include 'footer-links.php';?>