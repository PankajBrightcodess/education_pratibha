<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>

<section class="slider">
	<img src="../data1/images/New/03.jpg" alt="Los Angeles">
    <hr>
</section>
<section class="banner-bottom" >
	<div class="container">
        <div class="row">
            <div class="col-md-6	col-6">
            	<a href="centerlogin.php"><img src="../images/fav/01.png" alt="Los Angeles" style="padding:25px;padding-bottom: 0px;" class="img-fluid">
            	<label>Center Login</label></a>
            </div>
            <div class="col-md-6	col-6">
            	<a href="studentlogin.php"><img src="../images/fav/02.png" alt="Los Angeles" style="padding:25px;padding-bottom: 0px;" class="img-fluid">
            	<label>Student Login</label></a>
            </div>
            <div class="col-md-6	col-6">
            	<a href="centerlist.php"><img src="../images/fav/031.png" alt="Los Angeles" style="padding:25px;padding-bottom: 0px;" class="img-fluid">
            	<label>Center List</label></a>

            </div>
            <div class="col-md-6	col-6">
            	<a href="new_center.php"><img src="../images/fav/04.png" alt="Los Angeles" style="padding:25px;padding-bottom: 0px;" class="img-fluid">
            	<label>Apply New Center</label></a>

           </div>
        </div>
    </div>
</section>
<section class="linkup"> 
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-4"><a href="course.php"><img src="../images/fav/002s.png" alt="Los Angeles" class="img-fluid"></a></div>
            <div class="col-md-4 col-4"><a href="franchise.php"><img src="../images/fav/003s.png" alt="Los Angeles" class="img-fluid"></a></div>
            <div class="col-md-4 col-4"><a href="admission.php"><img src="../images/fav/001S.png" alt="Los Angeles" class="img-fluid"></a></div>
        </div>
    </div>
</section>

<section class="linkup"> 
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <label style="font-size:12px; margin-top: 7px;font-weight: 600; color: #353746;">Certified By <hr style="margin:5px;"></label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-2"></div>
            <div class="col-md-2 col-2"><img src="../images/fav/R01T.png"  alt="Los Angeles" class="img-fluid"></div>
            <div class="col-md-2 col-2"><img src="../images/fav/T02T.png" alt="Los Angeles" class="img-fluid"></div>
            <div class="col-md-2 col-2"><img src="../images/fav/T03T.png" alt="Los Angeles" class="img-fluid"></div>
            <div class="col-md-2 col-2"><img src="../images/fav/T04T.png" alt="Los Angeles" class="img-fluid"></div>
            <div class="col-md-2 col-2"></div>
        </div>
    </div>
</section>

<!--  <section class="part">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">         
       <div class="owl-carousel owl-theme">
            <div class="item"><h4>1</h4></div>
            <div class="item"><h4>2</h4></div>
            <div class="item"><h4>3</h4></div>
            <div class="item"><h4>4</h4></div>
            <div class="item"><h4>5</h4></div>
            <div class="item"><h4>6</h4></div>
            <div class="item"><h4>7</h4></div>
            <div class="item"><h4>8</h4></div>
            <div class="item"><h4>9</h4></div>
            <div class="item"><h4>10</h4></div>
            <div class="item"><h4>11</h4></div>
            <div class="item"><h4>12</h4></div>
        </div>
        </div>
      </div>
    </div>
  </section> -->
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