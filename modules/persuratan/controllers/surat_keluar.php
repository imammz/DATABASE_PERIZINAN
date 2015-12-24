<?php

class Surat_keluar extends MX_Controller {

    function __construct() {
        parent:: __construct();
        //$this->checkLogin();
        $this->load->model('persuratan_model');
    }

    public function index() {
        $this->output->enable_profiler(false);

        $this->_checkMessage();

        $data = array(
            'class' => 'persuratan',
            'menu' => 'surat-keluar'
        );

        $persuratan_model = new Persuratan_model();
        $data['surat'] = $persuratan_model->_loadSuratKeluar();
        $this->load->view('surat_keluar_view', $data);
    }

    public function form() {
        $this->output->enable_profiler(false);

        $data = array(
            'class' => 'persuratan',
            'menu' => 'surat-keluar'
        );

        $this->load->view('surat_keluar_form_view', $data);
    }

    public function proccess() {

        $common_model = new common_model();

        $post = array();
        $post['nomor'] = $this->input->post('nomor', TRUE);
        $post['kepada'] = $this->input->post('kepada', TRUE);
        $dari = explode('#', $this->input->post('dari'));
        $post['dari'] = $dari[1];
        $post['id_pejabat_dari'] = $dari[0];
        $post['perihal'] = $this->input->post('perihal', TRUE);
        $post['isi'] = $this->input->post('isi', TRUE);
        $post['tanggal'] = Tanggal::sqlDate($this->input->post('tanggal', TRUE));
        $post['id_jenis_surat'] = 2;

        $ress = $this->db->insert('dp_surat', $post);

        $id_surat = $common_model->_getNewId('dp_surat', 'id_surat');

        $post = array();
        $post['id_surat'] = $id_surat;
        $post['id_pejabat'] = $dari[0];

        $this->db->insert('dp_outmail', $post);


        $output_dir = "uploads";

        $post = array();

        $no = 1;
        foreach ($_FILES['scann']['tmp_name'] as $key => $tmp_name) {

            $tipe_file = $_FILES['scann']['type'][$key];
            $path_parts = pathinfo($_FILES['scann']["name"][$key]);
            $extension = "";
            if (isset($path_parts['extension'])) {
                $extension = $path_parts['extension'];
            }

            $rand = rand();

            $file_upload = $output_dir . "/SK.$id_surat-" . $rand . '-' . $no . '.' . $extension;
            $file_location = "SK.$id_surat-" . $rand . '-' . $no . '.' . $extension;
            move_uploaded_file($tmp_name, $file_upload);

            $record_file = array();
            $record_file['path_file'] = $file_location;
            $record_file['extention'] = $extension;
            $record_file['id_surat'] = $id_surat;
            $this->db->insert('dp_lampiran_surat', $record_file);

            $no++;
        }

        $_SESSION['message'] = ($ress == TRUE) ? 'Surat Keluar Berhasil Dientry' : 'Surat Keluar Gagal Dientry!!';

        redirect('persuratan/surat_keluar/');
    }

   

    public function baca($id_surat) {
        
         $this->output->enable_profiler(false);

        $persuratan_model = new Persuratan_model();
        
        $data = array(
            'class' => 'persuratan',
            'menu' => 'surat-lainya',
            'surat'=> $persuratan_model->_getSuratKeluarById($id_surat)
        );
        
//        print_r($data); exit;

        $this->load->view('surat_keluar_baca_view', $data);
        
    }

}

?>