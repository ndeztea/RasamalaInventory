<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->

<section class="panel panel-default">
    <header class="panel-heading">
        <div class="row">
            <div class="col-md-8 col-xs-3">                
                <?php
                                  echo anchor(
                                           site_url('barang_beli/add'),
                                            '<i class="glyphicon glyphicon-plus"></i>',
                                            'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Tambah Data"'
                                          );
                 ?>
                
            </div>
            <div class="col-md-4 col-xs-9">
                                           
                 <?php echo form_open(site_url('barang_beli/search'), 'role="search" class="form"') ;?>       
                           <div class="input-group pull-right">                      
                                 <input type="text" class="form-control input-sm" placeholder="Cari data" name="q" autocomplete="off"> 
                                 <span class="input-group-btn">
                                      <button class="btn btn-primary btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i> Cari</button>
                                 </span>
                           </div>
                           
               </form> 
                <?php echo form_close(); ?>
            </div>
        </div>
    </header>
    
    
    <div class="panel-body">
         <?php if ($barang_belis) : ?>
          <table class="table table-hover table-condensed">
              
            <thead>
              <tr>
                <th class="header">#</th>
                    <th>Tanggal</th>
                    <th>Kode Beli</th>   
                
                    <th>Nama</th>   
                
                    <th>Alamat</th>   
                
                    <th>Hp</th>   
                
                    <!--th>Total Diskon</th>   
                
                    <th>Total Ongkoskirim</th>   
                
                    <th>Total Upah</th-->   
                
                    <th>Total</th>   
                
                    <th>Status</th>   
                
                <th class="red header" align="right" width="120">Aksi</th>
              </tr>
            </thead>
            
            
            <tbody>
             
               <?php foreach ($barang_belis as $barang_beli) : ?>
                <?php 
                $class = '';
                if($barang_beli['status']==1){
                  $class = 'class="success"';
                }elseif($barang_beli['status']==2){
                  $class = 'class="warning-stocks"';
                }
               ?>
              <tr <?php echo $class?>>
              	<td><?php echo $number++;; ?> </td>
                <td><?php echo format_tanggal($barang_beli['tanggal_update']); ?></td>
               
               <td><?php echo $barang_beli['kode_beli']; ?></td>
               
               <td><?php echo $barang_beli['nama']; ?></td>
               
               <td><?php echo $barang_beli['alamat']; ?></td>
               
               <td><?php echo $barang_beli['hp']; ?></td>
               
               <!--td><?php echo format_uang($barang_beli['total_diskon']); ?></td>
               
               <td><?php echo format_uang($barang_beli['total_ongkoskirim']); ?></td>
               
               <td><?php echo format_uang($barang_beli['total_upah']); ?></td-->
               
               <td><?php echo format_uang($barang_beli['total']); ?></td>
               
               <td><?php echo $this->statuss->get_status_name($barang_beli['status']); ?></td>
               
                <td>    
                    
                    <?php
                                  echo anchor(
                                          site_url('barang_beli/show/' . $barang_beli['id']),
                                            '<i class="glyphicon glyphicon-eye-open"></i>',
                                            'class="btn btn-sm btn-info" data-tooltip="tooltip" data-placement="top" title="Detail"'
                                          );
                   ?>
                    
                    <?php
                                  echo anchor(
                                          site_url('barang_beli/edit/' . $barang_beli['id']),
                                            '<i class="glyphicon glyphicon-edit"></i>',
                                            'class="btn btn-sm btn-success" data-tooltip="tooltip" data-placement="top" title="Edit"'
                                          );
                   ?>
                   
                   <?php
                                  echo anchor(
                                          site_url('barang_beli/destroy/' . $barang_beli['id']),
                                            '<i class="glyphicon glyphicon-trash"></i>',
                                            'onclick="return confirm(\'Anda yakin..???\');" class="btn btn-sm btn-danger" data-tooltip="tooltip" data-placement="top" title="Hapus"'
                                          );
                   ?>   
                                 
                </td>
              </tr>     
               <?php endforeach; ?>
            </tbody>
          </table>
          <?php else: ?>
                <?php  echo notify('Data barang_beli belum tersedia','info');?>
          <?php endif; ?>
    </div>
    
    
    <div class="panel-footer">
        <div class="row">
           <div class="col-md-3">
               Barang Beli
               <span class="label label-info">
                    <?php echo $total; ?>
               </span>
           </div>  
           <div class="col-md-9">
                 <?php echo $pagination; ?>
           </div>
        </div>
    </div>
</section>