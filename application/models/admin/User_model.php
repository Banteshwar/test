<?php
class user_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    //insert into user table
    function insertUser($data)
    {
        return $this->db->insert('tbl_admin_users', $data);
    }
    
    
    public function record_count() {
          $this->db->where('is_deleted', 0);
          $this->db->from('tbl_admin_users');
          return $this->db->count_all_results();
    }
    
    public function getUsers($limit, $start) {
       // echo $start;die;
        $this->db->limit($limit, $start);
       // $query = $this->db->get("tbl_admin_users");
        $condition = "is_deleted=0";
        $this->db->select('*');
        $this->db->from('tbl_admin_users');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
   
    public function getUserById($id) {
        
         $condition = "id =" . "'" . $id. "'";
        $this->db->select('*');
        $this->db->from('tbl_admin_users');
        $this->db->where($condition);
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }
    
    function editUser($id)
    {
        $condition = "id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('tbl_admin_users');
        $this->db->where($condition);
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }
   
    //insert into user table
    function updateUser($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('tbl_admin_users');
    }
    
      //delete into user table 
    function deleteUser($id)
    {
        $this->db->set('is_deleted','1');
        $this->db->where('id', $id);
        return $this->db->update('tbl_admin_users');
    }
    
    //send verification email to user's email id
    function sendEmail($to_email)
    {
        $from_email = 'jitender@engagedmediainc.com'; //change this to yours
        $subject = 'Verify Your Email Address';
        $message = 'Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://atgo.engagedmedia.in/user/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />ATGO Team';
        
        
        $this->load->library('email');

        $this->email->from('no-reply.@engagedmediainc.com', 'ATGO');
        $this->email->to('jitendern@engagedmediainc.com'); 
       // $this->email->cc('another@another-example.com'); 
       // $this->email->bcc('them@their-example.com'); 
        $this->email->subject( $subject);
        $this->email->message($message);
        return $this->email->send();
    }
    
    //activate user account
    function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('tbl_admin_users', $data);
    }
}
?>