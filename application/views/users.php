<?php 
  include('inc/header.php')
?>
<div class="container" style="margin-top:20px">

<div class="container" >
  <div class="row">
    <div class="mx-auto w-52 p-3 text-align:center">
       <?php if($msg=$this->session->flashdata('message')): 
         $msg_class=$this->session->flashdata('msg_class')
       ?>
      <div class="form-row text-center">
        <div class="col-lg-12">
          <div class="alert <?= $msg_class ?>">
            <?php echo $msg; ?>

          </div>
        </div>
   </div>
     <?php endif; ?>
    </div>
    
  </div>
</div>

<h3 style="text-align:center;">CoAdmin Dashboard</h3><br>
<h5 style="text-align:center;"><i> Welcome <?php echo $username=$this->session->userdata('username'); ?></i></h5>
<hr>
 
   
   <br>
   <div class="row">
       <table class="table table-hover table-bordered table-responsive-sm  ">
          <thead class="table-dark">
       
             <tr>
               <th >ID</th>
               <th >Student Name</th>
               <th >College Name</th>
               <th >Email</th>
               <th >Gender</th>
               <th >Course</th>
               
             </tr>
          </thead>
          <tbody>
           <?php if(count((array)$student)):?>
            <?php foreach($student as $students ):?>
            <tr >
               <td><?php echo $students->id;?></td>
               <td><?php echo $students->studentname;?></td>
               <td><?php echo $students->collegename;?></td>
               <td><?php echo $students->email;?></td>
               <td><?php echo $students->gender;?></td>
               <td><?php echo $students->course;?></td>
               
            </tr>
            <?php endforeach;?>
          <?php else: ?> -->
            <tr>
              <td colspan="8" style="text-align:center" >No Record Found</td>
            </tr>
          <?php endif; ?>
          </tbody>
       </table>
   </div>
</div>
<?php 
  include('inc/footer.php')
?>