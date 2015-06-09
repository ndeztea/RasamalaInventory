

<div class="page-header">
    <h3>Penggajian</h3>
</div>
<?php 
    if($penggajian) :
?> 

<table id="detail" class="table table-striped table-condensed">
    <tbody>
    <?php     
        foreach($penggajian as $table => $value) :    
    ?>
    <tr>
        <?php if($table=='data'):?>
       
        <td colspan="2">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Mandor</th>
                  <th>Jumlah Pekerja</th>
                  <th>Total</th>
                </tr>
              </thead>
            <tbody class="data-detail">  
                <?php $data_mandor = json_decode($value);?>
                  <?php $a=0;foreach($data_mandor as $row): $a++?>
                  <tr id="data_<?php echo $a?>" class="mandor_items">
                    <td><?php echo $a?></td>
                    <td><?php echo $row->nama_mandor?></td>
                    <td><?php echo $row->jumlah_pekerja?></td>
                    <td><?php echo format_uang($row->total)?></td>
                  </tr>
                  <?php $a++;endforeach?>
              </tbody>
            </table>
        </td>
        <?php else:?>
        <td width="20%" align="right"><strong><?php echo $table ?></strong></td>
        <?php if($table=='tanggal_awal' || $table=='tanggal_akhir'){
                $value = format_tanggal($value);
            }elseif($table=='total'){
                $value = format_uang($value);
            }
        ?>
        <td><?php echo $value ?></td>
        <?php endif?>

    </tr>
     <?php 
        endforeach;
     ?>
     </tbody>
</table>
    <?php if(!$print):?>

	<?php 
	
		echo anchor(site_url('penggajian'), '<span class="fa fa-chevron-left"></span> Kembali', 'class="btn btn-sm btn-default"');
	
	?>
    <?php 
    
        echo anchor(site_url('penggajian/show/'.$penggajian['id'].'/print'), '<span class="fa fa-print"></span> Print', 'target="_blank" class="btn btn-sm btn-primary"');
    
    ?>
    <?php endif?>


<br /><br />

<?php 
    endif;
?>

