<?php 

class Queries extends CI_Model{

    public function getRoles(){
        $roles=$this->db->get('tb_roles');
        if($roles->num_rows()>0){

            return $roles->result();
        }
    }

    public function getColleges(){
        $Colleges=$this->db->get('tb_college');
        if($Colleges->num_rows()>0){

            return $Colleges->result();
        }
    }


    public function registerAdmin($data){
       return $this->db->insert('tb_users',$data);
    }
   
    public function checkadminisExits(){
    $checkadmin= $this->db->where(['role_id'=>'1'])
                          ->get('tb_users');
    if($checkadmin->num_rows()>0){
        return $checkadmin->num_rows();
    }                      
   }

   public function adminexit($email,$password){
       $checkuser=$this->db->where(['email'=>$email,'password'=>$password])
                           ->get('tb_users');
        if($checkuser->num_rows() >0){
            return $checkuser->row();

        }  
        else{
            return false;
        }                 
   }

   public function makecollege($data){
    return $this->db->insert('tb_college',$data);
   }

   public function insertstudent($data){
    return $this->db->insert('tb_student',$data);
   }
   public function viewAllcolleges(){
       $this->db->select(['tb_users.user_id','tb_college.college_id','tb_users.username','tb_users.email',
                 'tb_users.gender','tb_college.collegename','tb_college.branch','tb_roles.rolename']);
       $this->db->from('tb_college');
       $this->db->order_by('college_id','asc');
       $this->db->join('tb_users','tb_users.college_id=tb_college.college_id');       
       $this->db->join('tb_roles','tb_roles.role_id=tb_users.role_id');
       $users=$this->db->get();
       return $users->result();           
   }

   public function getStudents($college_id){
       $this->db->select(['tb_college.collegename','tb_student.studentname','tb_student.email'
                   ,'tb_student.gender','tb_student.course','tb_student.id']);
       $this->db->from('tb_student');
       $this->db->join('tb_college','tb_college.college_id=tb_student.college_id');
       $this->db->where(['tb_student.college_id'=>$college_id]);
       $students=$this->db->get();
       return $students->result();    
   }

   public function getStudentrecord($id){
    $this->db->select(['tb_college.collegename','tb_college.college_id','tb_student.studentname','tb_student.email'
                       ,'tb_student.gender','tb_student.course','tb_student.id']);
    $this->db->from('tb_student');
    $this->db->join('tb_college','tb_college.college_id=tb_student.college_id');
    $this->db->where(['tb_student.id'=>$id]);
    $student=$this->db->get();

    return $student->row();
   }

   public function updatestudent($data,$id){
       return $this->db->where('id',$id)
                       ->update('tb_student',$data);
   }
   
   public function removestudent($id){
       return $this->db->delete('tb_student',['id'=>$id]);
   }
}

?>