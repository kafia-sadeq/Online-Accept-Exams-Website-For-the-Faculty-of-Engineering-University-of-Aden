<?php
// profile Student Page
require_once('head_admin.php');
include('header.php');
require_once('head_admin.php');
$query= " SELECT * FROM student_table WHERE student_id ='".$_SESSION['user_id']."'";
$stmt=$con->prepare($query);
$stmt->execute();
$rows=$stmt->fetchAll();
// print_r($row);
?>
<html>
    <head>

    </head>
    <body style="background-color: #f8f9fa;">
<div class="containter">
    <div class="d-flex justify-content-center">
        <br/><br/>
        <span id="message"></span>
        <div class="card" style="margin-top:50px;margin-bottom:100px; ">
        <div class="card-header" style="background-color: #626262;color:cornsilk;font-size:25px;">
            <h4>Profile</h4>
        </div>
                  <div class="card-body">
                      <form method="post" id="profile_form">
                          <?php
                          foreach($rows as $row){
                              ?>
                               <script>
                                   $(document).ready(function(){
                                    $('#user_gender').val("<?php echo $row['student_gender']; ?>");
                                   });
                               </script>
                               <div class="form-group">
                                   <label>Enter Name</label>
                                   <input type="text" name="user_name" id="user_name" 
                                   class="form-control" value="<?php echo $row['student_name'] ?>">
                               </div>

                               <div class="form-group">
                                   <label>Select Gender</label>
                                   <select name="user_gender" id="user_gender"  class="form-control" >
                                            <option value="Male">Male</option>
                                            <option value="female">Female</option>
                                   </select>
                               </div>
          
                           <div class="form-group">
                               <label>Enter Address</label>
                               <textarea name="user_address" id="user_address" class="form-control" >
                               <?php echo $row['student_address'] ?>
                               </textarea>
                           </div>
  

                           <div class="form-group">
                               <label>Enter Mobile Number </label>
                               <input type="text" name="user_mobile_no" id="user_mobile_no" class="form-control"
                                value="<?php echo $row['student_mobile_no'] ?>"/>
                           </div>
                               
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
                                 <div class="form-group" align="center">
                                     <input type="hidden" name="page" value="profile"/>
                                     <input type="hidden" name="action" value="profile"/>
                                     <input type="submit" name="user_profile" id="user_profile" style="width:100%"
                                     class="btn btn-info" value="update"/>
                                 </div>
                              <?php
                             
                          }
                          ?>
                      </form>
                  </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#profile_form').parsley();
        $('#profile_form').on('submit',function(){
           $.ajax({
               url:'action.php',
               method:"POST",
               data:new FormData(this),
               contentType:false,
               cache:false,
               processData:false,
               success:function(data)
               {   
                
                   $('#message').html('<div class="alert alert-success">Succes Update Profile</div>')
               }
           })
        });
    });
</script>