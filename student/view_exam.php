<html></html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/TimeCircles.css"/>
    <script src="js/google_ajax.js"></script>
    <script src="js/TimeCircles.js"></script>
</head>
<body>

<div class="jumbotron" style="padding:40px;
background-color: #F5F5F5;margin-bottom:0">
</div>
<?php
include 'connect.php';
// require_once ('styles.php');
// View Exam page
// include('header.php');
// print_r($_SESSION['user_id']);
if(isset($_GET['code']))
{ 
    // Start Student prensent
    $exam_code=$_GET['code'];
      $query1="SELECT online_exam_duration ,online_exam_data FROM list_examations WHERE online_exam_code='".$exam_code."'";
      $stmt1=$con->prepare($query1);
      $stmt1->execute();
      $rows1=$stmt1->fetchAll();
    //   print_r($rows1);
    foreach($rows1 as $row1)
    {
     $exam_start_time=$row1['online_exam_data'];
     $exam_duration=$row1['online_exam_duration'];
     $exm_end_time=strtotime($exam_start_time .'+'.$exam_duration);
     $exm_end_time= date('Y-M-D H:i:s',$exm_end_time);
     $remaining_minutes=strtotime( $exm_end_time)-time();
    }
    // echo $exam_start_time .'<br/>'.$exam_duration;
    // echo   $remaining_minutes;
      ///////////////////////////////////
     $query="SELECT * FROM list_examations WHERE online_exam_code='".$exam_code."'";
     $stmt=$con->prepare($query);
     $stmt->execute();
     $rows=$stmt->fetchAll();
      function exam_id($rows)
      {
        foreach($rows as $row)
        {
          return $row['online_exam_id'];
        } 
      }
     $date=array(
      ':student_id'=>$_SESSION['user_id'],
      ':exam_id' =>exam_id($rows),
      ':attendance_status'=>'present'
     );
   $quer=" UPDATE user_exam_enroll_table SET attendance_status=:attendance_status
    WHERE student_id=:student_id AND exam_id =:exam_id";
   $stmt=$con->prepare($quer);
   $stmt->execute($date);
// End Student present
?>
<div class="row">
    <div class="col-md-8">
        <div class="card" style="margin-top:60px;max-width:800px;box-shadow: 0 0 5px #9d9d9d;
        margin-bottom:100px;margin-left:30px">
               <div class="card-header"style="background-color: #626262;color:cornsilk;font-size:25px;">
                   Online Exam
               </div>
               <div class="card-body">
                   <div id="single_question_area">
                    
                   </div>
               </div>
        </div>
    </div>
    <div class="col-md-4">
        <br/>
          <div id="exam_timer" data-timer="<?php  echo $remaining_minutes ;?>" 
          style="max-width: 400px;width:100%;height:200px">

          </div>
        <div id="user_Details_area">
           <?php
           $user_id=$_SESSION['user_id'];
            $query= " SELECT * FROM student_table WHERE student_id=$user_id";
            $stmt=$con->prepare($query);
           $stmt->execute();
          $student_Details=$stmt->fetchAll();
        //   print_r($student_Details);
         foreach($student_Details as $row)
         {
           ?>
            <div class="container">
                <h3 class="text-center">Student Detailes</h3>
            <div class="row" >
              
              <div class="col-md-3">
                  <?php
               
                   echo "<img  style='width:100px; height: 150px;' src='../upload/".$row['student_image']."'/>"; 
                  ?>
              </div>
              <div class="col-md-9">
                 <table  class="table table-bordered">
                     <tr>
                         <th>Name</th>
                         <td><?php echo $row['student_name'] ?></td>
                     </tr>
                     <tr>
                         <th>Email ID</th>
                         <td><?php echo $row['student_email_address']?></td>
                     </tr>
                     <tr>
                         <th>Gender</th>
                         <td><?php echo $row['student_gender']?></td>
                     </tr>

                 </table>
              </div>
          </div> 
            </div>
      
       <?php
           }
           ?>
        </div>
    </div>
</div>
</body>
</html>
<?php

}

?>
<script>
    $(document).ready(function(){
    // var exam_online_id=<?php echo "kafia"?>
    // alert(exam_online_id);
    var exam_online_id="<?php echo exam_id($rows)?>";
    load_question();
    function load_question(question_id='')
    {
        $.ajax({
           url:"action.php",
           method:"POST",
        //    dataType:"json",
           data:{exam_online_id:exam_online_id,page:'view_exam',
            action:'load_question',question_id:question_id},
            success:function(data){
            //    console.log(data);
            // alert(data);
            $('#single_question_area').html(data);
            }
        });
    }
    // button next
    $(document).on('click','.next',function(){
        // alert("Hello");
        var question_id=$(this).attr('id');
        // alert(question_id);
        load_question(question_id);
    });

    // Insert answer question into database
    $(document).on('click','.answer_option',function(){
       var question_id=$(this).data('question_id');
    //    alert(question_id);
    var answer_option=$(this).data('id');
    // alert(answer_option);
    // console.log(answer_option);
    $.ajax({
        url:"action.php",
        method:"POST",
        data:{answer_option:answer_option,
        question_id:question_id,page:'view_exam',
        exam_online_id:exam_online_id,action:'answer'},
        success:function(data)
        {
      alert(data);

        }
    });
    });
   $('#exam_timer').TimeCircles({
       time:{
           Days:{
               show:false
           },
           Hours:{
               show:false
           }
       }

   });
setInterval(function(){
    var remain_second=$('#exam_timer').TimeCircles().getTime();
    // if(remain_second <1){
    //     alert('Exam time over');
    //     location.reload();
    // }
},1000);
    });
</script>
</body>
</html>