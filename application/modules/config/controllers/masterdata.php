<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Masterdata extends MY_Controller {
     
	  function __construct() {
			parent::__construct();
			$this->_checkLogin();
			$this->load->model('master_model');
			//$this->load->library('grocery_CRUD');
		}
    
    
	public function index()
	{
            $data = array();
            $data['class'] = 'home';
            $data['function'] = 'index';            
            $this->load->view('masterdata_view',$data);
	}
	
	
	public function _example_output($output = null)
	{
		$this->load->view('grocery_view',$output);
	}
    
	 
    public function klasifikasi()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('klasifikasi');
		$crud->columns('kode_klasifikasi', 'nama_klasifikasi', 'deskripsi_klasifikasi');
		$crud->display_as('kode_klasifikasi', 'Kode Klasifikasi')
			 ->display_as('nama_klasifikasi', 'Nama Klasifikasi')
			 ->display_as('deskripsi_klasifikasi', 'Deskripsi Klasifikasi');
		$crud->set_subject('Klasifikasi');
	
		$output = $crud->render();

		$this->_example_output($output);                     
	}
    
    public function unit_kerja()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('unit_kerja');
		$crud->columns('kode_unit_kerja', 'nama_unit_kerja', 'deskripsi_unit_kerja');
		$crud->display_as('kode_unit_kerja', 'Kode Unit Kerja')
			 ->display_as('nama_unit_kerja', 'Nama Unit Kerja')
			 ->display_as('deskripsi_unit_kerja', 'Keterangan Unit Kerja');
		$crud->set_subject('Unit Kerja');

		$output = $crud->render();

		$this->_example_output($output);
	}
    
    public function tingkat_perkembangan()
    {
        $crud = new Grocery_CRUD();
        
        $crud->set_table('ref_tingkat_perkembangan');
        $crud->columns('tingkat_perkembangan','keterangan');
        $crud->display_as('tingkat_perkembangan','Tingkat Perkembangan')
             ->display_as('keterangan','Keterangan');
        $crud->set_subject('Ref Tingkat Perkembangan');
        
        $output = $crud->render();
        
        $this->_example_output($output);                 
    }
    
    public function kondisi_fisik()
    {
        $crud = new Grocery_CRUD();
        
        $crud->set_table('ref_kondisi_fisik');
        $crud->columns('kondisi_fisik','keterangan');
        $crud->display_as('kondisi_fisik','Kondisi Fisik')
             ->display_as('keterangan','Keterangan');
        $crud->set_subject('Kondisi Fisik');
        
        $output = $crud->render();
        
        $this->_example_output($output);                 
    }
    
    public function jra()
    {
        $crud = new Grocery_CRUD();
        
        $crud->set_table('jra');
        $crud->columns('kode_jra','jenis_jra','status_akhir');
        $crud->display_as('kode_jra','Kode JRA')
             ->display_as('jenis_jra','Jenis')
             ->display_as('status_akhir','Status Akhir');                 
        $crud->set_subject('JRA');
        
        $output = $crud->render();
        $this->_example_output($output);
            
    }
    
    public function media_simpan()
    {
        $crud = new Grocery_CRUD();
        
        $crud->set_table('ref_media_simpan');
        $crud->columns('media_simpan','keterangan');
        $crud->display_as('media_simpan','Media Simpan')
             ->display_as('keterangan','Keterangan');             
        $crud->set_subject('Media Simpan');
        
        $output = $crud->render();   
        
        $this->_example_output($output);
    }
    
    public function file_type_lampiran()
    {
        $crud = new Grocery_CRUD();
        
        $crud->set_table('ref_file_type_lampiran');
        $crud->columns('file_type','keterangan');
        $crud->display_as('file_type','Tipe File')
             ->display_as('keterangan','Keterangan');
        $crud->set_subject('File Type Lampiran');
        
        $output = $crud->render();
        
        $this->_example_output($output);
    }
    
    public function lokasi_simpan_depo()
    {
        $crud = new Grocery_CRUD();
        
        $crud->set_table('lokasi_simpan_depo');
        $crud->columns('nomor_depo','nama_depo','kapasitas_ruang','keterangan');
        $crud->display_as('nomor_depo','Nomor Depo')
             ->display_as('nama_depo','Nama Depo')
             ->display_as('kapasitas_ruang','Kapasitas Ruang')
             ->display_as('keterangan','Keterangan');
        $crud->set_subject('Lokasi Simpan');
        
        $output = $crud->render();
        
        $this->_example_output($output);
    }
    
    public function lokasi_simpan_ruang()
    {
        $crud = new Grocery_CRUD();

        $crud->set_table('lokasi_simpan_ruang');
        $crud->columns('nomor_ruang','kapasitas_lemari','deskripsi_ruang','nomor_depo');
        $crud->display_as('nomor_ruang','Nomor Ruang')
             ->display_as('kapasitas_lemari','Kapasitas Lemari')
             ->display_as('deskripsi_ruang','Deskripsi Ruang')
             ->display_as('nomor_depo','Nomor Depo');
        $crud->set_subject('Lokasi Simpan Ruang');
		$crud->set_primary_key('nomor_depo','lokasi_simpan_depo');
        $crud->set_relation('nomor_depo','lokasi_simpan_depo','nomor_depo');
        
        $output = $crud->render();
        
        $this->_example_output($output);
    }
    
    public function lokasi_simpan_lemari()
    {
        $crud = new Grocery_CRUD();

        $crud->set_table('lokasi_simpan_lemari');
        $crud->columns('nomor_lemari','kapasitas_books','deskripsi_lemari','nomor_ruang');
        $crud->display_as('nomor_lemari','Nomor Lemari')
             ->display_as('nomor_depo','Nomor Depo')
             ->display_as('kapasitas_books','Kapasitas Books')
             ->display_as('deskripsi_lemari','Deskripsi Lemari')
             ->display_as('nomor_ruang','Nomor Ruang');
        $crud->set_subject('Lokasi Simpan Ruang');
		$crud->set_primary_key('nomor_ruang','lokasi_simpan_ruang');
        $crud->set_relation('nomor_ruang','lokasi_simpan_ruang','nomor_ruang');
        
        $output = $crud->render();
        
        $this->_example_output($output);
    }
    
    public function lokasi_simpan_boks()
    {
        $crud = new Grocery_CRUD();

        $crud->set_table('lokasi_simpan_boks');
        $crud->columns('nomor_boks','kapasitas_arsip','deskripsi_boks','nomor_lemari','nomor_ruang');
        $crud->display_as('nomor_boks','Nomor Boks')
             ->display_as('kapasitas_arsip','Kapasitas Arsip')
             ->display_as('deskripsi_boks','Deskripsi Boks')
             ->display_as('nomor_lemari','Nomor Lemari')
             ->display_as('nomor_ruang','Nomor Ruang');
        $crud->set_subject('Lokasi Simpan Boks');
		$crud->set_primary_key('nomor_lemari','lokasi_simpan_lemari');
		$crud->set_primary_key('nomor_ruang','lokasi_simpan_ruang');
        $crud->set_relation('nomor_lemari','lokasi_simpan_lemari','nomor_lemari')
             ->set_relation('nomor_ruang','lokasi_simpan_ruang','nomor_ruang');
        
        $output = $crud->render();
        
        $this->_example_output($output);
    }
	
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */