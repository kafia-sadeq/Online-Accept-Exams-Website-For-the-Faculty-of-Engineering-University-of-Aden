<?php
include 'header.php';
if(isset($_SESSION['user_id']))
{
    header('location:index.php');
}
$exam_id='';
$exam_statues='';
$remining_minutes='';
?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">

            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>