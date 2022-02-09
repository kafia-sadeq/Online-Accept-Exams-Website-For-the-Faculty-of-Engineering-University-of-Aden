<?php
//register.php
include('student/header.php');
include 'student/connect.php';
$object="SELECT * FROM student_table WHERE student_id ='". $_SESSION['user_id']."'";
$stmt=$con->prepare($object);
$stmt->execute();
$rows=$stmt->fetchAll();
?>