<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/parsley.css"/>
    <link rel="stylesheet" href="css/datatables.css"/>
    <script src="js/Quiery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/parsley.js"></script>
    <script src="js/datatable.js"></script>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/parsley.css">
    <link rel="stylesheet" href="css/datatables.css"/>
    <link rel="stylesheet" href="css/styles.css"/> -->
</head>
<body>

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
        //   $.ajax({
        //     url:"action.php",
        //     method:"POST",
        //     data:$(this).serialize(),
        //    dataType:"json",
        //     beforeSend:function(){
        //         $('#user_login').attr('disabled','disabled');
        //         $('#user_login').val('please wait.....');
        //     },
        //     success:function(data){
                
        //         alert(data);
        //       if(data.success)
        //        {
        //            location.href='index.php';
        //        }
        //        else
        //        {
        //         $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
        //        }
        //        $('#user_login').attr('disabled',false);
        //      $('#user_login').val('Login');  
        //     }
        //   });
      }
    });
    });
</script>

</script>























