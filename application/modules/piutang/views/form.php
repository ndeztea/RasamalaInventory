<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<?php echo form_open(site_url('piutang/' . $action),'role="form" class="form-horizontal" id="form_piutang" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="jenis_piutang" class="col-sm-2 control-label">Jenis Piutang <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'jenis_piutang',
                                 'id'           => 'jenis_piutang',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Jenis Piutang',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('jenis_piutang',$piutang['jenis_piutang'])
                           );             
                  ?>
                 <?php echo form_error('jenis_piutang');?>
                </div>
              </div> <!--/ Jenis Piutang -->
                          
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
                                 set_value('total',$piutang['total'])
                           );             
                  ?>
                 <?php echo form_error('total');?>
                </div>
              </div> <!--/ Total -->
                          
               <div class="form-group">
                   <label for="jatuh_tempo" class="col-sm-2 control-label">Jatuh Tempo</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'jatuh_tempo',
                                 'id'           => 'jatuh_tempo',                       
                                 'class'        => 'form-control input-sm tanggal ',
                                 'placeholder'  => 'Jatuh Tempo',
                                 
                                 ),
                                 set_value('jatuh_tempo',$piutang['jatuh_tempo'])
                           );             
                  ?>
                 <?php echo form_error('jatuh_tempo');?>
                </div>
              </div> <!--/ Jatuh Tempo -->
                          
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
                            set_value('keterangan',$piutang['keterangan'])                           
                            );             
                  ?>
                 <?php echo form_error('keterangan');?>
                </div>
              </div> <!--/ Keterangan -->
                          
               <div class="form-group">
                   <label for="status" class="col-sm-2 control-label">Status <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'status',
                           $statuss,  
                           set_value('status',$piutang['status']),
                           'class="form-control input-sm  required"  id="status"'
                           );             
                  ?>
                 <?php echo form_error('status');?>
                </div>
              </div> <!--/ Status -->
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
                   <a href="<?php echo site_url('piutang'); ?>" class="btn btn-default">
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