<?php
	if(!defined('BASEPATH'))
		exit('No direct script access allowed');
	class Pencarian extends MY_Controller {

		function __construct() {
			parent::__construct();
			//$this->_checkLogin();
		   $this->load->model('penerimaan_model');
         $this->load->model('master/master_model');
		}

		public function index() {
			$data = array();
			$data['class'] = 'pemindahan';
			$data['function'] = 'pencarian';
			$data['klasifikasi'] = $this->master_model->_loadKodeKlasifikasi();
			$data['unit_kerja'] = $this->master_model->_loadUnitKerja();
			$data['tingkat_perkembangan'] = $this->master_model->_loadTingkatPerkembangan();
			$data['kondisi_fisik'] = $this->master_model->_loadKondisiFisik();
			$data['media_simpan'] = $this->master_model->_loadMediaSimpan();
			$data['depo'] = $this->master_model->_loadLokasiDepo();
			$data['ruang'] = $this->master_model->_loadLokasiRuang();
			$data['boks'] = $this->master_model->_loadLokasiBoks();
			$status_arsip = array();
			$status_arsip[] = array('status'=>'status_pindah','title'=>'Arsip Simpan');
			$status_arsip[] = array('status'=>'status_pinjam','title'=>'Arsip Dipinjam');
			$status_arsip[] = array('status'=>'status_musnah','title'=>'Arsip Musnah');
			$status_arsip[] = array('status'=>'status_serah','title'=>'Arsip Serah');
			$data['status_arsip'] = $status_arsip;
			$this->load->view('pencarian_view',$data);
		}

		public function result() {
			$this->output->enable_profiler(FALSE);
			$data = array();
			$data['status_arsip'] = $this->input->post('status_arsip',true);
			$data['kode_klasifikasi'] = $this->input->post('kode_klasifikasi',true);
			$data['kode_jra'] = $this->input->post('kode_jra',true);
			$data['kode_unit_kerja'] = $this->input->post('kode_unit_kerja',true);
			$data['uraian'] = $this->input->post('uraian',true);
			$data['kurun_waktu_awal'] = $this->input->post('kurun_waktu_awal',true);
			$data['kurun_waktu_akhir'] = $this->input->post('kurun_waktu_akhir',true);
			$data['nomor_depo'] = $this->input->post('nomor_depo',true);
			$data['nomor_ruang'] = $this->input->post('nomor_ruang',true);
			$data['nomor_lemari'] = $this->input->post('nomor_lemari',true);
			$data['nomor_boks'] = $this->input->post('nomor_boks',true);
			$data['nomor_folder'] = $this->input->post('nomor_folder',true);
			
                        
                        
                        if(!empty($data['status_arsip'])) {
				$this->db->where($data['status_arsip'],'Y');
			}
			if(!empty($data['kode_klasifikasi'])) {
				$this->db->where('kode_klasifikasi',$data['kode_klasifikasi']);
			}
			if(!empty($data['kode_jra'])) {
				$this->db->where('kode_jra',$data['kode_jra']);
			}
			if(!empty($data['kode_unit_kerja'])) {
				$this->db->where('arsip.kode_unit_kerja',$data['kode_unit_kerja']);
			}
			if(!empty($data['kurun_waktu_awal'])) {
				$this->db->where('kurun_waktu_awal >=',$data['kurun_waktu_awal']);
			}
			if(!empty($data['kurun_waktu_akhir'])) {
				$this->db->where('kurun_waktu_awal <=',$data['kurun_waktu_akhir']);
			}
			if(!empty($data['nomor_depo'])) {
				$this->db->where('nomor_depo',$data['nomor_depo']);
			}
			if(!empty($data['nomor_ruang'])) {
				$this->db->where('nomor_ruang',$data['nomor_ruang']);
			}
			if(!empty($data['nomor_lemari'])) {
				$this->db->where('nomor_lemari',$data['nomor_lemari']);
			}
			if(!empty($data['nomor_boks'])) {
				$this->db->where('nomor_boks',$data['nomor_boks']);
			}
			if(!empty($data['nomor_folder'])) {
				$this->db->like('nomor_folder',$data['nomor_folder']);
			}
			if(!empty($data['uraian'])) {
				$this->db->like('uraian',$data['uraian']);
			}
			$this->db->order_by('id_arsip','ASC');
			$this->db->select('nama_unit_kerja as unit_kerja, id_arsip, nomor_definitif, uraian, kode_klasifikasi');
			$this->db->join('unit_kerja','unit_kerja.kode_unit_kerja = arsip.kode_unit_kerja');
			$result = $this->db->get('arsip')->result_array();
			// print_r($result);
			$data = array();
			$data['class'] = 'pemindahan';
			$data['function'] = 'pencarian';
			$data['result'] = $result;
			$data['count'] = count($result);
			$this->load->view('pencarian_result_view',$data);
		}

	}


	/* End of file login.php */
	/* Location: ./application/controllers/login.php */
