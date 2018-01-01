<?php
class category_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
  
    public function record_count() {
          $this->db->where('is_deleted', 0);
          $this->db->from('category');
          return $this->db->count_all_results();
    }
	
	 
    
    //get category data
    public function getCategories($limit, $start) {
       // echo $start;die;
        $this->db->limit($limit, $start);
       // $query = $this->db->get("tbl_admin_users");
        $condition = "is_deleted=0";
        $this->db->select('*');
        $this->db->from('category');
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
    
    //insert into user table
    function insertCategory($data)
    {
        return $this->db->insert('category', $data);
    }
    
     //insert into user table
    function editCategory($id)
    {
        $condition = "category_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where($condition);
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }
    
    function deleteCategory($id)
    {
	// $this->deletePostbyCategory($id);
        //$this->db->delete('category', array('category_id' => $id)); 
        $this->db->set('is_deleted','1');
        $this->db->where('category_id', $id);
        return $this->db->update('category');
    }
    
    //insert into user table
    function updateCategory($data, $id)
    {
	   /*if($data['status']==0)
	   {
	    $this->deletePostbyCategory($id);
	   }*/
	   
        $this->db->set($data);
        $this->db->where('category_id', $id);
        return $this->db->update('category');
    }
    
 function delete_imagecategory($id)
    {
	
	  $this->db->set('image_path','');
         $this->db->where('category_id', $id);
      $this->db->update('category');
    }
	
	
	 /* function deletePostbyCategory($id)
    {
      
        $this->db->set('is_deleted','1');
        $this->db->where('category_id', $id);
        return $this->db->update('post');
    }*/
 
}
?>