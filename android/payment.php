<?php 
session_start();

include'connection.php';

 $sql = "select * from addpayment where id = '$_SESSION[last_inst_id]'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
include 'payment_constant.php';
$someprice = $row['amount'];
$paisaprice = $someprice*100;
$orderno = $row['request_no'];
$custname = $row['name'];
$productinfo = 'Payment for Admission';
$txnid = time();

$surl = "payment-success.php";
$furl ="payment-success.php" ;
$key_id = API_KEY;
$currency_code = 'INR';
$total = $paisaprice; 
$amount = $someprice;
$length = 18;
$merchant_order_id=substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
$card_holder_name = $custname;
// $email =  $row['email'];
$phone = $row['phone'];
$name = "Customer of $custname - $orderno";
?>
<?php include 'header-links.php'; ?>
<?php include 'header.php'; ?>
<section class="blank-course "></section>
<section class="payment-page">  
    <div class="container">
    <div class="row" style='background-color:#856C96; padding:10px; margin:10px; border-radius: 20px;'>
        <div class="col-md-1"></div>
        <div class="col-md-10 p-3">   
            <h3 style="color:#fff;">Make Payment</h3><hr/>   
            <div class="row">
                <div class="col-md-12 card p-3">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3><?php echo ucwords($row['name']);?></h3>
                            <!-- <p class='mb-0' style='font-size:14px'><?php echo $row['name'];?></p> -->
                            <p class='mb-0' style='font-size:14px'>+91 <?php echo $row['phone'];?></p>
                        </div>
                        
                    </div><hr/>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <h5 class="text-success">Request Details</h5>
                                <div class="form-row">
                                    <label for="" class="col-6 col-md-6">Request No :</label>
                                    <p class='col-6 col-md-6'><?php echo $row['request_no'];?></p>
                                </div>
                                <div class="form-row">
                                    <label for="" class="col-6 col-md-6">Request Total Amount:</label>
                                    <p class='col-6 col-md-6 text-danger' style='font-size:20px;font-weight:600'>Rs.<?php echo $row['amount'].'/-';?></p>
                                </div>
                                <div class="form-row p-2">
                                    <div class="col-1 col-md-2"></div>
                                    <div class="col-10 col-md-8 text-center">
                                        <form action='payment-success.php' id="razorpay-form" method="post">
                                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
                                        <input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
                                        <input type="hidden" name="merchant_trans_id" id="merchant_trans_id" value="<?php echo $txnid; ?>"/>
                                        <input type="hidden" name="merchant_product_info_id" id="merchant_product_info_id" value="<?php echo $productinfo; ?>"/>
                                        <input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
                                        <input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
                                        <input type="hidden" name="card_holder_name_id" id="card_holder_name_id" value="<?php echo $card_holder_name; ?>"/>
                                        <input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
                                        <input type="hidden" name="merchant_amount" id="merchant_amount" value="<?php echo $amount; ?>"/>
                                        <input type="hidden" name="order_id" id="order_id" value="<?php echo $merchant_order_id; ?>">
                                        <input  id="submit-pay" type="button" onclick="razorpaySubmit(this);" value="PAY NOW" class="btn btn-sm btn-warning" />
                                        <!-- <a href="payment_barcode.php" class="btn btn-sm btn-success">PAY NOW</a> -->
                                        </form>
                                    </div>
                                    <div class="col-1 col-md-2"></div>
                                </div>                            
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    
                </div>
            </div>                 
        </div>
        <div class="col-md-1"></div>
    </div>
    
    </div>
</section>
<?php include 'footer.php';?>
<?php include 'footer-links.php';?>
<?php
function random_number($l){
    $num=range(0,9);
       shuffle($num);
       $res="";
       for ($i=0; $i<$l; $i++) {      
          $res.=$num[$i];    
       }    
       return ($res);
    }
    function random_string($length){
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $length; $i++) {
            $randstring .= $characters[rand(0, strlen($characters)-1)];
        }
        return $randstring;
    }


?>
 <script>
    var razorpay_options = {
        key: "<?php echo $key_id; ?>",
        amount: "<?php echo $total; ?>",
        name: "<?php echo $name; ?>",
        description: "Order # <?php echo $merchant_order_id; ?>",
        netbanking: true,
        currency: "<?php echo $currency_code; ?>",
        prefill: {
        name:"<?php echo $card_holder_name; ?>",
        contact: "<?php echo $phone; ?>"
        },
        notes: {
        soolegal_order_id: "<?php echo $merchant_order_id; ?>",
        },
        handler: function (transaction) {
            document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
            document.getElementById('razorpay-form').submit();
        },
        "modal": {
            "ondismiss": function(){
                location.reload()
            }
        },
        // callback_url:"<?php echo 'payment_success.php'?>",
    };
    var razorpay_submit_btn, razorpay_instance;

    function razorpaySubmit(el){
        if(typeof Razorpay == 'undefined'){
            // debugger;
        setTimeout(razorpaySubmit, 200);
        if(!razorpay_submit_btn && el){
            razorpay_submit_btn = el;
            el.disabled = true;
            el.value = 'Please wait...'; 
        }
        } else {
        if(!razorpay_instance){
            razorpay_instance = new Razorpay(razorpay_options);
            if(razorpay_submit_btn){
            razorpay_submit_btn.disabled = false;
            razorpay_submit_btn.value = "Pay Now";
            }
        }
        razorpay_instance.open();
        }
    }  

    </script>