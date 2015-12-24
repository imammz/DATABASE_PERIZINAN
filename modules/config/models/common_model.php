<?php
/**
 * Login_model Class
 *
 */
class common_model extends  CI_Model {
	/**
	 * Constructor
	 */
	function __construct()
         {
        parent::__construct();   
        
	}
	
        
        
        public function _getNewId($table,$id) {
            
           $ress = $this->db->select_max($id)->get($table)->row_array();
           
           return $ress[$id];
        }
        
        public function _getUsernamebyIdPejabat($id_pejabat)
        
        {
               $ress = $this->db->select('username')->where('id_pejabat',$id_pejabat)->get('dp_m_user')->row_array();
               
               if(isset($ress['username'])) {
               
               return $ress['username']; }
               
               else return '-';
            
        }
        
}
// END Login_model Class

/* End of file login_model.php */ 
/* Location: ./system/application/model/login_model.php */