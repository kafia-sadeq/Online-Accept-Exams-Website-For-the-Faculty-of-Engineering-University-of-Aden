<?php
//head login

include 'connect.php';
if(!isset($_SESSION['admin_id']))
{
    header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <link rel="stylesheet" href="css/parsley.css">
    <link rel="stylesheet" href="css/datatables.css"/>
    <link rel="stylesheet" href="css/styles.css"/>
</head>
<body style="background-color: #f8f9fa;">
<nav class="navbar navbar-expand-lg " style="background-color:#000000;">
            <a class="navbar-brand" href="#" style="color:#fff">Admin Slider</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                  <a class="nav-link" href="exam.php"  style="color:#ddd">List Exam</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="user.php"  style="color:#ddd">Student</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="logout.php"  style="color:#ddd">logout</a>
                  </li>
              </ul>
            
            </div>
          </nav>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/datatable.js"></script>
<script src="js/parsley.js"></script>
</body>
</html>