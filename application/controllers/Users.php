<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {
   
  public function dashboard(){
    $this->load->model('queries');
    $college_id=$this->session->userdata('college_id');
    $student=$this->queries->getStudents($college_id);
      $this->load->view('users',['student'=>$student]);
  }
}
?>