<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller {
/**
 * 
 * Author: Jitender Nagar
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('function');
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
         $this->load->library('pagination');
        $this->load->model('admin/category_model');
        if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
         $config = array();
        $config["base_url"] = base_url() . "admin/category/index";
        $config["per_page"] = PER_PAGE;
        $config['full_tag_open'] = '<ul class="pagination pagination-sm">' ;
        $config['full_tag_close'] = '</ul>' ;
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_link'] = 'First' ;
        $config['last_link'] = 'Last' ;
        $config['use_page_numbers'] = TRUE ;
        $config['prev_link'] = '&lt;&lt;' ;
        $config['next_link'] = '&gt;&gt;';
        $config['uri_segment'] = 4 ;
        $config['num_links'] = 5 ;         
        $config['cur_tag_open'] = '<li class="active"><a>' ;
        $config['cur_tag_close'] = '</a></li>' ;
        $config["total_rows"] = $this->category_model->record_count();
        
        
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $offset = $page==0? 0: ($page-1)*$config["per_page"];
        $arr["categroies"] = $this->category_model->getCategories($config["per_page"], $offset);
        $arr["links"] = $this->pagination->create_links();
        $arr['page'] = 'category';
        $this->load->view('admin/vwManageCategory',$arr);   
    }

    public function add_category() {
        $arr['page'] = 'category';
        $this->createCategory();
    }

     public function edit_category($id='') {
        $arr['page'] = 'user';
        if($id!=''){
        $arr['categories'] = $this->category_model->editCategory($id);
		
        $this->load->view('admin/vwEditCategory',$arr);
        }else{
            redirect('admin/category');
        }
    }
    
     public function delete_category($id='') {
        $arr['page'] = 'category'; 
        $this->category_model->deleteCategory($id);
         redirect('admin/category');
    }
    
    public function update_category() {  
        
        //set validation rules
        $this->form_validation->set_rules('title', 'Category Name', 'trim|required|min_length[3]|max_length[30]');
		
		if(count($_FILES['file']['name'])>0)
		{
		
			 $this->form_validation->set_rules('file[]','Upload image','callback_fileupload_check');
			 
			 }
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $arr['categories'] = $this->category_model->editCategory($this->input->post('category_id'));
            $this->load->view('admin/vwEditCategory',$arr);
        }
        else
        {
		
		$bsfilename=$this->input->post('image_path');
		
		 $j = 0; //Variable for indexing uploaded image 
    
               $target_path = "./".IMAGE_CATEGORY_DIR."/"; //Declaring Path for uploaded images
        
           //die;
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
             
                $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
                $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 

                $file_extension = end($ext); //store extensions in the variable

                //$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
                $j = $j + 1;//increment the number of uploaded images according to the files in array       

                  if (($_FILES["file"]["size"][$i] < 1000000) //Approx. 100kb files can be uploaded.
                        && in_array($file_extension, $validextensions)) {
                        createDir(IMAGE_SMALL_DIR);
                        createDir(IMAGE_MEDIUM_DIR);
                        /*create directory with 777 permission if not exist - end*/
                        $path[0] = $_FILES['file']['tmp_name'][$i];
                        $file = pathinfo($_FILES['file']['tmp_name'][$i]);
                        $fileType = $file["extension"];
                       // $desiredExt='jpg';
                        $fileNameNew =md5(uniqid()) . "." . $ext[count($ext) - 1];
                        $path[1] = IMAGE_MEDIUM_DIR  . $fileNameNew;
                        $path[2] = IMAGE_SMALL_DIR  . $fileNameNew;
                        $path[3] = $target_path . $fileNameNew;

                        if (createThumb($path[0], $path[1], $fileType, IMAGE_MEDIUM_SIZE, IMAGE_MEDIUM_SIZE,IMAGE_MEDIUM_SIZE)) {

                                if (createThumb($path[1], $path[2],"$file_extension", IMAGE_SMALL_SIZE, IMAGE_SMALL_SIZE,IMAGE_SMALL_SIZE)) {
                                        $output['status']=TRUE;
                                        $output['image_medium']= $path[1];
                                        $output['image_small']= $path[2];
                                }
                        }
						}
						
                    move_uploaded_file($_FILES['file']['tmp_name'][$i] , $path[3]); 
					
					 $bsfilename= $fileNameNew;
					
					}
					
											 
            $data = array(
                 'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'image_path' => $bsfilename,
                'status' => $this->input->post('status')
            );
            
            // insert form data into database
            if ($this->category_model->updateCategory($data,$this->input->post('category_id')))
            {
                // sucess
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Updated Category!</div>');
                redirect('admin/category/edit_category/'.$this->input->post('category_id'));
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('admin/category/edit_category/'.$this->input->post('category_id'));
            }
        }  
    }
    
    
    
    
    function createCategory()
    {
	
	 $this->load->library('form_validation');
        //set validation rules
        $this->form_validation->set_rules('title', 'Category Name', 'trim|required|min_length[3]|max_length[30]');
		
		
		 
		 $this->form_validation->set_rules('file[]','Upload image','callback_fileupload_check');
		 
		 
		
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->load->view('admin/vwAddCategory');
        }
        else
        {
             $j = 0; //Variable for indexing uploaded image 
            $fileNameNew='';
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) { //loop to get individual element from the array  
                $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
                $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
                $file_extension = end($ext); //store extensions in the variable                
                $j = $j + 1;//increment the number of uploaded images according to the files in array       
                if (($_FILES["file"]["size"][$i] < 1000000) //Approx. 100kb files can be uploaded.
                        && in_array($file_extension, $validextensions)) {
                        createDir(IMAGE_CATEGORY_DIR);  
						 createDir(IMAGE_SMALL_DIR);
                        createDir(IMAGE_MEDIUM_DIR);
						                
                        /*create directory with 777 permission if not exist - end*/
                        $path[0] = $_FILES['file']['tmp_name'][$i];
                        $file = pathinfo($_FILES['file']['tmp_name'][$i]);
                        $fileType = $file["extension"];
                        $fileNameNew =md5(uniqid()) . "." . $ext[count($ext) - 1];
						 
						
						 $path[1] = IMAGE_MEDIUM_DIR  . $fileNameNew;
						  $path[2] = IMAGE_SMALL_DIR  . $fileNameNew;
                        $path[3] = IMAGE_CATEGORY_DIR  . $fileNameNew;
                       
						
						
                       
                        if (createThumb($path[0], $path[1], $fileType, IMAGE_MEDIUM_SIZE, IMAGE_MEDIUM_SIZE,IMAGE_MEDIUM_SIZE)) {

                                if (createThumb($path[1], $path[2],"$file_extension", IMAGE_SMALL_SIZE, IMAGE_SMALL_SIZE,IMAGE_SMALL_SIZE)) {
                                        $output['status']=TRUE;
                                        $output['image_medium']= $path[1];
                                        $output['image_small']= $path[2];
                                }
                        }
						
						  move_uploaded_file($_FILES['file']['tmp_name'][$i] , $path[3]);
						
						
		}
            }
            $cdate=date('Y-m-d H:i:s');
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'image_path' =>  $fileNameNew,
                 'user_id' => $this->session->userdata('userid'),
                'created_on'=>$cdate,
                'status' => 1);
            
            // insert form data into database
            if ($this->category_model->insertCategory($data))
            {
                 // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Created Category!</div>');
                    redirect('admin/category/add_category');
              
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('admin/category/add_category');
            }
        }
    }
	
	 public function fileupload_check()
  {
    
	
	
    // we retrieve the number of files that were uploaded
    $number_of_files = sizeof($_FILES['file']['tmp_name']);

    // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
    $files = $_FILES['file'];

    // first make sure that there is no error in uploading the files
    for($i=0;$i<$number_of_files;$i++)
    {
     
	 $image_info = getimagesize($_FILES['file']['tmp_name'][$i]);
   $image_width = $image_info[0];
    $image_height = $image_info[1];

if ($image_width < 350 || $image_height < 250)
{
        // save the error message and return false, the validation of uploaded files failed
        $this->form_validation->set_message('fileupload_check', 'Height and Width must up to 350*250.');
        return FALSE;
  }
      
    }
    
    
     return TRUE;
  }
	
	
	 public function delete_image() {
         $get_liked = '';
      $image_id=$_POST['image_id'];
        $get_liked = $this->category_model->delete_imagecategory($image_id);
        if ($get_liked) {
            echo '';
        } else {
            echo '';
        }
    }
    
}

