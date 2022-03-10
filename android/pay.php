<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
 <section class="pages" id="contactpg">
    <div class="container">
        <form action="action.php" method="post">
            <div class="row ">
                <div class="col-md-12"><h5 class="text-center text-info">Payment</h5><hr class="border-warning"></div>
                <div class="col-md-6 mb-3">
                    <label>Category<span style="color: Red;">*</span></label>
                    <select class="form-control" id="catg" name="category"required>
                         <option>----SELECT----</option>   
                         <option value="franchise">Franchise</option>   
                         <option value="admission">Admission</option>   
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Name<span style="color: Red;">*</span></label>
                    <input type="text" name="name" class="form-control" required> 
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email <span style="color: Red;">*</span></label>
                    <input type="email" name="email" class="form-control" required> 
                </div>
                <div class="col-md-6 mb-3">
                    <label>Phone<span style="color: Red;">*</span></label>
                    <input type="text" name="phone" class="form-control" required> 
                </div>
                <div class="col-md-6  mb-3 " id="course">
                <label>Course<span style="color: Red;">*</span></label>
                <select class="form-control" name="course">
                    <option value="0">---SELECT---</option>
                    <option value="DNITC">Diploma in Nursery teacher training Course (DNITC)</option>
                    <option value="DCITC">Diploma in Computer Teacher Training Course (DCITC)</option>
                    <option value="PG-DCC">PG-Diploma in Computer Course (PG-DCC)</option>
                    <option value="MDCC">Marter Diploma in Computer Course (MDCC)</option>
                    <option value="ADCPC">Advance Diploma in Computer Programming Course (ADCPC)</option>
                    <option value="DCOMPC">Diploma in Computer Office Management & Publishing Course (DCOMPC)</option>
                    <option value="ADCC">Advance Diploma in Computer Course (ADCC)</option>
                    <option value="DCOAC">Diploma in Computer Office & Accounting Course (DCOAC)</option>
                    <option value="MCCC">Master Certificate in Computer Course (MCCC)</option>
                    <option value="DCFAC">Diploma in Computer Financial Accounting Course (DCFAC)</option>
                    <option value="DDTPC">Diploma in Desktop Publishing Course (DDTPC)</option>
                    <option value="DWDC">Diploma in Web Designing Course (DWDC)</option>
                    <option value="DCC">Diploma in Computer Course (DCC)</option>
                    <option value="CCC">Certificate in Computer Course (CCC)</option>
                    <option value="CBCC">Certificate in Basic Computer Course (CBCC)</option>
                    <option value="CCFAC">Certificate in Computer Financial Accounting Course (CCFAC)</option>
                    <option value="CCET">Certificate in Computer English Typing</option>
                    <option value="CCHT">Certificate in Computer Hindi Typing</option>
                    <option value="CCEHT">Certificate in Computer Eng/Hindi Typing</option>
                    <option value="CBC">Certificate in Basic Computer</option>
                    <option value="CESPD">Certificate in English Speaking & PD</option>
                    <option value="CDTP">Certificate in DTP</option>
                    <option value="CT">Certificate in Tally</option>
                    <option value="CBP">Certificate in Basic Programming</option>
                </select>
            </div>
             <div class="col-md-6 mb-3 institute">
                    <label>Institute Name<span style="color: Red;">*</span></label>
                    <input type="text" name="istname" id="istnme" class="form-control"> 
                </div>
          
            <div class="col-md-6 mb-5">
                <label >Amount<span style="color: Red;">*</span></label>
                <input type="text" name="amount" class="form-control" placeholder="0.00" required> 
            </div>
                <div class="clearfix"></div>
            <div class="col-md-12 text-center"><input type="submit" class="btn btn-warning btn-sm" value="Pay Now" name="payment"></div>
            </div>
            
    </form>
    </div>
 </section>
 <?php include 'footer.php';?>
<?php include 'footer-links.php';?>