
<?php
//question.php
// include 'connect.php';
include 'head.php';
// include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/datatables.css"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
    <link rel="stylesheet" type="text/css" href="css/parsley.css"/>
</head>
<body>
<!---Modal Add Question-->
<div class="modal" id="questionModal" style="background-color:rgb(0 255 173 / 63%);">
    <div class="modal-dialod modal-lg">
        <form  type="post" id="question_form">
        <div class="modal-content">
          <!--Modal header-->
          <div  class="modal-header">
              <h4 class="modal-title"id="question_modal-title"></h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
          <!--Modal body-->
        <div class="modal-body">
                <!---Question Title-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 text-right"> Question Title
                        <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" name="question_title" id="question_title"
                             autocomplete="off" class="form-control"/>
                        </div>
                      </div>
                 </div>
                 <!---Question Title-->
                 <!---Question Option 1-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 text-right"> Option 1
                        <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" name="option_title_1" id="option_title_1"
                             autocomplete="off" class="form-control"/>
                        </div>
                      </div>
                 </div>
                 <!---Question Option 1-->
                  <!---Question Option 2-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 text-right"> Option 2
                        <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" name="option_title_2" id="option_title_2"
                             autocomplete="off" class="form-control"/>
                        </div>
                      </div>
                 </div>
                 <!---Question Option 2-->
                <!---Question Option 3-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 text-right"> Option 3
                        <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" name="option_title_3" id="option_title_3"
                             autocomplete="off" class="form-control"/>
                        </div>
                      </div>
                 </div>
                 <!---Question Option 3-->
                  <!---Question Option 4-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 text-right"> Option 4
                        <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                            <input type="text" name="option_title_4" id="option_title_4"
                             autocomplete="off" class="form-control"/>
                        </div>
                      </div>
                 </div>
                 <!---Question Option 4-->
                <!---Question answer question-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 text-right"> Answer Question
                        <span class="text-danger">*</span></label>
                        <div class="col-md-8">
                           <select name="answer_option" 
                            id="answer_option"
                            class="form-control">
                                  <option>Select </option>
                                  <option value="1">1 option</option>
                                  <option value="2">2 option</option>
                                  <option value="3">3 option</option>
                                  <option value="4">4 option</option>
                           </select>
                        </div>
                      </div>
                 </div>
                <!---Question answer question-->
        </div>
          <!--Modal footer-->
          <div class="modal-footer">
          <input type="hidden" name="question_id" id="question_id"/>
          <input type="hidden"  name="hidden_online_exam_id" id="hidden_online_exam_id"/>
          <input type="hidden"  name="page" value="question"/>
          <input type="hidden"  name="action" id="hidden_action" value="editequestion"/>
          <input  type="button" name="question_button_action" id="question_button_action" 
          class="btn btn-success btn-sm updte" value="Add" style=" width:100px"/>
          <button type="button" class="btn btn-danger btn-sm " data-dismiss="modal">Close</buuton>
           </div>
         
</div>
</form>
</div>
</div>
<!---End Modal Add Question-->
<!---Modal Delet Question-->
<div class="modal" id="deletModal">
<div class="modal-dialog">
<div class="modal-content">
<!---Modal Header-->
<div class="modal-header">
<h4 class="modal-title">Delet Confirmation</h4>
<button type="button" class="close" data-dismiss="modal">
&times;
</button>
</div>
<!---Modal Body-->
<div class="modal-body">
<h3 align="center">Are you sure you want to removed this? </h3>
</div>
<!---Modal footer-->
<div class="modal-footer">
    <button type="button" class="btn btn-primary btn-m" name="ok_button" id="ok_button">ok</button>
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!---End Modal Delet  Question-->
<?php
if(isset($_GET['Exam_id'])){
    $Exam_id=isset($_GET['Exam_id']) && is_numeric($_GET['Exam_id']) ? intval ($_GET['Exam_id']):0;
    $date=array(
    ':Exam_id'=>$Exam_id
    );
    $query="SELECT * FROM quesion_table WHERE online_exam_id=:Exam_id";
    $stmt=$con->prepare($query);
    $stmt->execute($date);
    $rows=$stmt->fetchAll();
}
?>
<nav aria-label="breadcrumb" style="margin-top: 30px;">
    <ol class="breadcrumb">
       <li class="breadcrumb-item">
        <a href="exam.php">Exam List</a>
       </li>
       <li class="breadcrumb-item active"  aria-current="page">
           Question List
       </li>
    </ol>
</nav>

<!--Area-->
<!--Card-->
<div class="card">
<!--Card header-->
        <div class="card-header">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="panel-title">
                       Questions List
                    </h3>
                  </div>
                
              </div>
        </div>
<!---End header-->
<!---Body-->
<div class="card-body">
    <span id="message_operation"></span>
<!----- Table--->
<div class="table-responsive">
<table id="datatabelQuestion" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Question Title</th>
<th>Right Option</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    <?php
    
    foreach($rows as $row)
    {
        echo '<tr>';
        echo '<td> '.$row['question_title'].'</td>';
        echo '<td>'.$row['answer_option'].'</td>';
       ?>
    <td>
    <div style="display:flex">
      <button class="btn btn-primary btn-sm edite" id="<?php echo $row['question_id'] ?>">Edite</button>
      <button  class="btn btn-danger btn-sm  delet" id="<?php echo $row['question_id'] ?>">Delet</button>
    </div>
    </td>
      <?php  echo '</tr>';
    }
    ?>
</tbody>
</table>
</div>
<!-----End  Table--->
</div>
<!---End Body-->
</div>
<!--End Card-->

<!--End Area-->
<script src="js/Quiery.js"></script>
<script  src="js/bootstrap.min.js"></script>
<script  src="js/datatable.js"></script>
<script  src="js/parsley.js"></script>
<script>
$(document).ready(function()
{
   //dataTable Script
   $('#datatabelQuestion').dataTable();  
   // Delet Script
   var question_id='';
   $(document).on('click','.delet',function(){
    question_id=$(this).attr('id');
    $('#deletModal').modal('show');
   });

   $('#ok_button').click(function(){
      $.ajax({
      url:"action.php",
      method:"POST",
      dataType:"json",
      data:{question_id:question_id,action:'deletes',page:'question'},
      success:function(data)
      {
        if(data.success)
        {
        $('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');
        $('#deletModal').modal('hide')
         }
      }
      });
   });
   //update Ascript
   function reset_question_form()
   {
       $('#question_modal-title').text('Edite Question');
       $('#question_button_action').val('Edit');
       $('#question_form')[0].reset();
       $('#question_form').parsley().reset();
   }
   var question_id='';
  $(document).on('click','.edite',function(){
    reset_question_form();
    question_id=$(this).attr('id');
    // alert(question_id);
    $.ajax({
      url:"action.php",
      method:"post",
      dataType:"json",
      data:{action:'editQuestion_fetch',question_id:question_id,page:'question' },
      success:function(data)
      {  
         $('#question_title').val(data.question_title);
         $('#option_title_1').val(data.option_title_1);
         $('#option_title_2').val(data.option_title_2);
         $('#option_title_3').val(data.option_title_3);
         $('#option_title_4').val(data.option_title_4);
         $('#answer_option').val(data.answer_option);
         $('#question_button_action').val("Edite");
         $('#question_modal-title').text('Edite Question Details');
         $('#questionModal').modal('show');
      }
    });
  }); 
  $(document).on('click','.updte',function(){
    
});
}
);
</script>
</body>
</html>