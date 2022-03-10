<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
<section class="pages">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-12 col-lg-4">
              <!-- <div class="news"> -->
                <h2 class="text-center text-info">Enquiry for New Franchise</h2><hr class="border-warning">
                <form action="sendmail.php" method="post" enctype="multipart/form-data">
                  <input type="text" name="name" placeholder="Name :" class="form-control py-2 my-3" required="">
                  <input type="tel" maxlength="10" name="contact" placeholder="Contact :" class="form-control py-2 mb-3" required="">
                  <input type="email" name="email" placeholder="Email :" class="form-control py-2 mb-3" required="">
                  <textarea name="query" placeholder="Message :" class="form-control py-2 mb-3" required style="min-height:75px;"></textarea>
                  <button type="submit" class="my-2 btn btn-success btn-block" name="SendMessage">Send</button>
                  </form>
              <!-- /div> -->
            </div>

        
            
            <div class="clearfix"></div>
        </div>
    </div>
</section>
    <?php include 'footer.php';?>
<?php include 'footer-links.php';?>