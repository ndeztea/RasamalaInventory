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
                <th>Kode Beli</th>   
                <th>Nama</th>   
                <th>Total</th>   
              </tr>
            </thead>
            <tbody>
            	<td>Tanggal</td>
                <td>Kode Beli</td>   
                <td>Nama</td>   
                <td>Total</td>                                  
            </tbody>
         </table>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-6">
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
            	<td>Tanggal</td>
                <td>Kode Beli</td>   
                <td>Nama</td>   
                <td>Total</td>                                  
            </tbody>
         </table>
  </div>

  <!-- list -->
  <div class="col-sm-12 col-md-12 col-lg-6 summery-list">
  	<div class="piutang"><small>5 Piutang terakhir</small></div>
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
            	<td>Tanggal</td>
                <td>Kode Beli</td>   
                <td>Nama</td>   
                <td>Total</td>                                  
            </tbody>
         </table>
  </div>
  <div class="col-sm-12 col-md-12 col-lg-6">
  	<div class="hutang"><small>5 Hutang terakhir</small></div>
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
            	<td>Tanggal</td>
                <td>Kode Beli</td>   
                <td>Nama</td>   
                <td>Total</td>                                  
            </tbody>
         </table>
  </div>

    <!-- end list -->

</div>