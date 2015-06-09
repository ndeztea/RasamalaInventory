<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<?php echo form_open(site_url('penggajian/' . $action),'role="form" class="form-horizontal" id="form_penggajian" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="tanggal_awal" class="col-sm-2 control-label">Tanggal Awal <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'tanggal_awal',
                                 'id'           => 'tanggal_awal',                       
                                 'class'        => 'form-control input-sm tanggal  required',
                                 'placeholder'  => 'Tanggal Awal',
                                 
                                 ),
                                 set_value('tanggal_awal',$penggajian['tanggal_awal'])
                           );             
                  ?>
                 <?php echo form_error('tanggal_awal');?>
                </div>
              </div> <!--/ Tanggal Awal -->
                          
               <div class="form-group">
                   <label for="tanggal_akhir" class="col-sm-2 control-label">Tanggal Akhir <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'tanggal_akhir',
                                 'id'           => 'tanggal_akhir',                       
                                 'class'        => 'form-control input-sm tanggal  required',
                                 'placeholder'  => 'Tanggal Akhir',
                                 
                                 ),
                                 set_value('tanggal_akhir',$penggajian['tanggal_akhir'])
                           );             
                  ?>
                 <?php echo form_error('tanggal_akhir');?>
                </div>
              </div> <!--/ Tanggal Akhir -->
                          
               <div class="form-group">
                   <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_textarea(
                            array(
                                'id'            =>'keterangan',
                                'name'          =>'keterangan',
                                'rows'          =>'3',
                                'class'         =>'form-control input-sm ',
                                'placeholder'   =>'Keterangan',
                                
                                ),
                            set_value('keterangan',$penggajian['keterangan'])                           
                            );             
                  ?>
                 <?php echo form_error('keterangan');?>
                </div>
              </div> <!--/ Keterangan -->
                          
               <div class="form-group">
                <div class="col-xs-12 table-responsive">
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
                    <?php if(!empty($penggajian['data'])):?>
                    <?php $data_mandor = json_decode($penggajian['data']);?>
                      <?php $a=0;foreach($data_mandor as $row):?>
                      <tr id="data_<?php echo $a?>" class="mandor_items">
                        <td>
                          <a href="javascript:;" onclick="hapus_mandor(this)" class="btn btn-danger btn-sm" data-tooltip="tooltip" data-placement="top" title="" data-original-title="Hapus Barang">
                            <i class="glyphicon glyphicon-minus"></i>
                          </a>
                        </td>
                        <td><input name="nama_mandor[]" value="<?php echo $row->nama_mandor?>" class="nama_mandor form-control input-sm"/></td>
                        <td><input name="jumlah_pekerja[]" value="<?php echo $row->jumlah_pekerja?>" class="jumlah_pekerja form-control input-sm number"/></td>
                        <td><input name="per_total[]" value="<?php echo $row->total?>" oninput="hitung_total(this)" class="per_total form-control input-sm number"/></td>
                      </tr>
                      <?php $a++;endforeach?>
                    <?php else:?>
                    <tr id="data_0" class="mandor_items">
                      <td>
                        <a href="javascript:;" onclick="hapus_mandor(this)" class="btn btn-danger btn-sm" data-tooltip="tooltip" data-placement="top" title="" data-original-title="Hapus Barang">
                          <i class="glyphicon glyphicon-minus"></i>
                        </a>
                      </td>
                      <td><input name="nama_mandor[]" value="" class="nama_mandor form-control input-sm"/></td>
                      <td><input name="jumlah_pekerja[]"  class="jumlah_pekerja form-control input-sm number"/></td>
                      <td><input name="per_total[]"  oninput="hitung_total(this)" class="per_total form-control input-sm number"/></td>
                    </tr>
                    <?php endif?>
                  </tbody>
                </table>
                <a href="javascript:;" onclick="tambah_mandor()" class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="" data-original-title="Tambah Mandor">
                  <i class="glyphicon glyphicon-plus"></i>
                </a>
              </div> <!--/ Data -->
                          
               <div class="form-group">
                   <label for="total" class="col-sm-2 control-label">Grand Total <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'total',
                                 'id'           => 'total',                       
                                 'class'        => 'form-control input-sm  required number',
                                 'placeholder'  => 'Total',
                                 'readonly'     => 'readonly'
                                 
                                 ),
                                 set_value('total',$penggajian['total'])
                           );             
                  ?>
                 <?php echo form_error('total');?>
                </div>
              </div> <!--/ Total -->
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
                   <a href="<?php echo site_url('penggajian'); ?>" class="btn btn-default">
                       <i class="glyphicon glyphicon-chevron-left"></i> Kembali
                   </a> 
                    <button type="submit" class="btn btn-primary" name="post">
                        <i class="glyphicon glyphicon-floppy-save"></i> Simpan 
                    </button>                  
              </div>
          </div>
    </div><!--/ Panel Footer -->       
</div><!--/ Panel -->
<script>
  function hitung_total(){
    total = 0;
    $( "tr.mandor_items" ).each(function( index ) {
      mandor_items_id = $( this ).attr('id');
      val_tmp = $('#'+mandor_items_id+' input[name="per_total[]"]').val();
      total += parseFloat(val_tmp);
    });
    $('#total').val(total); 
  }
  function hapus_mandor(elm){
    $(elm).parent().parent().remove();
  }
  function tambah_mandor(){
    elem = $('.data-detail tr').first().html();
    $('.data-detail').append('<tr class="mandor_items" id="data_'+$('.data-detail tr').length+'">'+elem+'</tr>');
  }
</script>
<?php echo form_close(); ?>  