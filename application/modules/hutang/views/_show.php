

<div class="page-header">
    <h3>Hutang</h3>
</div>
<?php 
    if($hutang) :
?> 

<table id="detail" class="table table-striped table-condensed">
    <tbody>
    <?php     
        foreach($hutang as $table => $value) :    
    ?>
    <tr>
        <td width="20%" align="right"><strong><?php echo $table ?></strong></td>
        <?php 
        if($table=='total'){
            $value = format_uang($value);
        }elseif($table=='status'){
            $value = $this->statuss->get_status_name($value); 
        }elseif($table=='jatuh_tempo'){
            $value = format_tanggal($value);
        }
        ?>
        
        <td><?php echo $value ?></td>
    </tr>
     <?php 
        endforeach;
     ?>
     </tbody>
</table>


	<?php 
	
		echo anchor(site_url('hutang'), '<span class="fa fa-chevron-left"></span> Kembali', 'class="btn btn-sm btn-default"');
	
	?>


<br /><br />

<?php 
    endif;
?>

