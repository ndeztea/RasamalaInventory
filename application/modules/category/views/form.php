<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<?php echo form_open(site_url('category/' . $action),'role="form" class="form-horizontal" id="form_category" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'name',
                                 'id'           => 'name',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Name',
                                 'maxlength'=>'100'
                                 ),
                                 set_value('name',$category['name'])
                           );             
                  ?>
                 <?php echo form_error('name');?>
                </div>
              </div> <!--/ Name -->
                          
               <div class="form-group">
                   <label for="id_parent" class="col-sm-2 control-label">Id Parent</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'id_parent',
                           $id_parent,  
                           set_value('id_parent',$category['id_parent']),
                           'class="form-control input-sm "  id="id_parent"'
                           );             
                  ?>
                 <?php echo form_error('id_parent');?>
                </div>
              </div> <!--/ Id Parent -->
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
                   <a href="<?php echo site_url('category'); ?>" class="btn btn-default">
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