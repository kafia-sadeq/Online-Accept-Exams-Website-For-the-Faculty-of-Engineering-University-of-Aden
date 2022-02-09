<?php

?>
<?php
//register.php
include('header.php');
$object="SELECT * FROM student_table WHERE student_id ='". $_SESSION['user_id']."'";
$stmt=$con->prepare($object);
$stmt->execute();
$rows=$stmt->fetchAll();
?>
<!DOCTYPE html>
<head>
</head>
<body>
<div class="containter">
<div class="d-flex justify-content-center">
<br/><br/>
<!--Start Card-->
<div class="card" style="margin-top:50px;
 margin-bottom:100px;">
 <!---Card Header-->
 <span id="message_operation"></span>
<div class="card-header">
<h4>Student Registration</h4>
</div>
<!---Card Body-->
<div class="card-body">
    
    <!--form-->
    <?php
    foreach($rows as $row)
    {
    ?>
    <form method="post" id="profile_form" >
     <!---Email Address-->
     <div class="form-group">
         <label>Enter Email Address</label>
         <input type="text" name="user_email_address" id="user_email_address" class="form-control" 
         value="<?php echo $row['student_email_address']?>"
       
         />
     </div>
     <!--- End Email Address-->
      <!---Enter Name-->
      <div class="form-group">
         <label>Enter  Name</label>
         <input type="text" name="user_name" id="user_name" class="form-control" 
         value="<?php echo $row['student_name']?>"/>
     </div>
     <!--- End Confirm Password-->
      <!---Enter GEnder-->
      <div class="form-group">
         <label>Select Gender</label>
         <select name="user_gender" id="user_gender" class="form-control" >
             <option value="male">Male</option>
             <option  value="femal">Female</option>
        </select>
     </div>
     <!--- End Gender-->
      <!---Enter Address-->
      <div class="form-group">
         <label>Enter Address</label>
         <textarea name="user_address" id="user_address" class="form-control">
        <?php echo $row['student_address']?>  
         </textarea>
     </div>
     <!--- End Address-->
      <!---Enter Moble Number-->
      <div class="form-group">
         <label>Enter mobile number</label>
         <input type="text" name="user_mobile_no" id="user_mobile_no"
          class="form-control"value="<?php echo $row['student_mobile_no']?>"/>
     </div>
     <!--- End Moble Number-->
      <!---Enter Profile Image-->
      <div class="form-group">
         <label>Choose your Image</label>
         <input type="file" name="user_image" id="user_image"  class="form-control"
         />
         <div>
         <?php
         echo "<img class='img-thumbnail'style='width: 200px; margin-top:30px'  src='../upload/".$row['student_image']."'/>"; 
        ?>
         </div>
     </div>
     <div class="form-group">
         <label>Choose payment Image</label>
         <input type="file" name="payment_image" id="payment_image"  class="form-control"
         />
         <div>
         <?php
         echo "<img class='img-thumbnail'style='width: 200px; margin-top:30px'  src='../upload/".$row['payment_image']."'/>"; 
        ?>
         </div>
     </div>
     <!--- End Profile Image-->
    <br/>
    <!---Enter Button Submit-->
    <div class="form-group" align="center">
        <input type="hidden" name="page" value="profile"/>
        <input type="hidden" name="action" value="profile"/>
        <input type="submit" name="user_profile" id="user_profile" class="btn btn-info"
         value="update" style="width:100px"/>
     </div>
     <!--- End Button Submit-->
    </form>
    <!--form-->
 <?php
    }
    ?>
    
</div>
<!--- End Card Body-->
</div>
<!--End Card-->
</div>
</div>
</body>
</html>
<script>
$(document).ready(function(){

  


});
</script>