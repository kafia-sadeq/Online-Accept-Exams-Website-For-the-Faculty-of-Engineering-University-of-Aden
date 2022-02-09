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
</head>
<body>
<div class="jumbotron text-center" style="margin-bottom:0;
padding:1rem 1rem;">
<img src="image/20170618023203!University_of_Aden_Logo (1).png"  class="img-fluid" width="100"/>
</div>
<?php
include 'connect.php';
if(isset( $_SESSION['user_id'])){
  include 'navbar.php';
}
?>
</body>
</html>