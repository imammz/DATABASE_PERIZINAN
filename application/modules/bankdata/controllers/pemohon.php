<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Pemohon extends MX_Controller {

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
            'menu' => 'pemohon'
        );



        $this->load->view('pemohon_view', $data);
    }

    public function data() {
        $this->load->library('grocery_CRUD');

        $crud = new grocery_CRUD();

        $crud->set_table('tbl_t_pemohon');
        $crud->set_subject('Pemohon');
        $crud->unset_add();
        $crud->unset_edit();
        $crud->unset_delete();
        
        $crud->unset_columns('id_permohonan','id_pemohon','tmpt_lahir','tgl_lahir','id_pekerjaan','no_hp','email','kewarganegaraan','id_kelurahan');
        
        
        $crud->set_relation('nm_prov','tbl_m_provinsi','nm_prov');
        $crud->set_relation('nm_kab','tbl_m_kabupaten','nm_kab');
        $crud->set_relation('nm_kec','tbl_m_kecamatan','nm_kec');
        $crud->set_relation('nm_kel','tbl_m_kelurahan','nm_kel');
        
        $output = $crud->render();

        $this->_example_output($output);
    }

    public function _example_output($output = null) {

        $this->load->view('grocery_view', $output);
    }

}

/* End of file login.php */
	/* Location: ./application/controllers/login.php */
