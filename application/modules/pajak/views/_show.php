<?php if(!$print):?>
<div class="row">
    <div class="col-lg-12 col-md-12">       
        <?php 
                
                echo create_breadcrumb();       
                echo $this->session->flashdata('notify');
                
                ?>
    </div>
</div><!-- /.row -->
<?php endif?>
<div class="pajak">
  <h4 style="text-align: center">FAKTUR PAJAK</h4>
  <table width="100%">
    <tr>
      <td width="250"> Kode dan Nomor Seri Faktur Pajak :</td>
      <td><?php echo $pajak['kode']?></td>
    </tr>
    <tr>
      <td colspan="2">Pengusaha Kena Pajak</td>
    </tr>
    <tr>
      <td>Nama : </td>
      <td><?php echo    $pajak['nama_pembeli_pajak']?></td>
    </tr>
    <tr>
      <td>Alamat : </td>
      <td><?php  echo $pajak['alamat_pembeli_pajak'] ?></td>
    </tr>
    <tr>
      <td>NPWP : </td>
      <td><?php $pajak['npwp_pembeli_pajak']?></td>
    </tr>
    <tr>
      <td colspan="2">Pembeli Barang Kena Pajak / Penerima Jasa Kena Pajak</td>
    </tr>
    <tr>
      <td>Nama : </td>
      <td><?php echo $pajak['nama_penjual_pajak']?></td>
    </tr>
    <tr>
      <td>Alamat : </td>
      <td><?php echo $pajak['alamat_penjual_pajak']?></td>
    </tr>
    <tr>
      <td>NPWP : </td>
      <td><?php echo $pajak['npwp_penjual_pajak'];?></td>
    </tr>
    <tr>
      <td colspan="2">
        <table  class="data_barang_pajak" width="100%">
            <thead>
            <tr>
              <th rowspan="2">No.</th>
              <th rowspan="2">Nama Barang Kena Pajak / Jasa Kena Pajak</th>
              <th colspan="2">Harga Jual / Pengganti / Uang Muka / Termin</th>
            </tr>
            <tr>
              <th>Valas *)</th>
              <th>(Rp)</th>
            </tr>
          </thead>
          <tbody class="data-detail">
            <?php if(!empty($pajak['data'])):?>
              <?php $data_barang = json_decode($pajak['data']);?>
                <?php $a=1;foreach($data_barang as $row):?>
                <tr id="data_<?php echo $a?>" class="barang_items">
                  <td><?php echo $a?></td>
                  <td><?php echo $row->nama_barang?></td>
                  <td>&nbsp;</td>
                  <td class="number"><?php echo format_uang($row->harga)?></td>
                </tr>
                <?php $a++;endforeach?>
          <?php endif?>
          <tr>
              <td></td>
              <td></td>
              <td>&nbsp;</td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>&nbsp;</td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>&nbsp;</td>
              <td></td>
            </tr>
          </tbody>
          <tr>
            <td colspan="2">Harga Jual <strike>/ Pengganti / Uang Muka / Termin</strike> **</td>
            <td></td>
            <td class="number"><?php  echo format_uang($pajak['harga_jual'])?></td>
          </tr>
          <tr>
            <td colspan="2">Dikurangi Potongan Harga</td>
            <td></td>
            <td class="number"><?php echo format_uang($pajak['harga_potongan'])?></td>
          </tr>
          <tr>
            <td colspan="2">Dikurangi Uang Muka yang telah diterima</td>
            <td></td>
            <td class="number"><?php    echo format_uang($pajak['uang_muka_diterima'])?></td>
          </tr>
          <tr>
            <td colspan="2">Dasar Penggunaan Pajak</td>
            <td></td>
            <td class="number"><?php echo format_uang($pajak['dasar_pengenaan_pajak'])?></td>
          </tr>
          <tr>
            <td colspan="2">PPN = 10% x Dasar Pengenaan Pajak</td>
            <td></td>
            <td class="number"><?php  echo format_uang($pajak['ppn'])?></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="2" >
        <table width="100%" class="no-border">
          <tr>
            <td width="50%" class="no-border">
              Pajak Penjual Atas Barang Mewah
              <table width="500" class="pajak_mewah">
                <tr>
                  <th>Tarif</th>
                  <th>DPP</th>
                  <th>PPN BM</th>
                </tr>
                <tr>
                  <td>........%</td>
                  <td>Rp. .......</td>
                  <td>Rp. .......</td>
                </tr>
                <tr>
                  <td>........%</td>
                  <td>Rp. .......</td>
                  <td>Rp. .......</td>
                </tr>
                <tr>
                  <td>........%</td>
                  <td>Rp. .......</td>
                  <td>Rp. .......</td>
                </tr>
                <tr>
                  <td colspan="2">Jumlah</td>
                  <td>Rp. .......</td>
                </tr>

                </table><br/>
                Nilai Tukar Kurs : ....................<br/><br/>
                Berdasarkan KMK No : .................... Tanggal : ....................
              </td>
              <td class="no-border" width="50%" style="text-align: center;vertical-align: top"> Bandung, tgl <?php echo date("d/m/Y")?>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>..............................<br/><sup>Nama Lengkap</sup></p>
              </td>
            </tr>
          </table>

      </td>
    </tr>
  </table>

</div>
<?php if(!$print):?>
<div class="panel panel-default">
    <div class="panel-footer">   
          <div class="row"> 
              <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
                   <a target="_blank" href="<?php echo site_url('pajak/show/'.$pajak['id'].'/print'); ?>" class="btn btn-primary">
                       <i class="glyphicon glyphicon-print"></i> Print
                   </a>                 
              </div>
          </div>
    </div><!--/ Panel Footer -->       
</div><!--/ Panel -->
<?php endif?>
<script>
  function hitung_total(){
    harga_jual = 0;
    $( "tr.barang_items" ).each(function( index ) {
      barang_items_id = $( this ).attr('id');
      val_tmp = $('#'+barang_items_id+' input[name="harga[]"]').val();
      val_tmp = val_tmp==''?0:val_tmp;
      harga_jual += parseFloat(val_tmp);
    //  alert(harga_jual);
    });
    $('#harga_jual').val(harga_jual); 

    potongan = parseFloat($('#harga_potongan').val()) + parseFloat($('#uang_muka_diterima').val());

    dasar_pengenaan_pajak = harga_jual - potongan;
    $('#dasar_pengenaan_pajak').val(dasar_pengenaan_pajak);

    ppn = dasar_pengenaan_pajak * 10 / 100;
    $('#ppn').val(ppn);

  }
  function hapus_barang(elm){
    $(elm).parent().parent().remove();
  }
  function tambah_barang(){
    elem = $('.data-detail tr').first().html();
    $('.data-detail').append('<tr class="barang_items" id="data_'+$('.data-detail tr').length+'">'+elem+'</tr>');
  }
</script>