<?php
//login.php
// session_start();
include 'header.php';
require_once('head_admin.php');
if(isset($_SESSION['user_id']))
{
    header('location:index.php');
}
?>
<body style="background-color: #f8f9fa;">
<div class="container">
    <div class="row">
        <div class="col-md-3">
           </div>
           <div class="col-md-6"style="margin-top: 100px;" >
           <span id="message"></span>
           <!----Card--->
           <div class="card" style="margin-top:60px;max-width:400px;box-shadow: 0 0 5px #9d9d9d;margin-bottom:100px;">
               <div class="card-header" style="background-color: #626262;color:cornsilk;font-size:25px;">Student  Login </div>
               <div class="card-body">
                     <!--form-->
                     <form method="post" id="user_login_form">
                             <!----Enter Email-->
                             <div class="form-group">
                                 <label>Enter Email</label>
                                 <input type="text" name="user_email_address"
                                 id="user_email_address" class="form-control">
                             </div>
                              <!---- End Enter Email-->
                             <!----Enter password-->
                             <div class="form-group">
                                 <label>Enter password</label>
                                 <input type="password" name="user_password"
                                 id="user_password" class="form-control">
                             </div>
                            <!---- End password-->  
                             <!----Submit Button-->
                             <br/>
                             <div class="form-group"> 
                                 <input type="hidden" name="page" value="login"/>
                                 <input type="hidden" name="action" value="login"/>
                                 <input type="submit" name="user_login"
                                 id="user_login" class="btn btn-info" value="Login"     
                                 style="width: 100%;margin-top:20px;background-color: #72eb1f;border:none; "/>
                             </div>
                              <!---- Submit Button--->   
                       </form>
                     <!--End form-->
                     <div align="center">
                     Already registered ?
                         <a href="register.php"><span style="color:crimson">Sign in</span></a>
                     </div>
               </div>
             </div>
           <!-----End Card--->
           <br/>
           <br/>
           <br/>
           <br/>
           <br/>
           <div class="col-md-3"></div>
            </div>
      </div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        //Validation From
    $('#user_login_form').parsley();
    $('#user_login_form').on('submit',function(event){
      event.preventDefault();
      $('#user_email_address').attr('required','required');
      $('#user_email_address').attr('data-parsley-type','email');
      $('#user_password').attr('required','required');
      if($('#user_login_form').parsley().validate())
      {
          $.ajax({
            url:"action.php",
            method:"POST",
            data:$(this).serialize(),
           dataType:"json",
            beforeSend:function(){
                $('#user_login').attr('disabled','disabled');
                $('#user_login').val('please wait.....');
            },
            success:function(data){
                
                alert(data);
              if(data.success)
               {
                   location.href='index.php';
               }
               else
               {
                $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
               }
               $('#user_login').attr('disabled',false);
             $('#user_login').val('Login');  
            }
          });
      }
    });
    });
</script>