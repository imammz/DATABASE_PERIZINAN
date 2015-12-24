<form role="form" class="form-horizontal" method="post" action="<?php echo site_url('persuratan/laporan_persuratan/view') ?>">
<?php 
    if(empty($surat)){
        echo '<tr><td>Tidak ada ditemukan</td></tr>';
    }else{
  $no = 1;
  foreach($surat as $row) { 
    $style = ($row->status_read=='R') ? '' : 'background-color: #ece8e7' ;
    ?>  
    <tr style="<?php echo $style?>">
        <td class="center"><input type="hidden" name="id_surat[]" value="<?php echo $row['id_surat']?>"><?php echo $no ?></td>
        <td class="hidden-xs"><?php echo $row['nomor']?></td>
        <td><?php echo Tanggal::formatDate($row['tanggal']) ?></td>
        <td class="hidden-xs"><?php echo $row['dari']?></td>
        <td class="hidden-xs"><?php echo $row['kepada']?></td>
        <td class="hidden-xs"><?php echo $row['perihal']?></td>
    </tr>
  <?php $no++; } }?>

  <div class="form-group">
        <div class="col-sm-2 text-left">
            <button class="btn btn-green pull-right" type="submit" name="prosess" value="excel">EXCEL</button>
        </div>
        <div class="col-sm-2 text-left">
            <button class="btn btn-red pull-right" type="submit" name="prosess" value="pdf"><i class="fa fa-pdf-o"></i>PDF</button>
        </div>
    </div>
    <br><br>
</form>