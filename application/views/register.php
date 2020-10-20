<?php 
  include('inc/header.php')
?>




<div class="container" style="margin-top:20px">
 <?php echo form_open("welcome/adminsignup",['class'=>'form-horizontal']); ?>
 
<div class="container" >
  <div class="row">
    <div class="mx-auto w-52 p-3 text-align:center">
       <?php if($msg=$this->session->flashdata('message')): 
         $msg_class=$this->session->flashdata('msg_class')
       ?>
      <div class="form-row text-center">
        <div class="col-lg-12">
          <div class="alert alert-dismissible<?= $msg_class ?>">
            <?php echo $msg; ?>

          </div>
        </div>
   </div>
     <?php endif; ?>
    </div>
    
  </div>
</div>
 <h3 style="text-align:center;">Admin Registration</h3>
 <hr>
 <br>
<div class="container">
 <div class="row w-50 mx-auto">
   <div class="col-md-12 " >
     <div class="form-inline">
       <label class="col-md-3 control-label" >Username</label>
        
          <?php echo form_input(['name'=>'username','class'=>'form-control col-md-9 md-form','placeholder'=>'Username','value'=>set_value('username')]) ?>
        
     </div>
   </div>
 </div>
       
     <span style="text-align:center;" class="text-danger  col-md-9">&nbsp;&nbsp;&nbsp;&nbsp;<?= form_error('username') ?></span>
     

 <div class="row w-50 mx-auto">
   <div class="col-md-12 my-auto" >
     <div class="form-inline">
       <label class="col-md-3 control-label" >Email</label>
        
          <?php echo form_input(['value'=>set_value('email'),'name'=>'email','class'=>'form-control col-md-9 md-form','placeholder'=>'Email']) ?>
        
     </div>
   </div>
 </div>
   
     <span style="text-align:center;" class="text-danger  col-md-9"><?= form_error('email') ?></span>
     
    


 <div class="row w-50 mx-auto">
   <div class="col-md-12 my-auto" >
     <div class="form-inline">
       <label class="col-md-3 control-label" >Gender</label>
           <select name="gender" id="" class="col-lg-9">
             <option value="">Select</option>
             <option value="Male">Male</option>
             <option value="Female">Female</option>
           </select>
        
     </div>
   </div>
 </div>
 
     <span style="text-align:center;" class="text-danger  col-md-9"><?= form_error('gender') ?></span>
  
    


 <div class="row w-50 mx-auto">
   <div class="col-md-12 my-auto" >
     <div class="form-inline">
       <label class="col-md-3 control-label" >Role</label>
           <select name="role_id" id="" class="col-lg-9">
             <option value="">Select</option>
             <?php if(count($roles)): ?>
             <?php foreach($roles as $role): ?>
             <option value=<?php echo $role->role_id; ?>><?php echo $role->rolename;?></option>
            
             <?php endforeach; ?>
             <?php endif; ?>
           </select>
        
     </div>
   </div>
 </div>
 
     <span style="text-align:center;" class="text-danger  col-md-9"><?= form_error('role_id') ?></span>

 <div class="row w-50 mx-auto">
   <div class="col-md-12 my-auto" >
     <div class="form-inline">
       <label class="col-md-3 control-label" >Password</label>
        
          <?php echo form_password(['value'=>set_value('password'),'name'=>'password','class'=>'form-control col-md-9 md-form','placeholder'=>'Password']) ?>
          
     </div>
     
   </div>
 </div>

     <span style="text-align:center;" class="text-danger  col-md-9"><?= form_error('password') ?></span>


 <div class="row w-50 mx-auto">
   <div class="col-md-12 " >
     <div class="form-inline">
       <label class="col-sm-3 control-label" >Password Again</label>
        
          <?php echo form_password(['value'=>set_value('confirmpassword'),'name'=>'confirmpassword','class'=>'form-control col-md-9 md-form','placeholder'=>'Confirm Password']) ?>
        
     </div>
   </div>
 </div>
     <span style="text-align:center;" class="text-danger  col-md-9"><?= form_error('confirmpassword') ?></span>
 
  <center>
 <button type="submit" class="btn btn-primary center">REGISTER</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <?php echo anchor("welcome","Back",['class'=>'btn btn-primary ']) ; ?>
       </center>
</div>

 <?php echo form_close(); ?>
</div>


<?php 
  include('inc/footer.php')
?>