<?php
//Change password.php
require_once('head_admin.php');
include('header.php');
?>
<body  style="background-color: #f8f9fa;">
<div class="containter">
<div class="d-flex justify-content-center">
<br/><br/>
<!--Card-->
<div class="card" style="margin-top:60px;max-width:400px;box-shadow: 0 0 5px #9d9d9d;margin-bottom:100px;">
<!--Card header-->
<div class="card-header" style="background-color: #626262;color:cornsilk;font-size:25px;">
    <h4> Change Password</h4>
</div>
<!--Card body-->
<div class="card-body">
<form method="post" id="change_password_form">
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
     <!---Submit Button-->
     <div class="form-group">
     <input type="hidden" name="page" value="Change_password"/>
     <input type="hidden" name="action" value="Change_password"/>
     <input type="submit" name="user_Change_password"  id="user_Change_password" class="btn btn-info "   value="Change"/>
    </div>
</form>
</div>
</div>
<!-- End Card-->
</div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#change_password_form').parsley();
        $('#change_password_form').on('submit',function(event)
        {      event.preventDefault();
            $('#user_password').attr('required','required');
            $('#Confirm_user_password').attr('data-parsley-equalto','#user_password');
            $('#Confirm_user_password').attr('required','required');
             if($('#change_password_form').parsley().validate())
             {
                 $.ajax({
                    url:"action.php",
                    method:"POST",
                    data:$(this).serialize(),
                   dataType:"json",
                    beforeSend:function(){
                        $('#user_Change_password').attr('disabled','disabled');
                        $('#user_Change_password').val('please Wait...');
                    },
                    success:function(data)
                    {
                       if(data.success)
                       {
                           alert(data.success);
                           location.reload(true);
                       }
                       $('#user_Change_password').attr('disabled',false);
                       $('#user_Change_password').attr('Change');
                    }
                 });
             }
        }
        );
    });
</script>