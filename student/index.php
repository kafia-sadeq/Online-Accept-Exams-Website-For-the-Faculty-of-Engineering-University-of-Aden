<?php
//index.php
require_once('head_admin.php');
// include 'connect.php';
include('header.php');

?>
<html>
  <head></head>
  <body  style="background-color: #f8f9fa;">

 
<div class="container">
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php
if(isset( $_SESSION['user_id']))
{
?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <select name="exam_list" id="exam_list"
       class="form-control input-lg ">
       <option value=" ">Select Exam</option>
       <?php
        $query="SELECT online_exam_id,list_exam_title FROM list_examations WHERE online_exame_Statues='created'
       ORDER BY list_exam_title ASC ";
        $stmt=$con->prepare($query);
        $stmt->execute();
        $rows=$stmt->fetchAll();
        foreach($rows as $row){
            $output.='<option value="'.$row["online_exam_id"].'">'.$row["list_exam_title"].'</option>';
        }
        echo $output;
       ?>
      </select>
      <br/>
      <span id="exam_details"></span>
     </div>
    </div>
<?php
}
else
{
?>
<div  align="center">
<p><a href="register.php" class="btn btn-warning btn-lg">Register</a></p>
<p><a href="login.php" class="btn btn-dark btn-lg">Login</a></p>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<?php
}
?>
</div>
</div>
</body>
</html>
<script>
$(document).ready(function()
{
  $('#exam_list').parsley();
  var exam_id='';
  $('#exam_list').change(function()
  {
   $('#exam_list').attr('required','required' );
    exam_id=$('#exam_list').val();
    $.ajax({
    url:"action.php",
    method:"POST",
    data:{action:"fetch_exam", page:"index",exam_id:exam_id},
    success:function(data)
    {
        $('#exam_details').html(data);
    }
    });
  }
  );
  
  $(document).on('click','#enroll_button',function()
  {
    exam_id=$('#enroll_button').data('exam_id');
    $.ajax({
    url:"action.php",
    method:"post",
    data:{action:"enroll_exam",page:"index",exam_id:exam_id},
    beforeSend:function()
    {
      $('#enroll_button').attr('disabled','disabled');
      $('#enroll_button').text('please wait');
    },
    success:function(data)
    {
      alert(data);
    }
    });
  });
  
});
</script>



