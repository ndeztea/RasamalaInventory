<div class="wrapper">
      <div class="page-header">
       <h3>Barang Beli</h3>
      </div>
      <!-- Main content -->
      <section class="invoice">
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            <h4>Beli dari</h4>
            <address>
              <strong><?php echo $barang_beli['nama']?></strong><br>
              Alamat : <?php echo $barang_beli['alamat']?><br>
              Telp/HP: <?php echo $barang_beli['hp']?><br/>
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
           
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Kode <?php echo $barang_beli['kode_beli']?></b><br/>
            <br/>
            <b>Tanggal:</b> <?php echo format_tanggal($barang_beli['tanggal_update'])?><br/>
            <b>Account:</b> <?php echo $this->userss->get_nama($barang_beli['id_user'])?>
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
                  <th>Kode Barang</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <?php $a=$sub_total=0;foreach($barang_beli_details as $barang_beli_detail): $a++;?>
                <tr>
                  <td><?php echo $a?></td>
                  <td><?php echo $barang_beli_detail['nama_barang']?></td>
                  <td><?php echo $barang_beli_detail['kode_barang']?></td>
                  <td  class="number"><?php echo format_uang($barang_beli_detail['harga'])?></td>
                  <td><?php echo $barang_beli_detail['jumlah']?></td>
                  <td><?php echo $barang_beli_detail['id_satuan']?></td>
                  <td class="number"><?php echo format_uang($barang_beli_detail['total_harga'])?></td>
                  <?php $sub_total += $barang_beli_detail['total_harga']?>
                </tr>
              <?php endforeach?>
              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-xs-6">
            <!--p class="lead">Payment Methods:</p>
           
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              Lakukan pembayaran ke
            </p-->
          </div><!-- /.col -->
          <!-- accepted payments column -->
          <div class="col-xs-6">
            <p class="lead">TOTAL</p>
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Sub total:</th>
                  <td class="number"><?php echo format_uang($sub_total)?></td>
                </tr>
                <tr>
                  <th>Total Diskon</th>
                  <td class="number"><?php echo format_uang($barang_beli['total_diskon'])?>
                  </td>
                </tr>
                <tr>
                  <th>Total Ongkos Kirim:</th>
                  <td class="number"><?php echo format_uang($barang_beli['total_ongkoskirim'])?></td>
                </tr>
                <tr>
                  <th>Total Upah:</th>
                  <td class="number"><?php echo format_uang($barang_beli['total_upah'])?>
                  </td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td class="number"><strong><?php echo format_uang($barang_beli['total'])?></strong></td>
                </tr>
                <tr>
                  <th>Status:</th>
                  <td><strong><?php echo $this->statuss->get_status_name($barang_beli['status'])?></strong>
                  </td>
                </tr>
              </table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
      <div class="panel-footer">   
          <div class="row"> 
              <div>
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

