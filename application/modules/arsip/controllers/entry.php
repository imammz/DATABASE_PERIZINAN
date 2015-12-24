<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Entry extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->checkLogin();
        $this->load->model('penerimaan_model');
    }

    public function index() {

        $this->output->enable_profiler(FALSE);

        $this->_checkMessage();

        $data = array(
            'class' => 'arsip',
            'menu' => 'entry'
        );


        $data['klasifikasi'] = $this->master_model->_loadKodeKlasifikasi();
        $data['jra'] = $this->master_model->_loadJRA();
        $data['unit_kerja'] = $this->master_model->_loadUnitKerja();
        $data['tingkat_perkembangan'] = $this->master_model->_loadTingkatPerkembangan();
        $data['kondisi_fisik'] = $this->master_model->_loadKondisiFisik();
        $data['media_simpan'] = $this->master_model->_loadMediaSimpan();

        $data['depo'] = $this->master_model->_loadLokasiDepo();
        $data['ruang'] = $this->master_model->_loadLokasiRuang();
        $data['boks'] = $this->master_model->_loadLokasiBoks();

        $this->load->view('entry_data_view', $data);
    }
    
    public function cari() {

        $this->output->enable_profiler(FALSE);

        $this->_checkMessage();

        $data = array(
            'class' => 'arsip',
            'menu' => 'cari'
        );


        $this->load->view('cari_view', $data);
    }
    
    public function pinjam() {

        $this->output->enable_profiler(FALSE);

        $this->_checkMessage();

        $data = array(
            'class' => 'arsip',
            'menu' => 'cari'
        );


        $this->load->view('pinjam_view', $data);
    }

    
    
    
    
    
    public function process($action, $id = null) {

        $this->output->enable_profiler(FALSE);

        $data = array();
        if ($action == 'insert' || $action == 'update') {
            $data['nomor_definitif'] = $this->input->post('nomor_definitif', true);
            $data['kode_klasifikasi'] = $this->input->post('kode_klasifikasi', true);
            $data['kurun_waktu_awal'] = $this->input->post('kurun_waktu_awal', true);
            $data['kurun_waktu_akhir'] = $this->input->post('kurun_waktu_akhir', true);
            $data['kode_jra'] = $this->input->post('kode_jra', true);
            $data['kode_unit_kerja'] = $this->input->post('kode_unit_kerja', true);
            $data['tingkat_perkembangan'] = $this->input->post('tingkat_perkembangan', true);
            $data['kondisi_fisik'] = $this->input->post('kondisi_fisik', true);
            $data['media_simpan'] = $this->input->post('media_simpan', true);
            $data['jumlah_berkas'] = $this->input->post('jumlah_berkas', true);
            $data['uraian'] = $this->input->post('uraian', true);

            $nomor_boks = explode('|', $this->input->post('nomor_boks', true));
            if (!empty($nomor_boks[0])) {
                $data['nomor_depo'] = $nomor_boks[0];
                $data['nomor_ruang'] = $nomor_boks[1];
                $data['nomor_lemari'] = $nomor_boks[2];
                $data['nomor_boks'] = $nomor_boks[3];
            }

            $data['nomor_folder'] = $this->input->post('nomor_folder', true);

            if ($action == 'insert') {
                $data['insert_by'] = $this->session->userdata('username');
            } elseif ($action == 'update') {
                $data['update_by'] = $this->session->userdata('username');
            }
        }

        if (empty($data['nomor_definitif']) || empty($data['kode_klasifikasi']) || empty($data['kode_unit_kerja'])) {
            $result = false;
        } else {
            if ($action == 'insert') {
                $result = $this->db->insert('arsip', $data);
            } elseif ($action == 'update') {
                $result = $this->db->update('arsip', $data, 'id_arsip = ' . $id . '');
            }
        }

        if ($result)
            $ress['result'] = TRUE;
        else
            $ress['result'] = FALSE;

        if ($action == 'insert' || $action == 'update') {
            echo json_encode($ress);
        } elseif ($action == 'delete') {
            $this->db->delete('arsip', 'id_arsip = ' . $id . '');

            $this->load->view('entry_result_delete_view');
        }
    }

    public function detil($id_arsip) {

        $data = array();
        $data['id_arsip'] = $id_arsip;

        $data['arsip'] = $this->penerimaan_model->_getArsipById($id_arsip);
        $data['attachments'] = $this->penerimaan_model->_getAttachmentByIdArsip($id_arsip);
        if (empty($data['attachments'])) {
            $data['attachments'] = array('attachment_extension' => 'png', 'attachment_file_location' => '#');
        }

        $data['klasifikasi'] = $this->master_model->_loadKodeKlasifikasi();
        $data['jra'] = $this->master_model->_loadJRA();
        $data['unit_kerja'] = $this->master_model->_loadUnitKerja();
        $data['tingkat_perkembangan'] = $this->master_model->_loadTingkatPerkembangan();
        $data['kondisi_fisik'] = $this->master_model->_loadKondisiFisik();
        $data['media_simpan'] = $this->master_model->_loadMediaSimpan();
        $data['depo'] = $this->master_model->_loadLokasiDepo();

        $this->load->view('entry_detil_view', $data);
    }

    public function upload($id_arsip) {

        $data = array();
        $data['id_arsip'] = $id_arsip;
        $data['attachment_type'] = $this->master_model->_loadFileTypeLampiran();
        $this->load->view('entry_upload_view', $data);
    }

    public function upload_process($id_arsip) {

        $output_dir = "uploads";

        $data = array();
        $data['attachment_type'] = $this->input->post('attachment_type', true);

        $no = 1;
        foreach ($_FILES['file_arsip']['tmp_name'] as $key => $tmp_name) {

            $tipe_file = $_FILES['file_arsip']['type'][$key];
            $path_parts = pathinfo($_FILES['file_arsip']["name"][$key]);
            $extension = "";
            if (isset($path_parts['extension'])) {
                $extension = $path_parts['extension'];
            }

            $rand = rand();

            $file_upload = $output_dir . "/$id_arsip-" . $rand . '-' . $no . '.' . $extension;
            $file_location = "$output_dir/$id_arsip-" . $rand . '-' . $no . '.' . $extension;
            move_uploaded_file($tmp_name, $file_upload);

            $record_file = array();
            $record_file['attachment_file_location'] = $file_location;
            $record_file['attachment_type'] = $data['attachment_type'];
            $record_file['attachment_extension'] = $extension;
            $record_file['id_arsip'] = $id_arsip;
            $this->db->insert('arsip_attachments', $record_file);

            $no++;
        }

        echo "Upload File Success";
    }

    public function load() {
        /* Array of database columns which should be read and sent back to DataTables. Use a space where
         * you want to insert a non-database field (for example a counter or static image)
         */
        $aColumns = array('id_arsip', 'nomor_definitif', 'kode_klasifikasi', 'kurun_waktu_awal', 'kurun_waktu_akhir', 'uraian', 'tingkat_perkembangan', 'jumlah_berkas');

        // DB table to use
        $sTable = 'arsip';

        if ($this->session->userdata('id_role') != 1) {
            $this->db->where('kode_unit_kerja', $this->session->userdata('kode_unit_kerja'));
        }

        $this->db->order_by('id_arsip', 'DESC');

        // Paging
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $this->db->limit($this->db->escape_str($_GET['iDisplayLength']), $this->db->escape_str($_GET['iDisplayStart']));
        }

        // Ordering
        if (isset($_GET['iSortCol_0'])) {
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
                if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == 'true') {

                    $this->db->order_by($aColumns[intval($this->db->escape_str($_GET['iSortCol_' . $i]))], $this->db->escape_str($_GET['sSortDir_' . $i]));
                }
            }
        }

        // Individual column filtering
        if (isset($_GET['sSearch']) && !empty($_GET['sSearch'])) {
            for ($i = 0; $i < count($aColumns); $i++) {
                if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == 'true') {
                    $this->db->or_like($aColumns[$i], $this->db->escape_like_str($_GET['sSearch']));
                }
            }
        }

        // Select data
        $this->db->select('SQL_CALC_FOUND_ROWS ' . str_replace(' , ', ' ', implode(', ', $aColumns)), false);

        $rResult = $this->db->get($sTable);

        // Data set length after filtering
        $this->db->select('FOUND_ROWS() AS found_rows');
        $iFilteredTotal = $this->db->get()->row()->found_rows;

        // Total data set length
        $iTotal = $this->db->count_all($sTable);

        // Output
        $output = array('sEcho' => intval($_GET['sEcho']), 'iTotalRecords' => $iTotal, 'iTotalDisplayRecords' => $iFilteredTotal, 'aaData' => array());

        $final = array();

        foreach ($rResult->result_array() as $aRow) {
            $row = array();

            foreach ($aColumns as $col) {
                $row[$col] = $aRow[$col];
            }

            $final[] = $row;
        }

        $items = array();
        $no = 1;
        foreach ($final as $row) {

            $items[] = array($no, $row['kode_klasifikasi'], '' . $row['kurun_waktu_awal'] . ' - ' . $row['kurun_waktu_akhir'], '' . $row['uraian'] . '', '' . $row['tingkat_perkembangan'] . '', '' . $row['jumlah_berkas'] . '', '<button class="btn btn-info" onclick="formUpload(' . $row['id_arsip'] . ');">  <i class="clip-folder-upload"></i> </button>', '<a href="#" role="button" onclick="formDetilPenerimaan(' . $row['id_arsip'] . ');" class="btn btn-default" data-toggle="modal"> Detail </a>');
            $no++;
        }

        $output['aaData'] = $items;

        echo json_encode($output);
    }

    // function combox ajax
    public function comboRuangByDepo($nomor_depo = null) {

        header('Content-type: text/json');

        $ruang = $this->master_model->_loadLokasiRuangByDepo($nomor_depo);

        $data = array();
        $data['result'] = FALSE;

        if (!empty($ruang)) {
            $data['ruang'] = $ruang;
            $data['result'] = TRUE;
        }
        echo json_encode($data);
    }

    public function comboLemariByRuang($nomor_depo = null, $nomor_ruang = null) {

        header('Content-type: text/json');

        $lemari = $this->master_model->_loadLokasiLemariByRuang($nomor_depo, $nomor_ruang);

        $data = array();
        $data['result'] = FALSE;

        if (!empty($lemari)) {
            $data['lemari'] = $lemari;
            $data['result'] = TRUE;
        }
        echo json_encode($data);
    }

    public function comboBoksByLemari($nomor_depo = null, $nomor_ruang = null, $nomor_boks = null) {

        header('Content-type: text/json');

        $boks = $this->master_model->_loadLokasiBoksByLemari($nomor_depo, $nomor_ruang, $nomor_boks);

        $data = array();
        $data['result'] = FALSE;

        if (!empty($boks)) {
            $data['boks'] = $boks;
            $data['result'] = TRUE;
        }
        echo json_encode($data);
    }

    public function importExcel() {

        error_reporting(E_ALL ^ E_NOTICE);

        $this->load->library('Spreadsheet_Excel_Reader');

        $config = array();
        $data = array();

        $config['upload_path'] = 'uploads/import';
        $config['allowed_types'] = 'xls';
        $config['overwrite'] = TRUE;
        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file_import')) {
            $upload_data = $this->upload->data();

            $excel = new Spreadsheet_Excel_Reader($config['upload_path'] . '/' . $upload_data['file_name']);

            $count = $excel->rowcount();

            for ($i = 0; $i <= $count; $i++) {

                $row = 7 + $i;

                $data = array();
                if (!empty($excel->value($row, 'b')))
                    $data['nomor_definitif'] = $excel->value($row, 'b');

                if (!empty($excel->value($row, 'c')))
                    $data['kode_klasifikasi'] = $excel->value($row, 'c');

                if (!empty($excel->value($row, 'd')))
                    $data['kode_unit_kerja'] = $excel->value($row, 'd');

                if (!empty($excel->value($row, 'e')))
                    $data['kode_jra'] = $excel->value($row, 'e');

                if (!empty($excel->value($row, 'f')))
                    $data['uraian'] = $excel->value($row, 'f');

                if (!empty($excel->value($row, 'g')))
                    $data['kurun_waktu_awal'] = $excel->value($row, 'g');

                if (!empty($excel->value($row, 'h')))
                    $data['kurun_waktu_akhir'] = $excel->value($row, 'h');

                if (!empty($excel->value($row, 'i')))
                    $data['tingkat_perkembangan'] = $excel->value($row, 'i');

                if (!empty($excel->value($row, 'j')))
                    $data['media_simpan'] = $excel->value($row, 'j');

                if (!empty($excel->value($row, 'k')))
                    $data['kondisi_fisik'] = $excel->value($row, 'k');

                if (!empty($excel->value($row, 'l')))
                    $data['nomor_depo'] = $excel->value($row, 'l');

                if (!empty($excel->value($row, 'm')))
                    $data['nomor_ruang'] = $excel->value($row, 'm');

                if (!empty($excel->value($row, 'n')))
                    $data['nomor_lemari'] = $excel->value($row, 'n');

                if (!empty($excel->value($row, 'o')))
                    $data['nomor_boks'] = $excel->value($row, 'o');

                if (!empty($excel->value($row, 'p')))
                    $data['nomor_folder'] = $excel->value($row, 'p');

                if (!empty($excel->value($row, 'q')))
                    $data['jumlah_berkas'] = $excel->value($row, 'q');

                if (!empty($data)) {
                    $data['insert_by'] = $this->session->userdata('username');
                    $result = $this->db->insert('arsip', $data);
                    if ($result)
                        $this->successImport();
                    else
                        $this->errorImport();
                }
            }
        }

        else {
            $this->errorImport();
        }
    }

    private function successImport() {
        echo '<script>
                alert("Import Berhasil!");
                window.location.replace("' . base_url() . 'arsip/entry");
                  </script>';
    }

    private function errorImport() {
        echo '<script>
                alert("Gagal Import File, Check Type File atau Konsistensi Data!");
                window.location.replace("' . base_url() . 'arsip/entry");
                  </script>';
    }

}

/* End of file login.php */
	/* Location: ./application/controllers/login.php */
