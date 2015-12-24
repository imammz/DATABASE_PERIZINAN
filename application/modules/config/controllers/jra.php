<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jra extends MY_Controller {

	 function __construct() {
			parent::__construct();
			$this->_checkLogin();
			$this->load->model('master/master_model');
		}
    
        public function index()
	{
            $data = array();
            $data['class'] = 'pemindahan';
            $data['function'] = 'entry';            
            $data['klasifikasi'] = $this->master_model->_loadKodeKlasifikasi();
            $data['jra'] = $this->master_model->_loadJRA();
            $data['unit_kerja'] = $this->master_model->_loadUnitKerja();
            $data['tingkat_perkembangan'] = $this->master_model->_loadTingkatPerkembangan();
            $data['kondisi_fisik'] = $this->master_model->_loadKondisiFisik();
            $data['media_simpan'] = $this->master_model->_loadMediaSimpan();
                      
            $this->load->view('entry_data_view',$data);                
	}
        
        public function process($action,$id = null) {
                       
        }
        
        public function detil($id) {
            
                    
        }
        
        
        public function get_jra() {
            
            $kode_jra = $this->input->post('kode_jra',true);
            $kurun_waktu_awal = $this->input->post('kurun_waktu_awal',true);
            
            $jra = array();
            $jra['result'] = FALSE;
            
            $jra = $this->master_model->_getJRA($kode_jra);                      
            
            if(!empty($jra))  {
            $jra['result'] = TRUE;            
            $jra['tahun_musnah'] = '-';
            
            if($jra['status_akhir']=='Musnah')
            $jra['tahun_musnah'] = $kurun_waktu_awal+$jra['retensi_aktif_note']+$jra['retensi_inaktif_note'];            
            
            }
            
            
            echo  json_encode($jra);
        }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */