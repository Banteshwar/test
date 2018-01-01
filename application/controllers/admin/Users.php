<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {
/**
 * 
 * Author: Jitender Nagar
 *
 */
    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->helper('function');
       // $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));
         $this->load->library('pagination');
        $this->load->model('admin/user_model');
         if (!$this->session->userdata('is_admin_login')) {
            redirect('admin/home');
        }
    }

    public function index() {
        $config = array();
        $config["base_url"] = base_url() . "admin/users/index";
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
        $config['num_links'] = 2 ;         
        $config['cur_tag_open'] = '<li class="active"><a>' ;
        $config['cur_tag_close'] = '</a></li>' ;
        $config["total_rows"] = $this->user_model->record_count();
        
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $offset = $page==0? 0: ($page-1)*$config["per_page"];
        $arr["userdata"] = $this->user_model->getUsers($config["per_page"], $offset);
        $arr["links"] = $this->pagination->create_links();
        $arr['page'] = 'user';
        $this->load->view('admin/vwManageUser',$arr);      
    }

    public function add_user() {
        $arr['page'] = 'user';
        $this->register();
    }

     public function edit_user($id='') {
        
        $arr['page'] = 'user';
        if($id!=''){
        $arr['users'] = $this->user_model->editUser($id);
        $this->load->view('admin/vwEditUser',$arr);
        }else{
            redirect('admin/users');
        }
    }
    
   
    
  public function delete_user($id='') {
        $arr['page'] = 'user'; 
        $this->user_model->deleteUser($id);
        redirect('admin/users');
    }
    
    public function update_users() {  
        
        //set validation rules
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|md5');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            $arr['users'] = $this->user_model->getUserById($this->input->post('pst_id'));
            $this->load->view('admin/vwEditUser',$arr);
        }
        else
        {
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'status' => $this->input->post('status'),
                'password' => $this->input->post('password')
            );
            
            // insert form data into database
            if ($this->user_model->updateUser($data,$this->input->post('pst_id')))
            {
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Updated!</div>');
                redirect('admin/users/edit_user/'.$this->input->post('pst_id'));
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('admin/users/edit_user/'.$this->input->post('pst_id'));
            }
        }  
    }
    
     public function block_user() {
        // Code goes here
     }
    
    
    function register()
    {
       
        //set validation rules
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[30]|is_unique[tbl_admin_users.username]');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[tbl_admin_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]|md5');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->load->view('admin/vwAddUser');
        }
        else
        {
            //insert the user registration details into database
            //$salt = '5&JDDlwz%Rwh!t2Yg-Igae@QxPzFTSId'.'<br>';
           // echo $this->input->post('password').'<br>';
            //$enc_pass  = $salt.$this->input->post('password');
           //die;
            $j = 0; //Variable for indexing uploaded image 
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) { //loop to get individual element from the array  
                $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
                $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
                $file_extension = end($ext); //store extensions in the variable                
                $j = $j + 1;//increment the number of uploaded images according to the files in array       
                if (($_FILES["file"]["size"][$i] < 1000000) //Approx. 100kb files can be uploaded.
                        && in_array($file_extension, $validextensions)) {
                        createDir(IMAGE_USER_DIR);                  
                        /*create directory with 777 permission if not exist - end*/
                        $path[0] = $_FILES['file']['tmp_name'][$i];
                        $file = pathinfo($_FILES['file']['tmp_name'][$i]);
                        $fileType = $file["extension"];
                        $fileNameNew =md5(uniqid()) . "." . $ext[count($ext) - 1];
                        $path[1] = IMAGE_USER_DIR  . $fileNameNew;
                        if (createThumb($path[0], $path[1], $fileType, IMAGE_USER_SMALL_SIZE, IMAGE_USER_SMALL_SIZE,IMAGE_USER_SMALL_SIZE)) {

                        }						
		}
            }
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'status' => 1,
                'user_image' => $fileNameNew,
                'password' => $this->input->post('password')
            );
            
            // insert form data into database
            if ($this->user_model->insertUser($data))
            {
                if(isset($_FILES['userfile'])){
                $errors= array();
                $file_name = $_FILES['image']['name'];
                $file_size =$_FILES['image']['size'];
                $file_tmp =$_FILES['image']['tmp_name'];
                $file_type=$_FILES['image']['type'];
                $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

                $expensions= array("jpeg","jpg","png");

                if(in_array($file_ext,$expensions)=== false){
                   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }

                if($file_size > 2097152){
                   $errors[]='File size must be excately 2 MB';
                }

                if(empty($errors)==true){
                   move_uploaded_file($file_tmp,"images/".$file_name);
                   echo "Success";
                }else{
                   print_r($errors);
                }
             }
             
             
                // send email
                if ($this->user_model->sendEmail($this->input->post('email')))
                {
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! Please confirm the mail sent to your Email-ID!!!</div>');
                    redirect('admin/users');
                }
                else
                {
                    // error
                    $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                    redirect('admin/users');
                }
            }
            else
            {
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('admin/users/add_user');
            }
        }
    }
    
    function verify($hash=NULL)
    {
        if ($this->user_model->verifyEmailID($hash))
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('admin/users/add_user');
        }
        else
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('admin/users/add_user');
        }
    }
    
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */