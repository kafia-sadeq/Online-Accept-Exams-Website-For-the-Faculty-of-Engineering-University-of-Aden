<?php
//student_exam_result.php
?>

<div class="jumbotron" style="padding:40px;
background-color: #F5F5F5;margin-bottom:0">
</div>

<?php
 include 'head.php';
$exam_id=$_GET['exam_id'];
$user_id=$_GET['user_id'];
echo $exam_id .'<br/>'.$user_id.'<br/>';
$query="SELECT * FROM quesion_table INNER JOIN user_exam_question_answer
ON user_exam_question_answer.question_id =quesion_table.question_id 
WHERE quesion_table.online_exam_id  =$exam_id
AND user_exam_question_answer.student_id =$user_id
 ";
// $query =" SELECT * FROM  user_exam_question_answer";
 $stmt=$con->prepare($query);
 $stmt->execute();
 $result=$stmt->fetchAll();
 print_r($result);
?>

<div class="card">
    <div class="card-header">
        Online Exam Result
    </div>
    <div class="card-body">
         <div class="table-responsive">
             <table class="table table-bordered table-hover">
                 <thead>
                 <tr>
                  <th>Question</th>
                  <th>Option 1</th>
                  <th>Option 2</th>
                  <th>Option 3</th>
                  <th>Option </th>
                  <th>Your Answer</th>
                  <th>Answer</th>
                  <th>Result</th>
                  <th>Marks</th>
              </tr>
                 </thead>
                <tbody>
                    <?php
                    $total_Mark=0;
                    foreach($result as $row)
                    {

                        // $question_id= $row['question_id'];
                        // echo $question_id;
                        // $query2=" SELECT * FROM option_table  WHERE question_id=$question_id ";
                        // $sub_result=$con->prepare($query2);
                        // $sub_result->execute();
                        //  print_r($sub_result);
                    }
                    ?>
                </tbody>
             </table>
              
         </div>
    </div>
</div>