<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
           $this->load->helper('date');
        $this->load->helper('function');
        $this->load->helper(array('form','url'));
        $this->load->model('admin/product_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        
         if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $config = array();
        $config["base_url"] = base_url() . "admin/products/index";
      
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
        $config['num_links'] = 20 ;         
        $config['cur_tag_open'] = '<li class="active"><a>' ;
        $config['cur_tag_close'] = '</a></li>' ;
        $config["total_rows"] = $this->product_model->record_count();
        
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
          $offset = $page==0? 0: ($page-1)*$config["per_page"];
        $arr["products"] = $this->product_model->fetch_posts($config["per_page"], $offset);
        $arr["links"] = $this->pagination->create_links();

        $arr['page'] = 'products';
        $this->load->view('admin/vwManageProduct',$arr);
    }

     public function add_product() {
        $arr['page'] = 'product';
        $this->createProduct();
    }

       public function edit_product($id='') {
        $arr['page'] = 'product';
        if($id!=''){
        $arr['categories'] = $this->product_model->getCategories();
        $arr['products'] = $this->product_model->editProduct($id);
		$arr['images']=$this->product_model->Show_all_images($id);
		
        $this->load->view('admin/vwEditProduct',$arr);
        }else{
            redirect('admin/product');
        }
    }
    
	
	 public function delete_image() {
         $get_liked = '';
      $image_id=$_POST['image_id'];
        $get_liked = $this->product_model->delete_imagebyone($image_id);
        if ($get_liked) {
            echo '';
        } else {
            echo '';
        }
    }
	
	
     public function delete_product($id='') {
        $arr['page'] = 'product'; 
        $this->product_model->deleteProduct($id);
        $this->product_model->deleteGallery($id);
         redirect('admin/products');
    }
    
    
    
    public function update_product() {  
        
        //set validation rules
        $this->form_validation->set_rules('title', 'Post Title', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('category', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('hyperlink', 'Hyperlink', 'trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $arr['products'] = $this->product_model->editProduct($this->input->post('post_id'));
			
			$arr['images']=$this->product_model->Show_all_images($this->input->post('post_id'));
			
            $this->load->view('admin/vwEditProduct',$arr);
        }
        else
        {
            $data = array(
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'category_id' => $this->input->post('category'),
                'hyperlink' => $this->input->post('hyperlink'),
                'status' => $this->input->post('status')
            );
            
            // insert form data into database
            if ($this->product_model->updateProduct($data,$this->input->post('post_id')))
            {
			
			$bsimg_title=$this->input->post('bsimg_title');
			$bsimg_id=$this->input->post('bsimg_id');
			
			for($bsi=0;$bsi<count($bsimg_title);$bsi++)
			{
			
			$this->product_model->editGallerytitle($bsimg_title[$bsi],$bsimg_id[$bsi]);
			
			}
			
			
			//////////////// bs code to add image ///////////////////////
			
			  $j = 0; //Variable for indexing uploaded image 
    
           $target_path = "./".DIR_UPLOAD."/"; //Declaring Path for uploaded images
        
           //die;
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                $img_title = ( basename($_POST['img_title'][$i]));
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
                    if (move_uploaded_file($_FILES['file']['tmp_name'][$i] , $path[3])) {
                        //if file moved to uploads folder
                        $data = array(
                             'post_id' => $this->input->post('post_id'),
                             'img_title' => $img_title,
                             'path' => $fileNameNew,
                             'status' => 1
                        );
						
						
						
						
						    $this->product_model->insertPostGallery($data);
			
			}
			
			}
			
			}
			
			/////////////////// end bs code to add image /////////////////
                // sucess
                 $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Updated!</div>');
                redirect('admin/products/edit_product/'.$this->input->post('post_id'));
            }
            else
            {
			
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('admin/products/edit_product/'.$this->input->post('post_id'));
            }
        }  
    }
    
    
    
    function createProduct()
    {
        
        //set validation rules
        $this->form_validation->set_rules('title', 'Post Title', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('category', 'Category Name', 'trim|required');
        $this->form_validation->set_rules('hyperlink', 'Hyperlink', 'trim|required|valid_url');
        
       
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $arr['categories'] = $this->product_model->getCategories();
            $this->load->view('admin/vwAddProduct',$arr);
        }
        else
        {
            
            $data = array(
                'title' => $this->input->post('title'),
                'user_id' => $this->session->userdata('userid'),
                'category_id' => $this->input->post('category'),
                'description' => $this->input->post('description'),
                'hyperlink' => $this->input->post('hyperlink'),
                'status' => 1
            );
            
            $post_id=$this->product_model->insertProduct($data);
            
            $j = 0; //Variable for indexing uploaded image 
    
           $target_path = "./".DIR_UPLOAD."/"; //Declaring Path for uploaded images
        
           //die;
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array
                $img_title = ( basename($_POST['img_title'][$i]));
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
                    if (move_uploaded_file($_FILES['file']['tmp_name'][$i] , $path[3])) {
                        //if file moved to uploads folder
                        $data = array(
                             'post_id' => $post_id,
                             'img_title' => $img_title,
                             'path' => $fileNameNew,
                             'status' => 1
                        );

                       $this->product_model->insertPostGallery($data);
                        echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                                        //echo  md5(uniqid()) . "." . $ext[count($ext) - 1];

                    } else {//if file was not moved.
                        echo $j. ').<span id="error">please try again!.</span><br/><br/>';
                    }
                } else {//if file size and file type was incorrect.
                    echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
                }
            }
            
            // insert form data into database
            if ($post_id)
            {
                 // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Created!</div>');
                    redirect('admin/products/add_product');
              
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('admin/products/add_product');
            }
        }
    }
    
     function upload_view($id='')
     {
        if($id!=''){
        $arr['post_id'] = $id;
        $this->load->view('admin/vwUpload',$arr);
        }else{
            redirect('admin/products');
        }
     }
     
    function upload($id='')
     {
        
        $this->load->library('UploadHandler');
        if(isset($_SESSION['file_name'])){
            $data = array(
                'post_id' => $id,
                 'path' => $_SESSION['file_name'],
                
                'status' => 1
            );
            
           $post_id=$this->product_model->insertPostGallery($data);
        }
   
     }
    
     
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */