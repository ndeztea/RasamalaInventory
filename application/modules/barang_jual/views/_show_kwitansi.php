<div class="wrapper">
      <h4 style="text-align:center">KWITANSI</h4>
      <!-- Main content -->
      <section class="invoice">
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-6 invoice-col"> 
            <?php echo date('d/m/Y')?><br/><br/>
            No. Kwitansi : <br/>
            Telah terima dari :  <strong><?php echo $barang_jual['nama']?></strong><br>
            Alamat : <?php echo $barang_jual['alamat']?><br>
            Telp/HP: <?php echo $barang_jual['hp']?><br/>
            <br/>
            Uang Sejumlah : <strong><?php echo format_uang($barang_jual['total'])?></strong>
            <br>
            Untuk Pembayaran : <strong>Pelunasan barang  dengan kode order  <?php echo $barang_jual['kode_jual'] ?></strong>
            <br/><br/>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
           
          </div><!-- /.col -->
          
        </div><!-- /.row -->

        <div class="row">
          <div class="col-xs-7">
            <!--p class="lead">Payment Methods:</p>
           
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
              Lakukan pembayaran ke
            </p-->
          </div><!-- /.col -->
          

          <div class="col-xs-3">
            <p class="lead">Hormat Kami</p>
            <div class="table-responsive">
              <br/>
              <br/>
              <br/>
              <br/>
              CV. RASAMALA
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
        
</div><!--/ Panel -->

