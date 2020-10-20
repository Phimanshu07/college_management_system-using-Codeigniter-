<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
       public function dashboard(){
        $this->load->model('queries');
        $users=$this->queries->viewAllcolleges();
         $this->load->view('dashboard',['users'=>$users]);
       }
       public function __construct(){
           parent::__construct();
           if(!$this->session->userdata("user_id")){
            return redirect('welcome/adminLogin');
        }  
       }

       public function addCollege(){
         $this->load->view('addcollege');

       }

       public function addCoadmin(){
        $this->load->model('queries');
        $college=$this->queries->getColleges();
        $roles=$this->queries->getRoles();
        $this->load->view('addcoadmin',['roles'=>$roles,'college'=>$college]);   
     
       }
       
       public function addStudent(){
        $this->load->model('queries');
        $college=$this->queries->getColleges();
        $roles=$this->queries->getRoles();
	     	$this->load->view('addstudent',['roles'=>$roles,'college'=>$college]);   
      }

       public function createcollege(){
        $this->form_validation->set_rules('collegename','College Name','required');
		    $this->form_validation->set_rules('branch','Branch','required');
	     	$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		    if($this->form_validation->run()){
           $data=$this->input->post();
           $this->load->model('queries');
           if($this->queries->makecollege($data)){
            $this->session->set_flashdata('message','Data Added Successfully ');
            $this->session->set_flashdata('msg_class','alert-success');
           }
           else{
            $this->session->set_flashdata('message','Failed to create college ');
			    	$this->session->set_flashdata('msg_class','alert-danger');
           }
           return redirect("admin/addCollege");
        }
        else{
           $this->addCollege();
        }
       }


       public function createcoadmin(){

        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tb_users.email]');
        $this->form_validation->set_rules('college_id','College Role','required');
	     	$this->form_validation->set_rules('gender','Gender','required');
	    	$this->form_validation->set_rules('role_id','Role','required');
	    	$this->form_validation->set_rules('password','Password','required');
	     	$this->form_validation->set_rules('confirmpassword','Confirm Password','required|matches[password]');
	    	$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
	    	if($this->form_validation->run()){
	    	  $data=$this->input->post();
		    
		    $data['password']=sha1($this->input->post('password'));
		    $data['confirmpassword']=sha1($this->input->post('confirmpassword'));
		  
		    $this->load->model('queries');
		  if($this->queries->registerAdmin($data)){
			  $this->session->set_flashdata('message','Co-Admin Registerd Successfully');
			  $this->session->set_flashdata('msg_class','alert-success');
			  return redirect("admin/addCoadmin");
		  }
		  else{
			 $this->session->set_flashdata('message','Failed to register ');
			 return redirect("admin/addCoadmin");
		   }
	  	}
	  	else{
            $this->load->model('queries');
            $college=$this->queries->getColleges();
			$roles=$this->queries->getRoles();
			
		 return	$this->load->view('addcoadmin',['roles'=>$roles,'college'=>$college]);
		
			//echo validation_errors();
		}
}



    public function createstudent(){
      $this->form_validation->set_rules('studentname','Student name','required');
      $this->form_validation->set_rules('college_id','College Role','required');
      $this->form_validation->set_rules('gender','Gender','required');
      $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tb_student.email]');
      $this->form_validation->set_rules('course','Course','required');
      
      $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
      if($this->form_validation->run()){
        $data=$this->input->post();
        $this->load->model('queries');
       if($this->queries->insertstudent($data)){
        $this->session->set_flashdata('message','Student Added Successfully');
        $this->session->set_flashdata('msg_class','alert-success');
        
       }
       else{
       $this->session->set_flashdata('message','Failed to Add ');
       $this->session->set_flashdata('msg_class','alert-success');
       }
       return redirect("admin/addStudent");
      }
      else{
          $this->load->model('queries');
          $college=$this->queries->getColleges();
          $roles=$this->queries->getRoles();
    
        return	$this->load->view('addstudent',['roles'=>$roles,'college'=>$college]);
      }
    }

    public function viewStudent($college_id){
      $this->load->model('queries');
      $students=$this->queries->getStudents($college_id);
      $this->load->view('viewstudent',['students'=>$students]);
    }

    public function editStudent($id){
      $this->load->model('queries');
      $college=$this->queries->getColleges();
      $student=$this->queries->getStudentrecord($id);
      $this->load->view('editstudent',['college'=>$college,'student'=>$student]);
    }

    public function modifystudent($id){
      // $this->load->model('queries');
      // $college=$this->queries->updatestudent($id);
      $this->form_validation->set_rules('studentname','Student name','required');
      $this->form_validation->set_rules('college_id','College Role','required');
      $this->form_validation->set_rules('gender','Gender','required');
      $this->form_validation->set_rules('email','Email','required');
      $this->form_validation->set_rules('course','Course','required');
      
      $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
      if($this->form_validation->run()){
        $data=$this->input->post();
        $this->load->model('queries');
       if($this->queries->updatestudent($data,$id)){
        $this->session->set_flashdata('message','Student Updated Successfully');
        $this->session->set_flashdata('msg_class','alert-success');
        
       }
       else{
       $this->session->set_flashdata('message','Failed to Update ');
       $this->session->set_flashdata('msg_class','alert-success');
       }
       return redirect("admin/editStudent/{$id}");
      }
      else{
         
    
        	$this->editStudent($id);
      }
    }
    public function deleteStudent($id){
      $this->load->model('queries');
     if($this->queries->removestudent($id)){
      $this->session->set_flashdata('message','Student Deleted Successfully!');
      $this->session->set_flashdata('msg_class','alert-success');
           return redirect("admin/dashboard");
     }
     else{
      $this->session->set_flashdata('message','Failed to Delete! ');
      $this->session->set_flashdata('msg_class','alert-success');
      return redirect("admin/viewStudent/{$id}");
     }
    }
     
    public function coadmin(){
      $this->load->model('queries');
      $coadmin=$this->queries->viewAllcolleges();
      $this->load->view('viewCoadmin',['coadmin'=>$coadmin]);
    }
}
?>