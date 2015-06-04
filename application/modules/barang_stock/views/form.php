<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<?php echo form_open(site_url('barang_stock/' . $action),'role="form" class="form-horizontal" id="form_barang_stock" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         
                       
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
                                 set_value('nama_barang',$barang_stock['nama_barang'])
                           );             
                  ?>
                 <?php echo form_error('nama_barang');?>
                </div>
              </div> <!--/ Nama Barang -->
                          
               <div class="form-group">
                   <label for="kode_barang" class="col-sm-2 control-label">Kode Barang <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'kode_barang',
                                 'id'           => 'kode_barang',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Kode Barang',
                                 'maxlength'=>'50'
                                 ),
                                 set_value('kode_barang',$barang_stock['kode_barang'])
                           );             
                  ?>
                 <?php echo form_error('kode_barang');?>
                </div>
              </div> <!--/ Kode Barang -->
                          
               <div class="form-group">
                   <label for="id_category" class="col-sm-2 control-label">Category <span class="required-input">*</span></label>
                <div class="col-sm-6">         
                <?php                  
                   echo form_dropdown(
                           'id_category',
                           $categories,  
                           set_value('id_satuan',$barang_stock['id_category']),
                           'class="form-control input-sm  required"  id="id_satuan"'
                           );             
                  ?>                          
                 <?php echo form_error('id_category');?>
                </div>
              </div> <!--/ Id Category -->
                          
               <div class="form-group">
                   <label for="jumlah_stocks" class="col-sm-2 control-label">Jumlah Stocks <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'jumlah_stocks',
                                 'id'           => 'jumlah_stocks',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Jumlah Stocks',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('jumlah_stocks',$barang_stock['jumlah_stocks'])
                           );             
                  ?>
                 <?php echo form_error('jumlah_stocks');?>
                </div>
              </div> <!--/ Jumlah Stocks -->
                          
               <div class="form-group">
                   <label for="id_satuan" class="col-sm-2 control-label">Satuan <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'id_satuan',
                           $id_satuan,  
                           set_value('id_satuan',$barang_stock['id_satuan']),
                           'class="form-control input-sm  required"  id="id_satuan"'
                           );             
                  ?>
                 <?php echo form_error('id_satuan');?>
                </div>
              </div> <!--/ Id Satuan -->

              <div class="form-group">
                   <label for="jumlah_stocks" class="col-sm-2 control-label">Harga Beli <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'harga_beli',
                                 'id'           => 'harga_beli',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Harga Beli',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('harga_beli',$barang_stock['harga_beli'])
                           );             
                  ?>
                 <?php echo form_error('harga_beli');?>
                </div>
              </div> <!--/ harga beli -->

              <div class="form-group">
                   <label for="jumlah_stocks" class="col-sm-2 control-label">Harga Jual <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'harga_jual',
                                 'id'           => 'harga_jual',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Harga Jual',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('harga_jual',$barang_stock['harga_jual'])
                           );             
                  ?>
                 <?php echo form_error('harga_jual');?>
                </div>
              </div> <!--/ harga jual -->
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
                   <a href="<?php echo site_url('barang_stock'); ?>" class="btn btn-default">
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