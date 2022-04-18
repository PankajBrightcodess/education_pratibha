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
    $sql = "SELECT * FROM `about_us` WHERE `status`='1'";
                  $res = mysqli_query($conn,$sql);
                  while($data = mysqli_fetch_assoc($res)){
                    $about_us[]=$data;
                  } 
 
?>



<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
<section class="pages">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center text-info"><h2>About Us</h2><hr class="border-warning"></div>
              <?php if(!empty($about_us)){
                  echo '<pre>';
                  // print_r($gallery);
                  foreach ($about_us as $key => $row) { ?>
                <div class="col-lg-6 col-12">
                    
                    <p><?php echo $row['text']; ?>

                        <!-- Established in the year 2017, The Education Pratibha Darpan in Bokaro, Bokaro is a top player in the category Computer Academy in the Bokaro. Education Pratibha Darpan Private Limited to offer quality education which will ultimately lead the young minds to a successful career. We do not limit ourselves only to classroom teaching but we think beyond it. Registered Under Ministry of Corporate Affairs, Govt. of India and Registered under Income Tax Department, Govt. of India.The Company is also Certified by Quality Management System An ISO 9001:2015 Certified.The Institution Conducting Computer Oriented Courses. It Offers Courses of One Month, Two Months, Three Months, Six Months, One Year, One Year Six Months, Two Years and Short Term Duration Courses.The Institute Provide Value Based Quality Education For Computer Technology. --></p>
                </div>
                <div class="col-lg-6 col-12">
                    <img src="../adminpanel/uploads/gallery/<?php echo $row['images']; ?>" class="img-fluid">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12">
                     <p><?php echo $row['text']; ?> <!-- We embrace a learning environment that will prepare you for the path ahead. Our classes incorporate traditional learning styles as well as hands-on experiences. It is known to provide top service in the following categories: DNITC, DCITC, PG-DCSC, MDCSC, ADCPC, DCOMPC, ADCSC, DCOAC, MCCSC etc. Your success is our priority. To support our inclusive community, we provide a personal approach, tailoring learning methods to each student's needs. our time duration is 07:00 AM to 05:00 PM. --></p>
                </div>
            </div>
            <?php
        }
    } 
    ?>
        </div>
</section>






   <script>
   $(document).ready(function(){
    $(".owl-carousel").owlCarousel();
     $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
    });

   });

 </script>
<?php include 'footer.php';?>
<?php include 'footer-links.php';?>