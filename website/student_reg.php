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

$query="SELECT * FROM `field_excutive` WHERE `status`='1'";
$run=mysqli_query($conn,$query);
while ($data=mysqli_fetch_assoc($run)) {
  $executive[]=$data;
}
?>
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<style type="text/css">
#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}
#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}
#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
<section class="blank-course "></section>
<section class="pages" style="background-color: #81fbd7; ">


   
<?php  
if(isset($_GET['refid'])){
   $refid = explode('_',$_GET['refid']);
  if($refid[0] == "STD"){
      $stdid = $refid[1]; 
      $query="SELECT * FROM `student` WHERE `id`='$stdid' and `status`='1'";
      $runs=mysqli_query($conn,$query);
      $num = mysqli_num_rows($runs);
      if($num){
        $std_details = mysqli_fetch_assoc($runs); 
        $exeid = $std_details['executive_id'];
        $query1="SELECT * FROM `field_excutive` WHERE `id`='$exeid' and `status`='1'";
        $runs1=mysqli_query($conn,$query1);
        $exe_detail = mysqli_fetch_assoc($runs1);
        $executive_emailid = $exe_detail['email'];
        $executive_id = $exe_detail['id'];  
      }else{
        $executive_emailid = null;
      }
  }elseif($refid[0] == "EXC"){
      $exc_id = $refid[1];
        $query2="SELECT * FROM `field_excutive` WHERE `id`='$exc_id' and `status`='1'";
        $runs2=mysqli_query($conn,$query2);
        $num2 =  mysqli_num_rows($runs2); 
        if($num2 == 1){
        $exe_detail = mysqli_fetch_assoc($runs2);            
        $executive_emailid = $exe_detail['email'];
        $executive_id = $exe_detail['id']; 
        }else{
       $executive_emailid = null;   
        }
  }
 }

?>





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
            <input type="date" name="dob" id="dob" placeholder="D-O-B" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Father Name<span style="color: Red;">*</span></label>
            <input type="text" name="fathername" id="fathername" placeholder="Enter Your Father Name" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>School Name<span style="color: Red;">*</span></label>
            <input type="text" name="school_name" id="school_name" placeholder="Enter School Name" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Bank Name</label>
            <input type="text" name="bankname" id="bankname"  title="Enter capital letter" placeholder="Bank Name" class="form-control" >
        </div> 
        <div class="col-md-6 col-12 mb-2">
            <label>Bank Account No</label>
            <input type="number" maxlength="10" minlength="3" pattern="[0-9][0-9][0-9][0-9]" title="Please enter exactly 10 digits" name="bankaccount" id="bankaccount" placeholder="Bank Account No" class="form-control" >
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>IFSC</label>
            <input type="text" name="ifsc" id="ifsc"  title="must use alphabhet and number" placeholder="Bank IFSC" class="form-control" >
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Address<span style="color: Red;">*</span></label>
            <input type="text" name="address" id="address" placeholder="Enter Your Address" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Mobile<span style="color: Red;">*</span></label>
            <input type="tel" maxlength="10" minlength="3" pattern="[789][0-9]{9}"
           required="required" id="mobile" placeholder="Active Mobile Number" class="form-control" name="mobile">
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Email<span style="color: Red;">*</span></label>
            <input type="mail" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="always use correct email id" placeholder="Active Email" class="form-control" required>
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
             <input type="hidden" name="referalid" id="referalid"  placeholder="Enter Referal ID" <?php if(isset($_GET['refid'])){ echo "readonly"; }  ?> value="<?php if(isset($_GET['refid'])){ echo $_GET['refid']; }  ?>" class="form-control">
              <?php 
               if(!empty($executive_emailid) && $executive_emailid != null){ 
               ?>
             <input type="hidden" name="executive_id"  value="<?php echo $executive_id; ?>">
               <input class="form-control" type="text" name="myInput" value="<?php echo $executive_emailid; ?>" readonly >
              <?php   }else{    ?>
             <select class="form-control" name="executive_id" required>
                 <option value="">-- Select--</option>
                <?php 
                if(!empty($executive)){
                foreach ($executive as $key => $value) { ?>
                 <option value="<?php echo $value['id'];?>"><?php echo $value['email'];?></option>  
                <?php  } }  ?>
             </select>
          <?php  }  ?>
        </div> 
 
        <div class="col-md-6 col-12 mb-5">
        <label>Password<span style="color: Red;">*</span></label>
        <input type="text" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Password" class="form-control" required>
        </div>
        <div class="col-md-4 col-4"></div>
        <div class="col-md-4 col-4"><input type="submit" name="student_reg" id="student_reg" class="btn btn-sm btn-success form-control" value="Submit"></div>
        <div class="col-md-4 col-4"></div>

      </div> 
   </form>



    </div>
</section>
 <?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>

<script type="text/javascript">
    $(document).ready(function(e) {
     $('.aa').hide();
     $('body').on('click','#student_',function(){
     // $('.student_reg').click(function(e){
     // debugger;   
         var refid=$('#referalid').val();
         var name=$('#name').val();
         var mobile=$('#mobile').val();
         var email=$('#email').val();
         var fathername=$('#fathername').val();
         var bankname=$('#bankname').val();
         var bankaccount=$('#bankaccount').val();
         var ifsc=$('#ifsc').val();
         var ac_qualify=$('#ac_qualify').val();
         var course=$('#course').val();
         var executive_id=$('#executive_id').val();
         var password=$('#password').val();
         var dob=$('#dob').val();
         var address=$('#address').val();
        $.ajax({
                type:'POST',
                url:'action.php',
                data:{refid:refid,name:name,mobile:mobile,email:email,ac_qualify:ac_qualify,course:course,password:password,dob:dob,fathername:fathername,bankname:bankname,bankaccount:bankaccount,ifsc:ifsc,address:address,student_reg:'student_reg'},
                success: function(result){
                    // alert(result);
                    // console.log(result);
                    if(result == 1){
                        swal("Good job!", "Registered Successfully!", "success");
                         alert("Registered Successfully!");
                        window.location = "studentlogin.php";
                    }else if(result == 0){
                        swal("Opps!", "Something Error, Try Again !", "error");
                        // window.location = "student_reg.php";
                    }    
                    },
                    error: function(){ 
                       alert("email already used");
                    },
        });
    return false;  
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function(){
      $('body').on('click','.search',function(){
        // debugger;
        $('#myInput').val($(this).data('email'));
         $('#executive_id').val($(this).data('id'));
          $('#myUL').hide();
      });

   });
</script>


<script type="text/javascript">
    function myFunction(){
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script> 