<?php

class Laporan_persuratan extends MX_Controller {

    function __construct() {
        parent:: __construct();
        //$this->checkLogin();
        $this->load->model('persuratan_model');
    }

    public function index() {
        $this->output->enable_profiler(false);
       
        $data = array(
            'class' => 'persuratan',
            'menu' => 'laporan-persuratan'
        );
        $this->load->view('laporan_persuratan_view', $data);
    }
    
    
     public function proccess() {
         
         $this->output->enable_profiler(false);


        $data = array(
            'class' => 'laporan_persuratan',
            'menu' => 'proccess'
        );

       
        
        
        $this->load->view('laporan_proccess_view', $data);
         
         
     }   

}

?>