<?php

class Dpppju_model extends CI_Model {

    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }

    public function _loadReklameProses($id_permohonan = null) {
        $this->db->select('*');
        $this->db->select('b.id_permohonan,c.id_permohonan,d.nm_prov,e.nm_kab,f.nm_kec,g.nm_kel');
        $this->db->from('tbl_t_permohonan a');
        $this->db->join('tbl_t_pemohon b', 'a.id_permohonan = b.id_permohonan');
        $this->db->join('tbl_t_badan_usaha_reklame c', 'a.id_permohonan = c.id_permohonan','LEFT');
        $this->db->join('tbl_m_provinsi d', 'b.nm_prov = d.id_prov', 'LEFT');
        $this->db->join('tbl_m_kabupaten e', 'b.nm_kab = e.id_kabupaten', 'LEFT');
        $this->db->join('tbl_m_kecamatan f', 'b.nm_kec = f.id_kecamatan', 'LEFT');
        $this->db->join('tbl_m_kelurahan g', 'b.nm_kel = g.id_kelurahan', 'LEFT');
        $this->db->where('id_status_permohonan',6);
        $this->db->order_by('tgl_permohonan DESC');

        if ($id_permohonan == null) {
            $result = $this->db->get()->result_array();
        } else {
            $this->db->where('a.id_permohonan',$id_permohonan);
            $result = $this->db->get()->row_array();
        }
        
        return $result;
    }
    
    
    

}
