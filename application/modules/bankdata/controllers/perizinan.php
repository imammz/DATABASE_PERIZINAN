<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Perizinan extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->checkLogin();
        $this->load->model('bankdata_model');
    }

    public function index() {

        $this->output->enable_profiler(FALSE);

        $this->_checkMessage();

        $data = array(
            'class' => 'bankdata',
            'menu' => 'perizinan'
        );



        $this->load->view('perizinan_view', $data);
    }

    
      public function data() {
        $this->output->enable_profiler(false);

        $data = array(
            'class' => 'bankdata',
            'menu' => 'perizinan'
        );

        $this->load->view('perizinan_data_view', $data);
    }
    

}

/* End of file login.php */
	/* Location: ./application/controllers/login.php */
