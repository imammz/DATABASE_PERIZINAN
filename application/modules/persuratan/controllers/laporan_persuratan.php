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
    
    
     public function search() {
        
        $this->output->enable_profiler(false);
        $search = $this->persuratan_model->search_surat(); 

        $data = array(
            'class' => 'persuratan',
            'menu' => 'laporan-persuratan',
            'surat' => $search->result_array()
        );

       
        $this->load->view('laporan_persuratan_view', $data);
         
     }

     public function view() {

        $this->output->enable_profiler(false);
        if($this->input->post('prosess')=='pdf'){
            $this->persuratan_model->print_pdf(); 
        }else{
            $this->persuratan_model->print_excel(); 
        }

     }   

}

?>