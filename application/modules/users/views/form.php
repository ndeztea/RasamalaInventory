<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<?php echo form_open(site_url('users/' . $action),'role="form" class="form-horizontal" id="form_users" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="username" class="col-sm-2 control-label">Username <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'username',
                                 'id'           => 'username',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Username',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('username',$users['username'])
                           );             
                  ?>
                 <?php echo form_error('username');?>
                </div>
              </div> <!--/ Username -->
                          
               <div class="form-group">
                   <label for="password" class="col-sm-2 control-label">Password <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'password',
                                 'id'           => 'password',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Password',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('password',$users['password'])
                           );             
                  ?>
                 <?php echo form_error('password');?>
                </div>
              </div> <!--/ Password -->
                          
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
                                 set_value('nama',$users['nama'])
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
                            set_value('alamat',$users['alamat'])                           
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
                                 set_value('hp',$users['hp'])
                           );             
                  ?>
                 <?php echo form_error('hp');?>
                </div>
              </div> <!--/ Hp -->
                          
               <div class="form-group">
                   <label for="id_akses" class="col-sm-2 control-label">Id Akses <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_dropdown(
                           'id_akses',
                           $id_akses,  
                           set_value('id_akses',$users['id_akses']),
                           'class="form-control input-sm  required"  id="id_akses"'
                           );             
                  ?>
                 <?php echo form_error('id_akses');?>
                </div>
              </div> <!--/ Id Akses -->
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
                   <a href="<?php echo site_url('users'); ?>" class="btn btn-default">
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