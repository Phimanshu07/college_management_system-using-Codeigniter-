<?php 
  include('inc/header.php')
?>




<div class="container" style="margin-top:20px">
 <?php echo form_open("admin/createcollege",['class'=>'form-horizontal']); ?>
 
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
 <h3 style="text-align:center;">Add College</h3>
 <hr>
 <br>
<div class="container">
 
     

 <div class="row w-50 mx-auto">
   <div class="col-md-12 my-auto" >
     <div class="form-inline">
       <label class="col-md-3 control-label" > Name</label>
        
          <?php echo form_input(['value'=>set_value('collegename'),'name'=>'collegename','class'=>'form-control col-md-9 md-form','placeholder'=>'College Name']) ?>
        
     </div>
   </div>
 </div>
   
     <span style="text-align:center;" class="text-danger  col-md-9"><?= form_error('collegename') ?></span>
     

     
 <div class="row w-50 mx-auto">
   <div class="col-md-12 my-auto" >
     <div class="form-inline">
       <label class="col-md-3 control-label" >Branch</label>
        
          <?php echo form_input(['value'=>set_value('branch'),'name'=>'branch','class'=>'form-control col-md-9 md-form','placeholder'=>'Branch']) ?>
          
     </div>
     
   </div>
 </div>

     <span style="text-align:center;" class="text-danger  col-md-9"><?= form_error('branch') ?></span>
  <center>
 <button type="submit" class="btn btn-primary center">ADD</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <?php echo anchor("admin/dashboard","Back",['class'=>'btn btn-primary ']) ; ?>
       </center>
</div>

 <?php echo form_close(); ?>
</div>
<?php 
  include('inc/footer.php')
?>