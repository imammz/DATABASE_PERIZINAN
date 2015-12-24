<?php

class Arsip extends MX_Controller
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
            'class' => 'arsip',
            'menu' => 'pertahun'
        );
        $this->load->view('pertahun',$data);
    }

}
?>