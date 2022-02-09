
<?php
//Exam.php
?>

<div class="jumbotron" style="padding:40px;
background-color: #F5F5F5;margin-bottom:0">
</div>



<?php

include 'head.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam List Page</title>
    
    
</head>
<body>

<!--Modal-->
<div class="modal " id="FormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
  <form method="post" id="exam_form">
    <div class="modal-content">
        <!--Modal Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title"></h4>
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
      </div>
      <!-- Modal body-->
      <div class="modal-body">
       <!--Exam title-->
       <div class="form-group">
           <div class="row">
               <label class="col-md-4 text-right">
                   Exam Title <span class="text-danger">*</span>
                 </label>
                 <div class="col-md-8">
                     <input type="text" name="online_exam_title" id="online_exam_title" class="form-control">
                  </div>
              </div>
         </div>
       
    <!---Exam Date& Duration-->
    <div class="form-group">
           <div class="row">
               <label class="col-md-4 text-right">
               Exam Date & Time <span class="text-danger">*</span>
                 </label>
                 <div class="col-md-8">
                     <!-- <input type="datetime-local"/> -->
                     <input type="datetime-local" name="online_exam_datetime" id="online_exam_datetime" class="form-control" />
                  </div>
              </div>
         </div>
 <!---Exam Date& Duration-->
 <div class="form-group">
           <div class="row">
               <label class="col-md-4 text-right">
               Exam  Duration <span class="text-danger">*</span>
                 </label>
                 <div class="col-md-8">
                     <input type="text" name="online_exam_Duration" id="online_exam_Duration" class="form-control" />
                  </div>
              </div>
    </div>
<!---  Total Question-->
<div class="form-group">
           <div class="row">
               <label class="col-md-4 text-right">
               Total Question <span class="text-danger">*</span>
                 </label>
                 <div class="col-md-8">
                     <input type="text" name="online_exam_Question" id="online_exam_Question" class="form-control" />
                  </div>
              </div>
         </div>
<!---Marker for right Answer-->
<div class="form-group">
           <div class="row">
               <label class="col-md-4 text-right">
               Marks per right answer <span class="text-danger">*</span>
                 </label>
                 <div class="col-md-8">
                     <input type="text" name="Marks_per_right_answer" id="Marks_per_right_answer" class="form-control" />
                  </div>
              </div>
         </div>     
<!---Marker for Wrong Answer-->
<div class="form-group">
           <div class="row">
               <label class="col-md-4 text-right">
               Marks per wrong answer <span class="text-danger">*</span>
                 </label>
                 <div class="col-md-8">
                     <input type="text" name="Marks_per_Wrong_answer" id="Marks_per_Wrong_answer" class="form-control" />
                  </div>
              </div>
         </div>              
      </div>
      <div class="modal-footer">
      <input type="hidden" name="online_exam_id" id="online_exam_id"/>
      <input type="hidden" name="page" value="exam"/>
      <input type="hidden" name="action" value="Add" id="hidden_action"/>
      <input type="submit" name="button_action" id="button_action" class="btn btn-success btn-sm" value="Add" style="display:inline-block"/>
      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
     
      </div>
      </div>
      </form>
  </div>
</div>
<!--End Modal-->

<!--Modal Delet--->
<div class="modal" id="deletModal">
    <div class="modal-dialog">
        <div class="modal-content">
<!---modal Header-->
   <div class="modal-header">
       <h4 class="modal-title">Delete Confirmation</h4>
       <button type="button" class="close"
       data-dismiss="modal">&times;</button>
   </div>
 <!-----Modal body--->
<div class="modal-body">
    <h3 align="center">
        Are You Sure Want to remove this?
    </h3>
</div>
 <!--footer Modal-->
<div class="modal-footer">
    <button type="button" name="ok_button"id="ok_button" class="btn btn-primary btn-sm">OK</button>
    <button type="button" class="btn btn-danger btn-sm "data-dismiss="modal">
        Close
    </button>
</div>
</div>
</div>
</div>
<!---End Modal Delet-->
<!---Modal Add Question-->
<div class="modal" id="questionModal">
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
          <input type="hidden"  name="action" id="hidden_action" value="Add"/>
          <input  type="submit" name="question_button_action" id="question_button_action" 
          class="btn btn-success btn-sm" value="Add" style=" width:50px"/>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</buuton>
           </div>
         
</div>
</form>
</div>
</div>
<!---End Modal Add Question-->
<!--Card-->
<div class="card">
<!--Card header-->
        <div class="card-header">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="panel-title">
                        Exam List
                    </h3>
                  </div>
                  <div class="col-md-3" align="right">
                    <button type="button" id="add_button" class="
                    btn btn-info btn-sm">Add</button>
                  </div>
              </div>
        </div>
<!---End header-->
<!-- -----------------------------------------------------------------------------------------------------------End Edite -->
<?php
?>

<!-- Modal -->
<div class="modal" id="detailsmodel"  >
  <div class="modal-dialog" >
    <div class="modal-content" style="width: 700px;">
      <div class="modal-header">
        <h5 class="modal-title">Edite Exam Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Body Model -->
      <div class="modal-body" id="Exam_Details" >
         
      </div>
      <!--Footer Model-->
     
    </div>
  </div>
</div>
<!--------------------------------------------------------------------------------------------------------End Edite -->
<!---Body-->
<div class="card-body">
    <span id="message_operation"></span>
<!----- Table--->
<div class="table-responsive">
<table id="datatable" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Exam title</th>
<th>Date & time</th>
<th>Duration</th>
<th>Total Question</th>
<th>Right Answer Mark </th>
<th>Wrong Answer Mark </th>
<!-- <th>Status </th> -->
<th>questions </th>
<th>Enroll</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    <?php
    //  echo '<input type="text" value="'.$row['list_exam_title'].'"/>';
    $tmt =$con->prepare("SELECT * FROM list_examations ORDER BY online_exam_id  ASC");
    $tmt->execute();
    $rows = $tmt->fetchAll();
    foreach($rows as $row)
    {


        echo '<tr>';
        // echo '<input type="text" value="'.$row['list_exam_title'].'"/>';
        echo '<td>'.$row['list_exam_title'].'</td>';
        echo '<td>'.$row['online_exam_data'].'</td>';
        echo '<td>'.$row['online_exam_duration'].'</td>';
        echo '<td>'.$row['total_question'].'</td>';
        echo '<td>'.$row['markers_per_right_answer'].'</td>';
        echo '<td>'.$row['markers_per_wrong_answer'].'</td>';
        // echo '<td>Enroll</td>';
        ?>
       <?php
       echo '<td>';
       ////////////////////////////////////////////////////////////////
        /***** select total question in table ListExamination****/
        $ExamID= $row['online_exam_id'];
        $date=array(
            ':Exam_id'=>$ExamID
            );
       $query=" SELECT 	total_question FROM list_examations  WHERE online_exam_id =:Exam_id"; 
       $stmt=$con->prepare($query);
       $stmt->execute($date); 
       $totalfetch=$stmt->fetch();
       $totalfetch['total_question'];
    //    echo $totalfetch['total_question'];
       echo "<br>";
       /***** select total question in table question****/
       $question=array(
        ':Exam_id'=>$ExamID
        );
       $queryquestion=" SELECT 	question_id  FROM quesion_table  WHERE online_exam_id =:Exam_id";
       $stmtquestion=$con->prepare($queryquestion);
       $stmtquestion->execute($question);
       $count=$stmtquestion->rowCount();
    //    echo $count;
       /**Comparing*/
       if($totalfetch['total_question'] > $count){
         ?> 
         <button style="text-decoration: none;"  class="btn btn-info Add_question" id="<?php echo $row['online_exam_id'] ?>">Add <br/> Questions </button>
         <?php
       }
       else{
           ?>
        <button class="btn btn-warning ">
        <a href="question.php?Exam_id=<?php echo $row['online_exam_id'];?>"
        style="color:#fff;text-decoration: none;">
        View Questions</a></button>
           <?php
       }
       ///////////////////////////////////////////////////////////////
       ?> 
      
        <?php
       echo '</td>';

    //    echo '<a href="exam_enroll.php?code='..'">Enroll</a>';
       ?>
       <td><a href="exam_enroll.php?exam_id=<?php echo $row['online_exam_id']?> " style="margin-top :30px;"  class="btn btn-secondary">Enroll</a></td>
    <td>
<?php
 $current_datetime=date("Y-m-d").' '.date("H:i:s",STRTOTIME(date('h:i:sa')));
$exam_id=$row['online_exam_id'];
$query ="SELECT online_exam_data   FROM  list_examations WHERE 	online_exam_id=$exam_id" ;
$stmt=$con->prepare($query);
$stmt->execute(); 
$fetchs=$stmt->fetchAll();
foreach ($fetchs as $fetch)
{
    $data_time=$fetch['online_exam_data'];
}
if($data_time > $current_datetime)
{?>
    <div style="display:flex"  >
    <button  style="margin-top :30px;" class="btn btn-primary btn-sm edite_exam" id="<?php echo $row['online_exam_id'] ?>">Edite</button>
    <button style="margin-top :30px;" class="btn btn-danger btn-sm  delet" id="<?php echo $row['online_exam_id'] ?>">Delet</button>
  </div>
  <?php
}

?>
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

    <script>
        $(document).ready(function(){
            //dataTable Script
           $('#datatable').dataTable();
          ///Add Script
          function reset_form(){
              $('#modal_title').text('Add Exam Details');
              $('#button_action').val('Add');
              $('#action').val('Add');
              $('#exam_form')[0].reset();
              $('#exam_form').parsley().reset();
          }//////////////////////////
           $('#add_button').click(function(){
            reset_form();
            $('#FormModal').modal('show');
           });////////////////////////
           $('#exam_form').parsley();
           $('#exam_form').on('submit',function(event){
               event.preventDefault();
               $('#online_exam_title').attr('required','required');
               $('#online_exam_datetime').attr('required','required');
               $('#online_exam_Duration').attr('required','required');
               $('#online_exam_Question').attr('required','required');
               $('#Marks_per_right_answer').attr('required','required');
               $('#Marks_per_Wrong_answer').attr('required','required');
               //////////////////
               if($('#exam_form').parsley().validate()){
              $.ajax({
                   url:"action.php",
                   method:"post",
                  dataType:"json",
                   data:$('#exam_form').serialize(),
                   beforeSend:function(){
                    $('#button_action').attr('disabled','disabled');
                   $('#button_action').val('Validate......');
                  },
                  success:function(data){
                     if(data.success){
                         $('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');
                         reset_form();
                         $('#FormModal').modal('hide');
                     }
                    $('#button_action').attr('disabled',false);
                   $('#button_action').val('Add');
                  }
              });
               }
           });
           //Update Ascript
           var exm_id='';
        //    $(document).on('click','.edite',function(){
        //     exm_id=$(this).attr('id');
        //     reset_form();
        //     $.ajax({
        //     url:"action.php",
        //     method:"post",
        //     dataType:"json",
        //     data:{action:'edit_fetch',exm_id:exm_id,page:'exam'},
        //     success:function(data){
        //         $('#online_exam_title').val(data.list_exam_title);
        //         $('#online_exam_datetime').val(data.online_exam_data);
        //         $('#online_exam_Duration').val(data.online_exam_duration);
        //         $('#online_exam_Question').val(data.total_question);
        //         $('#Marks_per_right_answer').val(data.markers_per_right_answer);
        //         $('#Marks_per_Wrong_answer').val(data.markers_per_wrong_answer);
        //         $('#modal_title').text('Edit Exam Details');
        //         $('#button_action').val('Edite');
        //         $('#action').val('Edite');
        //         $('#FormModal').modal('show');
        //     }
        //    });
        //    });

        ////Exam Edit script
     $(document).on('click','.edite_exam',function(){
      exm_id=$(this).attr('id');
       $.ajax({
        url:"action.php",
        method:"post",
        // dataType:"json",
        data:{action:'edit_fetch',exm_id:exm_id,page:'exam'},
        success:function(data)
        {
           $('#body_edite_exam').html(data);
           $('#edite_exam').modal('show');
         
        }
       });
     });
      ////Exam Edit script 
           $(document).on('click','.delet',function(){
            
            $('#deletModal').modal('show');
           });
           $('#ok_button').click(function(){
               $.ajax({
                   url:"action.php",
                   method:"post",
                   dataType:"json",
                   data:{exm_id:exm_id,action:'delete',page:'exam'},
                   success:function(data){
                    if(data.success){
                         $('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');
                         $('#deletModal').modal('hide');
                     }
                   
                   }
               });
           });
           //////Add question Ascript
           function reset_quetion_form()
           {
            $('#question_modal-title').text('Add Question');
            $('#question_button_action').val('Add');
            $('#hidden_action').val('Add');
            $('#question_form')[0].reset();
            $('#question_form').parsley().reset();
           }
           $(document).on('click','.Add_question',function(){
                reset_quetion_form();
              $('#questionModal').modal('show');
              var exam_id=$(this).attr('id');
             $('#hidden_online_exam_id').val(exam_id);
             // Validation From
             $('#question_form').parsley();
             $('#question_form').on('submit', function(event)
             {      event.preventDefault();
                 $('#question_title').attr('required','required');
                 $('#option_title_1').attr('required','required');
                 $('#option_title_2').attr('required','required');
                 $('#option_title_3').attr('required','required');
                 $('#option_title_4').attr('required','required');
                 $('#answer_option').attr('required','required');
                 if($('#question_form').parsley().validate())
                 {
                     $.ajax({
                       url:"action.php",
                       method:"POST",
                       dataType:"json",
                       data:$('#question_form').serialize(),
                       beforeSend:function()
                       {
                        $('#question_button_action').attr('disabled','disabled');  
                        $('#question_button_action').val('validate');
                       },
                       success:function(data){
                        if(data.success){
                         $('#message_operation').html('<div class="alert alert-success">'+data.success+'</div>');
                         $('#questionModal').modal('hide')
                     }
                   }
                     });
                 }
             } 
             );
           });
           ///////////////////////////
    $(document).on('click','.edite_exam',function(){
        var exam_id=$(this).attr('id');
            //    alert(exam_id);
      $.ajax({
        url:"action.php",
        method:"post",
        //dataType:"json",
        data:{exam_id:exam_id,page:'edite_exam',action:'fetch_data'},
        success:function(data){
        //   console.log(data);
          $('#Exam_Details').html(data);
          $('#detailsmodel').modal('show');
        }
      });
    });

////////////////////////////////////////////////////
//Edite Exam
$(document).on('click','.Edit',function(){
  var All=$('#Edite_Exam_form').serialize();
  // alert(All);
  $.ajax({
   url:"action.php",
   method:"post",
   data: $('#Edite_Exam_form').serialize(),
   success:function(data)
   {
    //  alert(data);
   }
  });
});
});
    </script>
</body>
</html>