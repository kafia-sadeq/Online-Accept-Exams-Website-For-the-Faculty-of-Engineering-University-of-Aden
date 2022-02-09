<?php
// Registration page
// include 'header.php';
include 'connect.php';
if(isset($_SESSION['admin_id']))
{
    header('location:indexs.php');
}
require_once('head_admin.php');
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

         <!-- Begin Content Area -->
         <div class="container">
            <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6"  style="margin-top:20px;">
            <span id="message"></span>
            <div class="card "
        style="margin-top:60px;max-width:400px;box-shadow: 0 0 5px #9d9d9d;margin-bottom:100px;" >
        <div id="message"></div>
            <div class="card-header" style="background-color: #626262;color:cornsilk;font-size:25px;">Admin Registration
            </div>
            <div class="card-body">
                <!------------form----->
                <form method="post" id="admin_register_form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Enter Email Address</label>
                        <input type="text" class="form-control" name="admin_email_address" id="admin_email_address"/>
                    </div>
                    <div class="form-group">
                        <label>Enter Password</label>
                        <input type="password" class="form-control" name="admin_password" id="admin_password"/>
                    </div>
                    <div class="form-group">
                        <label>Configure Password</label>
                        <input type="password" class="form-control" name="confirm_admin_password" id="confirm_admin_password"/>
                    </div>
                <div  class="form-group">
                  <input type="hidden" name="page" value="register"/>
                  <input type="hidden" name="action" value="register"/>
                  <input type="submit" class="btn btn-info " value="Register"
                  style="width: 100%;margin-top:20px;background-color: #72eb1f;border:none; "
                  name="admin_register" id="admin_register"/>
                </div>
                </form>
                
                <a href="login.php" class="btn btn-primary" style="width: 
                100%;margin-top:20px;background-color: #626262;border:none; "> login</a>
                
             
                <!------------form----->
               </div>
       </div> 
            
            </div>

            </div>
    
    </div>
   <script src="js/Quiery.js"></script> 
   <script src="js/bootstrap.min.js"></script> 
   <script  src="js/parsley.js"></script>  
   
<script>
   // nsert Data
    $(document).ready(function(){
        //  Start validation  Admin form 
        $('#admin_register_form').parsley();
        $('#admin_register_form').on('submit',function(event){
            event.preventDefault();
            $('#admin_email_address').attr('required','required');
            $('#admin_email_address').attr('data-parsley-type','email');
            $('#admin_password').attr('required','required');
            $('#confirm_admin_password').attr('required','required');
            $('#confirm_admin_password').attr('data-parsley-equalto','#admin_password');
        //  End validation  Admin form 
            if( $('#admin_register_form').parsley().isValid())
            {    
                // Start Ajax  jquery
                $.ajax({
                 url:"action.php",
                 method:"POST",
                 data:$('#admin_register_form').serialize(),
                //dataType:"json",
                 beforeSend:function()
                 {
                     $('#admin_register').attr('disabled','disabled');
                     $('#admin_register').val('please wait.....');
                 },
                success:function(data)
                { 
                $('#message').html('<div class="alert alert-success">Success Registration</div>');
                $('#admin_register_form')[0].reset();
                $('#admin_register_form').parsley().reset();
                $('#admin_register').attr('disabled',false);
                $('#admin_register').val('Register');
                alert(data);
                }
                });
                 //End Ajax  jquery 
               
            }
            
        });

    });
   //end insert Data
</script>
</body>
</html>
