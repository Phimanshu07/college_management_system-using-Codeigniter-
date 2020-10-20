<?php 
  include('inc/header.php')
?>
<div class="container" style="margin-top:20px">
<h3 style="text-align:center;">View Student</h3>
<hr>
  <div class="row">
  <div class="mx-auto w-52 p-3 text-align:center">
  
   </div>
   </div> 
   <br>
   <div class="row">
       <table class="table table-hover table-bordered table-responsive-sm  ">
          <thead class="table-dark">
       
             <tr>
               
               <th scope="col">Student Name</th>
               <th scope="col">College Name</th>
               <th scope="col">Course</th>
               <th scope="col">Email</th>
               <th scope="col">Gender</th>
               <th scope="col">Action</th>
               
             </tr>
          </thead>
          <tbody>
          <?php if(count((array)$students)):?>
            <?php foreach($students as $student ):?>
            <tr >
               <td><?php echo $student->studentname;?></td>
               <td><?php echo $student->collegename;?></td>
               <td><?php echo $student->course;?></td>
               <td><?php echo $student->email;?></td>
               <td><?php echo $student->gender;?></td>
               
               <td> <?php echo anchor("admin/editStudent/{$student->id}","Edit",['class'=>'buttons']);  ?>&nbsp;
               &nbsp;&nbsp;&nbsp; <?php echo anchor("admin/deleteStudent/{$student->id}","Delete",['class'=>'buttons']);  ?>
               </td>
                
            </tr>
            <?php endforeach;?>
          <?php else: ?>
            <tr>
              <td colspan="6" style="text-align:center">No Record Found</td>
            </tr>
          <?php endif; ?>
          </tbody>
       </table>
   </div>
</div>
<center>
 
       <?php echo anchor("admin/dashboard/","Back",['class'=>'btn btn-primary ']) ; ?>
       </center>
<?php 
  include('inc/footer.php')
?>