<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<?php echo form_open(site_url('barang_beli/' . $action),'role="form" class="form-horizontal" id="form_barang_beli" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-signal"></i> </div>
     
      <div class="panel-body">
        <div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
        <!-- info row -->
        <div class="row invoice-info">
          <!--div class="col-sm-4 invoice-col">
            From
            <address>
              <strong>Admin, Inc.</strong><br>
              795 Folsom Ave, Suite 600<br>
              San Francisco, CA 94107<br>
              Phone: (804) 123-5432<br/>
              Email: info@almasaeedstudio.com
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <strong>Beli Dari</strong>
            <address>
              <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'nama',
                                 'id'           => 'nama',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Nama',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('nama',$barang_beli['nama'])
                           );             
                  ?>
                 <?php echo form_error('nama');?>
              <?php                  
                   echo form_textarea(
                            array(
                                'id'            =>'alamat',
                                'name'          =>'alamat',
                                'rows'          =>'3',
                                'class'         =>'form-control input-sm  required',
                                'placeholder'   =>'Alamat',
                                
                                ),
                            set_value('alamat',$barang_beli['alamat'])                           
                            );             
                  ?>
                 <?php echo form_error('alamat');?>
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">

          </div>
          <div class="col-sm-4 invoice-col">
            <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'kode_beli',
                                 'id'           => 'kode_beli',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Kode Beli',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('kode_beli',$barang_beli['kode_beli'])
                           );             
                  ?>
                 <?php echo form_error('kode_beli');?>
            <b>Payment Due:</b> <?php echo date('d/m/Y')?><br/>
            <b>Account:</b> USERNAME
          </div><!-- /.col -->
        </div><!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Barang</th>
                  <th  style="display: none">Kode Barang</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody class="data-detail">
                <tr>
                  <td> <a href="javascript:;" onclick="hapus_barang(this)" class="btn btn-danger btn-sm" data-tooltip="tooltip" data-placement="top" title="" data-original-title="Hapus Barang">
                    <i class="glyphicon glyphicon-minus"></i>
                  </a>
                </td>
                  <td>
                  <?php                  
                   echo form_dropdown(
                           'nama_barang_tmp[]',
                           $nama_barangs,  
                           set_value('nama_barang',''),
                           'class="form-control input-sm "  onchange="pilih_barang(this)"'
                           );             
                  ?>
                 <?php echo form_error('status');?>
                 <input type="text" style="display: none" name="nama_barang[]" class="form-control input-sm"/>
                </td>
                  <td  style="display: none"><input type="text" name="kode_barang[]" class="form-control input-sm"/></td>
                  <td><input type="text" name="harga[]" class="form-control input-sm number"/></td>
                  <td><input type="text" name="jumlah[]"  size="3"  class="form-control input-sm number"/></td>
                  <td><input type="text" name="id_satuan[]" size="3" class="form-control input-sm"/></td>
                  <td><input type="text" name="total_harga[]" class="form-control input-sm"/></td>
                </tr>
              </tbody>
            </table>
            <a href="javascript:;" onclick="tambah_barang()" class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="" data-original-title="Tambah Barang">
              <i class="glyphicon glyphicon-plus"></i>
            </a>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-xs-6">
           
          </div><!-- /.col -->
          <!-- accepted payments column -->
          <div class="col-xs-6">
            <p class="lead">TOTAL</p>
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Sub total:</th>
                  <td><?php            
                  $sub_total = 0;      
                   echo form_input(
                                array(
                                 'name'         => 'sub_total',
                                 'id'           => 'sub_total',                       
                                 'class'        => 'form-control input-sm  required number',
                                 'placeholder'  => 'sub total',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('sub_total',$sub_total)
                           );             
                  ?></td>
                </tr>
                <tr>
                  <th>Total Diskon</th>
                  <td>
                      <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'total_diskon',
                                 'id'           => 'total_diskon',                       
                                 'class'        => 'form-control input-sm number ',
                                 'placeholder'  => 'Total Diskon',
                                 
                                 ),
                                 set_value('total_diskon',$barang_beli['total_diskon'])
                           );             
                  ?>
                 <?php echo form_error('total_diskon');?>
                  </td>
                </tr>
                <tr>
                  <th>Total Ongkos Kirim:</th>
                  <td><?php                  
                   echo form_input(
                                array(
                                 'name'         => 'total_ongkoskirim',
                                 'id'           => 'total_ongkoskirim',                       
                                 'class'        => 'form-control input-sm number',
                                 'placeholder'  => 'Total Ongkoskirim',
                                 
                                 ),
                                 set_value('total_ongkoskirim',$barang_beli['total_ongkoskirim'])
                           );             
                  ?>
                 <?php echo form_error('total_ongkoskirim');?></td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td><?php                  
                   echo form_input(
                                array(
                                 'name'         => 'total',
                                 'id'           => 'total',                       
                                 'class'        => 'form-control input-sm  required number',
                                 'placeholder'  => 'Total',
                                 
                                 ),
                                 set_value('total',$barang_beli['total'])
                           );             
                  ?>
                 <?php echo form_error('total');?></td>
                </tr>
                <tr>
                  <th>Status:</th>
                  <td>
                    <?php                  
                   echo form_dropdown(
                           'status',
                           $statuss,  
                           set_value('status',$barang_beli['status']),
                           'class="form-control input-sm "  id="status"'
                           );             
                  ?>
                 <?php echo form_error('status');?>
                  </td>
                </tr>
              </table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->

         
                       
               <div class="form-group">
                   <label for="kode_beli" class="col-sm-2 control-label">Kode Beli <span class="required-input">*</span></label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'kode_beli',
                                 'id'           => 'kode_beli',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'Kode Beli',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('kode_beli',$barang_beli['kode_beli'])
                           );             
                  ?>
                 <?php echo form_error('kode_beli');?>
                </div>
              </div> <!--/ Kode Beli -->
                          
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
                                 set_value('nama',$barang_beli['nama'])
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
                            set_value('alamat',$barang_beli['alamat'])                           
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
                                 set_value('hp',$barang_beli['hp'])
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
                                 set_value('total_diskon',$barang_beli['total_diskon'])
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
                                 set_value('total_ongkoskirim',$barang_beli['total_ongkoskirim'])
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
                                 set_value('total_upah',$barang_beli['total_upah'])
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
                                 set_value('total',$barang_beli['total'])
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
                           $statuss,  
                           set_value('status',$barang_beli['status']),
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
                   <a href="<?php echo site_url('barang_beli'); ?>" class="btn btn-default">
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

<script>
 function pilih_barang(elm){
  alert($(elm).val());
 }

 function tambah_barang(){
  elem = $('.data-detail tr').first().html();
  $('.data-detail').append('<tr>'+elem+'</tr>');
 }

 function hapus_barang(elm){
  $(elm).parent().parent().remove();
 }
</script>