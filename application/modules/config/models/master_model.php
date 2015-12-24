<?php

class Master_model extends CI_Model {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    
    public function _loadKodeKlasifikasi() {
        
        $query = $this->db->query("select kode_klasifikasi, nama_klasifikasi from klasifikasi order by kode_klasifikasi ASC")->result_array();        
        return $query;         
    }
    
    public function _loadJRA() {
        
        $query = $this->db->query("select id_jra, kode_jra, jenis_jra, retensi_aktif_note, retensi_inaktif_note, status_akhir from jra order by id_jra ASC")->result_array();          
        return $query;         
    }
    
    public function _getJRA($kode_jra) {
        
        $query = $this->db->query("select kode_jra, kode_jra, jenis_jra, retensi_aktif_note, retensi_inaktif_note, status_akhir from jra where kode_jra = '$kode_jra' order by id_jra ASC")->row_array();           
        
        return $query;         
    }
    
    public function _loadUnitKerja() {
       
		 if($this->session->userdata('id_role')!=1) {
		$query = $this->db->query("select kode_unit_kerja, nama_unit_kerja from unit_kerja where kode_unit_kerja = '".$this->session->userdata('kode_unit_kerja')."' order by urut ASC")->result_array(); 
			} 
else {
	$query = $this->db->query("select kode_unit_kerja, nama_unit_kerja from unit_kerja where level_unit_kerja = 1  order by urut ASC")->result_array(); 
}
        $result = array();
        
        foreach($query as $row) {
            $query2 = $this->db->query("select kode_unit_kerja, nama_unit_kerja from unit_kerja where parent_unit_kerja = '{$row['kode_unit_kerja']}'  order by urut ASC")->result_array();       
        
            $result[] = $row; //parent
           foreach($query2 as $row2) {
            $result[] = $row2; //child 
           }
        }
    
        return $result;         
    }
    
    
     public function _loadAllUnitKerja() {
        
        $result = $this->db->query("select kode_unit_kerja, nama_unit_kerja from unit_kerja order by id_unit_kerja ASC")->result_array();        
        
        return $result;         
    }
    
    
     public function _loadTingkatPerkembangan() {
        
        $query = $this->db->query("select id_tingkat_perkembangan, tingkat_perkembangan, keterangan from ref_tingkat_perkembangan order by id_tingkat_perkembangan ASC")->result_array();            
        return $query;         
    }
     public function _loadKondisiFisik() {
        
        $query = $this->db->query("select id_kondisi_fisik, kondisi_fisik, keterangan from ref_kondisi_fisik order by id_kondisi_fisik ASC")->result_array();         
        return $query;         
    }
     public function _loadMediaSimpan() {
        
        $query = $this->db->query("select id_media_simpan, media_simpan, keterangan from ref_media_simpan order by id_media_simpan ASC")->result_array();          
        return $query;         
    }
     
    public function _loadFileTypeLampiran() {        
        $query = $this->db->query("select id_file_type, file_type, keterangan from ref_file_type_lampiran order by id_file_type ASC")->result_array();            
        return $query;         
    }
    public function _loadLokasiDepo() {        
        $query = $this->db->query("select id_depo, nomor_depo, nama_depo, kapasitas_ruang, keterangan from lokasi_simpan_depo order by nomor_depo ASC")->result_array();           
        return $query;         
    }
    public function _loadLokasiRuang() {        
        $query = $this->db->query("select id_ruang, nomor_ruang, kapasitas_lemari, deskripsi_ruang, nomor_depo from lokasi_simpan_ruang order by nomor_ruang ASC")->result_array();            
        return $query;         
    }
    public function _loadLokasiLemari() {        
        $query = $this->db->query("select id_lemari, nomor_ruang, kapasitas_lemari, deskripsi_ruang, nomor_depo from lokasi_simpan_ruang order by nomor_ruang ASC")->result_array();            
        return $query;         
    }
    public function _loadLokasiBoks() {        
        $query = $this->db->query("select id_boks, nomor_boks, kapasitas_arsip, deskripsi_boks, nomor_lemari, nomor_ruang from lokasi_simpan_boks order by nomor_ruang ASC, nomor_lemari ASC, nomor_boks ASC")->result_array();            
        return $query;         
    }
    public function _loadLokasiRuangByDepo($nomor_depo) {        
        $query = $this->db->query("select id_ruang, nomor_ruang, nomor_depo, kapasitas_lemari, deskripsi_ruang from lokasi_simpan_ruang where nomor_depo = '$nomor_depo' order by nomor_depo ASC, nomor_ruang ASC")->result_array();            
        return $query;         
    }
    public function _loadLokasiLemariByRuang($nomor_depo,$nomor_ruang) {        
        $query = $this->db->query("select id_lemari, nomor_lemari, kapasitas_boks, deskripsi_lemari, nomor_ruang, nomor_depo from lokasi_simpan_lemari where nomor_depo = '$nomor_depo' AND nomor_ruang = '$nomor_ruang' order by nomor_depo ASC, nomor_ruang ASC, nomor_lemari ASC")->result_array();            
        return $query;         
    }
    public function _loadLokasiBoksByLemari($nomor_depo,$nomor_ruang,$nomor_lemari) {        
        $query = $this->db->query("select id_boks, nomor_boks, kapasitas_arsip, deskripsi_boks, nomor_lemari, nomor_ruang, nomor_depo from lokasi_simpan_boks where nomor_depo = '$nomor_depo' AND nomor_ruang = '$nomor_ruang' AND nomor_lemari = '$nomor_lemari' order by nomor_depo ASC, nomor_ruang ASC, nomor_lemari ASC")->result_array();            
        return $query;         
    }
    public function _loadLokasiBoksByRuangan($nomor_ruangan) {        
        $query = $this->db->query("select id_boks, nomor_boks, kapasitas_arsip, deskripsi_boks, nomor_lemari, nomor_ruang, nomor_depo from lokasi_simpan_boks where nomor_ruang = '$nomor_ruangan' order by nomor_ruang ASC, nomor_lemari ASC, nomor_boks ASC")->result_array();            
        return $query;         
    }
    
    public function _loadMenuByIdRole($id_role) {
        $query = $this->db->query("select * from v_menu_role where id_role = '$id_role' AND parent = 0")->result_array();
        return $query;
    }   
    
    public function _loadSubmenu($id_role,$id_menu) {
        $query = $this->db->query("select * from v_menu_role where id_role = '$id_role' AND parent = '$id_menu'")->result_array();
        return $query;
    }   
    
	 public function _getBackground() {
	 	 $query = $this->db->query("select background from m_applikasi")->row_array();
        return $query['background'];
	 }
	 
	 public function _getRunningText() {
	 	 $query = $this->db->query("select running_text from m_applikasi")->row_array();
        return $query['running_text'];
	 }
	 
	 public function _getRunningTextLogin() {
	 	 $query = $this->db->query("select running_text_login from m_applikasi")->row_array();
        return $query['running_text_login'];
	 }
	 
	 public function _countUsulPindah() {
	 	$this->load->model("penyusutan/penyusutan_model");
		$arsip = penyusutan_model:: _loadArsipUsulPindah();
		return count($arsip);
	 }
  	 
	 public function _countUsulMusnah() {
	 	$this->load->model("penyusutan/penyusutan_model");
		$arsip = penyusutan_model:: _loadArsipUsulMusnah();
		return count($arsip);
	 }
	 
	 public function _countUsulSerah() {
	 	$this->load->model("penyusutan/penyusutan_model");
		$arsip = penyusutan_model:: _loadArsipUsulSerah();
		return count($arsip);
	 }	 
	 
	 public function _getNamaLengkapByUsername($username) {
		$this->db->select('nama_lengkap');
		$this->db->where('username ',$username);
		$result = $this->db->get('m_user')->row_array();
		
		if(!empty($result['nama_lengkap'])) {
		return $result['nama_lengkap']; }
		else {
			return '-';
		}
	}
	 
	 public function logs($action_type,$id_arsip = 0) {
	 		$action_by = $this->session->userdata('username');
			
			if($id_arsip==0) {
				$get = $this->db->query("select max(id_arsip) as maks from arsip")->row_array();
				$id_arsip = $get['maks'];
			}
			
			$data = array();
			$data['action_type'] = $action_type; 
			$data['action_by'] = $action_by; 
			$data['id_arsip'] = $id_arsip;
			
			$this->db->insert('m_logs',$data); 
	 	
	 }
	 
	 public function _getPathImage($username) {
	 	 $this->db->select('path_image');
		 $path = $this->db->get('m_user')->row_array();
		 
		 return $path['path_image'];
		 
	 }
  	
    
}