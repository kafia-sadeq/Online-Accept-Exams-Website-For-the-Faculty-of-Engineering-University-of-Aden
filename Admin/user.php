<?php 
//student.php
?>
<div class="jumbotron" style="padding:40px;
background-color: #F5F5F5;margin-bottom:0">
</div>
<?php
include 'head.php';
?>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal" id="detailsmodel" >
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Student Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Body Model -->
      <div class="modal-body" id="user_detials">
          <img src="<?php echo "<img  style='width: 50px;'  src='../upload/".$row['student_image']."'/>";?>"/>
      </div>
      <!--Footer Model-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="card" >
 <div class="card-header">
     <div class="row">
        <div class="col-md-9">
          <h3 class="panel-title">Student list</h3>
        </div>
        <div class="col-md-3" align="right">

        </div>
     </div>
 </div>
  <div class="card-body">
      <!--table-->
      <div class="table-responsive">
   <div class="table-responsive">
<table id="user_list" class="table table-striped table-bordered table-hover">
<thead>
<tr>
<th>Image</th>
<th>Student Name</th>
<th>Email Address</th>
<th>Gender</th>
<th>Mobile No</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    
    <?php
      $stmt=$con->prepare("SELECT * FROM student_table");
      $stmt->execute();
      $rows=$stmt->fetchAll();
      foreach($rows as $row)
      {    

        // echo "<img src='../upload/".$row['student_image']."'/>";
          ?>
          <tr>
              <td><?php echo "<img class='img-thumbnail'  style='width: 50px;'  src='../upload/".$row['student_image']."'/>";?></td>
              <td><?php echo $row['student_name']?></td>
              <td><?php echo $row['student_email_address']?></td>
              <td><?php echo $row['student_gender']?></td>
              <td><?php echo $row['student_mobile_no']?></td>
              <td>
                  <button type="button" class="btn btn-primary 
                  btn-sm details" id='<?php echo $row['student_id']?>'>View Details</button>
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
<!-- <script src="js/quier3.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script> -->
<script>
$(document).ready(function(){
    $('#user_list').dataTable(); 
    $(document).on('click','.details',function(){
        var student_id=$(this).attr('id');
      $.ajax({
        url:"action.php",
        method:"post",
        //dataType:"json",
        data:{student_id:student_id,page:'user',action:'fetch_data'},
        success:function(data){
          // console.log(data);
          $('#user_detials').html(data);
          $('#detailsmodel').modal('show');
        }
      });
    });

});

</script>