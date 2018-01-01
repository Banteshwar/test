<?php
class product_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    public function record_count() {     
         $this->db->where('is_deleted', 0);
          $this->db->from('post');
          return $this->db->count_all_results();
    }
    
    public function fetch_posts($limit, $start) {
        $this->db->limit($limit, $start);
        $condition = "is_deleted=0";
        $this->db->select('*');
        $this->db->from('post');
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
    
     //get category data
    function getProducts()
    {
        $condition = "is_deleted!=1";
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where($condition);
        return $this->db->get()->result_array();
    }
    
     function getCategories()
    {
        $condition = "is_deleted!=1 and status=1";
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where($condition);
        return $this->db->get()->result_array();
    }
    
    //insert into user table
    function insertProduct($data)
    {
         $this->db->insert('post', $data);
         return $this->db->insert_id();
    }
    
     function insertPostGallery($data)
    {
        $this->db->insert('gallery', $data);
        return $this->db->insert_id();
    }
    
     //insert into user table
    function editProduct($id)
    {
        $condition = "post_id =" . "'" . $id . "'";
        $this->db->select('*');
        $this->db->from('post');
        $this->db->where($condition);
        $this->db->limit(1);
        return $this->db->get()->result_array();
    }
	
	 function Show_all_images($post_id) {
        $condition = "status = 1 and post_id='" . $post_id . "'";
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where($condition);
        $q = $this->db->get()->result_array();
        return $q;
    }
    
    function deleteProduct($id)
    {
        $this->db->set('is_deleted','1');
        $this->db->where('post_id', $id);
        return $this->db->update('post');
    }
	
	function delete_imagebyone($id)
    {
	
	
         $this->db->where('gallery_id', $id);
      $this->db->delete('gallery'); 
    }
	
	function editGallerytitle($img_title,$img_id)
    {
	
	  $this->db->set('img_title',$img_title);
        $this->db->where('gallery_id', $img_id);
        return $this->db->update('gallery');
    }
    
    function deleteGallery($id)
    {
      $this->db->where('post_id', $id);
      $this->db->delete('gallery'); 
    }
    //insert into user table
    function updateProduct($data, $id)
    {
        $this->db->set($data);
        $this->db->where('post_id', $id);
        return $this->db->update('post');
    }
    
 
}
?>