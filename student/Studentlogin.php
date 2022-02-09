
<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student login Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/parsley.css"/>
    <link rel="stylesheet" href="css/datatables.css"/>
    <script src="js/Quiery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/parsley.js"></script>
    <script src="js/datatable.js"></script>
</head>
<body style="background-color: #f8f9fa;">
<div class="jumbotron " style="margin-bottom:0;
padding: 30px; background-color: #72eb1f;" >
<div class="row">
<div class="col">
    <img src="image/20170618023203!University_of_Aden_Logo (1).png" 
   class="img-fluid" width="100" style="margin-left: 100px;"/>
    </div>
    <div class="col-md-9">
    <h2 style="margin-top: 50px;color:#000;text-shadow: 10px 10px 8px white;font-weight:600;">
    <span style="margin-left: 100px;margin-bottom:20px;">
    Online Accept Exams Website </span><br/>For  the Faculty of Engineering –University of Aden</h2>
    </div>
</div>
</div>

<!--    Start form  -->
<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
        <span id="message"></span>
           <div class="card">
                  <div class="card-header">Student Login</div>
                  <div class="card-body">
                    <!--Start form  -->
                  <form  method="post" id="user_login_form">

                            <div class="form-group">
                                <label>Enter Email Address</label>
                                <input type="text" name="user_email_address"
                                 id="user_email_address" class="form-control"
                                 
                                 >
                            </div>

                        <div class="form-group">
                            <label>Enter password</label>
                            <input type="password" name="user_password" 
                            id="user_password" class="form-control">
                        </div>
            

                        <div class="form-group">
                           <input type="hidden" name="page" value="login"/>
                           <input type="hidden" name="action" value="login"/>
                           <input type="submit" name="user_login"
                             id="user_login" class="btn btn-info" value="Login"     
                           />
                        </div>
                  </form>
                  <div align="center">
                     Already registered ?
                         <a href="register.php"><span style="color:crimson">Sign in</span></a>
                     </div>

                 </div>
           </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#user_login_form').parsley();

});
</script>
</body>
</html>