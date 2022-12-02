<?php 
include '../connection.php';
session_start();
$msg = "";
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    if($msg != ""){
        echo "<script> alert('$msg') </script>";
    }
    // print_r($_SESSION['role']);die;
    if(empty($_SESSION['enroll_id'])){
        header('location:../studentlogin.php');
    }
    $id = $_SESSION['enroll_id'];
     $query="SELECT * FROM `student` WHERE `id`='$id'";
  $run=mysqli_query($conn,$query);
  $data=mysqli_fetch_assoc($run);
   
   $query1="SELECT sum(amount) as total_wallet, wallet.user_id as user_id FROM `wallet` WHERE `user_id`='$id' AND `type` = 'student'";
  $run1=mysqli_query($conn,$query1);
  $data1=mysqli_fetch_assoc($run1);

    // withdrawal amount
  $query2="SELECT sum(amount) as total_withdrawal, withdrawal.user_id as user_id FROM `withdrawal` WHERE `user_id`='$id' AND `type` = 'student'";
  $run2=mysqli_query($conn,$query2);
  $data2=mysqli_fetch_assoc($run2);

 
?>
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<?php $query3="SELECT * FROM `student` WHERE `payment_status`=1 AND `id` = '$id'";
  $run3=mysqli_query($conn,$query3);
  $check3=mysqli_fetch_assoc($run3);
  if(!empty($check3['pay_date'])){
     $paydate = $check3['pay_date'];
   $startdata = date('Y-m-d',strtotime($check3['pay_date']));
    $expirydate = date('Y-m-d',strtotime($check3['pay_end_date']));
     $counter = date('F d, Y H:i:s',strtotime($check3['pay_end_date']));
    if($expirydate <= date('Y-m-d')){  ?>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <script type="text/javascript">
       
        swal("Opps Your Subscription!", "Expiry !", "error");
        </script>
<?php }
     
   }  ?>
    <script>
// Set the date we're counting down to
// var countDownDate = new Date("Jan 5, 2024 14:37:25").getTime();
var countDownDate = new Date("<?php echo $counter; ?>").getTime();
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML =" <div class='col-md-3 col-3'>"+ days +  "d:</div> "+ "<div class='col-md-3 col-3'>"  + hours + "h:</div>"
  +"<div class='col-md-3 col-3'>" + minutes + "m:</div>" +"<div class='col-md-3 col-3'>"+ seconds + "s</div> ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<section class="blank-course "></section>
<section class="pages" id="contactpg">
    <div class="container">
        <div class="row">
           <!--  <div class="col-md-7">
                <h2 class="text-center text-info">Contact Us</h2><hr class="border-warning">
                <form action="sendmail.php" method="post">
                    <div class="form-row">
                        <div class="col"><input type="text" name="name" placeholder="Name :" class="form-control py-4" required></div>
                        <div class="col"><input type="tel" name="contact" placeholder="Contact :" class="form-control py-4" required></div>
                    </div>
                    <div class="form-row mt-4">                        
                        <div class="col"><input type="email" name="email" placeholder="Email :" class="form-control py-4" required></div>
                    </div>
                    <div class="form-row">
                        <div class="col mt-4"><textarea name="message" placeholder="Message :" class="form-control py-4" required style="min-height:75px;"></textarea></div>
                    </div>
                    <button type="submit" name="contactus" class="my-4 btn btn-warning btn-sm btn-block">Send</button>
                </form>
            </div> -->
            <div class="col-md-12">
                <h2 class="text-center text-info">User Profile</h2><hr class="border-warning">
                 <?php if(!empty($paydate)){?>
                    <div class="row justify-content-center" style="font-size:20px;font-weight: 900; padding: 20px;">
                           <div class="col-md-6 col-12" >
                              <center>  <h2> Left Days </h2> </center>
                                <div class="row" id="demo">
                            
                              </div>
                               <div class="row">
                               <div class="col-md-3 col-3">Days</div>
                               <div class="col-md-3 col-3"> Hours</div>
                               <div class="col-md-3 col-3">Min</div>
                               <div class="col-md-3 col-3">Sec</div>
                              </div>
                           </div>
                       </div> 
                    <table class="table">
                    <thead>
                         <!-- <tr>
                            <th>Subscriptions start date</th>
                            <td><?php echo $startdata; ?></td>
                        </tr>
                        <tr>
                            <th>Subscriptions Expiry date</th>
                            <td><?php echo $expirydate; ?></td>
                        </tr>
                        <tr> -->

                            <th>Wallet:</th>
                             <?php if(!empty($data2)){ ?>
                             <td>&#8377;<?php $amt =  $data1['total_wallet']-$data2['total_withdrawal'];
                             echo $amt;
                               $_SESSION['amount'] = $amt; ?>&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success withdrawl"   data-toggle="modal" 
                            data-id="<?php echo $data1['id']; ?>" 
                            data-user_id ="<?php echo $data1['user_id']; ?>"
                            data-amount="<?php echo $data1['total_wallet']-$data2['total_withdrawal']; ?>"
                          
                            data-target="#withdrawlModal">&#8377;Withdrawl</button></td>
                          <?php  } else{ ?>
                            <td>&#8377;<?php echo $data1['total_wallet']; ?>&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success withdrawl"   data-toggle="modal" 
                            data-id="<?php echo $data1['id']; ?>" 
                            data-user_id ="<?php echo $data1['user_id']; ?>"
                            data-amount="<?php echo $data1['total_wallet']; ?>"
                          
                            data-target="#withdrawlModal">&#8377;Withdrawl</button></td>

                       <?php   }
                    
                          ?>
                            
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $data['name'];?></td>
                        </tr>
                          <!-- <tr>
                            <th>Course</th>
                            <td><?php echo $data['course'];?></td>
                        </tr> -->
                         <tr>
                            <th>Address</th>
                            <td><?php echo $data['address'];?></td>
                        </tr>

                        <tr>
                            <th>Mobile</th>
                            <td><?php echo $data['mobile'];?></td>
                        </tr>
                         <tr>
                            <th>Email</th>
                            <td><?php echo $data['email'];?></td>
                        </tr>
                        <!-- <tr>
                            <th>Password</th>
                            <td><?php echo $data['password'];?></td>
                        </tr> -->
                    </thead>
                    
                </table>

         <?php       }else{ ?>
            <table class="table">
                    <thead>
                         
                        <tr>

                            <th>Wallet:</th>
                             <?php if(!empty($data2)){ ?>
                             <td>&#8377;<?php $amt =  $data1['total_wallet']-$data2['total_withdrawal'];
                             echo $amt;
                               $_SESSION['amount'] = $amt; ?>&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success withdrawl"   data-toggle="modal" 
                            data-id="<?php echo $data1['id']; ?>" 
                            data-user_id ="<?php echo $data1['user_id']; ?>"
                            data-amount="<?php echo $data1['total_wallet']-$data2['total_withdrawal']; ?>"
                          
                            data-target="#withdrawlModal">&#8377;Withdrawl</button></td>
                          <?php  } else{ ?>
                            <td>&#8377;<?php echo $data1['total_wallet']; ?>&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success withdrawl"   data-toggle="modal" 
                            data-id="<?php echo $data1['id']; ?>" 
                            data-user_id ="<?php echo $data1['user_id']; ?>"
                            data-amount="<?php echo $data1['total_wallet']; ?>"
                          
                            data-target="#withdrawlModal">&#8377;Withdrawl</button></td>

                       <?php   }
                    
                          ?>
                            
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $data['name'];?></td>
                        </tr>
                          <!-- <tr>
                            <th>Course</th>
                            <td><?php echo $data['course'];?></td>
                        </tr> -->
                         <tr>
                            <th>Address</th>
                            <td><?php echo $data['address'];?></td>
                        </tr>

                        <tr>
                            <th>Mobile</th>
                            <td><?php echo $data['mobile'];?></td>
                        </tr>
                         <tr>
                            <th>Email</th>
                            <td><?php echo $data['email'];?></td>
                        </tr>
                        <!-- <tr>
                            <th>Password</th>
                            <td><?php echo $data['password'];?></td>
                        </tr> -->
                    </thead>
                    
                </table>

         <?php       } ?>
               
            </div>
            <div class="col-md-12">

    </div>
            <div class="clearfix"></div>
        </div>
    </div>
 </section>
 <?php include 'footer.php';?>
<?php include 'footer-links.php';?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script type="text/javascript">
    var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("status");
    if(c==1){
       swal("Withrawal!", "wallet withdrawl!", "success");
     }else if(c==0){
       swal("Opps not Withrawal!", "Something Error !", "error");
     }
 </script>
<div class="modal fade" id="withdrawlModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Withdrawal wallet</b></h5>
        
      </div>
       <form action="action.php" method="post">
        <div class="modal-body">
           
        </div>
         <div class="col-md-12">
              <label>Wallet</label>
              <input type="number" id="amount" name="amount" class="form-control" placeholder="amount withrawl:" required>
              <span id="waletamt"></span>
        </div>
         <div class="col-md-12">
                          <label>Email/Name</label>
                         <input type="hidden" name="user_id" id="user_id">
                         <input type="hidden" name="type" id="type" value="student">
                         <input type="text" value="<?php echo $data['email'] ?>&nbsp;&nbsp;(<?php echo $data['name'] ?>)" readonly class="form-control">
                          <input type="hidden" name="email" value="<?php echo $data['email'] ?>">
                        </div>
                         
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="withdrawl_wallet" name="withdrawl_wallet" class="btn btn-primary">Withdrawal</button>
        </div>
       </form>
    </div>
  </div>
</div>
<script type="text/javascript">
   $(document).ready(function(){
      $('body').on('click','.withdrawl',function(){
        $('#user_id').val($(this).data('user_id'));
        $('#amount').val($(this).data('amount'));
        
      });
      $('body').on('keyup', '#amount',function(){
        var amount = $('#amount').val();
        var amt = "<?php echo $amt; ?>";
        if(amt< amount){
            $('#waletamt').html('your amount is excess on your wallet!');
            $('#amount').val('');
            $('#withdrawl_wallet').prop('disabled',true);
        }

      });
   });
 </script>