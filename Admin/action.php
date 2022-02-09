<?php
//action.php
//  Registeration Pages
   include 'connect.php';
  
   $current_datetime=date("Y-m-d").' '.date("H:i:s",STRTOTIME(date('h:i:sa')));
     if(isset($_POST['page']))
     { 
       if($_POST['page']=='register'){
         if($_POST['action']=='register'){
          $dmin_verification_code=md5(rand());
          $receiver_email=$_POST['admin_email_address'];
          $password=password_hash($_POST['admin_password'],PASSWORD_DEFAULT);
          
           $date=array(
             ':admin_email_sddress'    =>$receiver_email,
             ':admin_password'         =>$password,
             ':dmin_verification_code' =>$dmin_verification_code,
             ':admin_type'             =>'sub_master',
             ':admin_Created_on'       =>$current_datetime,
           );
   
           $query="
             INSERT INTO admine_table(admine_email_address,admine_password,
             admine_verfication_code,admine_type,admine_created_on)
             VALUES(:admin_email_sddress,:admin_password,
             :dmin_verification_code,:admin_type,:admin_Created_on)
           ";
           $stmt=$con->prepare($query);
           $stmt->execute($date);
           /*$output=array(
           'success' =>true
           ); */
         }
       }
 //  End  Registeration Pages
 // Login pages
    if($_POST['page']=='login')
    {
      if($_POST['action']=='login')
      {
       $date=array(
         ':admnin_email_address'=>$_POST['admin_email_address']
       );
       $query="
       SELECT * FROM admine_table WHERE admine_email_address=:admnin_email_address
       ";
       $stmt=$con->prepare($query);
       $stmt->execute($date);
       $rows=$stmt->fetchAll();
       $count=$stmt->rowCount();
       $receiver_password=$_POST['admin_passsword'];
       //Check Email
       
       if($count >0){
        foreach($rows as $row)
        {
          // Check Password 
           if(password_verify($_POST['admin_passsword'],$row['admine_password']))
           {
             $_SESSION['admin_id']=$row['admine_id'];
             $output=array(
              'success' =>true
            );
           }
           else{
             
             $output=array(
               'error' =>'Worng Password'
             );
           }
          // End Check Password
        }
       }
       else{
       $output=array(
          'error' =>'worng Email Address'
        );
       }
       //End Check Email
       echo json_encode($output);
      }
      
    }
// End  Login pages
//Add New Exam 
if($_POST['page']=='exam')
{
  if($_POST['action']=='Add'){
    
    $date=array(
    ':admin_id' =>$_SESSION['admin_id'],
    ':online_exam_title' =>$_POST['online_exam_title'],
    ':online_exam_datetime' =>$_POST['online_exam_datetime'],
    ':online_exam_Duration' =>$_POST['online_exam_Duration'],
    ':online_exam_Question' =>$_POST['online_exam_Question'],
    ':Marks_per_right_answer' =>$_POST['Marks_per_right_answer'],
    ':Marks_per_Wrong_answer' =>$_POST['Marks_per_Wrong_answer'],
    ':online_exam_created_on' => $current_datetime,
    ':online_exam_status'     =>'created',
    ':online_exam_code'      =>md5(rand()),
     );
  
     $query="INSERT INTO list_examations(admine_id,list_exam_title,online_exam_data,online_exam_duration,total_question,
     markers_per_right_answer,markers_per_wrong_answer,online_exam_Created_on,online_exame_Statues,	online_exam_code
     ) 
     VALUES(:admin_id,:online_exam_title,
     :online_exam_datetime,:online_exam_Duration,:online_exam_Question,:Marks_per_right_answer,:Marks_per_Wrong_answer,
     :online_exam_created_on,:online_exam_status,:online_exam_code)";
    $stmt=$con->prepare($query);
    $stmt->execute($date); 
    $output=array(
      'success'=>'New Exam Details Added'
    );
    echo json_encode($output);
  }
}
//End Add New exam 

//Delete exam 
if($_POST['action']=='delete'){
  $date=array(
   ':online_exam_id'=>$_POST['exm_id']
  );
$query="DELETE FROM list_examations WHERE online_exam_id=:online_exam_id ";
$stmt=$con->prepare($query);
$stmt->execute($date);
$output=array(
  'success'=>'Exam Details has been removed'
);
echo json_encode($output);
}
//End Delete exam 
//Add Question
if($_POST['page']=='question'){
 if($_POST['action']=='Add'){
  $date=array(
    ':online_exam_id'=>$_POST['hidden_online_exam_id'],
    ':question_title'=>$_POST['question_title'],
    ':answer_option'=>$_POST['answer_option'],
  );
  $query="INSERT INTO quesion_table(online_exam_id,question_title,answer_option)
  VALUES(:online_exam_id,:question_title,:answer_option)
  ";
  $stmt=$con->prepare($query);
  $stmt->execute($date);
  $question_id=$con->lastInsertId();
  for($number=1 ;$number<=4 ;$number++){
    $date=array(
          ':question_id'=>$question_id,
          ':option_number' =>$number,
          ':option_title'   =>$_POST['option_title_'.$number]
    );
   $query=" INSERT INTO option_table (question_id,option_number,option_title ) 
   VALUES (:question_id,:option_number,:option_title)";
   $stmt=$con->prepare($query);
   $stmt->execute($date);
  }
  $output=array(
    'success'=>'Question Added'
   );
   echo json_encode($output);
 
 }
}
//End Add Question
//Delete Question
if($_POST['action']=='deletes')
{
 $date=array(
':question_id'=>$_POST['question_id'],

 );
 $query="DELETE FROM quesion_table WHERE question_id=:question_id";
 $stmt=$con->prepare($query);
 $stmt->execute($date);
 $query="DELETE FROM option_table WHERE question_id=:question_id ";
 $stmt=$con->prepare($query);
 $stmt->execute($date);
 $output=array(
  'success'=>'Question Details has been removed'
 );
 echo json_encode($output);
}
//End Delet Question
// fetch Data Question
if($_POST['action']=='editQuestion_fetch')
{
  $query=" SELECT * FROM quesion_table  WHERE question_id='".$_POST['question_id']."'";
  $stmt=$con->prepare($query);
  $stmt->execute();
  $fetch=$stmt->fetchAll();
  foreach( $fetch as $fet)
  {
    $output['question_title']=html_entity_decode($fet['question_title']);
    $output['answer_option']=$fet['answer_option'];
   for($number=1 ;$number<=4; $number++)
   {
    $query="SELECT * FROM option_table  WHERE question_id='".$_POST['question_id']."'
    AND option_number='".$number."'
    ";
    $stmt=$con->prepare($query);
    $stmt->execute();
    $sub_fetch=$stmt->fetchAll();
    foreach($sub_fetch as $sub_fet){
      $output["option_title_".$number]=html_entity_decode($sub_fet["option_title"]);
    }
   }
  }
 echo json_encode($output);
}

//End fetch Data Question
//End view Details student
if($_POST['page']=='user'){
     if($_POST['action']=='fetch_data')
     {
     $query="SELECT * FROM student_table WHERE 	student_id='".$_POST["student_id"]."'";
     $stmt=$con->prepare($query);
     $stmt->execute();
     $rows=$stmt->fetchAll();
    //  print_r($rows);
     foreach($rows as $row){
       $output='
       <div class="row">
       <div align="center"><img class="img-thumbnail"  style="width: 60%; margin-bottom:10px" src="../upload/'.$row['student_image'].'" /></div>
       <table class="table table-bordered ">
        <tr>
        <th>Name</th>
        <td>'.$row["student_name"].' </td>
        </tr>
        <tr>
        <th>Gender</th>
        <td>'.$row["student_gender"].'</td>
        </tr>
        <tr>
        <th>Address</th>
        <td>'.$row["student_address"].'</td>
        </tr>
        <tr>
        <th>Mobile No.</th>
        <td>'.$row["student_mobile_no"].'</td>
        </tr>
        <tr>
        <th>Email</th>
        <td>'.$row["student_email_address"].'</td>
        </tr>
       </table>
       </div>
       
       ';
     }
  echo $output;
     }
}
//End view Details student

////////////////////Edite Exam
if($_POST['page']=='edite_exam')
{
  if($_POST['action']=='fetch_data')
  {
   $query=" SELECT * FROM list_examations WHERE online_exam_id='".$_POST['exam_id']."'";
   $stmt=$con->prepare($query);
   $stmt->execute();
   $rows=$stmt->fetchAll();
   foreach($rows as $row){
    $output='
    <form  type="post" id="Edite_Exam_form" >
    <div class="form-group">
    <div class="row">
        <label class="col-md-4 text-right">
            Exam Title <span class="text-danger">*</span>
          </label>
          <div class="col-md-8">
              <input type="text" name="online_exam_title" id="online_exam_title" class="form-control" value="'.$row["list_exam_title"].'" >
           </div>
       </div>
  </div>
<div class="form-group">
  <div class="row">
  <label class="col-md-4 text-right">
     Time <span class="text-danger"></span>
    </label>
    <div class="col-md-8">
        <input type="text" name="online_exam_title" id="online_exam_title" class="form-control" value="'.$row["online_exam_data"].'"  readonly>
     </div>
 </div>
</div>
  
   <div class="form-group">
   <div class="row">
       <label class="col-md-4 text-right">
       Exam Date & Time <span class="text-danger">*</span>
         </label>
         <div class="col-md-8">
             <!-- <input type="datetime-local"/> -->
             <input type="datetime-local" name="online_exam_datetime" value="'.$row["online_exam_data"].'" id="online_exam_datetime" class="form-control" />
          </div>
      </div>
 </div>
</div>

 <div class="form-group">
           <div class="row">
               <label class="col-md-4 text-right">
               Exam  Duration <span class="text-danger">*</span>
                 </label>
                 <div class="col-md-8">
                     <input type="text" name="online_exam_Duration" id="online_exam_Duration" value="'.$row["online_exam_duration"].'" class="form-control" />
                  </div>
              </div>
    </div>

    <div class="form-group">
    <div class="row">
        <label class="col-md-4 text-right">
        Total Question <span class="text-danger">*</span>
          </label>
          <div class="col-md-8">
              <input type="text" name="online_exam_Question" id="online_exam_Question" class="form-control" value="'.$row["total_question"].'" />
           </div>
       </div>
  </div>

  <div class="form-group">
  <div class="row">
      <label class="col-md-4 text-right">
      Marks per right answer <span class="text-danger">*</span>
        </label>
        <div class="col-md-8">
            <input type="text" name="Marks_per_right_answer" id="Marks_per_right_answer" class="form-control" value="'.$row["markers_per_right_answer"].'" />
         </div>
     </div>
</div>     

<div class="form-group">
           <div class="row">
               <label class="col-md-4 text-right">
               Marks per wrong answer <span class="text-danger">*</span>
                 </label>
                 <div class="col-md-8">
                     <input type="text" name="Marks_per_Wrong_answer" id="Marks_per_Wrong_answer" class="form-control"  value="'.$row["markers_per_wrong_answer"].'" />
                  </div>
              </div>
         </div>              
      </div>
      <div class="modal-footer">
      <input type="hidden" name="action" value="updateExam" id="hidden_action"/>
      <input type="button" name="button_action" id="'.$row["online_exam_id"].'" class="btn btn-success btn-sm Edit" value="Edit" style="width:100px"/>
      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
     
      </div>
    </form>
    
    ';
  }
  echo $output;
  }

}


 } 
?>