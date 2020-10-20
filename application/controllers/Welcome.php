<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('queries');
		$checkAdminExit=$this->queries->checkadminisExits();
		
		$this->load->view('home',['checkAdminExit'=>$checkAdminExit]);
	}

	public function adminRegister(){
		$this->load->model('queries');
		$roles=$this->queries->getRoles();
		
		$this->load->view('register',['roles'=>$roles]);
	}
	public function adminLogin(){
		if($this->session->userdata('user_id')){
			return redirect('admin/dashboard');
		}
        $this->load->view('login');
	}


    public function signin(){
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if($this->form_validation->run()){
			
			$email=$this->input->post('email');
			$password=sha1($this->input->post('password'));
			$this->load->model('queries');
			$userexit=$this->queries->adminexit($email,$password);
			
			
            
			if($userexit){
				  if($userexit->user_id=='1'){
					$sessiondata=[
						'user_id'=>$userexit->user_id,
						'username'=>$userexit->username,
						'email'=>$userexit->email,
						'role_id'=>$userexit->role_id,
						
					  ];
					 $this->session->set_userdata($sessiondata);
					 return redirect('admin/dashboard');
				  }
				  elseif($userexit->user_id>'1'){
					$sessiondata=[
						'user_id'=>$userexit->user_id,
						'username'=>$userexit->username,
						'email'=>$userexit->email,
						'college_id'=>$userexit->college_id,
						'role_id'=>$userexit->role_id,
						
					  ];
					 $this->session->set_userdata($sessiondata);
					 return redirect('users/dashboard/');
				  }
			
			}else{
				$this->session->set_flashdata('message','Email or password is wrong ');
				$this->session->set_flashdata('msg_class','alert-danger');
				return redirect("welcome/adminLogin");
			}
		}
		else{
			//echo "error";
		 	$this->login();
	       //echo validation_errors();
		}

	}

	public function logout(){
		$this->session->unset_userdata("user_id");
		return redirect('welcome/adminLogin');
	}

	public function adminsignup(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tb_users.email]');
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
			 $this->session->set_flashdata('message','Admin Registerd Successfully');
			 $this->session->set_flashdata('msg_class','alert-success');
			 return redirect("welcome/adminRegister");
		  }
		  else{
			 $this->session->set_flashdata('message','Failed to register ');
			 return redirect("welcome/adminRegister");
		  }
		}
		else{
			$this->load->model('queries');
			$roles=$this->queries->getRoles();
			
		 return	$this->load->view('register',['roles'=>$roles]);
		
			//echo validation_errors();
		}



	}
}
