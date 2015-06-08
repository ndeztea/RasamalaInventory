<div class="row dashboard">
<!-- summary -->
  <div class="col-sm-6 col-md-3 col-lg-3">
  	<div class="penjualan">
	  	<small>Total Penjualan 7 hari terakhir</small>
	  	<h2><?php echo format_uang($total_jual)?></2>
	</div>
  </div>
  <div class="col-sm-6  col-md-3 col-lg-3">
  	<div class="pembelian">
	  	<small>Total Pembelian 7 hari terakhir</small>
	  	<h2><?php echo format_uang($total_beli)?></2>
	 </div>
  </div>
  <div class="col-sm-6 col-md-3 col-lg-3">
  	<div class="hutang">
	  	<small>Total Sisa Hutang</small>
	  	<h2><?php echo format_uang($total_hutang)?></h2>
	</div>
  </div>
  <div class="col-sm-6 col-md-3 col-lg-3">
  	<div class="piutang">
	  	<small>Total Sisa Piutang</small>
	  	<h2><?php echo format_uang($total_piutang)?></h2>
	</content>
  </div>
  <!-- end summary -->
  </div>

<div class="row dashboard">
  <!-- list -->
  <div class="col-sm-12 col-md-12 col-lg-6 summery-list">
  	<div class="penjualan"><small>5 Penjual terakhir</small></div>
  	<table class="table table-hover table-condensed">
            <thead>
              <tr>
            	<th>Tanggal</th>
                <th>Kode Jual</th>   
                <th>Nama</th>   
                <th>Total</th>   
              </tr>
            </thead>
            <tbody>
                <?php if(!empty($list_barang_juals)):?>
                <?php foreach($list_barang_juals as $barang_jual):?>
                <tr>
              	 <td><?php echo format_tanggal($barang_jual['tanggal_update'],true)?></td>
                  <td><?php echo $barang_jual['kode_jual']?></td>   
                  <td><?php echo $barang_jual['nama']?></td>   
                  <td class="number"><?php echo format_uang($barang_jual['total'])?></td>  
                </tr>  
              <?php endforeach?>
                <?php endif?>                              
            </tbody>
         </table>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-6  summery-list">
  	<div class="pembelian"><small>5 Pembelian terakhir</small></div>
  	<table class="table table-hover table-condensed">
            <thead>
              <tr>
            	<th>Tanggal</th>
                <th>Kode Beli</th>   
                <th>Nama</th>   
                <th>Total</th>   
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($list_barang_belis)):?>
              <?php foreach($list_barang_belis as $barang_beli):?>
              <tr>
               <td><?php echo format_tanggal($barang_beli['tanggal_update'],true)?></td>
                <td><?php echo $barang_beli['kode_beli']?></td>   
                <td><?php echo $barang_beli['nama']?></td>   
                <td class="number"><?php echo format_uang($barang_jual['total'])?></td>  
              </tr>  
            <?php endforeach?>
              <?php endif?>                              
            </tbody>
         </table>
  </div>

  <!-- list -->
  <div class="col-sm-12 col-md-12 col-lg-6 summery-list">
  	<div class="piutang"><small>5 Piutang terakhir</small></div>
  	<table class="table table-hover table-condensed">
      <thead>
        <tr>
          <th>Jenis Piutang</th>   
          <th>Jatuh Tempo</th>   
          <th>Total</th> 
          <th>Status</th>   
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($list_piutangs)):?>
        <?php foreach($list_piutangs as $piutang):?>
        <tr>
          <td><?php echo $piutang['jenis_piutang']?></td>
          <td><?php echo format_tanggal($piutang['jatuh_tempo'])?></td>   
          <td><?php echo format_uang($piutang['total'])?></td>    
          <td><?php echo $this->statuss->get_status_name($piutang['status'])?></td>
        </tr>  
      <?php endforeach?>
        <?php endif?>                              
      </tbody>
    </table>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-6  summery-list">
  	<div class="hutang"><small>5 Hutang terakhir</small></div>
  	<table class="table table-hover table-condensed">
      <thead>
        <tr>
          <th>Jenis Hutang</th>   
          <th>Jatuh Tempo</th>   
          <th>Total</th> 
          <th>Status</th>   
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($list_hutangs)):?>
        <?php foreach($list_hutangs as $hutang):?>
        <tr>
          <td><?php echo $hutang['jenis_hutang']?></td>
          <td><?php echo format_tanggal($hutang['jatuh_tempo'])?></td>   
          <td><?php echo format_uang($hutang['total'])?></td>    
          <td><?php echo $this->statuss->get_status_name($hutang['status'])?></td>
        </tr>  
      <?php endforeach?>
        <?php endif?>                              
      </tbody>
    </table>
  </div>

    <!-- end list -->

</div>