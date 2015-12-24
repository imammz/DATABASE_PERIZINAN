<?php 
header("Pragma: public");
header('Content-Type: application/vnd.ms-excel');
$filename = 'SISKA_Data_Pembenahan_'.date('d-M-Y').'.xls';
header('Content-Disposition: attachment; filename='.$filename);

$data = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">
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
    <![endif]-->
	
<style type="text/css">
.rotate-text
 {

/* Safari */
-webkit-transform: rotate(-90deg);

/* Firefox */
-moz-transform: rotate(-90deg);

/* IE */
-ms-transform: rotate(-90deg);

/* Opera */
-o-transform: rotate(-90deg);

/* Internet Explorer */
filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);

}
.border-table{
	border:1px solid #000;	
}
</style>
</head>

<body>
  <body style="font-size: 9px; font-family: Arial;">
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="15"><H3>Arsip Data Pembenahan</H3></td>
	<td colspan="2" rowspan="2" style="text-align: center; vertical-align:text-top;"><img src="http://localhost:88/archis/public/images/logo.png" width="60"></td>
  </tr>
  <tr>
    <td width="22"></td>
    <td colspan="15"><h4>Daftar Pertelaan Arsip Pembenahan</h4></td>	
  </tr>
  <tr>
    <td rowspan="2" width="40" style="text-align: center; vertical-align:text-top;" class="border-table"><strong>No</strong></td>
    <td width="58" rowspan="2" style="text-align: center; vertical-align:text-top;" class="border-table"><strong>Nomor Definitif</strong></td>
    <td width="62" rowspan="2" style="text-align: center; vertical-align:text-top;" class="border-table"><strong>KODE KLAS</strong></td>
    <td width="51" rowspan="2" style="text-align: center; vertical-align:text-top;" class="border-table"><strong>UNIT KERJA</strong></td>
    <td width="49" rowspan="2" style="text-align: center; vertical-align:text-top;" class="border-table"><strong>KODE JRA</strong></td>
    <td width="180" rowspan="2" style="text-align: center; vertical-align:text-top;" class="border-table"><strong>URAIAN</strong></td>
    <td colspan="2" style="text-align: center; vertical-align:text-top;" class="border-table"><strong>KURUN WAKTU</strong></td>
    <td width="78" rowspan="2" style="text-align: center; vertical-align:text-top;" class="border-table"><strong><sup>TINGKAT PERKEMBANGAN</sup></strong></td>
    <td width="54" rowspan="2" style="text-align: center; vertical-align:text-top;" class="border-table"><strong><sup>MEDIA SIMPAN</sup></strong></td>
    <td width="50" rowspan="2" style="text-align: center; vertical-align:text-top;" class="border-table"><strong><sup>KONDISI FISIK</sup></strong></td>
    <td colspan="5" style="text-align: center; vertical-align:text-top;" class="border-table"><strong>LOKASI SIMPAN</strong></td>
    <td width="45" style="text-align: center; vertical-align:text-top;" class="border-table"><strong>KET.</strong></td>
  </tr>
  <tr>
    <td width="43" style="text-align: center; vertical-align:text-top;" class="border-table"><strong><sup>AWAL</sup></strong></td>
    <td width="43" style="text-align: center; vertical-align:text-top;" class="border-table"><strong><sup>AKHIR</sup></strong></td>
    <td width="42" style="text-align: center; vertical-align:text-top;" class="border-table"><strong><sup>DEPO</sup></strong></td>
    <td width="42" style="text-align: center; vertical-align:text-top;" class="border-table"><strong><sup>NO. RUANG</sup></strong></td>
    <td width="42" style="text-align: center; vertical-align:text-top;" class="border-table"><strong><sup>NO. LEMARI</sup></strong></td>
    <td width="42" style="text-align: center; vertical-align:text-top;" class="border-table"><strong><sup>NO. BOK</sup></strong></td>
    <td width="42" style="text-align: center; vertical-align:text-top;" class="border-table"><strong><sup>NO. FOLDER</sup></strong></td>
    <td style="text-align: center; vertical-align:text-top;" class="border-table"><strong><sup>JUMLAH BERKAS</sup></strong></td>
  </tr>';
 $no = 0;
 foreach($arsip as $row) {
     $no++; 
     Penerimaan_model::updateExportPembenahanById($row['id_arsip']);
$data .= '<tr>
    <td class="border-table">'.$no.'</td>
    <td class="border-table">'.$row['nomor_definitif'].'</td>
    <td class="border-table">'.$row['kode_klasifikasi'].'</td>
    <td class="border-table">'.$row['kode_unit_kerja'].'</td>
    <td class="border-table">'.$row['kode_jra'].'</td>
    <td class="border-table">'.$row['uraian'].'</td>
    <td class="border-table">'.$row['kurun_waktu_awal'].'</td>
    <td class="border-table">'.$row['kurun_waktu_akhir'].'</td>
    <td class="border-table">'.$row['tingkat_perkembangan'].'</td>
    <td class="border-table">'.$row['media_simpan'].'</td>
    <td class="border-table">'.$row['kondisi_fisik'].'</td>
    <td class="border-table">'.$row['nomor_depo'].'</td>
    <td class="border-table">'.$row['nomor_ruang'].'</td>
    <td class="border-table">'.$row['nomor_lemari'].'</td>
    <td class="border-table">'.$row['nomor_boks'].'</td>
    <td class="border-table">'.$row['nomor_folder'].'</td>
    <td class="border-table">'.$row['jumlah_berkas'].'</td>
  </tr>';
  }

$data .=  
'</table>
</body></html>';

echo $data;

?>