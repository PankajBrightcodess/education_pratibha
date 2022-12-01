<?php 
session_start();
include '../connection.php';
?>
  
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<?php  
$ids=$_SESSION['enroll_id'];
$query1="SELECT sum(amount) as total_wallet, wallet.user_id as user_id FROM `wallet` WHERE `user_id`='$ids' AND `type` = 'student'";
  $run1=mysqli_query($conn,$query1);
  $data1=mysqli_fetch_assoc($run1);
  //withdrawl

  $query2="SELECT sum(amount) as total_withdrawal, withdrawal.user_id as user_id FROM `withdrawal` WHERE `user_id`='$ids' AND `type` = 'student'";
  $run2=mysqli_query($conn,$query2);
  $data2=mysqli_fetch_assoc($run2);  

  $query3="SELECT * FROM `withdrawal` WHERE `user_id`='$ids' AND `type` = 'student'";
  $run3=mysqli_query($conn,$query3);
 while ($data3=mysqli_fetch_assoc($run3)) {
      $withdrawal[]=$data3;
    }

     $query4="SELECT wallet.*, wallet.user_id AS wallet_id, wallet.refer_user_id AS  wallet_executiveid, field_excutive.email AS executive_email, field_excutive.id AS executive_id, field_excutive.name AS executive_name FROM wallet LEFT JOIN field_excutive ON wallet.refer_user_id=field_excutive.id WHERE wallet.user_id = '$ids' AND wallet.type = 'student'";
  $run4=mysqli_query($conn,$query4);
 while ($data4=mysqli_fetch_assoc($run4)) {
      $wallet[]=$data4;
    }



  ?>
<style type="text/css">
  .wallet-container {
  background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjOvSperRYjHH9-EHlKZJBfwvXy4rJpyerzHQsnp8DuuycYU5_);
    width: 320px;
    color: #fff;
    font-size: 15px;
    padding: 20px 20px 0;
    top: 55%;
    left: 50%;
    transform: translate(-50%,-50%);
    position: absolute;
  
  
}

.page-title {
  text-align: left;
}

.fa-user {
  float: right;
}

.fa-align-left {
  margin-right: 15px;
}

.amount-box img {
  width: 50px;
}

.amount {
  font-size: 35px;
}

.amount-box p {
  margin-top: 10px;
  margin-bottom: -10px;
}

.btn-group {
  margin: 20px 0;
}

.btn-group .btn {
  margin: 8px;
  border-radius: 20px !important;
  font-size: 12px;
}

.txn-history {
  text-align: left;
}

.txn-list {
  background-color: #fff;
  padding: 12px 10px; 
  color: #777;
  font-size: 14px;
  margin: 7px 0;
}

.debit-amount {
  color: red;
  float: right;
}

.credit-amount {
  color: green;
  float: right;

}



@media screen and (max-width: 800px){
  .wallet-container {
    height: 115%;
    bottom: 20px;
    margin-top: 100px;
  }
  
}
</style>
<section class="blank-course "></section>
 <section class="page">
    <div class="container-fluid">
     <div class="amount-box text-center">
      <img src="../../images/app/unnamed.png" alt="wallet">
      <p>Total Wallet Balance</p>
      <?php if(!empty($data2)){
        $amt =  $data1['total_wallet']-$data2['total_withdrawal'];  ?>                
      <p class="amount">&#8377;<?php echo $amt; ?></p>
    <?php }
    ?>
    </div>
<section>
      <div class="btn-group text-center tab text-center">
        <div class="row">
          <div class="col-2"></div>
          <div class="col-4"> <button type="button" class="btn btn-outline-light" onclick="openCity(event, 'student')" id="defaultOpen">Credit</button></div>
          <div class="col-4"> <button type="button" class="btn btn-outline-light" onclick="openCity(event, 'Exectutive')">Withdrawl</button></div>
          <div class="col-2"></div>
        </div>
     
     
      </div>
      <div class="txn-history tabcontent" id="student">
          <p><b>History</b></p>
        <?php if(!empty($wallet)){
          foreach ($wallet as $key => $value) { ?>
      <p class="txn-list"><?php echo $value['description']; ?>(<?php echo $value['date']; ?>)<span class="credit-amount">+&#8377;<?php echo $value['amount']; ?></span>
      <span><?php echo $value['executive_name']; ?>(<?php echo $value['executive_email']; ?>)</span></p>

     <?php    
        } 
      }
      ?>
      
       

     
      </div>
      <!-- withdrawl -->
      <div class="txn-history tabcontent" id="Exectutive">
        <p><b>History</b></p>
        <?php if(!empty($withdrawal)){
          foreach ($withdrawal as $key => $value) { ?>
           <p class="txn-list"><?php echo $value['review']; ?>(<?php echo $value['added_on']; ?>)<span class="debit-amount">-&#8377;<?php echo $value['amount']; ?></span>
               <?php if(!empty($value['unique_id'])){
               if($value['payment_status'] == 1){  ?>
                      <span style="text-align: center; background-color: green; color: white;">success</span>   
            <?php   }else{  ?>
                  <span style="text-align: center; background-color: orange; color: white;">pending</span>
         <?php   }  } ?>
            </p>
     <?php     }
        } ?>
        
       

        
      </div>
      </section>
    </div>
  </section>
  <!-- --------------------------------------------Modal----------------------------------------------- -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> -->


<!-- --------------------------------------------Modal End------------------------------------------- -->
<?php include 'footer.php'; ?>
<?php include 'footer-links.php'; ?>
<script type="text/javascript">

  function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

   
 

</script>