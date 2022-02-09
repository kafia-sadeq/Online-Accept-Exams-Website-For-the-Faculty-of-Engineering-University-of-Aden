<?php
$dsn='mysql:host=localhost;dbname=online_examination';
$username='root';
$password='';
try{
    $con =new PDO($dsn,$username,$password);
    session_start();
    
}
catch(PDOException $e)
{
    echo "failed".$e->$e->getMessage();
}