<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Productfun');

        $this->config->load('google');
        require '/application/third_party/src/Google_Client.php';
        require '/application/third_party/src/contrib/Google_Oauth2Service.php';
        $cache_path = $this->config->item('cache_path');
        $GLOBALS['apiConfig']['ioFileCache_directory'] = ($cache_path == '') ? APPPATH . 'cache/' : $cache_path;
        $this->client = new Google_Client();
        $this->client->setApplicationName($this->config->item('application_name', 'google'));
        $this->client->setClientId($this->config->item('client_id', 'google'));
        $this->client->setClientSecret($this->config->item('client_secret', 'google'));
        $this->client->setRedirectUri($this->config->item('redirect_uri', 'google'));
        $this->client->setDeveloperKey($this->config->item('api_key', 'google'));
        $this->oauth2 = new Google_Oauth2Service($this->client);
    }

    public function index() {
        $post = array();
        $post['auth'] = $this->client->createAuthUrl();
        
        $this->load->library('facebook');
        $post['login_url'] = $this->facebook->getLoginUrl(array(
            'redirect_uri' => site_url('Customer/fbLogin'),
            'scope' => array("email") // permissions here
        ));
        
        $this->load->view('common/header');
		
		/////////////// need to done after tea break;////////
		
		$post['allProducts'] = $this->Productfun->Show_all_products();
		 
        $data = $this->Productfun->Show_all_productsHome();
		
		
        $this->load->helper('share');
        $post['logged_in'] = 1;

        if (!isset($this->session->userdata['User'])) {
            $post['logged_in'] = 0;
            $user_id='';
        }else {
            $sesdata = $this->session->userdata["User"];
            $user_id = $sesdata['c_id'];
        }
        foreach ($data as $result) {
          
          $li=$this->Productfun->likePostUser($result['post_id'],$user_id);
          if(!empty($li))
          {
              $customer_id=$li['customer_id']; $liked=$li['liked'];
          }
          else{ $customer_id=''; $liked=0;}
            $post['posts'][] = array(
                'post_id' => $result['post_id'],
                'customer_id'=>$customer_id,
                'liked'=>$liked,
                'fname' => $result['fname'],
                'lname' => $result['lname'],
                'category_id' => $result['category_id'],
                'title' => $result['title'],
                'description' => $result['description'],
                'hyperlink' => $result['hyperlink'],
                'status' => $result['title'],
                'like_counter' => $result['like_counter'],
                'share_counter' => $result['like_counter'],
                'created_on' => $result['created_on'],
                'modified_on' => $result['modified_on'],
                'is_deleted' => $result['is_deleted'],
                'image' => $this->Productfun->Show_all_images($result['post_id'])
            );
        }

        $this->load->view('home/home', $post);
        $this->load->view('common/footer');
    }
	
	
	public function autoload_process() {
	
	$this->load->model('productfun');
	 
        $post = array();
        $post['auth'] = $this->client->createAuthUrl();
        
        $this->load->library('facebook');
        $post['login_url'] = $this->facebook->getLoginUrl(array(
            'redirect_uri' => site_url('Customer/fbLogin'),
            'scope' => array("email") // permissions here
        ));
        
       $this->load->model('productfun');
	 $items_per_group = 1;
	 $data = '';
	 
        $group_number = filter_var($_POST["group_no"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		
		$position = ($group_number * $items_per_group)+2;
		
		
        $data = $this->Productfun->Show_all_products_autoload($group_number,$position);
		
        $this->load->helper('share');
        $post['logged_in'] = 1;

        if (!isset($this->session->userdata['User'])) {
            $post['logged_in'] = 0;
            $user_id='';
        }else {
            $sesdata = $this->session->userdata["User"];
            $user_id = $sesdata['c_id'];
        }
        foreach ($data as $result) {
          
          $li=$this->Productfun->likePostUser($result['post_id'],$user_id);
          if(!empty($li))
          {
              $customer_id=$li['customer_id']; $liked=$li['liked'];
          }
          else{ $customer_id=''; $liked=0;}
            $post['posts'][] = array(
                'post_id' => $result['post_id'],
                'customer_id'=>$customer_id,
                'liked'=>$liked,
                'fname' => $result['fname'],
                'lname' => $result['lname'],
                'category_id' => $result['category_id'],
                'title' => $result['title'],
                'description' => $result['description'],
                'hyperlink' => $result['hyperlink'],
                'status' => $result['title'],
                'like_counter' => $result['like_counter'],
                'share_counter' => $result['like_counter'],
                'created_on' => $result['created_on'],
                'modified_on' => $result['modified_on'],
                'is_deleted' => $result['is_deleted'],
                'image' => $this->Productfun->Show_all_images($result['post_id'])
            );
        }

        $this->load->view('home/autoloadhome',$post);
      
    }

    public function details($id = '')
    {
        if (!isset($this->session->userdata['User'])) {
            $user_id='';
        }else {
            $sesdata = $this->session->userdata["User"];
            $user_id = $sesdata['c_id'];
        }
        $data =$this->Productfun->showGalleryimages($id);
        $this->load->helper('share');
        $this->load->view('common/header');
        $post = array();
        
        foreach ($data as $result) {
            
        $li=$this->Productfun->likePostUser($result['post_id'],$user_id);
        if(!empty($li))
        {
            $customer_id=$li['customer_id']; $liked=$li['liked'];
        }
          else{ $customer_id=''; $liked=0;}
            $post['images'][] = array(
                'gallery_id' => $result['gallery_id'],
                'post_id' => $result['post_id'],
                'customer_id'=>$customer_id,
                'liked'=>$liked,
                'path' => $result['path'],
                'hyperlink'=>$result['hyperlink'],
                'gallery_like_counter'=>$result['gallery_like_counter'],
                'img_title' => $result['img_title'],
                'status' => $result['status'],
                'created_on' => $result['created_on'],
                
            );
         
        }
        $this->load->view('home/details', $post);
        $this->load->view('common/footer');
    }

    public function Categories() {
        if ($this->session->userdata('c_logged_in')) {
            
        } else {
            redirect('home', 'refresh');
        }
        $this->load->model('customerfun');

        $data['no_msg'] = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $post_categories = $_POST['gender'];
            $categories = '';
            for ($i = 0; $i < count($post_categories); $i++) {
                if ($i == 0) {
                    $categories.=$post_categories[$i];
                } else {
                    $categories.=',' . $post_categories[$i];
                }
            }
            $user_data = $this->session->all_userdata();
            $ins_customer = $this->customerfun->update_customer($user_data['c_id'], $categories);
            $data['no_msg'] = 'Category has been updated successfully..';
        }
        $this->load->view('categories', $data);
    }

    public function check_count() {
        $get_liked = '';
        $data = $this->input->post();
        $get_liked = $this->Productfun->insert_liked($data);
        if ($get_liked) {
            echo get_liked;
        } else {
            echo '0';
        }
    }

    public function check_tellme_count() {
        $get_liked = '';
        $post_id = $_POST['post_id'];
        $get_liked = $this->Productfun->insert_tellme($post_id);
        if ($get_liked) {
            echo get_liked;
        } else {
            echo '';
        }
    }

    function browseCategory() {
        $data['categories'] = $this->Productfun->GetCategory();
        $d['browse'] = '1';
//        echo '<pre/>';
//        print_r($data);
        $this->load->view('common/header', $d);
        $this->load->view('home/browse_category', $data);
        $this->load->view('common/footer');
    }

    function viewCategory($id = '') {
        
        if(ctype_digit($id)!=1)
        {
            echo "xfvgfd";
            $this->load->view('common/header');
            $this->load->view('errors/error_page');
            $this->load->view('common/footer');
            
        }
    else {
            $this->load->library('facebook');

            $data = $this->Productfun->showPostByCatId($id);
            $this->load->helper('share');
            $this->load->view('common/header');
            $post = array();

            $post['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url(''),
                'scope' => array("email") // permissions here
            ));
            $post['auth'] = $this->client->createAuthUrl();
            if (!isset($this->session->userdata['User'])) {
                $post['logged_in'] = 0;
                $user_id='';
            }else {
                $sesdata = $this->session->userdata["User"];
                $user_id = $sesdata['c_id'];
            }

            foreach ($data as $result) {
                $li=$this->Productfun->likePostUser($result['post_id'],$user_id);
                if(!empty($li))
                {
                    $customer_id=$li['customer_id']; $liked=$li['liked'];
                }
                  else{ $customer_id=''; $liked=0;}
                $post['posts'][] = array(
                    'post_id' => $result['post_id'],
                    'customer_id'=>$customer_id,
                    'liked'=>$liked,
                    'fname' => $result['fname'],
                    'lname' => $result['lname'],
                    'category_id' => $result['category_id'],
                    'title' => $result['title'],
                    'description' => $result['description'],
                    'hyperlink' => $result['hyperlink'],
                    'status' => $result['title'],
                    'like_counter' => $result['like_counter'],
                    'share_counter' => $result['like_counter'],
                    'created_on' => $result['created_on'],
                    'modified_on' => $result['modified_on'],
                    'is_deleted' => $result['is_deleted'],
                    'image' => $this->Productfun->Show_all_images($result['post_id'])
                );
              if(!empty($user_id))
              $post['liked_user'][]=$this->Productfun->likePostUser($result['post_id'],$user_id);
            }

            $post['category'] = $this->Productfun->getCatDetailCatId($id);
            //print_r($post);die;
            $this->load->view('home/home', $post);

            $this->load->view('common/footer');
        }
    }

    function check_gallery_count() {
        $get_liked = '';
        $data = $this->input->post();
        $get_liked = $this->Productfun->insertGalleryliked($data);
        if ($get_liked) {
            echo get_liked;
        } else {
            echo '0';
        }
    }
    
    function privacy() {
        $this->load->view('common/header');
        $this->load->view('home/privacy');
        $this->load->view('common/footer');
    }

    function search() {
        $data = $this->input->post();
        $data = $this->Productfun->searchPost($data);
        $this->load->helper('share');

        $this->load->view('common/header');
        $post = array();

        $this->load->library('facebook');

        $post['login_url'] = $this->facebook->getLoginUrl(array(
            'redirect_uri' => site_url(''),
            'scope' => array("email") // permissions here
        ));
        $post['auth'] = $this->client->createAuthUrl();
        if (!isset($this->session->userdata['User'])) {
            $post['logged_in'] = 0;
            $user_id='';
        }else {
            $sesdata = $this->session->userdata["User"];
            $user_id = $sesdata['c_id'];
        }
        foreach ($data as $result) {
            $li=$this->Productfun->likePostUser($result['post_id'],$user_id);
            if(!empty($li))
            {
                $customer_id=$li['customer_id']; $liked=$li['liked'];
            }
                  else{ $customer_id=''; $liked=0;}
            $post['posts'][] = array(
                'post_id' => $result['post_id'],
                'customer_id'=>$customer_id,
                'liked'=>$liked,
                'fname' => $result['fname'],
                'lname' => $result['lname'],
                'category_id' => $result['category_id'],
                'title' => $result['title'],
                'description' => $result['description'],
                'hyperlink' => $result['hyperlink'],
                'status' => $result['title'],
                'like_counter' => $result['like_counter'],
                'share_counter' => $result['like_counter'],
                'created_on' => $result['created_on'],
                'modified_on' => $result['modified_on'],
                'is_deleted' => $result['is_deleted'],
                'image' => $this->Productfun->Show_all_images($result['post_id'])
            );
          if(!empty($user_id))
          $post['liked_user'][]=$this->Productfun->likePostUser($result['post_id'],$user_id);
        }


        $this->load->view('home/home', $post);
        $this->load->view('common/footer');
    }

}
