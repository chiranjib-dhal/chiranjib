<script src="../jquery-3.6.0.min.js"></script>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  echo('hello');
  // if(isset($_POST['submit'])){
    $name=$_POST['name'];
    echo('hello');
    $email=$_POST['email'];
    $Message=$_POST['message'];
    @include '../contactform/PHPMailer/sendmail.php';
?>
<!-- ajax send mail -->
<script>
$(document).ready(function(){
    console.log('<?php echo $name;?>');
    $.ajax({
        url:'../contactform/PHPMailer/sendmail.php',
        type:'POST',
        data:{
            'username':'<?php echo $name; ?>',
            'message':'<?php echo $Message; ?>'
        },
        success:function(data){
            console.log(data);
         if(data == 1){
         // $('#form')[0].reset();
         alert('check your mail for your password');
         }
         else if(data ==2)
         {
         alert('Something Went Wrong,Please retry after sometime'); 
         }
        }
    });
});
</script>
<?php
  // }
   }
?>