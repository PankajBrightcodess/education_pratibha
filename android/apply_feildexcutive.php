<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
<section class="pages">
    <div class="container">
        <form method="post" action="#">
       <div class="row enqueryform">
        <div class="col-lg-12 col-12 mb-3">
            <h2 class="text-center text-info">Feild Executive Form</h2><hr class="border-warning">
        </div>

        <div class="col-md-6 col-12 mb-2">
            <label>Name<span style="color: Red;">*</span></label>
            <input type="text" name="name" id="name" placeholder="Enter Your Name" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Gender<span style="color: Red;">*</span></label>
            <select class="form-control" id="gender" name="gender">
                <option>---SELECT---</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
         <div class="col-md-6 col-12 mb-2">
            <label>Date Of Birth<span style="color: Red;">*</span></label>
            <input type="date" name="dob" id="dob" placeholder="Active Mobile Number" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Mobile<span style="color: Red;">*</span></label>
            <input type="text" name="mobile" id="mobile" placeholder="Active Mobile Number" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Email<span style="color: Red;">*</span></label>
            <input type="mail" name="email" id="email" placeholder="Active Email" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Location Address<span style="color: Red;">*</span></label>
            <input type="text" name="location" id="location" placeholder="Address" class="form-control" required>
        </div>
       
        <div class="col-md-6 col-12 mb-2">
            <label>City<span style="color: Red;">*</span></label>
            <input type="text" name="city" id="city" placeholder="Enter City" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>State<span style="color: Red;">*</span></label>
            <input type="text" name="state" id="state" placeholder="Enter State" class="form-control" required>
        </div>
        <div class="col-md-6 col-12 mb-2">
            <label>Pin code<span style="color: Red;">*</span></label>
            <input type="text" name="pincode" id="pincode" placeholder="Enter Pin code" class="form-control" required>
        </div>
     <div class="col-md-6 col-12 mb-2">
        <label>Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control">
    </div>
    <div class="col-md-6 col-12 mb-2">
        <label>Confirm Password</label>
        <input type="password" name="con_password" id="con_password" placeholder="Enter Confirm Password" class="form-control">
    </div>
    <div class="col-md-4 col-4"></div>
    <div class="col-md-4 col-4"><input type="submit" name="field_excutive"  class="btn btn-sm btn-warning form-control feild_ex" value="Submit"></div>
    <div class="col-md-4 col-4"></div>

      </div> 
      </form>
    </div>
</section>
<?php include 'footer.php';?>
<?php include 'footer-links.php';?>

<script type="text/javascript">
     $('.feild_ex').click(function(e){
            debugger;
         var name=$('#name').val();
         var gender=$('#gender').val();
         var dob=$('#dob').val();
         var mobile=$('#mobile').val();
         var email=$('#email').val();
         var location=$('#location').val();
         var city=$('#city').val();
         var state=$('#state').val();
         var pincode=$('#pincode').val();
         var password=$('#password').val();
         var con_password=$('#con_password').val();
        $.ajax({
                type:'POST',
                url:'action.php',
                data:{name:name,gender:gender,dob:dob,mobile:mobile,email:email,location:location,city:city,state:state,pincode:pincode,password:password,con_password:con_password,field_excutive:'field_excutive'},
                success: function(data){
                    console.log(data);
                    if(data=='center_login1'){
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