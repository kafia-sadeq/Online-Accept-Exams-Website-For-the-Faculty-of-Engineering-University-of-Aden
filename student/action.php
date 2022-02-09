<?php
// Student action.php
include 'connect.php';

if(isset($_POST['page']))
{
   if($_POST['page']=='register')
{   // Check Email
   if($_POST['action']=='check_email')
   {
    $query=" SELECT * FROM student_table WHERE student_email_address='".trim($_POST["email"])."'";
    $stmt=$con->prepare($query);
    $stmt->execute();
    $count=$stmt->rowCount();
    echo $count;
    if($count==0)
    {
        $output=array(
            'success' =>true
        );
    }
   }
   // End Check Email
  // Registeration page
  
  if($_POST['action']=='register'){
  
     $current_datetime=date("Y-m-d").' '.date("H:i:s",STRTOTIME(date('h:i:sa')));
     $user_verification_code=md5(rand());
     $student_image=$_FILES['user_image']['name'];
     $student_image_tmp=$_FILES['user_image']['tmp_name'];
     $img_str_ioc="../upload/".$student_image;
     move_uploaded_file($student_image_tmp,$img_str_ioc);

     $payment_image=$_FILES['payment_image']['name'];
     $payment_image_tmp=$_FILES['payment_image']['tmp_name'];
     $img_str_ioc1="../upload/".$payment_image;
     move_uploaded_file($payment_image_tmp,$img_str_ioc1);
    // $date=array(
    //     ':user_email_Address'     =>$_POST['user_email_address'],
    //     ':user_password'          =>password_hash($_POST['user_password'],PASSWORD_DEFAULT),
    //     ':user_verification_code' =>$user_verification_code,
    //     ':users_name'             =>$_POST['user_name'],
    //     ':user_gender'           =>$_POST['user_gender'],
    //     ':user_address'          =>$_POST['user_address'],
    //     ':user_mobile_no'        =>$_POST['user_mobile_no'],
    //     ':student_email_verified' =>'yes',
    //     ':student_created_on'    =>$current_datetime,
    //     ':user_image'            => $student_image
    //  );
    //  print_r($date);

    $user_email_Address=$_POST['user_email_address'];
    $user_password=password_hash($_POST['user_password'],PASSWORD_DEFAULT);
    $user_verification_code=$user_verification_code;
    $users_name=$_POST['user_name'];
    $user_gender=$_POST['user_gender'];
    $user_address=$_POST['user_address'];
    $user_mobile_no=$_POST['user_mobile_no'];
    $student_created_on=$current_datetime;
    // echo $user_email_Address.'<br/>'.$user_password.'<br/>'.$user_verification_code.'<br/>'.
    // $user_gender.'<br/>'.$user_address.'<br/>'.$user_mobile_no.'<br/>'.$student_created_on. $student_image.$payment_image;
    $query=" INSERT INTO student_table (student_email_address,student_password,student_verfication_code,
    student_name,	student_gender,	student_address,student_mobile_no,student_image,payment_image,student_created_on) VALUES 
    ('$user_email_Address', '$user_password','$user_verification_code','$users_name',' $user_gender',
    '$user_address','$user_mobile_no', '$student_image','$payment_image','$student_created_on')";
    $stmt=$con->prepare($query);
    $stmt->execute(); 
  }
  //End  Registeration page
} 
//page login
if($_POST['page']=='login')
{
  if($_POST['action']=='login')
  {
   $date=array(
  ':user_email_address'=>$_POST['user_email_address']
   );
   $query=" SELECT * FROM student_table WHERE student_email_address=:user_email_address";
  
  $stmt=$con->prepare($query);
  $stmt->execute($date);
  $rows=$stmt->fetchAll();
  $count=$stmt->rowCount();
  if($count>0)
  {
    foreach($rows as $row)
    {
      if(password_verify($_POST['user_password'],$row['student_password']))
      {
         $_SESSION['user_id']=$row['student_id'];
         $output=array(
          'success'=>true
        );
      }
      else{
        $output=array(
          'error'=>'Warning password',
        );
      }
    }
  }
  else{
    $output=array(
      'error'=>'Warning Email Address',
    );
  }
  echo json_encode($output);
  }
}
//End page login
// User Chang Password
if($_POST['page']=='Change_password')
{
  if($_POST['action']=='Change_password'){
   $date=array(
   ':user_password' =>password_hash($_POST['user_password'],PASSWORD_DEFAULT),
   ':user_change_id' => $_SESSION['user_id']
   );
  $query="UPDATE student_table SET 	student_password=:user_password WHERE student_id=:user_change_id";
  $stmt=$con->prepare($query);
  $stmt->execute($date);
  session_destroy();
  $output=array(
       'success' =>'Password has been Change'
  );
 echo json_encode($output);
  }
}
//User Chang Password
// Fetch Detail Exam
if($_POST['page']=='index')
{
  if($_POST['action']=='fetch_exam')
  {
    $query="SELECT * FROM list_examations WHERE online_exam_id ='".$_POST['exam_id']."' ";
    $stmt=$con->prepare($query);
    $stmt->execute();
    $rows=$stmt->fetchAll();
    $output='
    <div class="card" style="margin: bottom 5px;">
    <div class="card-header"> Exam Details</div>
    <div class="card-body">
    <table class="table table-striped table-hover table-bordered">
    ';
  
    foreach($rows as $row)
    {
      $output.='
      <tr>
      <td><b>Exam Title </b></td>
      <td>'.$row["list_exam_title"].'</td>
      </tr>
      <tr>
      <td><b>Exam Duration</b></td>
      <td>'.$row["online_exam_duration"].'</td>
      </tr>
      <tr>
      <td><b>Exam Total Question</b></td>
      <td>'.$row["total_question"].'</td>
      </tr>
      <tr>
      <td><b> markers per right answer</b></td>
      <td>'.$row["markers_per_right_answer"].'Mark</td>
      </tr>
      <tr>
      <td><b> markers per wrong answer</b></td>
      <td>'.$row["markers_per_wrong_answer"].'Mark </td>
      </tr>
      ';
      $dateExam=array(
        ':Student_id'=>$_SESSION['user_id'],
        ':exam_id'   =>$_POST['exam_id']
      );
      $exam_enroll=" SELECT * FROM user_exam_enroll_table 
      WHERE 	student_id =:Student_id AND exam_id =:exam_id ";
      $stmt2=$con->prepare($exam_enroll);
      $stmt2->execute($dateExam);
      $count=$stmt2->rowCount();
      if($count >0)
      {
        $enroll_button='
        <tr>
        <td colspan="2" align="center">
        <button type="button" name="enoll_button" class="btn btn-info">
        You Already Enroll it 
        </button>
        </td>
        </tr>
        ';
      }
      else
      {
        $enroll_button='
        <tr>
        <td colspan="2" align="center">
        <button type="button" name="enoll_button" id="enroll_button" class="btn btn-warning" 
        data-exam_id="'.$row['online_exam_id'].'">
        Enroll it 
        </button>
        </td>
        </tr>
        ';
      }
     $output.=$enroll_button;
    }
    $output.='
    </div>
    </table>
    </div>
    ';
    echo $output;
  }
}
// End Fetch Detail Exam
//enroll_Exam
if($_POST['page']=='index')
{
  if($_POST['action']=='enroll_exam')
  {
    $date=array(
    ':student_id'=>$_SESSION['user_id'],
    ':exam_id'=>$_POST['exam_id']
    );
    $query="INSERT INTO user_exam_enroll_table(student_id,exam_id ) VALUES (:student_id,:exam_id)";
    $stmt=$con->prepare($query);
    $stmt->execute($date);
    $query="SELECT 	question_id  FROM quesion_table WHERE online_exam_id ='".$_POST['exam_id']."'";
    $rows=$stmt->fetchAll();
   foreach($rows as $row)
   {
     $date=array(
      ':student_id'=>$_SESSION['user_id'],
      ':exam_id'=>$_POST['exam_id'],
      ':question_id'=>$row['question_id'],
     );
   }
  }
 
}
// End enroll_Exam
//View Exam action
if($_POST['page']=='view_exam')
{
  if($_POST['action']=='load_question')
  {
         $exam_id=$_POST["exam_online_id"];
         $question_id=$_POST["question_id"];
          // Apears the first question the Exam
         if($_POST["question_id"]=='')
         { 
           $query=" SELECT * FROM quesion_table WHERE  online_exam_id=$exam_id ORDER BY 	question_id  ASC LIMIT 1   ";

         }
         // statues the Next button qusetion the Exam
         else
         {
          $query=" SELECT * FROM quesion_table WHERE  question_id=$question_id ";
         }

         // Line Execute
       $stmt=$con->prepare($query);
       $stmt->execute();
      $result=$stmt->fetchAll();
    foreach ($result as $row)
    {
      $output ='
      <h1>'.$row["question_title"].'</h1>
      <hr/>
      <br/>
      <div class="row">
      ';
      //Start Select option
      $query= " SELECT * FROM option_table WHERE question_id='".$row['question_id']."'";
      $stmt=$con->prepare($query);
      $stmt->execute();
      $sub_result=$stmt->fetchAll();
      // print_r($sub_row);
      $count=1;
      foreach($sub_result as $sub_row)
      {
        $output .='
        <div class="col-md-6"  >
         <div class="radio">
         <label>
         <h4>
         <input type="radio"  name=" option_1" class="answer_option" 
         data-question_id="'.$row['question_id'].'" data-id=" '.$count.'"
         />'.$sub_row["option_title"].'
         </h4>
         </label>
         </div>

        </div>
        ';
        $count=$count+1;

        //End selected option
      }
      
     $output .='</div>';
     //The start  Next button
     $QUESTION_ID=$row['question_id'];
     $ONLINE_EXAM=$_POST["exam_online_id"];
    //  echo $QUESTION_ID. '<br/>'.$ONLINE_EXAM;
     $query = "SELECT question_id  FROM  quesion_table
     WHERE question_id > $QUESTION_ID AND  online_exam_id =$ONLINE_EXAM ORDER BY question_id ASC LIMIT 1
     ";
     $stmt=$con->prepare($query);
     $stmt->execute();
     $next_result=$stmt->fetchAll();
     foreach($next_result as $next_row)
     {
       $next_id=$next_row['question_id'];
     }
     $if_next_disable='';

     if($next_id==''){
      $if_next_disable='disabled';
     }
     $output .='
     <br/>
     <br/>
     <div align="center">
     <button type="button" name="next" class="btn btn-warning next btn-lg" id="'.$next_id.'" '.$if_next_disable.'> Next</button>
     </div>
     <br/>
     <br/>
     ';
     //the End Next button
    //  print_r($next_result);
    }
    echo $output;
  }
 
}
//anwser question start
if($_POST['action']=='answer')
{

// question anwser
function Get_question_right_anwser(){
  // include 'connect.php';
$dsn='mysql:host=localhost;dbname=online_examination';
$username='root';
$password='';
try{
    $con =new PDO($dsn,$username,$password);

    
}
catch(PDOException $e)
{
    echo "failed".$e->$e->getMessage();
}
  $query= " SELECT markers_per_right_answer FROM list_examations WHERE 	online_exam_id ='".$_POST['exam_online_id']."' ";
  $stmt=$con->prepare($query);
  $stmt->execute();
  $result=$stmt->fetchAll();
  foreach($result as $row)
  {
    return $row["markers_per_right_answer"];
  }
  }
  $exam_right_answer_mark=Get_question_right_anwser();

  ////////////////////////////////
  function Get_question_wrong_answer_mark()
  {
    $dsn='mysql:host=localhost;dbname=online_examination';
    $username='root';
    $password='';
    try{
        $con =new PDO($dsn,$username,$password);  
    }
    catch(PDOException $e)
    {
        echo "failed".$e->$e->getMessage();
    }
  $query= " SELECT 	markers_per_wrong_answer FROM list_examations WHERE 	online_exam_id ='".$_POST['exam_online_id']."' ";
  $stmt=$con->prepare($query);
  $stmt->execute();
  $result=$stmt->fetchAll();
  foreach($result as $row)
  {
    return $row["markers_per_wrong_answer"];
  }
  }
  $exam_wrong_answer_mark=Get_question_wrong_answer_mark();

  ////////////////////////////////////////
  function Get_question_answer_option()
  {
    $dsn='mysql:host=localhost;dbname=online_examination';
    $username='root';
    $password='';
    try{
        $con =new PDO($dsn,$username,$password);  
    }
    catch(PDOException $e)
    {
        echo "failed".$e->$e->getMessage();
    }
    $query= " SELECT 		answer_option FROM quesion_table WHERE 	question_id ='".$_POST['question_id']."' ";
    $stmt=$con->prepare($query);
    $stmt->execute();
    $result=$stmt->fetchAll();
    foreach($result as $row)
    {
      return $row["answer_option"];
    }
  }
  $orignal_answer=Get_question_answer_option();
  // print_r($orignal_answer);
  ////////////////////////////////////////////
  $mark=0;
  if( $orignal_answer==$_POST['answer_option'])
  {
    $mark='+'.$exam_right_answer_mark;
  }
  else
  {
    $mark='-'.$exam_wrong_answer_mark;
  }
// echo $_POST['answer_option'].'<br/>'.$_POST['question_id'].'<br/>'.$_POST['exam_online_id'];
// $date=array(
//   ':student_id'=>$_SESSION['user_id'],
//   ':answer_exam_id' =>$_POST['exam_online_id'],
//   ':answer_question_id'=>$_POST['question_id'],
//   ':answer_option'=>$_POST['answer_option'],
//   ':marks'               =>$mark
//  );
//  print_r($date);
$quer=" UPDATE user_exam_question_answer SET user_answer_option='".$_POST['answer_option']."',marks='".$mark."'
WHERE student_id ='".$_SESSION['user_id']."' AND exam_id ='".$_POST['exam_online_id']."' AND question_id='".$_POST['question_id']."'"  ;
$stmt=$con->prepare($quer);
$stmt->execute();

}
/////////////////////////////////

//End anwser question
//View Exam End action
// Enroll_exam start

//Enroll_exam End
//Student Profile Page 
if($_POST['page']=='profile'){
  
  if($_POST['action']=='profile')
  {
    $current_datetime=date("Y-m-d").' '.date("H:i:s",STRTOTIME(date('h:i:sa')));
    $user_verification_code=md5(rand());
    
     
      $student_image=$_FILES['user_image']['name'];
      $student_image_tmp=$_FILES['user_image']['tmp_name'];
      $img_str_ioc="../upload/".$student_image;
       move_uploaded_file($student_image_tmp,$img_str_ioc);
     
     
      $payment_image=$_FILES['payment_image']['name'];
      $payment_image_tmp=$_FILES['payment_image']['tmp_name'];
      $img_str_ioc1="../upload/".$payment_image;
       move_uploaded_file($student_image_tmp,$img_str_ioc1);
     

     $date=array(
       ':student_name' =>$_POST['user_name'],
       ':user_address'=>$_POST['user_address'],
       ':user_gender' =>$_POST['user_gender'],
       ':user_mobile_no'=>$_POST['user_mobile_no'],
       ':student_image'=>$student_image,
       ':payment_image'=>$payment_image,
       ':student_id' =>$_SESSION['user_id'],
     );
  //  print_r($date);
  $query =" UPDATE student_table SET student_name=:student_name ,
  	student_gender=:user_gender,student_address=:user_address, student_mobile_no=:user_mobile_no,
    student_image=:student_image,	payment_image=:payment_image WHERE student_id=:student_id
    ";
    $stmt=$con->prepare($query);
    $stmt->execute($date);
  }
}

//End Profile Page
}
