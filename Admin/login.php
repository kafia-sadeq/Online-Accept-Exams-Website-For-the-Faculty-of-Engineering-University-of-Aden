<?php
//page login
session_start();
if(isset($_SESSION['admin_id']))
{
    header('location:indexs.php');
}
require_once('head_admin.php');
?>

<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/parsley.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
</head>
<body style="background-color: #f8f9fa;">
    <?php
   
    ?>
<div class="container">
<div class="row">
    <div class="col-md-3">
     </div>
     <div class="col-md-6"  style="margin-top:20px;">
     <span id="message"></span>
     <!-----------------Card--->
     <div class="card" style="margin-top:60px;max-width:400px;box-shadow: 0 0 5px #9d9d9d;margin-bottom:100px;">
       <div class="card-header" style="background-color: #626262;color:cornsilk;font-size:25px;">
           Admin Login
        </div>
        <div class="card-body">
            <form method="post" id="admin_login_form">
                <!--Email-->
                <div class="form-group">
                 <label>Enter Email Address</label>
                 <input type="text" name="admin_email_address" id="admin_email_address" class="form-control"/>
                 </div>
                 <!--End Emal-->
                 <!--password-->
                <div class="form-group">
                 <label>Enter Password</label>
                 <input type="password" name="admin_passsword" id="admin_passsword" class="form-control"/>
                 </div>
                 <!--End password-->
                 <!---button-->
                 <div class="form-group">
                     <input type="hidden" name="page" value="login"/>
                     <input type="hidden" name="action" value="login"/>
                     <input type="submit" name="admin_login" id="admin_login" class="btn btn-info"
                     style="width: 100%;margin-top:20px;background-color: #72eb1f;border:none; "
                      value="Login"/>

                  </div>
                 <!----End button-->
            </form>
            <div align="center">
                Already registered ?
                <a href="register.php" ><span style="color:crimson">Sign in</span></a>
                </div>
          </div>
     </div>
     <!-----------------Card--->
     </div>
</div>
</div>
<script src="js/Quiery.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script  src="js/parsley.js"></script> 
<script>
   $(document).ready(function(){
       // validation Admin Login
       $('#admin_login_form').parsley();
       $('#admin_login_form').on('submit',function(event){
         event.preventDefault();
         $('#admin_email_address').attr('required','required');
         $('#admin_email_address').attr('data-parsley-type','email');
         $('#admin_passsword').attr('required','required');
           if($('#admin_login_form').parsley().validate())
           {
            $.ajax({
                url:"action.php",
                method:"POST",
                data:$(this).serialize(),
                dataType:"json",
                beforeSend:function(){
                 $('#admin_login').attr('disabled','disabled');
                 $('#admin_login').val('Please wait .....');
                },
                success:function(data)
                {   if(data.success)
                    {
                        location.href="indexs.php";
                    }
                     
                    else
                    {
                     $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
                    }
                    $('#admin_login').attr('disabled',false);
                    $('#admin_login').val('Login');
                }
            });
           }
       });
   });
   
    
</script>
</body>
</html>