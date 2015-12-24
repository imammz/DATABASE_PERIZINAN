<?php

class Persuratan extends MX_Controller
{
    function __construct()
    {
        parent:: __construct();
        //$this->checkLogin();
        $this->load->model('persuratan_model');
    }
    
    public function index()
	{
        $this->output->enable_profiler(false);

        $data = array(
            'class' => 'persuratan',
            'menu' => 'index'
        );
      
	}
        
   
    
        

    public function surat_lainya() {
        $this->output->enable_profiler(false);

        $data = array(
            'class' => 'persuratan',
            'menu' => 'surat-lainya'
        );
        $this->load->view('surat_lainya', $data);
    }
}

?>