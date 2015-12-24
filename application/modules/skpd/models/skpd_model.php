<?php

class Skpd_model extends  CI_Model {
	/**
	 * Constructor
	 */
	function __construct()
         {
            parent::__construct();
         }
         
         
         public function _getPermohonanImb($id_permohonan) {
             $permohonan = array();
                     
                foreach($this->orm->tbl_t_permohonan->where('id_permohonan',$id_permohonan) as $row_permohonan) {
                    $row_permohonan['pemohon'] = $this->orm->tbl_t_pemohon->where('id_permohonan',$row_permohonan['id_permohonan'])->fetch();
                    $row_permohonan['berkas'] = $this->orm->tbl_t_imb_berkas->where('id_permohonan',$row_permohonan['id_permohonan'])->fetch();
                    $row_permohonan['bangunan'] = $this->orm->tbl_t_imb_berkas->where('id_berkas',$row_permohonan['berkas']['id_berkas']);
                    
                    $permohonan = $row_permohonan;
                    
                }
                
                return $permohonan;
             
         }
         

        
            
}
