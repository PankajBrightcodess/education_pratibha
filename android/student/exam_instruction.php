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
  if($_SESSION['role']!='3'){
    header('location:index.php');
  }
  // $id = $_GET['id'];
  $id = $_SESSION['enroll_id'];
  // $id = $_SESSION['cent_id'];
    $sql = "select * from test_master where id='$id' AND status = '1'";
    $res = mysqli_query($conn,$sql);
    
    while ($onlinetest=mysqli_fetch_assoc($res)) {
      $onlinetest[]=$data;
    }
    // print_r($onlinetest);die;
?>
<?php include 'header-links.php'; ?>
<section class="blank-course "></section>
 <section class="page">
    <div class="container-fluid">
      <div class="row">
     
                <div class="col-md-12 mb-3">
                  <div class="card">
                   <div class="card-header bg-secondary text-light text-center"><span><strong><?php echo $onlinetest['test_name']?>&nbsp;&nbsp;(<?php echo date('d M Y', strtotime($onlinetest['added_on']));?>)</strong></span><br>
                    <spna><strong>Duration : <?php echo $onlinetest['time_duration']?></strong></span>
                    <p><strong>Maximun Marks : <?php echo $onlinetest['total_marks']?></strong></p></div>
                    <div class="card-body">
                      <div class="row">
                       <div class="col-md-12 col-12 mb-5">
                          <p> कृपया निम्नलिखित निर्देशों को बहुत ध्यान से पढ़ें:</p>

<p>सामान्य निर्देश :</p>

<p>1.प्रश्न पत्र पूरा करने के लिए आपके पास 120 मिनट हैं।</p>

<p>2. प्रश्न पत्र में कुल 150 प्रश्न हैं।</p>

<p>3. प्रत्येक प्रश्न का केवल एक सही उत्तर है। अपने उत्तर के रूप में चिह्नित करने के लिए सबसे उपयुक्त विकल्प पर क्लिक करें।</p>

<p>4 .प्रत्येक सही उत्तर में 1 अंक निर्धारित है। </p>                                                                                      

<p>5. गलत उत्तर के लिए कोई नकारात्मक अंकन नहीं है। </p>                                                                        

<p>6. आप “CLEAR RESPONSE” पर क्लिक करके अपने उत्तर को चिन्हित कर सकते हैं।</p>

<p>7. आप “MARK & NEXT” पर क्लिक करके बाद में इसकी समीक्षा के लिए एक प्रश्न चिह्नित कर सकते हैं</p>

<p>8. स्क्रीन के दाहिने हाथ के शीर्ष पर सभी प्रश्नों की एक सूची दिखाई देती है। आप नंबर सूची में दिए गए प्रश्न संख्या पर क्लिक करके किसी खंड या खंडों के भीतर किसी भी क्रम में प्रश्नों का उपयोग कर सकते हैं।</p>

<p>9. आप टेस्ट लेते समय रफ शीट का भी इस्तेमाल कर सकते हैं।</p>

<p>10. परीक्षण के दौरान कैलकुलेटर, शब्दकोश या किसी अन्य ऑनलाइन संदर्भ सामग्री का उपयोग न करें।  </p>                               

<p>11. परीक्षण पूरा करने से पहले “SUBMIT TEST” बटन पर क्लिक न करें। एक बार प्रस्तुत किया गया परीक्षण फिर से शुरू नहीं किया जा सकता है।</p>

<p>12. यदि आपका सिस्टम लटका हुआ है या आपको इंटरनेट कनेक्टिविटी में किसी अन्य समस्या का सामना करना पड़ रहा है, तो – “चिंता न करें, कृपया परीक्षण की विंडो को बंद करें और आप अपना परीक्षण फिर से शुरू कर सकते हैं जहाँ से आप चले गए थे।”</p>

<p>13. एक बार (SUBMIT TEST) बटन पर क्लिक करने के बाद, आप यह स्पीड टेस्ट दोबारा नहीं कर सकते।</p>

<p>14.परीक्षण प्रस्तुत करने के बाद, आप “परिणाम देखें” बटन पर क्लिक करके अपना परिणाम देख सकते हैं।</p>

<p>Please read the following instructions very carefully :</p>

<p>General instructions :</p>

<p>You have 150 minutes to complete the test. Test contains 150 questions.</p>

<p>There is only one correct answer to each question click on the most appropriate option to mark it as your answer.</p>

<p>Each correct answer has 1 mark. </p>

<p>There is no negative marking for each wrong answer.</p>

<p>You can unmark your answer by clicking on the “CLEAR RESPONSE” You can mark a question for reviewing it later by clicking on the “MARK & NEXT” A number list of all questions appears on the top of right hand side of the screen .</p>

<p>You can access the questions in any order within a section or across sections by clicking on the question number given on the number list. Y</p>

<p>You can also use rough sheets while taking test.</p>

<p>Do not use calculators , dictionaries,or any other online reference material during test.</p>

<p>Do not click the button “SUBMIT TEST” before completing the test. A test once submitted cannot be resumed.</p>

<p>If your system gets hanged or you face any other problem in internet connectivity , – “Don’t worry , Kindly close the window of the test and you can resume your test from where you had left.”</p>

<p>Once clicked on the (SUBMIT TEST) button, You cannot re do this Speed test.</p>

<p>After submit the test, you can view your result by clicking on “VIEW RESULT” button</p>
                       </div>
                       <div class="col-12 col-md-12">
                         <a href="../../text_module/start_exam.php/?id=<?php echo $onlinetest['id']?>" class="form-control btn btn-info btn-sm">Agree and Continue</a>
                       </div>
                       
                       
                          
                    </div>
                  </div>

                </div>
              </div></a>
    </div>
  </section>
  <!-- --------------------------------------------Modal----------------------------------------------- -->

   
<!-- --------------------------------------------Modal End------------------------------------------- -->

<?php include 'footer-links.php'; ?>
<script type="text/javascript">
   

  //   $('.updt').click(function(e){
  //   var id = $(this).data('id');
  //   var cent_code = $(this).data('cent_code');
  //   var cent_name = $(this).data('cent_name');
  //   var address = $(this).data('address');
  //   var mobile = $(this).data('mobile');
  //   var mail = $(this).data('email');
  //   var pass = $(this).data('password');
    
  //   $('#id').val(id);
  //   $('#cent_code').val(cent_code);
  //   $('#cent_name').val(cent_name);
  //   $('#address').val(address);
  //   $('#mobile').val(mobile);
  //   $('#mail').val(mail);
  //   $('#pass').val(pass);
    
  // });

    $('.delete').click(function(e){
         var id=$(this).attr('data-id');
        $.ajax({
                type:'POST',
                url:'action.php',
               data:{id:id,del_result:'del_result'},
                success: function(result){
                    // alert(result);
                    console.log(result);
                    location.reload();
                    },
                    error: function(){
                    alert("error");
                    },
        });
    return false;
    });
  $(document).ready(function(){
    $('#datatable').DataTable();

    var table=$('.data-table').DataTable({
      scrollCollapse: true,
      autoWidth: false,
      responsive: true,
      columnDefs: [{
        targets: "no-sort",
        orderable: false,
      }],
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
      "language": {
        "info": "_START_-_END_ of _TOTAL_ entries",
        searchPlaceholder: "Search"
      },
    });


let editor;
    ClassicEditor
        .create(document.querySelector('#editor1'), {

        })
        .then(newEditor => {
            editor = newEditor;
            //console.log(editor.config._config.toolbar); 
        }, editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

        $('.hoverable').mouseenter(function(){
            //$('[data-toggle="popover"]').popover();
            $(this).popover('show');                    
        }); 

        $('.hoverable').mouseleave(function(){
            $(this).popover('hide');
        });

        function convertToSlug(Text) {
  return Text.toLowerCase()
             .replace(/[^\w ]+/g, '')
             .replace(/ +/g, '-');
}
  });

</script>