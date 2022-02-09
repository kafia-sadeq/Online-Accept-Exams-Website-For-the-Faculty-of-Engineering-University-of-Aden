<?php
include 'head.php';
?>
<!-- Modal -->
<div class="modal" id="edite_exam" >
  <div class="modal-dialog" >
    <div class="modal-content">
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
      
      <div class="modal-footer">
      <input type="hidden" name="online_exam_id" id="online_exam_id"/>
      <input type="hidden" name="page" value="exam"/>
      <input type="hidden" name="action" value="Add" id="hidden_action"/>
      <input type="submit" name="button_action" id="button_action" class="btn btn-success btn-sm" value="Edite" style="display:inline-block"/>
      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
     
      </div>
      </div>
      </form>
  </div>
</div>
</div>