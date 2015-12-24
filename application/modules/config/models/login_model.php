<?php
/**
 * Login_model Class
 *
 */
class login_model extends  CI_Model {
	/**
	 * Constructor
	 */
	function __construct()
         {
        parent::__construct();   
        
	}
	
	// Inisialisasi nama tabel user
	var $table = 'dp_m_user';
	
	/**
	 * Cek tabel user, apakah ada user dengan username dan password tertentu
	 */
	function check_user($username, $password)
	{
		$query = $this->db->get_where($this->table, array('username' => $username, 'password' => $password, 'status_active' => 'Y'), 1, 0);
		// 
		if ($query->num_rows() > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}       
}
// END Login_model Class

/* End of file login_model.php */ 
/* Location: ./system/application/model/login_model.php */