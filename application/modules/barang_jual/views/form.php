<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<?php echo form_open(site_url('barang_jual/' . $action),'role="form" class="form-horizontal" id="form_barang_jual" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="kode_jual" class="col-sm-2 control-label">Kode Jual <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'kode_jual',
                                 'id'           => 'kode_jual',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Kode Jual',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('kode_jual',$barang_jual['kode_jual'])
                           );             
                  ?>
                 <?php echo form_error('kode_jual');?>
                </div>
              </div> <!--/ Kode Jual -->
                          
               <div class="form-group">
                   <label for="nama" class="col-sm-2 control-label">Nama <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nama',
                                 'id'           => 'nama',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Nama',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('nama',$barang_jual['nama'])
                           );             
                  ?>
                 <?php echo form_error('nama');?>
                </div>
              </div> <!--/ Nama -->
                          
               <div class="form-group">
                   <label for="alamat" class="col-sm-2 control-label">Alamat <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_textarea(
                            array(
                                'id'            =>'alamat',
                                'name'          =>'alamat',
                                'rows'          =>'3',
                                'class'         =>'form-control input-sm  required',
                                'placeholder'   =>'Alamat',
                                
                                ),
                            set_value('alamat',$barang_jual['alamat'])                           
                            );             
                  ?>
                 <?php echo form_error('alamat');?>
                </div>
              </div> <!--/ Alamat -->
                          
               <div class="form-group">
                   <label for="hp" class="col-sm-2 control-label">Hp</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'hp',
                                 'id'           => 'hp',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Hp',
                                 'maxlength'=>'100'
                                 ),
                                 set_value('hp',$barang_jual['hp'])
                           );             
                  ?>
                 <?php echo form_error('hp');?>
                </div>
              </div> <!--/ Hp -->
                          
               <div class="form-group">
                   <label for="total_diskon" class="col-sm-2 control-label">Total Diskon</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'total_diskon',
                                 'id'           => 'total_diskon',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Total Diskon',
                                 
                                 ),
                                 set_value('total_diskon',$barang_jual['total_diskon'])
                           );             
                  ?>
                 <?php echo form_error('total_diskon');?>
                </div>
              </div> <!--/ Total Diskon -->
                          
               <div class="form-group">
                   <label for="total_ongkoskirim" class="col-sm-2 control-label">Total Ongkoskirim</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'total_ongkoskirim',
                                 'id'           => 'total_ongkoskirim',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Total Ongkoskirim',
                                 
                                 ),
                                 set_value('total_ongkoskirim',$barang_jual['total_ongkoskirim'])
                           );             
                  ?>
                 <?php echo form_error('total_ongkoskirim');?>
                </div>
              </div> <!--/ Total Ongkoskirim -->
                          
               <div class="form-group">
                   <label for="total_upah" class="col-sm-2 control-label">Total Upah</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'total_upah',
                                 'id'           => 'total_upah',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Total Upah',
                                 
                                 ),
                                 set_value('total_upah',$barang_jual['total_upah'])
                           );             
                  ?>
                 <?php echo form_error('total_upah');?>
                </div>
              </div> <!--/ Total Upah -->
                          
               <div class="form-group">
                   <label for="total" class="col-sm-2 control-label">Total <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'total',
                                 'id'           => 'total',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Total',
                                 
                                 ),
                                 set_value('total',$barang_jual['total'])
                           );             
                  ?>
                 <?php echo form_error('total');?>
                </div>
              </div> <!--/ Total -->
                          
               <div class="form-group">
                   <label for="status" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'status',
                           $status,  
                           set_value('status',$barang_jual['status']),
                           'class="form-control input-sm "  id="status"'
                           );             
                  ?>
                 <?php echo form_error('status');?>
                </div>
              </div> <!--/ Status -->
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
                   <a href="<?php echo site_url('barang_jual'); ?>" class="btn btn-default">
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