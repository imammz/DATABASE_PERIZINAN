<?php

class Home extends MX_Controller
{
    function __construct()
    {
        parent:: __construct();
        //$this->checkLogin();
    }
    
    	public function index()
	{ 
            $this->output->enable_profiler(false);
           
            
            
            $data = array(
                'class' => 'home',
                'menu' => 'home'
            );
            $this->load->view('home_view',$data);
	}
        
        
        
        

}

?>