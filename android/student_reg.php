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
  // if($_SESSION['role']!='2'){
  //   header('location:index.php');
  // }
  // $id = $_SESSION['cent_id'];
$query="SELECT * FROM `field_excutive` WHERE `status`='1'";
$run=mysqli_query($conn,$query);
while ($data=mysqli_fetch_assoc($run)) {
  $executive[]=$data;
}
?>
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
<section class="pages">
    <div class="container">
        <form method="post" action="action.php">
       <div class="row enqueryform">
        <div class="col-lg-12 col-12 mb-3">
            <h2 class="text-center text-info">Student Registration Enquiry Form</h2>
            <hr class="border-warning">
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Name<span style="color: Red;">*</span></label>
            <input type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>DOB<span style="color: Red;">*</span></label>
            <input type="date" name="dob" id="dob" placeholder="Enter Your Name" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Address<span style="color: Red;">*</span></label>
            <input type="text" name="address" id="address" placeholder="Enter Your Address" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Mobile<span style="color: Red;">*</span></label>
            <input type="tel" name="mobile" maxlength="10" minlength="10" id="mobile" placeholder="Active Mobile Number" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Email<span style="color: Red;">*</span></label>
            <input type="mail" name="email" id="email" placeholder="Active Email" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Academic Qualification<span style="color: Red;">*</span></label>
            <input type="text" name="ac_qualify" id="ac_qualify" placeholder="Enter Academic Qualification" class="form-control" required>
        </div>
     <!--    <div class="col-md-6 col-12  mb-2">
            <label>Course<span style="color: Red;">*</span></label>
            <select class="form-control" id="course" name="course">
                <option>---SELECT---</option>
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
        </div> -->
        <div class="col-md-6 col-12 mb-2">
             <label>Feild Executive<span style="color: Red;">*</span></label>
            <select class="form-control" id="executive_id" name="executive_id">
                <option>---SELECT---</option>
                <?php 
                    if(!empty($executive)){
                        foreach ($executive as $key => $value) {
                           ?><option value="<?php echo $value['id'];?>" ><?php echo $value['name'];?></option><?php
                        }
                    }


                ?>
            </select>
        </div>
         
         <!-- <div class="col-md-6 col-12 mb-2">
            <label>Training Mode<span style="color: Red;">*</span></label>
            <select class="form-control" id="mode" name="mode">
                <option>---SELECT---</option>
                <option value="ragular">Regular</option>
                <option value="online">Online</option>
                <option value="correspondence">Correspondence</option>
            </select>
        </div> -->
        <div class="col-md-6 col-12 mb-5">
            <label>Password<span style="color: Red;">*</span></label>
            <input type="text" name="password" id="password" placeholder="Enter Academic Qualification" class="form-control" required>
        </div>
        <div class="col-md-4 col-4"></div>
        <div class="col-md-4 col-4"><input type="button" name="student_reg" class="btn btn-sm btn-success form-control student_reg" value="Submit"></div>
        <div class="col-md-4 col-4"></div>

      </div> 
   </form>
    </div>
</section>
 <?php include 'footer.php';?>
<?php include 'footer-links.php';?>
<script type="text/javascript">
     $('.student_reg').click(function(e){
            // debugger;
         var name=$('#name').val();
         var mobile=$('#mobile').val();
         var email=$('#email').val();
         var ac_qualify=$('#ac_qualify').val();
         var course=$('#course').val();
         var executive_id=$('#executive_id').val();
         var password=$('#password').val();
         var dob=$('#dob').val();
         var address=$('#address').val();
        $.ajax({
                type:'POST',
                url:'executive/action.php',
                data:{name:name,mobile:mobile,email:email,ac_qualify:ac_qualify,course:course,executive_id:executive_id,password:password,dob:dob,address:address,student_reg:'student_reg'},
                success: function(result){
                    console.log(result);
                    if(result=='1'){
                        swal("Good job!", "Registered Successfully!", "success");
                        window.location = "studentlogin.php";
                    }
                    else{
                        swal("Opps!", "Something Error!", "error");
                      
                    }
                      
                    },
                    error: function(){ 
                       alert("error");
                    },
        });
    return false;  
    });
</script>