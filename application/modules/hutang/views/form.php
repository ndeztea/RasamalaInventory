<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<?php echo form_open(site_url('hutang/' . $action),'role="form" class="form-horizontal" id="form_hutang" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="jenis_hutang" class="col-sm-2 control-label">Jenis Hutang <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'jenis_hutang',
                                 'id'           => 'jenis_hutang',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Jenis Hutang',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('jenis_hutang',$hutang['jenis_hutang'])
                           );             
                  ?>
                 <?php echo form_error('jenis_hutang');?>
                </div>
              </div> <!--/ Jenis Hutang -->
                          
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
                                 set_value('total',$hutang['total'])
                           );             
                  ?>
                 <?php echo form_error('total');?>
                </div>
              </div> <!--/ Total -->
                          
               <div class="form-group">
                   <label for="status" class="col-sm-2 control-label">Status <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'status',
                           $status,  
                           set_value('status',$hutang['status']),
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
                   <a href="<?php echo site_url('hutang'); ?>" class="btn btn-default">
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