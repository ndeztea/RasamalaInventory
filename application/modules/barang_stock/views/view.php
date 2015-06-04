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
                                           site_url('barang_stock/add'),
                                            '<i class="glyphicon glyphicon-plus"></i>',
                                            'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Tambah Data"'
                                          );
                 ?>
                
            </div>
            <div class="col-md-4 col-xs-9">
                                           
                 <?php echo form_open(site_url('barang_stock/search'), 'role="search" class="form"') ;?>       
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
         <?php if ($barang_stocks) : ?>
          <table class="table table-hover table-condensed">
              
            <thead>
              <tr>
                <th class="header">#</th>
                
                    <th>Nama Barang</th>   
                
                    <th>Kode Barang</th>   
                
                    <th>Category</th>   
                
                    <th>Jumlah Stocks</th> 
                    <th>Harga Beli</th>   
                    <th>Harga Jual</th>   
                
                <th class="red header" align="right" width="120">Aksi</th>
              </tr>
            </thead>
            
            
            <tbody>
             
               <?php foreach ($barang_stocks as $barang_stock) : ?>
              <tr <?php echo $barang_stock['jumlah_stocks']<=5?'class="warning-stocks"':''?>>
              	<td><?php echo $number++;; ?> </td>
               
               <td><?php echo $barang_stock['nama_barang']; ?></td>
               
               <td><?php echo $barang_stock['kode_barang']; ?></td>
               
               <td><?php echo $this->categorys->get_category_name($barang_stock['id_category'])?></td>
               
               <td><?php echo $barang_stock['jumlah_stocks']; ?> <?php echo $this->satuans->get_satuan_name($barang_stock['id_satuan'])?></td>
               <td><?php echo format_uang($barang_stock['harga_beli']); ?></td>
               <td><?php echo format_uang($barang_stock['harga_jual']); ?></td>
               
                <td>    
                    
                    <?php
                                  /*echo anchor(
                                          site_url('barang_stock/show/' . $barang_stock['id']),
                                            '<i class="glyphicon glyphicon-eye-open"></i>',
                                            'class="btn btn-sm btn-info" data-tooltip="tooltip" data-placement="top" title="Detail"'
                                          );*/
                   ?>
                    
                    <?php
                                  echo anchor(
                                          site_url('barang_stock/edit/' . $barang_stock['id']),
                                            '<i class="glyphicon glyphicon-edit"></i>',
                                            'class="btn btn-sm btn-success" data-tooltip="tooltip" data-placement="top" title="Edit"'
                                          );
                   ?>
                   
                   <?php
                                  echo anchor(
                                          site_url('barang_stock/destroy/' . $barang_stock['id']),
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
                <?php  echo notify('Data barang_stock belum tersedia','info');?>
          <?php endif; ?>
    </div>
    
    
    <div class="panel-footer">
        <div class="row">
           <div class="col-md-3">
               Barang Stock
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