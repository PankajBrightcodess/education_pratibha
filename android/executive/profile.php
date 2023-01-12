<?php 
session_start();
include '../connection.php';
$msg = "";
	if (isset($_SESSION['msg'])) {
		$msg = $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	if($msg != ""){
		echo "<script> alert('$msg') </script>";
	}
	// print_r($_SESSION['role']);die;
	if($_SESSION['role']!='2'){
		header('location:../executivelogin.php');
	}
    $ids=$_SESSION['exe_id'];
     $query="SELECT * FROM `field_excutive` WHERE `id`='$ids'";
    $run=mysqli_query($conn,$query);
    $data=mysqli_fetch_assoc($run);

    // wallet amount
  $query1="SELECT sum(amount) as total_wallet, wallet.user_id as user_id FROM `wallet` WHERE `user_id`='$ids' AND `type` = 'field_executive'";
  $run1=mysqli_query($conn,$query1);
  $data1=mysqli_fetch_assoc($run1);
  // withdrawal amount
  $query2="SELECT sum(amount) as total_withdrawal, withdrawal.user_id as user_id FROM `withdrawal` WHERE `user_id`='$ids' AND `type` = 'field_executive'";
  $run2=mysqli_query($conn,$query2);
  $data2=mysqli_fetch_assoc($run2);

   $id=$_SESSION['exe_id'];
   $query="SELECT * FROM `student` WHERE `executive_id`='$id'";
     $run=mysqli_query($conn,$query);
                            // print_r($run);die;
      while ($stu=mysqli_fetch_assoc($run)) {
             $student_list[]=$stu;
         }
    
?>
<?php include 'header-links.php'; ?>
<style type="text/css">
  .desktop{
    background: #d1d5d6!important;
  }
</style>
<?php include 'header.php'; ?>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th>Wallet:</th>
                           <?php if(!empty($data2)){ ?>
                             <td>&#8377;<?php  $amt =  $data1['total_wallet']-$data2['total_withdrawal'];
                             echo $amt;
                               $_SESSION['amount'] = $amt;?>&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success withdrawl" data-toggle="modal" 
                            data-id="<?php echo $data1['id']; ?>" 
                            data-user_id ="<?php echo $data1['user_id']; ?>"
                            data-amount="<?php echo $data1['total_wallet']-$data2['total_withdrawal']; ?>"
                            data-target="#withdrawlModal">&#8377;Withdrawl</button>&nbsp;<button class="btn btn-sm btn-success Transfer" data-toggle="modal" 
                            data-id="<?php echo $data1['id']; ?>" 
                            data-user_id ="<?php echo $data1['user_id']; ?>"
                            data-amount="<?php echo $data1['total_wallet']-$data2['total_withdrawal']; ?>"
                            data-target="#TransferModal">&#8377;Transfer</button></td>
                          <?php  } else{ ?>
                            <td>&#8377;<?php echo $data1['total_wallet']; ?>&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-success withdrawl"   data-toggle="modal" 
                            data-id="<?php echo $data1['id']; ?>" 
                            data-user_id ="<?php echo $data1['user_id']; ?>"
                            data-amount="<?php echo $data1['total_wallet']; ?>"
                            data-target="#withdrawlModal">&#8377;Withdrawl</button>&nbsp;<button class="btn btn-sm btn-success Transfer"data-toggle="modal" 
                            data-id="<?php echo $data1['id']; ?>" 
                            data-user_id ="<?php echo $data1['user_id']; ?>"
                            data-amount="<?php echo $data1['total_wallet']; ?>"
                            data-target="#TransferModal">&#8377;Transfer</button></td>

                       <?php   }
                          ?>
                         <!--  <?php if(!empty($data2)){ ?>
                             <td><?php $amt =  $data1['total_wallet']-$data2['total_withdrawal'];
                               $_SESSION['amount'] = $amt;?></td>
                          <?php  }else{ ?>
                            <td><button class="btn btn-xs btn-success Transfer"data-toggle="modal" 
                            data-id="<?php echo $data1['id']; ?>" 
                            data-user_id ="<?php echo $data1['user_id']; ?>"
                            data-amount="<?php echo $data1['total_wallet']; ?>"
                            data-target="#TransferModal">&#8377;Transfer</button></td>

                       <?php   }
                          ?> -->
                             
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $data['name'];?></td>
                        </tr>
                          <tr>
                            <th>Father Name</th>
                            <td><?php echo $data['fathername']; ?></td>
                        </tr>
                         <tr>
                            <th>Address</th>
                            <td><?php echo $data['location'];?>,<?php echo $data['city'];?>(<?php echo $data['state'];?>)<?php echo $data['pincode'];?></td>
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
               
            </div>
            <div class="col-md-12">

    </div>
            <div class="clearfix"></div>
        </div>
    </div>
 </section>
 <?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>
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

      var url_string = window.location.href;
    var url = new URL(url_string);
    var c = url.searchParams.get("transfer");
    if(c==1){
       swal("Withrawal!", "wallet Transfer to Student!", "success");
     }else if(c==0){
       swal("Opps not Transfer!", "Something Error !", "error");
     }
 </script>
<div class="modal fade" id="withdrawlModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>withdrawal wallet</b></h5>
        
      </div>
       <form action="action.php" method="post">
        <div class="modal-body">
           
        </div>
         <div class="col-md-12">
              <label>Wallet</label>
              <input type="number" id="amount" name="amount" class="form-control" placeholder="amount withrawl::">
              <span id="waletamt"></span>
        </div>
         <div class="col-md-12">
                          <label>Email/Name</label>
                         <input type="hidden" name="user_id" id="user_id">
                         <input type="hidden" name="type" id="type" value="field_executive">
                         <input type="text" value="<?php echo $data['email'] ?>&nbsp;&nbsp;(<?php echo $data['name'] ?>)" readonly class="form-control">
                         <input type="hidden" name="email" value="<?php echo $data['email'] ?>">

                        </div>
                         
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="withdrawl_wallet" id="withdrawl_wallet" class="btn btn-primary">Save changes</button>
        </div>
       </form>
    </div>
  </div>
</div>
<!-- transfer wallet to student -->
<div class="modal fade" id="TransferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Transfer student wallet</b></h5>
        
      </div>
       <form action="action.php" method="post">
        <div class="modal-body">
           
        </div>
         <div class="col-md-12">
              <label>Wallet</label>
              <input type="number" id="amounts" name="amount" class="form-control" placeholder="amount withrawl::">
              <span id="waletamts"></span>
        </div>   
                         <input type="hidden" name="user_id" id="user_ids">
                         <input type="hidden" name="type" id="type" value="student">
                        <div class="col-md-12">
                            <label>Student list</label>
                            <select name="student_user_id" class="form-control">
                            <?php if(!empty($student_list)){
                                foreach ($student_list as $key => $value) { ?>
                                    <option value="<?php echo $value['id']; ?>" class="form-control"><?php echo $value['email'];?>(<?php echo $value['name']; ?>)</option>
                               
                        <?php    } 
                    }
                         ?>
                         </select>
                           
                        </div>
                         
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="Transfer_wallet" id="Transfer_wallet" class="btn btn-primary">Save changes</button>
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
 <script type="text/javascript">
   $(document).ready(function(){
      $('body').on('click','.Transfer',function(){
        $('#user_ids').val($(this).data('user_id'));
        $('#amounts').val($(this).data('amount'));
      });
      $('body').on('keyup', '#amounts',function(){
        var amounts = $('#amounts').val();
        var amts = "<?php echo $amt; ?>";
        if(amts< amounts){
            $('#waletamts').html('your amount is excess on your wallet!');
            $('#amounts').val('');
            $('#Transfer_wallet').prop('disabled',true);
        }

      });
   });
 </script>