<?php

class Penerimaan_model extends CI_Model {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }
    
    public function _loadAll() {
        
        $query = $this->db->query("select * from arsip order by nomor_definitif ASC")->result_array();        
        return $query;         
    }
    
    public function _loadAllPembenahan() {
        
        $query = $this->db->query("select * from arsip_pembenahan order by id_arsip ASC")->result_array();        
        return $query;         
    }
    
    public function _loadExportPembenahan() {
        
        $query = $this->db->query("select * from arsip_pembenahan where status_export = 'N' order by id_arsip ASC")->result_array();        
        return $query;         
    }
    
    public function updateExportPembenahanById($id_arsip) {
        $data = array();
        $data['status_export'] = 'Y';        
        $this->db->update('arsip_pembenahan',$data,'id_arsip = "'.$id_arsip.'"');
    } 
    
    public function _getArsipById($id_arsip) {
            
            $query = $this->db->query("select * from arsip where id_arsip = '$id_arsip'")->row_array();        
            return $query;         
        }
    public function _getArsipByIdArray($id_arsip_array) {
            $this->db->group_by('id_arsip');	
            $this->db->order_by('id_arsip','ASC');
			   $this->db->select('nama_unit_kerja as unit_kerja, jra.kode_jra, jra.jenis_jra, id_arsip, nomor_definitif, uraian, kode_klasifikasi, nomor_folder, nomor_boks, nomor_lemari, nomor_ruang, nomor_depo');
			   $this->db->join('unit_kerja','unit_kerja.kode_unit_kerja = arsip.kode_unit_kerja');	            
			   $this->db->join('jra','jra.kode_jra = arsip.kode_jra');	            
            $this->db->where_in('id_arsip',$id_arsip_array);
            $result = $this->db->get('arsip')->result_array();        
            return $result;         
        }
    public function _getArsipPembenahanById($id_arsip) {
        
        $query = $this->db->query("select * from arsip_pembenahan where id_arsip = '$id_arsip'")->row_array();        
        return $query;         
    }
    
    public function _getAttachmentByIdArsip($id_arsip) {
        
        $query = $this->db->query("select * from arsip_attachments where id_arsip = '$id_arsip'")->result_array();        
        return $query;         
    }
    
}