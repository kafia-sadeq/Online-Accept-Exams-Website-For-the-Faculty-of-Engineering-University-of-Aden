<?php
//register.php
include('header.php');
require_once('head_admin.php');
if(isset($_SESSION['user_id']))
{
    header('location:index.php');
}

?>
<!DOCTYPE html>
<head>
</head>
<body style="background-color: #f8f9fa;">
<div class="containter">
<div class="d-flex justify-content-center">
<br/><br/>
<!--Start Card-->
<div class="card" style="margin-top:50px;margin-top:60px;max-width:400px;box-shadow: 0 0 5px #9d9d9d;
margin-bottom:100px;
 margin-bottom:100px;">
 <!---Card Header-->
 <span id="message_operation"></span>
<div class="card-header"style="background-color: #626262;color:cornsilk;font-size:25px;">
<h4>Student Registration</h4>
</div>
<!---Card Body-->
<div class="card-body">
    
    <!--form-->
    <form method="post" id="user_register_form">
     <!---Email Address-->
     <div class="form-group">
         <label>Enter Email Address</label>
         <input type="text" name="user_email_address" id="user_email_address" class="form-control"
         data-parsley-checkemail data-parsley-checkemail-message='Email Address Already Exists'
         />
     </div>
     <!--- End Email Address-->
     <!---Enter Password-->
        <div class="form-group">
         <label>Enter Password</label>
         <input type="password" name="user_password" id="user_password" class="form-control"/>
     </div>
     <!--- End Enter Password-->
      <!---Enter Confirm Password-->
      <div class="form-group">
         <label>Enter  Confirm Password</label>
         <input type="password" name="Confirm_user_password" id="Confirm_user_password" class="form-control"/>
     </div>
     <!--- End Confirm Password-->
      <!---Enter Name-->
      <div class="form-group">
         <label>Enter  Name</label>
         <input type="text" name="user_name" id="user_name" class="form-control"/>
     </div>
     <!--- End Confirm Password-->
      <!---Enter GEnder-->
      <div class="form-group">
         <label>Select Gender</label>
         <select name="user_gender" id="user_gender" class="form-control">
             <option value="male">Male</option>
             <option  value="femal">Female</option>
        </select>
     </div>
     <!--- End Gender-->
      <!---Enter Address-->
      <div class="form-group">
         <label>Enter Address</label>
         <textarea name="user_address" id="user_address" class="form-control">
         </textarea>
     </div>
     <!--- End Address-->
      <!---Enter Moble Number-->
      <div class="form-group">
         <label>Enter mobile number</label>
         <input type="text" name="user_mobile_no" id="user_mobile_no" class="form-control"/>
     </div>
     <!--- End Moble Number-->
      <!---Enter Profile Image-->
      <div class="form-group">
         <label>Choose your Image</label>
         <input type="file" name="user_image" id="user_image" class="form-control"/>
     </div>
     <!--- End Profile Image-->
      <!---Enter Profile Image-->
      <div class="form-group">
         <label>Choose your payment</label>
         <input type="file" name="payment_image" id="payment_image" class="form-control"/>
     </div>
     <!--- End Profile Image-->
    <br/>
    <!---Enter Submit Image-->
    <div class="form-group" align="center">
        <input type="hidden" name="page" value="register"/>
        <input type="hidden" name="action" value="register"/>
        <input type="submit" name="user_register" id="user_register" class="btn btn-info"
         value="Register"  style="width: 100%;margin-top:20px;background-color: #72eb1f;border:none; "/>
     </div>
     <!--- End Submit Image-->
    </form>
    <!--form-->
    <div align="center"> 
        <a href="login.php" class="btn btn-primary"       style="width: 
                100%;margin-top:20px;background-color: #626262;border:none; ">Login</a>
     </div>
</div>
<!--- End Card Body-->
</div>
<!--End Card-->
</div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        //Check email 
        /*
       window.ParsleyValidator.addValidator('checkemail',{
           validateString:function(value)
           {
              return $.ajax({
                 url:"action.php",
                 method:"POST",
                 data:{page:'register',action:'check_email',email:value},
                 dataType:"json",
                 success:function(data)
                 {
                     return true;
                 }
              });
           }
       });
       $('#user_register_form').parsley();
     // End Check email   */
     // validation form
    $('#user_register_form').parsley();
    $('#user_register_form').on('submit',function(event){
        event.preventDefault();
        $('#user_email_address').attr('required','required');
        $('#user_email_address').attr('data-parsley-type','email');
        $('#user_password').attr('required','required');
        $('#Confirm_user_password').attr('required','required');
        $('#Confirm_user_password').attr('data-parsley-equalto','#user_password');
        $('#user_name').attr('required','required');
        $('#user_name').attr('data-parsley-pattern','^[a-zA-Z]+$');
        $('#user_gender').attr('required','required');
        $('#user_address').attr('required','required');
        $('#user_mobile_no').attr('required','required');
        $('#user_mobile_no').attr('data-parsley-pattern','^[0-9]+$');
        $('#user_image').attr('required','required');
        $('#payment_image').attr('required','required');
        // $('#user_image').attr('accept','imge/*');
      if($('#user_register_form').parsley().validate())
      {  
          $.ajax({
              url:"action.php",
              method:"POST",
             // data:$(this).serialize(),
              //dataType:"json",
              data:new FormData(this),
              contentType:false,
              cache:false,
              processData:false,
             beforeSend:function()
             {
                 $('#user_register').attr('disabled','disabled');
                 $('#user_register').val('please wait......');
             },
             success:function(data)
             {   
             //////////success
                // alert(data);
                $('#message_operation').html('<div class="alert alert-success">Success Registration</div>');
                $('#user_register_form')[0].reset();
                $('#user_register_form').parsley().reset();
                $('#user_register_form').attr('disabled',false);
                $('#user_register_form').val('Register');
                // alert(data);
             ///////////End success
           
             }
          });
      }
    });
    });
</script>