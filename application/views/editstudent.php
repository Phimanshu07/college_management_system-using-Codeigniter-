<?php 
  include('inc/header.php')
?>




<div class="container" style="margin-top:20px">
 <?php echo form_open("admin/modifystudent/{$student->id}",['class'=>'form-horizontal']); ?>
 
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
 <h3 style="text-align:center;">Edit Student Details</h3>
 <hr>
 <br>
<div class="container">
 <div class="row w-50 mx-auto">
   <div class="col-md-12 " >
     <div class="form-inline">
       <label class="col-md-3 control-label" >Name</label>
        
          <?php echo form_input(['name'=>'studentname','class'=>'form-control col-md-9 md-form','placeholder'=>'Student Name','value'=>set_value('studentname',$student->studentname)]) ?>
        
     </div>
   </div>
 </div>
       
     <span style="text-align:center;" class="text-danger  col-md-9">&nbsp;&nbsp;&nbsp;&nbsp;<?= form_error('studentname') ?></span>
     

 
     
    
     <div class="row w-50 mx-auto">
   <div class="col-md-12 my-auto" >
     <div class="form-inline">
       <label class="col-md-3 control-label" >College Id</label>
           <select name="college_id" id="" class="col-lg-9">
             <option value=""><?php echo $student->collegename ?></option>
             <?php if(count($college)): ?>
             <?php foreach($college as $college): ?>
             <option value=<?php echo $college->college_id; ?>><?php echo $college->collegename;?></option>
            
             <?php endforeach; ?>
             <?php endif; ?>
           </select>
        
     </div>
   </div>
 </div>
 <span style="text-align:center;" class="text-danger  col-md-9"><?= form_error('college_id') ?></span>

 <div class="row w-50 mx-auto">
   <div class="col-md-12 my-auto" >
     <div class="form-inline">
       <label class="col-md-3 control-label" >Gender</label>
           <select name="gender" id="" class="col-lg-9">
             <option value=""><?php echo $student->gender ?></option>
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
       <label class="col-md-3 control-label" >Email</label>
        
          <?php echo form_input(['value'=>set_value('email',$student->email),'name'=>'email','class'=>'form-control col-md-9 md-form','placeholder'=>'Email']) ?>
        
     </div>
   </div>
 </div>
   
     <span style="text-align:center;" class="text-danger  col-md-9"><?= form_error('email') ?></span>

 

     <div class="row w-50 mx-auto">
   <div class="col-md-12 my-auto" >
     <div class="form-inline">
       <label class="col-md-3 control-label" >Course</label>
        
          <?php echo form_input(['value'=>set_value('course',$student->course),'name'=>'course','class'=>'form-control col-md-9 md-form','placeholder'=>'course']) ?>
        
     </div>
   </div>
 </div>
   
     <span style="text-align:center;" class="text-danger  col-md-9"><?= form_error('course') ?></span>
 
  <center>
 <button type="submit" class="btn btn-primary center">UPDATE</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <?php echo anchor("admin/viewStudent/{$student->college_id}","Back",['class'=>'btn btn-primary ']) ; ?>
       </center>
</div>

 <?php echo form_close(); ?>
</div>


<?php 
  include('inc/footer.php')
?>