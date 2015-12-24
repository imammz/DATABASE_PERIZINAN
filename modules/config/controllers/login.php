<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends MX_Controller {

    function __construct() {
        parent::__construct();
         $this->load->library('encrypt_2015');
    }

    function index($wrong = false) {

        if ($this->session->userdata('login') == TRUE) {
            redirect('home');
        }
        
        if($wrong==TRUE) {
            echo "<script>alert('Username atau Password Anda Salah')</script>";
        }
        
        $data = array();
        $data['wrong'] = $wrong;
        $this->load->view('login_view', $data);
    }

    public function proccess() {

        $this->load->model("login_model");

        $this->output->enable_profiler(FALSE);

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if (!empty($username) || !empty($password)) {

            if ($this->login_model->check_user($username, $this->_encrypt_password_callback($password))) {
//            if ($this->login_model->check_user($username, $password)) {

                $query = $this->db->query("SELECT "
                        . "dp_m_user.username, "
                        . "dp_m_user.nama_lengkap, "
                        . "dp_m_user.NIP, "
                        . "dp_m_user.email, "
                        . "dp_m_user.path_image, "
                        . "dp_m_user.id_pejabat, "
                        . "dp_m_role.id_role as id_role, "
                        . "dp_m_role.role "
                        . "FROM dp_m_user left join dp_m_role "
                        . "ON(dp_m_user.id_role = dp_m_role.id_role ) WHERE username = '$username'  LIMIT 0, 1");

                $rs = $query->row_array();

                $data = array();
                $rs['login'] = TRUE;
                $data = $rs;

                $_SESSION['user'] = $data;
               //  print_r($_SESSION['user']); exit;
                redirect('home');
            } else {
                redirect('config/login/index/1');
            }
        } else {
            redirect('config/login/index');
        }
    }

    public function lockscreen() {
        $this->load->view('lockscreen_view');
    }

   
    
    private function _encrypt_password_callback($password) {
        $encrypt = new Encrypt_2015();
        $password = $encrypt->_base64_encrypt($password, $this->config->item('encryption_key'));
        return $password;
    }
    
     private function _decrypt_password_callback($password) {
        $encrypt = new Encrypt_2015();
        $password = $encrypt->_base64_decrypt($password, $this->config->item('encryption_key'));
        return $password;
    }

    function logout() {
        $this->session->set_userdata(array('login'=>false));
        $this->session->sess_destroy();
        redirect("config/login/index");
    }

    function r3g1st3r($username, $password, $id_role, $email, $nip) {

        $data = array();
        $data['username'] = $username;
        $data['password'] = $this->_encrypt_password_callback($password);
        $data['id_role'] = $id_role;
        $data['NIP'] = $nip;
        $data['email'] = $email;

        if ($this->db->insert('dp_m_user', $data)) {
            echo 'SUCCESS ENTRY NEW USER';
        } else {
            echo 'FAILED';
        }
    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
