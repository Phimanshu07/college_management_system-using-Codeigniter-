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

<h3 style="text-align:center;">Admin Dashboard</h3><br>
<h5 style="text-align:center;"><i> Welcome <?php echo $username=$this->session->userdata('username'); ?></i></h5>
<hr>
  <div class="row">
  <div class="mx-auto w-52 p-3 text-align:center">
   <?php echo anchor("admin/addCollege","ADD COLLEGE",['class'=>'btn btn-primary ','style'=>'marign-left:20px;']);  ?>
   &nbsp;&nbsp;
   <?php echo anchor("admin/addCoadmin","ADD COADMIN",['class'=>'btn btn-primary']);  ?>
   &nbsp;&nbsp;
   <?php echo anchor("admin/addStudent","ADD STUDENT",['class'=>'btn btn-primary']);  ?>
   </div>
   </div> 
   <br>
   <div class="row">
       <table class="table table-hover table-bordered table-responsive-lg  ">
          <thead class="table-dark">
       
             <tr>
               <th scope="col">ID</th>
               <th scope="col">College Name</th>
               <th scope="col">Username</th>
               <th scope="col">Email</th>
               <th scope="col">Role</th>
               <th scope="col">Gender</th>
               <th scope="col">Branch</th>
               <th colspan="4">Action</th>
             </tr>
          </thead>
          <tbody>
          <?php if(count((array)$users)):?>
            <?php foreach($users as $user ):?>
            <tr >
               <td><?php echo $user->college_id;?></td>
               <td><?php echo $user->collegename;?></td>
               <td><?php echo $user->username;?></td>
               <td><?php echo $user->email;?></td>
               <td><?php echo $user->rolename;?></td>
               <td><?php echo $user->gender;?></td>
               <td><?php echo $user->branch;?></td>
               <td colspan="6" > <?php echo anchor("admin/viewStudent/{$user->college_id}","View_Students",['class'=>'buttons']);  ?></td>
            </tr>
            <?php endforeach;?>
          <?php else: ?>
            <tr>
              <td>No Record Found</td>
            </tr>
          <?php endif; ?>
          </tbody>
       </table>
   </div>
</div>
<?php 
  include('inc/footer.php')
?>