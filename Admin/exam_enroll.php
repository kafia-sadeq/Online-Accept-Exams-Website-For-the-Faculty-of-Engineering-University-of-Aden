
<?php
//Exam_Enroll.php
?>

<div class="jumbotron" style="padding:40px;
background-color: #F5F5F5;margin-bottom:0">
</div>

<?php
// exam_enroll page
    include 'head.php';
    $exam_id=$_GET['exam_id'];
    // echo $exam_id;
?>
<br/>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
       <li class="breadcrumb-item">
        <a href="exam.php">Exam List</a>
       </li>
       <li class="breadcrumb-item active"  aria-current="page">
           Exam Enrollment List
       </li>
    </ol>
</nav>


<div class="card">
    <div class="card-header">
          <div class="row">
               <div class="col-md-9">
                   <h3 class="panel-title">Exam Enrollment list</h3>
               </div>
               <div class="col-md-3" align="right">

               </div>
          </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="enroll_table"  class="table table-bordered table-striped table-hover">
                  <thead>
                      <tr>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Gender</th>
                          <th>Mobile No.</th>
                          <th>Result</th>
                      </tr>
                  </thead>
                  <tbody>
                       <?php
                  
                    //    echo  $exam_id;
                       $query =
                       " SELECT * FROM user_exam_enroll_table INNER JOIN student_table
                       ON student_table.student_id =user_exam_enroll_table.student_id 
                       WHERE user_exam_enroll_table.exam_id =$exam_id
                       ";
                       $stmt=$con->prepare($query);
                       $stmt->execute();
                       $fetchs=$stmt->fetchAll();
                    //    print_r($fetchs);
                       foreach($fetchs as $fetch)
                       {
                        $user_id=$fetch['student_id'];
                           ?>
                           <br/>
                           
                           <tr>
        
                               <td><?php  echo "<img class='img-thumbnail' style='width: 100px;'  src='../upload/".$fetch['student_image']."'/>";  ?></td>
                               <td><?php echo $fetch['student_name']?></td>
                               <td><?php echo $fetch['student_gender']?></td>
                               <td><?php echo $fetch['student_mobile_no']?></td>
                               <td>
                                   
                               <a href="user_exam_result.php?exam_id=<?php echo $_GET['exam_id'] ?> &user_id=<?php echo  $user_id?>" class="btn btn-info btn-sm">Result</a>
            
                            </td>
                           </tr>
                           <?php
                       }
                       ?>
                  

                  </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
    $('#enroll_table').dataTable();
      
    });
</script>



