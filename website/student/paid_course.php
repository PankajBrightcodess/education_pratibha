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
  // print_r($_SESSION['enroll_id']);die;
  
  if($_SESSION['role']==3){
    $id = $_SESSION['enroll_id'];

    if(!empty($id)){
        $query="SELECT `payment_status` FROM `paid_student` WHERE `student_id`='$id' AND `status`='1'";
        $run=mysqli_query($conn,$query);
        $data=mysqli_fetch_assoc($run);
       
        if($data['payment_status']==1){
            header('location:onlineexamlist.php');
        }
    }else{
       header('location:../studentlogin.php');
    }
    }
    else{
        header('location:../studentlogin.php');
      }
// $query="SELECT * FROM `field_excutive` WHERE `status`='1'";
// $run=mysqli_query($conn,$query);
// while ($data=mysqli_fetch_assoc($run)) {
//   $executive[]=$data;
// }
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
        <div class="col-md-6 col-12 mb-5">
            <label>Amount<span style="color: Red;">*</span></label>
            <input type="text" name="amount" id="amount" value="200" readonly="true" class="form-control" required>
            <input type="hidden" name="id"  value="<?php echo $_SESSION['enroll_id']?>" readonly="true" class="form-control" required>
        </div>
        <div class="col-md-4 col-4"></div>
        <div class="col-md-4 col-4"><input type="submit" name="online_text_paid" class="btn btn-sm btn-success form-control" value="Submit"></div>
        <div class="col-md-4 col-4"></div>

      </div> 
   </form>
    </div>
</section>
 <?php include 'footer.php';?>
<?php include 'footer-links.php';?>
<script type="text/javascript">
     $('.student_reg').click(function(e){
            debugger;
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