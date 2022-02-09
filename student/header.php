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
    <link rel="stylesheet" href="css/TimeCircles.css"/>
    <script src="js/Quiery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/parsley.js"></script>
    <script src="js/datatable.js"></script>
    <script src="js/TimeCircles.js"></script>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/parsley.css">
    <link rel="stylesheet" href="css/datatables.css"/>
    <link rel="stylesheet" href="css/styles.css"/> -->
</head>
<body>
<?php
include 'connect.php';
if(isset( $_SESSION['user_id'])){
  include 'navbar.php';
}
?>
<!-- <script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/datatable.js"></script>
<script src="js/parsley.js"></script> -->


</body>
</html>