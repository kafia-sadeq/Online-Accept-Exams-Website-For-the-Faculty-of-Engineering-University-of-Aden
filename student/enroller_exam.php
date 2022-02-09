

<?php
include 'connect.php';
require_once('styles.php');
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$query="SELECT * FROM user_exam_enroll_table  INNER JOIN
 list_examations ON list_examations.online_exam_id =user_exam_enroll_table.exam_id 
 WHERE user_exam_enroll_table.student_id='".$_SESSION['user_id']."' ";
 $stmt=$con->prepare($query);
$stmt->execute();
$rows=$stmt->fetchAll();
?>
<html>
<body style="background-color: #f8f9fa;">
<!--card-->
<div class="card" style="margin-top:60px;box-shadow: 0 0 5px #9d9d9d;
   margin-bottom:100px;" >
  <div class="card-header"style="background-color: #626262;color:cornsilk;font-size:25px;">online Exam list</div>
  <div class="card-body">
   <!--table-->
   <div class="table-responsive">
   <div class="table-responsive">
<table id="enroll_exam_list" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Exam title</th>
<th>Date & time</th>
<th>Duration</th>
<th>Total Question</th>
<th>Right Answer Mark </th>
<th>Wrong Answer Mark </th>
<th>Action</th>
</tr>
</thead>
<tbody>
    
    <?php
      foreach($rows as $row)
      {
          ?>
            <tr>
                <td><?php echo $row['list_exam_title']?></td>
                <td><?php echo $row['online_exam_data']?></td>
                <td><?php echo $row['online_exam_duration']?></td>
                <td><?php echo $row['total_question']?></td>
                <td><?php echo $row['markers_per_right_answer']?></td>
                <td><?php echo $row['markers_per_wrong_answer']?></td>
                
                <td>
                    <?php
                      if($row['online_exame_Statues']=='created'){
                           echo'<a  href="view_exam.php?code='.$row['online_exam_code'].'"  class="btn btn-info">started</a>';
                        
                    }
                    elseif($row['online_exame_Statues']=='pending'){
                        echo'<span class="badge badge-warning">pending</span>';
                    }
                    elseif($row['online_exame_Statues']=='completed'){
                        echo'<span class="badge badge-dark">completed</span>';
                    }
                    elseif($row['online_exame_Statues']=='started'){
                        echo'<a  href="view_exam.php?code='.$row['online_exam_code'].'"  class="btn btn-info">started</a>';
                    }
                   echo '</td>';
                   
                    ?>
                </td>
               
            </tr>
          <?php
      }
      ?>
    
</tbody>
</table>
</div>
   <!--End table-->
  </div>
</div>
<!--End Card-->
</body>
</html>
<script>
$(document).ready(function(){
    $('#enroll_exam_list').dataTable();  
});

</script>