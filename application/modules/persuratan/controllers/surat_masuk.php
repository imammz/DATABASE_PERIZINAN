<?php

class Surat_masuk extends MX_Controller {

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
            'menu' => 'surat-masuk',
            'datatables' => TRUE
        );

        $persuratan_model = new Persuratan_model();
        $data['surat'] = $persuratan_model->_loadSuratMasuk();
        $data['disposisi'] = $persuratan_model->_loadSuratMasukDisposisi();
        $this->load->view('surat_masuk_view', $data);
    }

    public function form() {
        $this->output->enable_profiler(false);

        $data = array(
            'class' => 'persuratan',
            'menu' => 'surat-masuk'
        );

        $this->load->view('surat_masuk_form_view', $data);
    }

    public function proccess() {

        /*$common_model = new common_model();*/

        // versi model //
        $this->load->model('config/common_model');

        $post = array();
        $post['nomor'] = $this->input->post('nomor', TRUE);
        $post['dari'] = $this->input->post('dari', TRUE);
        $kepada = explode('#', $this->input->post('kepada'));
        $post['id_pejabat_kepada'] = $kepada[0];
        $post['kepada'] = $kepada[1];
        $post['perihal'] = $this->input->post('perihal', TRUE);
        $post['isi'] = $this->input->post('isi', TRUE);
        $post['tanggal'] = Tanggal::sqlDate($this->input->post('tanggal', TRUE));
        $post['id_jenis_surat'] = 1;

        $ress = $this->db->insert('dp_surat', $post);

        $id_surat = $this->common_model->_getNewId('dp_surat', 'id_surat');

        $post = array();
        $post['id_surat'] = $id_surat;
        $post['id_pejabat'] = $kepada[0];

        $this->db->insert('dp_inmail', $post);


        $output_dir = "uploads";

        $post = array();

        $no = 1;
        if(!empty($_FILES['scann']['tmp_name'])) {
        foreach ($_FILES['scann']['tmp_name'] as $key => $tmp_name) {

            $tipe_file = $_FILES['scann']['type'][$key];
            $path_parts = pathinfo($_FILES['scann']["name"][$key]);
            $extension = "";
            if (isset($path_parts['extension'])) {
                $extension = $path_parts['extension'];
            

            $rand = rand();

            $file_upload = $output_dir . "/$id_surat-" . $rand . '-' . $no . '.' . $extension;
            $file_location = "$id_surat-" . $rand . '-' . $no . '.' . $extension;
            move_uploaded_file($tmp_name, $file_upload);

            $record_file = array();
            $record_file['path_file'] = $file_location;
            $record_file['extention'] = $extension;
            $record_file['id_surat'] = $id_surat;
            $this->db->insert('dp_lampiran_surat', $record_file);
            }
            
            $no++;
        } }

        $_SESSION['message'] = ($ress == TRUE) ? 'Surat Masuk Berhasil Dientry' : 'Surat Masuk Gagal Dientry!!';

        redirect('persuratan/surat_masuk/');
    }

    public function edit($id_surat) {
        $this->output->enable_profiler(false);
        $persuratan_model = new Persuratan_model();
        $data = array(
            'class' => 'persuratan',
            'menu' => 'surat-masuk',
            'surat' => $persuratan_model->_getSuratMasukById($id_surat)
        );

        $this->load->view('surat_masuk_edit_view', $data);
    }

    public function edit_proccess($id_surat) {


        $post = array();
        $post['nomor'] = $this->input->post('nomor', TRUE);
        $post['dari'] = $this->input->post('dari', TRUE);
        $kepada = explode('#', $this->input->post('kepada'));
        $post['kepada'] = $kepada[1];
        $post['id_pejabat_kepada'] = $kepada[0];
        $post['perihal'] = $this->input->post('perihal', TRUE);
        $post['isi'] = $this->input->post('isi', TRUE);
        $post['tanggal'] = Tanggal::sqlDate($this->input->post('tanggal', TRUE));
        $post['id_jenis_surat'] = 1;

        $ress = $this->db->update('dp_surat', $post, 'id_surat = ' . $id_surat);


        $post = array();
        $post['id_surat'] = $id_surat;
        $post['id_pejabat'] = $kepada[0];

        $this->db->update('dp_inmail', $post, 'id_surat = ' . $id_surat);


        $output_dir = "uploads";


        $hapus_scann = $this->input->post('hapus_scann', TRUE);

        if(isset($hapus_scann) AND !empty($hapus_scann)) {
        foreach ($hapus_scann as $row) {
            $lampiran = explode('#', $row);
            // echo base_url('uploads/'.$lampiran[1]); exit;
            if(file_exists('./uploads/' . $lampiran[1])){
            unlink('./uploads/' . $lampiran[1]);
            }
            $this->db->delete('dp_lampiran_surat', 'id_surat = ' . $id_surat . ' AND id_lampiran_surat = ' . $lampiran[0]);
        } }

        $post = array();

        $no = 1;
        if(!empty($_FILES['scann']['tmp_name'])) {
        foreach ($_FILES['scann']['tmp_name'] as $key => $tmp_name) {

            $tipe_file = $_FILES['scann']['type'][$key];
            $path_parts = pathinfo($_FILES['scann']["name"][$key]);
            $extension = "";
            if (isset($path_parts['extension'])) {
                $extension = $path_parts['extension'];
            

            $rand = rand();

            $file_upload = $output_dir . "/$id_surat-" . $rand . '-' . $no . '.' . $extension;
            $file_location = "$id_surat-" . $rand . '-' . $no . '.' . $extension;
            move_uploaded_file($tmp_name, $file_upload);

            $record_file = array();
            $record_file['path_file'] = $file_location;
            $record_file['extention'] = $extension;
            $record_file['id_surat'] = $id_surat;
            $this->db->insert('dp_lampiran_surat', $record_file);
            }
            
            $no++;
        } }

        $_SESSION['message'] = ($ress == TRUE) ? 'Surat Masuk Berhasil Diedit' : 'Surat Masuk Gagal Diedit!!';

        redirect('persuratan/surat_masuk/');
    }

    public function hapus($id_surat) {

        $this->db->delete('dp_inmail', 'id_surat = ' . $id_surat);
        $this->db->delete('dp_lampiran_surat', 'id_surat = ' . $id_surat);
        $ress = $this->db->delete('dp_surat', 'id_surat = ' . $id_surat);

        $_SESSION['message'] = ($ress == TRUE) ? 'Surat Masuk Berhasil Dihapus' : 'Surat Masuk Gagal Dihapus!!';

        redirect('persuratan/surat_masuk/');
    }

    public function disposisi($id_surat) {

        $this->output->enable_profiler(false);

        $persuratan_model = new Persuratan_model();

        $data = array(
            'class' => 'persuratan',
            'menu' => 'surat-lainya',
            'surat' => $persuratan_model->_getSuratMasukById($id_surat)
        );


        $this->load->view('disposisi_view', $data);
    }

    public function disposisi_proses($id_surat) {
        // versi model amin //
        $this->load->model('config/common_model');
        //$common_model = new common_model();
        
        $this->output->enable_profiler(false);
        
        $persuratan_model = new Persuratan_model();
        
        $post = array();
        $post['id_surat'] = $id_surat; 
        $post['isi_disposisi'] = $this->input->post('isi_disposisi',TRUE);
        $post['nomor_disposisi'] = $this->input->post('nomor_disposisi',TRUE);
        $post['tanggal_disposisi'] = Tanggal::sqlDate($this->input->post('tanggal_disposisi',TRUE));
        $post['username_dari'] = $_SESSION['user']['username'];
        $post['id_pejabat_dari'] = $_SESSION['user']['id_pejabat'];
        $post['id_sifat_disposisi'] = $this->input->post('id_sifat_disposisi',TRUE);
        
        $ress = $this->db->insert('dp_inmail_disposisi',$post);
        
        $id_inmail_disposisi = $this->common_model->_getNewId('dp_inmail_disposisi', 'id_inmail_disposisi');
       
        $id_pejabat_kepada = $this->input->post('id_pejabat_kepada');
      
        
        foreach($id_pejabat_kepada as $row) {
        $post = array();
        $post['id_inmail_disposisi'] = $id_inmail_disposisi;
        $post['id_surat'] = $id_surat;
        $post['id_pejabat_kepada'] = $row;
        $post['username_kepada'] = $this->common_model->_getUsernamebyIdPejabat($row);
        
        $this->db->insert('dp_inmail_disposisi_kepada',$post);
        
        }
        
        $_SESSION['message'] = ($ress == TRUE) ? 'Surat Masuk Berhasil Didisposisi Kepada Ybs, Terima Kasih.' : 'Surat Masuk Gagal Didisposisi!!';

        redirect('persuratan/surat_masuk/');

    }

    public function baca($id_surat,$read_only = false) {

        $this->output->enable_profiler(false);

        $persuratan_model = new Persuratan_model();

        $data = array(
            'class' => 'persuratan',
            'menu' => 'surat-lainya',
            'surat' => $persuratan_model->_getSuratMasukById($id_surat),
            'read_only' => $read_only
        );

//        print_r($data); exit;

        $this->load->view('surat_masuk_baca_view', $data);
    }

}

?>