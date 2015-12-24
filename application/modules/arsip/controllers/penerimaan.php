<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penerimaan extends MY_Controller {
	 
	 function __construct() {
			parent::__construct();
			$this->_checkLogin();
		   $this->load->model('penerimaan_model');
         $this->load->model('master/master_model');
		}
    
        public function index()
	{
            $data = array();
            $data['class'] = 'pemindahan';
            $data['function'] = 'penerimaan';
            
            $data['klasifikasi'] = $this->master_model->_loadKodeKlasifikasi();
            $data['jra'] = $this->master_model->_loadJRA();
            $data['unit_kerja'] = $this->master_model->_loadUnitKerja();
                      
            $this->load->view('penerimaan_view',$data);                
	}
        
        public function process($id = null) {
        
         $this->output->enable_profiler(FALSE);
        
         $data = array();
         $nomor_boks = explode('|', $this->input->post('nomor_boks', true));
            if (!empty($nomor_boks[0])) {
                $data['nomor_depo'] = $nomor_boks[0];
                $data['nomor_ruang'] = $nomor_boks[1];
                $data['nomor_lemari'] = $nomor_boks[2];
                $data['nomor_boks'] = $nomor_boks[3];
            }

            $data['nomor_folder'] = $this->input->post('nomor_folder', true);
            $data['status_pindah'] = 'Y';

            $data['update_by'] = $this->session->userdata('username');
            
        
        $result = $this->db->update('arsip',$data, 'id_arsip = ' . $id . '');
		  Master_model::logs('UPDATE',$id);
        
      
        if ($result)
            $ress['result'] = TRUE;
        else
            $ress['result' ] = FALSE;

			echo json_encode($ress);
			}

			public function detil($id_arsip) {
			$data = array();
			$data['id_arsip'] = $id_arsip;

        $data['arsip'] = $this->penerimaan_model->_getArsipById($id_arsip);
        $data['attachments'] = $this->penerimaan_model->_getAttachmentByIdArsip($id_arsip);
        
        $data['klasifikasi'] = $this->master_model->_loadKodeKlasifikasi();
        $data['jra'] = $this->master_model->_loadJRA();
        $data['unit_kerja'] = $this->master_model->_loadUnitKerja();
        $data['tingkat_perkembangan'] = $this->master_model->_loadTingkatPerkembangan();
        $data['kondisi_fisik'] = $this->master_model->_loadKondisiFisik();
        $data['media_simpan'] = $this->master_model->_loadMediaSimpan();
        $data['depo'] = $this->master_model->_loadLokasiDepo();
        
        $this->load->view('penerimaan_detil_view', $data);
            
        }
        
        public function pindah($id_arsip) {
            
        $data = array();
        $data['id_arsip'] = $id_arsip;

        $data['arsip'] = $this->penerimaan_model->_getArsipById($id_arsip);
        $data['attachments'] = $this->penerimaan_model->_getAttachmentByIdArsip($id_arsip);
        
        $data['klasifikasi'] = $this->master_model->_loadKodeKlasifikasi();
        $data['jra'] = $this->master_model->_loadJRA();
        $data['unit_kerja'] = $this->master_model->_loadUnitKerja();
        $data['tingkat_perkembangan'] = $this->master_model->_loadTingkatPerkembangan();
        $data['kondisi_fisik'] = $this->master_model->_loadKondisiFisik();
        $data['media_simpan'] = $this->master_model->_loadMediaSimpan();
        $data['depo'] = $this->master_model->_loadLokasiDepo();
        
        $this->load->view('penerimaan_pindah_view', $data);
            
        }
        
        
        public function load() {
             /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('id_arsip', 'nomor_definitif', 'kode_klasifikasi','kurun_waktu_awal', 'kurun_waktu_akhir', 'uraian', 'tingkat_perkembangan', 'jumlah_berkas');
           
        // DB table to use
        $sTable = 'arsip';
        $this->db->where('status_pindah = "Y"');
		  if($this->session->userdata('id_role')!=1) {
				$this->db->where('kode_unit_kerja',$this->session->userdata('kode_unit_kerja'));
			}
        $this->db->order_by('id_arsip','DESC');
        
        // Paging
        if(isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1')
        {
            $this->db->limit($this->db->escape_str($_GET['iDisplayLength']), $this->db->escape_str($_GET['iDisplayStart']));
        }
        
        // Ordering
        if(isset($_GET['iSortCol_0']))
        {
            for($i=0; $i<intval($_GET['iSortingCols']); $i++)
            {
                if($_GET['bSortable_'.intval($_GET['iSortCol_'.$i])] == 'true')
                {
                   
                   $this->db->order_by($aColumns[intval($this->db->escape_str($_GET['iSortCol_'.$i]))], $this->db->escape_str($_GET['sSortDir_'.$i]));
                   
                }
              
            }
        }
        
        // Individual column filtering
        if(isset($_GET['sSearch']) && !empty($_GET['sSearch']))
        {
            for($i=0; $i<count($aColumns); $i++)
            {
                if(isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == 'true')
                {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($_GET['sSearch']));
                }
            }
        }
        
        // Select data
        $this->db->select('SQL_CALC_FOUND_ROWS '.str_replace(' , ', ' ', implode(', ', $aColumns)), false);
     
        $rResult = $this->db->get($sTable);

        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length
        $iTotal = $this->db->count_all($sTable);

        // Output
        $output = array(
            'sEcho' => intval($_GET['sEcho']),
            'iTotalRecords' => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData' => array()
        );
        
        $final = array();
        
        foreach($rResult->result_array() as $aRow)
        {
            $row = array();
            
            foreach($aColumns as $col)
            {
                $row[$col] = $aRow[$col];
            }

            $final[] = $row;
        }
        
            $items = array();
            $no = 1;
         foreach($final as $row) {
           
                
            $items[] = array(
                $no,
                $row['kode_klasifikasi'],
                $row['nomor_definitif'],
                ''.$row['kurun_waktu_awal'].' - '.$row['kurun_waktu_akhir'],
                ''.$row['uraian'].'',
                ''.$row['tingkat_perkembangan'].'',
                ''.$row['jumlah_berkas'].'',
                '<a href="#" role="button" onclick="formDetilPenerimaan('.$row['id_arsip'].');" class="btn btn-default" data-toggle="modal"> Detail </a>',
                '<a class="btn btn-info" href="#" onclick="formPemindahan('.$row['id_arsip'].')" data-toggle="modal"><i class="fa fa-share"></i></a>'
                
                );
            $no++;
        }

        $output['aaData'] = $items;
        
        echo json_encode($output);
        }
	

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */