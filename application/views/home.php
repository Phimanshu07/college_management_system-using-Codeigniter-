<?php 
  include('inc/header.php')
?>

<div class="container" style="margin-top:20px">
   <div class="jumbotron">
     <h2 class="display-7" style="text-align:center;">Admin & Co-Admin Login</h2>
	 <hr>
	 <div class="my-4">
	   <div class="container">
	   <div class="row">
	     <?php if(count((array)$checkAdminExit)): ?>
	    
		 <?php else: ?>
			<div class="col-lg-4 m-auto" >
		    <?php echo anchor("welcome/adminRegister","Admin Register",['class'=>'btn btn-primary']); ?>
		 </div>
		 <?php endif; ?>
		 <div class="mx-auto w-52 p-3 text-align:center" >
		 <?php echo anchor("welcome/adminLogin","Admin Login",['class'=>'btn btn-primary']); ?>
		 </div>
		 </div>
	   </div>
	 </div>
   </div>
  
</div>




<?php 
  include('inc/footer.php')
?>