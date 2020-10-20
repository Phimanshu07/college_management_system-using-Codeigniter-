<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>College Management</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style type="text/css">
  .buttons{
	  color:#2196f3;
	  border:1px solid #cabdbd;
	  border-radius:5px;
	  padding:2px 10px 2px 10px;
  }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
   <div class="container-fluid">
      <div class="navbar-header col-lg-10">
       <a class="navbar-brand" style="color:#fff;" href="#">COLLEGE MANAGEMENT SYSTEM</a>
	 </div>
     <?php if($user_id=$this->session->userdata('user_id')): ?>
     <div class=" col-lg-2 " style="margin-top:15px;" id="bs-example-navbar-collapse-2">
	   <div class="btn-group">
	     <a href="#" class="btn btn-danger">Settings</a>
		 <a href="#"  class="btn btn-default dropdown-toggle" data-toggle="dropdown" 
		    aria-expanded="false"><span class="caret"></span></a>
			<ul class="dropdown-menu" style="font-color:red">
			<?php if($user_id=='1'):?>
			  <li><?php echo anchor("admin/dashboard",'Dashboard'); ?></li>
			  <li><?php echo anchor("admin/coadmin",'View Co-Admin'); ?></li>
			  <li><?php echo anchor("welcome/logout",'Logout'); ?></li>
			<?php else :?>
				<li><?php echo anchor("welcome/logout",'Logout'); ?></li>
			<?php endif; ?>	
			</ul>
	   </div>
	 </div>
	 <?php endif; 
    ?>
  </div>
</nav>

