<?php 

class Tatakota extends MX_Controller
{
    function __construct()
    {
        parent:: __construct();
        $this->checkLogin();
         $this->output->enable_profiler(false);

        $this->load->model('skpd_model');
        $this->load->model('tatakota_model');
    }

    public function index()
    {
       $tatakota_model = new Tatakota_model();
        
        $data = array(
            'class' => 'skpd',
            'menu' => 'index'
        );
        
        $data['ippl_proses'] = $tatakota_model->_loadIPPLProses();
        
        $this->load->view('tatakota_view',$data);
    }
    
    public function form($id_permohonan) {
        $skpd_model = new Skpd_model();
        
        $data = array();
        $data['skpd_model'] = $skpd_model;
        $data['permohonan'] = $skpd_model->_getPermohonanImb($id_permohonan);
               
       // print_r($data['permohonan']); exit;
        $this->load->view('tatakota_form_view',$data);
    }
    
    public function tidaklayak($id_permohonan) {
        $skpd_model = new Skpd_model();
        
        $data = array();
        $data['skpd_model'] = $skpd_model;
        $data['permohonan'] = $skpd_model->_getPermohonanImb($id_permohonan);
        
        $permohonan = $this->orm->tbl_t_permohonan->where('id_permohonan',$id_permohonan);
        $update = array();
        $update['id_status_permohonan'] = 8;
        $permohonan->update($update);
        
        redirect('skpd/tatakota');
    
    }
    
    public function layak($id_permohonan) {
        $skpd_model = new Skpd_model();
        
        $data = array();
        $data['skpd_model'] = $skpd_model;
        $data['permohonan'] = $skpd_model->_getPermohonanImb($id_permohonan);
               
      $permohonan = $this->orm->tbl_t_permohonan->where('id_permohonan',$id_permohonan);
        $update = array();
        $update['id_status_permohonan'] = 7;
        $permohonan->update($update);
        
      //  redirect('skpd/tatakota/cetak/'.$id_permohonan);
        
      redirect(base_url().'/pdf.pdf');
        
    }
    
    public function cetak($id_permohonan) {
        
    }
    
}


?>