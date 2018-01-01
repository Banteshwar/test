<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
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
        redirect('home');
    }

    public function login() {
        $this->session->unset_userdata('User'); // Destroy session  since login option dont appear unless user has logged out.
        
        $data['no_msg'] = '';
        
        $this->load->view('common/header');
        $this->load->library(array('session', 'form_validation', 'email'));
        
        //Login URL variable initialised to be sent on front end
        $this->load->library('facebook');
        $data['login_url'] = $this->facebook->getLoginUrl(array(
            'redirect_uri' => site_url('Customer/fbLogin'),
            'scope' => array("email") // permissions here
        ));
        //Login URL variable initialised to be sent on front end
        
        $data['auth'] = $this->client->createAuthUrl();
        
        // Website Login start 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->form_validation->set_rules('c_email', 'Email-id', 'trim|required|valid_email');
            $this->form_validation->set_rules('c_password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) {                
            } else {
                $c_email = $this->input->post('c_email');
                $c_password = md5($this->input->post('c_password'));

                $c_query = $this->db->query("select * from customer where email='" . $c_email . "' and password ='" . $c_password . "' and verified='1' and status='1'");
                if ($c_query->num_rows() > 0) {
                    $c_result = $c_query->result_array();
                    $c_session['User'] = array(
                        'c_id' => $c_result[0]['user_id'],
                        'c_name' => $c_result[0]['first_name'] . ' ' . $c_result[0]['last_name'],
                        'c_email' => $c_result[0]['email'],
                        'c_logged_in' => TRUE
                    );
                    $this->session->set_userdata($c_session);                    
                    redirect('home');
                } else {
                    $data['no_msg'] = "user not found";
                }
            }
        }
        // Website Login End
        
        $this->load->view('login', $data);
        $this->load->view('common/footer');
    }
    
    public function fbLogin() {
        $this->session->unset_userdata('User'); // Destroy session  since login option dont appear unless user has logged out.
        $this->load->library('facebook');
        
        $user = $this->facebook->getUser();
        if ($user) {
            try {
                $user_profile = $this->facebook->api('/me');
                $c_session['User'] = array(
                        'c_id' => $user_profile['id'],
                        'c_name' => $user_profile['name'],
                        'c_fbLogIn' => TRUE,
                        'c_logged_in' => TRUE
                    );

                    $this->session->set_userdata($c_session);
                    redirect('home');                
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }
        else {
            redirect('Customer/login');
        }
    }
    
    public function googleLoginSubmit() {
        $this->session->unset_userdata('User'); // Destroy session  since login option dont appear unless user has logged out.
        $this->input->get('code');
        $this->client->authenticate();
        $data1 = $this->client->getAccessToken();
        $data[] = $this->oauth2->userinfo->get();
        
        
        if($data)
        {
            $c_session['User'] = array(
            'c_id' => $data[0]['id'],
            'c_name' => $data[0]['given_name'],
            'c_email' => $data[0]['email'],
            'c_logged_in' => TRUE
            );
            $this->session->set_userdata($c_session);
            redirect('home', 'refresh');
        }
        else
        {
            redirect('Customer/login');
        }
    }
    
    public function loginAjax() {
        
            $c_email = $this->input->post('c_email');
            $c_password = md5($this->input->post('c_password'));

            $c_query = $this->db->query("select * from customer where email='" . $c_email . "' and password ='" . $c_password . "' and verified='1' and status='1'");
            if ($c_query->num_rows() > 0) {
                $c_result = $c_query->result_array();
                $c_session['User'] = array(
                    'c_id' => $c_result[0]['user_id'],
                    'c_name' => $c_result[0]['first_name'] . ' ' . $c_result[0]['last_name'],
                    'c_email' => $c_result[0]['email'],
                    'c_logged_in' => TRUE
                );
                echo 'yes';
                $this->session->set_userdata($c_session);
            } else {
                echo 'no';
                $data['no_msg'] = "user not found";
            }
    }

    public function registration() {
        $this->session->unset_userdata('c_id');
        $this->session->unset_userdata('c_name');
        $this->session->unset_userdata('c_email');
        $this->session->unset_userdata('c_logged_in');
        $this->load->view('common/header');
        $this->load->model('customerfun');
        $data['no_msg'] = '';
        $this->load->library(array('session', 'form_validation', 'email'));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //set validation rules
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|alpha|min_length[3]|max_length[30]');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|alpha|min_length[3]|max_length[30]');
            $this->form_validation->set_rules('user_email', 'Email ID', 'trim|required|valid_email|is_unique[customer.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                
            } else {
                $current_date = date('Y-m-d h:i:s a', time());
                $ins_data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'email' => $this->input->post('user_email'),
                    'password' => md5(trim($this->input->post('password'))),
                    'created_on' => $current_date,
                    'verified' => '1'
                );
                $ins_customer = $this->customerfun->insert_customer($ins_data);
                $val = $this->customerfun->sendEmail($this->input->post('user_email'));
                redirect('home');
            }
        }
        $this->load->view('registration', $data);
        $this->load->view('common/footer');
    }

    public function logout() {
        $this->session->unset_userdata('User');
        redirect('home', 'refresh');
    }

}
