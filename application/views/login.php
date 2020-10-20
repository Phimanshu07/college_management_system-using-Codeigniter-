<?php 
  include('inc/header.php')
?>




<div class="container" style="margin-top:20px">
 <?php echo form_open("welcome/signin",['class'=>'form-horizontal']); ?>
 
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
 <h3 style="text-align:center;">Admin Login</h3>
 <hr>
 <br>
<div class="container">
 
     

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
       <label class="col-md-3 control-label" >Password</label>
        
          <?php echo form_password(['value'=>set_value('password'),'name'=>'password','class'=>'form-control col-md-9 md-form','placeholder'=>'Password']) ?>
          
     </div>
     
   </div>
 </div>

     <span style="text-align:center;" class="text-danger  col-md-9"><?= form_error('password') ?></span>
  <center>
 <button type="submit" class="btn btn-primary center">LOGIN</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <?php echo anchor("welcome","Back",['class'=>'btn btn-primary ']) ; ?>
       </center>
</div>

 <?php echo form_close(); ?>
</div>
<?php 
  include('inc/footer.php')
?>