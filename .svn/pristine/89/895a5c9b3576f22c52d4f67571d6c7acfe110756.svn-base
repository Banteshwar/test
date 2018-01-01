<?php

class Customerfun extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert_customer($data) {
        $this->load->database();
        return $this->db->insert('customer', $data);
    }

    public function check_email($email_address) {
        $this->load->database();
        $check_for_email = "SELECT * FROM customer WHERE `email`= '" . $email_address . "' ";
        $result = $this->db->query($check_for_email);
        if ($result->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function update_customer($c_id, $categories) {
        $this->load->database();
        $current_date = date('Y-m-d h:i:s a', time());
        $update_customer = $this->db->query("update customer set selected_categories='" . $categories . "' , updated_on='" . $current_date . "' ") or die("problem in updation");
    }

    function sendEmail($to_email) {
        $from_email = 'bunty84singh@gmail.com';
        $subject = 'Welcome to ATGO';
        $message = 'Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> ' . base_url() . 'customer/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />' . base_url();

        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.totalmailings.com'; //smtp host name
        $config['smtp_port'] = '25'; //smtp port number
        $config['smtp_user'] = 'rajan';
        $config['smtp_pass'] = 'r@j@n$$0k'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes

        $this->email->initialize($config);
        $this->email->from($from_email, 'Mydomain');
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
}

?>