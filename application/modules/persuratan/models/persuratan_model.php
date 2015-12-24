<?php

class Persuratan_model extends  CI_Model {
	/**
	 * Constructor
	 */

    function __construct()
         {
        parent::__construct();
        $id_pejabat = (isset($_SESSION['user']['id_pejabat']))?$_SESSION['user']['id_pejabat']:'';
        
	}

        // MODUL INBOX //

        public function _loadInbox() {
            

            $this->db->select('*');
            $this->db->from('dp_inmail');
            $this->db->join('dp_surat','dp_surat.id_surat = dp_inmail.id_surat','LEFT');
            $this->db->where('id_jenis_surat = 1');
            $this->db->where('id_pejabat = '.$_SESSION['user']['id_pejabat'].'');
            
            $ress = $this->db->get()->result_array();
            
            return $ress;
        }
        
        public function _loadInboxDisposisi() {
            
            $this->db->select('*');
            $this->db->from('dp_inmail_disposisi_kepada');
            $this->db->join('dp_inmail_disposisi','dp_inmail_disposisi.id_inmail_disposisi = dp_inmail_disposisi_kepada.id_inmail_disposisi','LEFT');
            $this->db->join('dp_pejabat','dp_pejabat.id_pejabat = dp_inmail_disposisi.id_pejabat_dari','LEFT');
            $this->db->join('dp_surat','dp_surat.id_surat = dp_inmail_disposisi.id_surat','LEFT');
            $this->db->where('id_jenis_surat = 1');
            $this->db->where('dp_inmail_disposisi_kepada.id_pejabat_kepada = '.$_SESSION['user']['id_pejabat'].'');
            
            $ress = $this->db->get()->result_array();
            //print_r($this->db->last_query());die;
            return $ress;
        }

        public function updateStatusReadSurat($modul, $id_inmail) {
            
            $table = ($modul=='disposisi') ? 'dp_inmail_disposisi_kepada' : 'dp_inmail' ;
            $where_field = ($modul=='disposisi') ? 'id_inmail_disposisi_kepada' : 'id_inmail' ;

            $this->db->update($table, array('status_read'=>'R'), array($where_field=>$id_inmail));
            
            return true;
        }

        public function getNewInbox($id_pejabat) {
            
            $surat = $this->db->query("select * from dp_inmail where status_read is NULL and id_pejabat=".$id_pejabat."")->num_rows();
            $disposisi = $this->db->query("select * from dp_inmail_disposisi_kepada where status_read is NULL and id_pejabat_kepada=".$id_pejabat."")->num_rows();
            
            $data = array(
                'surat_masuk' => $surat,
                'disposisi' => $disposisi,
                );

            return $data;
        }

        // END MODUL INBOX //

        public function _loadSuratMasuk() {
            
            $this->db->select('*');
            $this->db->select('dp_surat.id_surat as id_surat');
            $this->db->from('dp_surat');
            $this->db->where('id_jenis_surat = 1');
            $this->db->join('dp_inmail','dp_surat.id_surat = dp_inmail.id_surat','LEFT');
            
            $ress = $this->db->get()->result_array();
            
            return $ress;
        }
        
        public function _loadSuratMasukDisposisi() {
            
            $this->db->select('*');
            $this->db->select('dp_surat.id_surat as id_surat');
            $this->db->from('dp_inmail_disposisi');
            $this->db->where('id_jenis_surat = 1');
            $this->db->join('dp_surat','dp_surat.id_surat = dp_inmail_disposisi.id_surat','LEFT');
            $this->db->join('dp_inmail','dp_surat.id_surat = dp_inmail.id_surat','LEFT');
            $this->db->join('dp_pejabat','dp_pejabat.id_pejabat = dp_inmail_disposisi.id_pejabat_dari','LEFT');
            
            $ress = $this->db->get()->result_array();
            
            return $ress;
        }
        
        public function _loadDisposisiKepada($id_inmail_disposisi) {
            
            $this->db->select('*');
            
            $this->db->from('dp_inmail_disposisi_kepada');
            $this->db->where('id_inmail_disposisi = '.$id_inmail_disposisi);
            $this->db->join('dp_pejabat','dp_pejabat.id_pejabat = dp_inmail_disposisi_kepada.id_pejabat_kepada','LEFT');
            
            $ress = $this->db->get()->result_array();
            
            return $ress;
        }
        
        
        
        
        public function _getSuratMasukById($id_surat = '') {
          
            
            $this->db->select('*');
            $this->db->select('dp_surat.id_surat as id_surat');
            $this->db->from('dp_surat');
            $this->db->where('dp_surat.id_surat = '.$id_surat);
            $this->db->join('dp_inmail','dp_surat.id_surat = dp_inmail.id_surat','LEFT');
            
            $ress = $this->db->get()->row_array();
          
            $this->db->select('*');
            $this->db->from('dp_lampiran_surat');
            $this->db->where('dp_lampiran_surat.id_surat = '.$id_surat);
            
            $ress['lampiran'] = $this->db->get()->result_array();
            
            return $ress;
        }
        
        
        public function _loadSuratKeluar() {
            
            $this->db->select('*');
            $this->db->select('dp_surat.id_surat as id_surat');
            $this->db->from('dp_surat');
            $this->db->where('id_jenis_surat = 2');
            
            $this->db->join('dp_outmail','dp_surat.id_surat = dp_outmail.id_surat','LEFT');
            
            $ress = $this->db->get()->result_array();
            
            return $ress;
        }
        
        public function _getSuratKeluarById($id_surat) {
          
            
            $this->db->select('*');
            $this->db->from('dp_surat');
            $this->db->where('dp_surat.id_surat = '.$id_surat);
            $this->db->join('dp_outmail','dp_surat.id_surat = dp_outmail.id_surat','LEFT');
            
            $ress = $this->db->get()->row_array();
          
            $this->db->select('*');
            $this->db->from('dp_lampiran_surat');
            $this->db->where('dp_lampiran_surat.id_surat = '.$id_surat);
            
            $ress['lampiran'] = $this->db->get()->result_array();
            
            return $ress;
        }
        
        public function _loadPejabatBPPT() {
            $pejabat = $this->db->where('id_skpd = 99 AND id_pejabat != 1')->get('dp_pejabat')->result_array();
            return $pejabat;
        }
        
        
        public function _getLevelPejabatById($id_pejabat) {
            $pejabat = $this->db->select('level')->where('id_pejabat = '.$id_pejabat)->get('dp_pejabat')->row_array();
           
            return $pejabat['level'];
        }

        // SEARCH SURAT LAPORAN //

        public function search_surat() {

            $this->db->from('dp_surat');

            if($this->input->post('jenis_surat')){
                $this->db->where('id_jenis_surat', $this->input->post('jenis_surat'));
            }

            if($this->input->post('nomor')){
                $this->db->where('nomor', $this->input->post('nomor'));
            }

            if($this->input->post('dari')){
                $this->db->where('id_pejabat_dari', $this->input->post('dari'));
            }

            if($this->input->post('kepada')){
                $this->db->where('id_pejabat_kepada', $this->input->post('kepada'));
            }

            if($this->input->post('perihal')){
                $this->db->where('perihal', $this->input->post('perihal'));
            }

            $result = $this->db->get();

            return $result;
        }
        
        public function print_pdf() { 
        
        $id_surat = $this->input->post('id_surat');
        $getData = array();
        foreach($id_surat as $row){
            $surat = $this->db->get_where('dp_surat', array('id_surat'=>$row))->row();
            $getData[] = $surat;
        }
        /*print_r($getData);die;*/
        $temphtml .= '<p style="text-align: center;"><strong>LAPORAN REKAPITULASI PERSURATAN<br /></strong></p>
                        <table class="table table-striped table-hover table-border" border="1">
                        <thead>
                        <tr>
                            <th width="30px"> No.</th>
                            <th width="100px"> Nomor Surat</th>
                            <th width="130px"> Tanggal</th>
                            <th width="130px"> Dari</th>
                            <th width="150px"> Kepada</th>
                            <th width="230px"> Perihal</th>
                        </tr>
                        </thead>
                        <tbody>';

        $no = 1;
        foreach($getData as $rowData){
            $temphtml .= '

                        <tr>
                            <td width="30px">'.$no.'</td>
                            <td width="100px">'.$rowData->nomor.'</td>
                            <td width="130px">'.Tanggal::formatDate($rowData->tanggal).'</td>
                            <td width="130px">'.$rowData->dari.'</td>
                            <td width="150px">'.$rowData->kepada.'</td>
                            <td width="230px">'.$rowData->perihal.'</td>
                        </tr>
            ';
            $no++;
        }

        $temphtml .='
                        </tbody>
                    </table>';

        $this->load->library('TCPDF');
                    
        $pdf = new TCPDF('P', PDF_UNIT, array(297,247), true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        
        $pdf->SetAuthor('Database Perizinan Kota Bekasi');
        $pdf->SetTitle('FORM');

    // remove default header/footer
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

    // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT,PDF_MARGIN_BOTTOM);

    // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        //set page orientation
        
    // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf->setLanguageArray($l);
        }
        
        $pdf->AddPage();
        $pdf->setY(10);
        $pdf->SetFont('helvetica', '', 11);
        $pdf->ln();

        //kotak form
         $pdf->setXY(10,25);
        /* $pdf->Cell(150,42,'',1);*/

        //field 1

        $html .= $temphtml;

        $result = $html;

        // output the HTML content
        $pdf->writeHTML($result, true, false, true, false, '');
            
        ob_end_clean();
        /*$pdf->Output('FORM-'.$tpl_jenis.'-'.date('Y').'-'.Tanggal::formatNoReg($id).'.pdf', 'I'); */
        $pdf->Output('FORM.pdf', 'I'); 
        

    }
        
    
    
    
     public function print_excel() { 
        
         
         header("Pragma: public");
header('Content-Type: application/vnd.ms-excel');
$filename = 'laporan Persuratan_'. date('d-M-Y') . '.xls';
header('Content-Disposition: attachment; filename=' . $filename);

$temphtml = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">
<head>
    <!--[if gte mso 9]>
    <xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    <x:Name>Sheet 1</x:Name>
                    <x:WorksheetOptions>
                        <x:Print>
                            <x:ValidPrinterInfo/>
                        </x:Print>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <![endif]-->';

         
        $id_surat = $this->input->post('id_surat');
        $getData = array();
        foreach($id_surat as $row){
            $surat = $this->db->get_where('dp_surat', array('id_surat'=>$row))->row();
            $getData[] = $surat;
        }
        /*print_r($getData);die;*/
        $temphtml .= '<p style="text-align: center;"><strong>LAPORAN REKAPITULASI PERSURATAN BPPT Kota Bekasi<br /></strong></p>
                        <table class="table table-striped table-hover table-border" border="1">
                        <thead>
                        <tr>
                            <th width="30px"> No.</th>
                            <th width="100px"> Nomor Surat</th>
                            <th width="130px"> Tanggal</th>
                            <th width="130px"> Dari</th>
                            <th width="150px"> Kepada</th>
                            <th width="230px"> Perihal</th>
                        </tr>
                        </thead>
                        <tbody>';

        $no = 1;
        foreach($getData as $rowData){
            $temphtml .= '

                        <tr>
                            <td width="30px">'.$no.'</td>
                            <td width="100px">'.$rowData->nomor.'</td>
                            <td width="130px">'.Tanggal::formatDate($rowData->tanggal).'</td>
                            <td width="130px">'.$rowData->dari.'</td>
                            <td width="150px">'.$rowData->kepada.'</td>
                            <td width="230px">'.$rowData->perihal.'</td>
                        </tr>
            ';
            $no++;
        }

        $temphtml .='
                        </tbody>
                    </table>';

                    
        echo $temphtml; 
        
    }
        
            
}
