<?php

class Skpd extends MX_Controller
{
    function __construct()
    {
        parent:: __construct();
        //$this->checkLogin();
    }

    public function index()
    {
        $this->output->enable_profiler(false);



        $data = array(
            'class' => 'skpd',
            'menu' => 'prosesrekom'
        );
        $this->load->view('skpd_view',$data);
    }

  
}
?>