<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<?php echo form_open(site_url('barang_jual_detail/' . $action),'role="form" class="form-horizontal" id="form_barang_jual_detail" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="id_barang_jual" class="col-sm-2 control-label">Id Barang Jual <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'id_barang_jual',
                                 'id'           => 'id_barang_jual',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Id Barang Jual',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('id_barang_jual',$barang_jual_detail['id_barang_jual'])
                           );             
                  ?>
                 <?php echo form_error('id_barang_jual');?>
                </div>
              </div> <!--/ Id Barang Jual -->
                          
               <div class="form-group">
                   <label for="nama_barang" class="col-sm-2 control-label">Nama Barang <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nama_barang',
                                 'id'           => 'nama_barang',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Nama Barang',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('nama_barang',$barang_jual_detail['nama_barang'])
                           );             
                  ?>
                 <?php echo form_error('nama_barang');?>
                </div>
              </div> <!--/ Nama Barang -->
                          
               <div class="form-group">
                   <label for="kode_barang" class="col-sm-2 control-label">Kode Barang <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'kode_barang',
                           $kode_barang,  
                           set_value('kode_barang',$barang_jual_detail['kode_barang']),
                           'class="form-control input-sm  required"  id="kode_barang"'
                           );             
                  ?>
                 <?php echo form_error('kode_barang');?>
                </div>
              </div> <!--/ Kode Barang -->
                          
               <div class="form-group">
                   <label for="jumlah" class="col-sm-2 control-label">Jumlah <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'jumlah',
                                 'id'           => 'jumlah',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Jumlah',
                                 
                                 ),
                                 set_value('jumlah',$barang_jual_detail['jumlah'])
                           );             
                  ?>
                 <?php echo form_error('jumlah');?>
                </div>
              </div> <!--/ Jumlah -->
                          
               <div class="form-group">
                   <label for="id_satuan" class="col-sm-2 control-label">Id Satuan <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'id_satuan',
                                 'id'           => 'id_satuan',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Id Satuan',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('id_satuan',$barang_jual_detail['id_satuan'])
                           );             
                  ?>
                 <?php echo form_error('id_satuan');?>
                </div>
              </div> <!--/ Id Satuan -->
                          
               <div class="form-group">
                   <label for="harga" class="col-sm-2 control-label">Harga <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'harga',
                                 'id'           => 'harga',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Harga',
                                 
                                 ),
                                 set_value('harga',$barang_jual_detail['harga'])
                           );             
                  ?>
                 <?php echo form_error('harga');?>
                </div>
              </div> <!--/ Harga -->
                          
               <div class="form-group">
                   <label for="total_harga" class="col-sm-2 control-label">Total Harga <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'total_harga',
                                 'id'           => 'total_harga',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Total Harga',
                                 
                                 ),
                                 set_value('total_harga',$barang_jual_detail['total_harga'])
                           );             
                  ?>
                 <?php echo form_error('total_harga');?>
                </div>
              </div> <!--/ Total Harga -->
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
                   <a href="<?php echo site_url('barang_jual_detail'); ?>" class="btn btn-default">
                       <i class="glyphicon glyphicon-chevron-left"></i> Kembali
                   </a> 
                    <button type="submit" class="btn btn-primary" name="post">
                        <i class="glyphicon glyphicon-floppy-save"></i> Simpan 
                    </button>                  
              </div>
          </div>
    </div><!--/ Panel Footer -->       
</div><!--/ Panel -->
<?php echo form_close(); ?>  