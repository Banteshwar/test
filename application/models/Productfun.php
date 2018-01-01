<?php

class Productfun extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function Show_all_products() {
        $condition = "A.status = 1 AND A.is_deleted=0";
        $this->db->select('A.*,C.fname,C.lname');
        $this->db->from('post A');
        $this->db->join('tbl_admin_users C', 'C.id =A.user_id','LEFT');
        $this->db->where($condition);
        $this->db->group_by('A.post_id');
        $this->db->order_by('A.modified_on','desc');
       // $this->db->limit(10);
        $q = $this->db->get()->result_array();
        //print_r($q);die;
        return $q;
    }
	
	function Show_all_productsHome() {
        $condition = "A.status = 1 AND A.is_deleted=0";
        $this->db->select('A.*,C.fname,C.lname');
        $this->db->from('post A');
        $this->db->join('tbl_admin_users C', 'C.id =A.user_id','LEFT');
        $this->db->where($condition);
        $this->db->group_by('A.post_id');
        $this->db->order_by('A.modified_on','desc');
        $this->db->limit(2);
        $q = $this->db->get()->result_array();
        //print_r($q);die;
        return $q;
    }
	
	function Show_all_products_autoload($group_number,$position) { 
	  $this->db->limit($group_number, $position);
        $condition = "A.status = 1 AND A.is_deleted=0";
        $this->db->select('A.*,C.fname,C.lname');
        $this->db->from('post A');
        $this->db->join('tbl_admin_users C', 'C.id =A.user_id','LEFT');
        $this->db->where($condition);
        $this->db->group_by('A.post_id');
        $this->db->order_by('A.modified_on','desc');
		$this->db->limit(1);
	
      
        $q = $this->db->get()->result_array();
		
		
        //print_r($q);die;
        return $q;
    }
    
    function likePostUser($post_id,$user_id)
    {
        $condition = "A.post_id = $post_id AND A.customer_id=$user_id";
        $this->db->select('*');
        $this->db->from('customer_post_mapping A');
        $this->db->where($condition);
        $this->db->group_by('A.post_id');
        $q = $this->db->get();
        return $q->row_array();
    }
    
    function likeImageUser($galary_id,$user_id)
    {
        $condition = "A.gallery_id =$galary_id AND A.customer_id=$user_id";
        $this->db->select('*');
        $this->db->from('customer_post_image_map A');
        $this->db->where($condition);
        $this->db->group_by('A.gallery_id');
        $q = $this->db->get();
        return $q->row_array();
    }
    function Product_details($id = '') {
        $condition = "A.status = 1 and A.post_id='" . $id . "' AND A.is_deleted=0 ";
        $this->db->select('*');
        $this->db->from('post A');
        //$this->db->join('customer_post_image_map B', 'A.post_id =B.post_id','LEFT');
        $this->db->where($condition);
        $this->db->limit(10);
        $q = $this->db->get()->result_array();
        //print_r($q);die;
        return $q;
    }

    function Show_all_images($post_id) {
        $condition = "status = 1 and post_id='" . $post_id . "'";
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where($condition);
        $q = $this->db->get()->result_array();
        return $q;
    }
    
    function showGalleryimages($post_id) {
        $condition = "A.status = 1 and A.post_id='" . $post_id . "'";
        $this->db->select('A.*,B.hyperlink');
        $this->db->from('gallery A');
        $this->db->join('post B', 'A.post_id =B.post_id','LEFT');
        $this->db->where($condition);
        $q = $this->db->get()->result_array();
        return $q;
    }

    function Show_all_likes($post_id) {
        $like = mysql_query("select post_id, count(*) like_count from customer_post_mapping where liked>0 and post_id='" . $post_id . "' GROUP BY post_id") or die("problem in selection");
        $like_row = mysql_num_rows($like);
        if ($like_row > 0) {
            $like_fetch = mysql_fetch_array($like);
            $liked = $like_fetch['like_count'];
            return $liked;
        } else {
            return '0';
        }
    }

    function insert_liked($data) {   
        if ($data['count'] < 0)
        {
          $insert=array('customer_id'=>$data['user_id'],'post_id'=>$data['post_id'],'liked'=>'0');
           $like = mysql_query("UPDATE `post` SET `like_counter`= like_counter - 1 WHERE post_id='".$data['post_id']."' ");
        }
        else{
            $insert=array('customer_id'=>$data['user_id'],'post_id'=>$data['post_id'],'liked'=>'1');
            $like = mysql_query("UPDATE `post` SET `like_counter`= like_counter + 1 WHERE post_id='".$data['post_id']."' ");
        }
       // echo $this->db->last_query();die;
        $this->db->select('*');
        $this->db->from('customer_post_mapping');
        $this->db->where('customer_id',$data['user_id']);
        $this->db->where('post_id',$data['post_id']);
        $q = $this->db->get();
        $chk=$q->row_array();
        if ($q->num_rows() > 0)
        {
            if($chk['liked']==1)
            {
              mysql_query("UPDATE `customer_post_mapping` SET `liked`= 0 WHERE post_id='".$data['post_id']."' ");
            }
            else{
                mysql_query("UPDATE `customer_post_mapping` SET `liked`=1 WHERE post_id='".$data['post_id']."' ");
            }
        }
        else{
             $this->db->insert('customer_post_mapping',$insert);
        }
        //echo $this->db->last_query();
       //die;
       
       $like = mysql_query("select like_counter from post where post_id='" .$data['post_id']. "' GROUP BY post_id") or die("problem in selection");
       $like_row = mysql_num_rows($like);

        if ($like_row > 0) {
            $like_fetch = mysql_fetch_array($like);
            echo $liked = $like_fetch['like_counter'];
            die;
            return $liked;
        } else {
            return '0';
        }
    }

    
    
    function GetCategory()
    {
        $condition = "A.status = 1 AND A.is_deleted=0";
        $this->db->select('*');
        $this->db->from('category A');
        $this->db->where($condition);
        $result = $this->db->get()->result_array();
        return $result;
    }
    
    function showPostByCatId($id) {
        $condition = "A.status = 1 AND A.is_deleted=0 AND A.category_id=$id";
        $this->db->select('A.*,C.fname,C.lname');
        $this->db->from('post A');
        $this->db->join('tbl_admin_users C', 'C.id =A.user_id','LEFT');
        $this->db->where($condition);
        $this->db->group_by('A.post_id');
        $this->db->limit(10);
        $q = $this->db->get()->result_array();
        //print_r($q);die;
        return $q;
    }
     function getCatDetailCatId($id) {
       $condition = " A.is_deleted=0 AND A.category_id=$id";
        $this->db->select('*');
        $this->db->from('category A');
         $this->db->where($condition);
        $result = $this->db->get()->result_array();
        return $result;
     }
     
     function insertGalleryliked($data)
     { 
         if ($data['count'] < 0)
        {
          $insert=array('customer_id'=>$data['user_id'],'gallery_id'=>$data['gallery_id'],'liked'=>'0');
           $like = mysql_query("UPDATE `gallery` SET `gallery_like_counter`= gallery_like_counter - 1 WHERE gallery_id='".$data['gallery_id']."' ");
        }
        else{
            $insert=array('customer_id'=>$data['user_id'],'gallery_id'=>$data['gallery_id'],'liked'=>'1');
            $like = mysql_query("UPDATE `gallery` SET `gallery_like_counter`= gallery_like_counter + 1 WHERE gallery_id='".$data['gallery_id']."' ");
        }
       // echo $this->db->last_query();die;
        $this->db->select('*');
        $this->db->from('customer_post_image_map');
        $this->db->where('customer_id',$data['user_id']);
        $this->db->where('gallery_id',$data['gallery_id']);
        $q = $this->db->get();
        $chk=$q->row_array();
        if ($q->num_rows() > 0)
        {
            if($chk['liked']==1)
            {
              mysql_query("UPDATE `customer_post_image_map` SET `liked`=0 WHERE gallery_id='".$data['gallery_id']."' ");
            }
            else{
                mysql_query("UPDATE `customer_post_image_map` SET `liked`=1 WHERE gallery_id='".$data['gallery_id']."' ");
            }
        }
        else{
             $this->db->insert('customer_post_image_map',$insert);
        }
        //echo $this->db->last_query();
       //die;
       
       $like = mysql_query("select gallery_like_counter from gallery where gallery_id='" .$data['gallery_id']. "' GROUP BY gallery_id") or die("problem in selection");
       $like_row = mysql_num_rows($like);

        if ($like_row > 0) {
            $like_fetch = mysql_fetch_array($like);
            echo $liked = $like_fetch['gallery_like_counter'];
            die;
            return $liked;
        } else {
            return '0';
        }
     }
     
     function searchPost($data) {
         $text=$data['query'];
        $condition = "(A.title like '%$text%'  OR A.description like '%$text%')AND A.status = 1 AND A.is_deleted=0";
        $this->db->select('A.*,C.fname,C.lname');
        $this->db->from('post A');
        $this->db->join('tbl_admin_users C', 'C.id =A.user_id','LEFT');
        $this->db->where($condition);
        $this->db->group_by('A.post_id');
        $this->db->limit(10);
        $q = $this->db->get()->result_array();
        //print_r($q);die;
        return $q;
    }

}

?>