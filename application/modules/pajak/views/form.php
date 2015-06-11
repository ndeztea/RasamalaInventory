<div class="row">
	<div class="col-lg-12 col-md-12">		
		<?php 
                
                echo create_breadcrumb();		
                echo $this->session->flashdata('notify');
                
                ?>
	</div>
</div><!-- /.row -->
<div class="pajak">
  <h4 style="text-align: center">FAKTUR PAJAK</h4>
  <?php echo form_open(site_url('pajak/' . $action),'role="form" class="form-horizontal" id="form_pajak" parsley-validate'); ?>               

  <table width="100%">
    <tr>
      <td width="250"> Kode dan Nomor Seri Faktur Pajak :</td>
      <td><?php                  
                     echo form_input(
                                  array(
                                   'name'         => 'kode',
                                   'id'           => 'kode',                       
                                   'class'        => 'form-control input-sm ',
                                   'placeholder'  => 'Kode',
                                   'maxlength'=>'255'
                                   ),
                                   set_value('kode',$pajak['kode'])
                             );             
                    ?>
                   <?php echo form_error('kode');?>
                 </td>
    </tr>
    <tr>
      <td colspan="2">Pengusaha Kena Pajak</td>
    </tr>
    <tr>
      <td>Nama : </td>
      <td><?php                  
                     echo form_input(
                                  array(
                                   'name'         => 'nama_pembeli_pajak',
                                   'id'           => 'nama_pembeli_pajak',                       
                                   'class'        => 'form-control input-sm ',
                                   'placeholder'  => 'Nama Pembeli',
                                   'maxlength'=>'255'
                                   ),
                                   set_value('nama_pembeli_pajak',$pajak['nama_pembeli_pajak'])
                             );             
                    ?>
                   <?php echo form_error('nama_pembeli_pajak');?></td>
    </tr>
    <tr>
      <td>Alamat : </td>
      <td><?php                  
                     echo form_textarea(
                              array(
                                  'id'            =>'alamat_pembeli_pajak',
                                  'name'          =>'alamat_pembeli_pajak',
                                  'rows'          =>'3',
                                  'class'         =>'form-control input-sm ',
                                  'placeholder'   =>'Alamat Pembeli',
                                  
                                  ),
                              set_value('alamat_pembeli_pajak',$pajak['alamat_pembeli_pajak'])                           
                              );             
                    ?>
                   <?php echo form_error('alamat_pembeli_pajak');?></td>
    </tr>
    <tr>
      <td>NPWP : </td>
      <td><?php                  
                     echo form_input(
                                  array(
                                   'name'         => 'npwp_pembeli_pajak',
                                   'id'           => 'npwp_pembeli_pajak',                       
                                   'class'        => 'form-control input-sm ',
                                   'placeholder'  => 'Npwp Pembeli',
                                   'maxlength'=>'255'
                                   ),
                                   set_value('npwp_pembeli_pajak',$pajak['npwp_pembeli_pajak'])
                             );             
                    ?>
                   <?php echo form_error('npwp_pembeli_pajak');?></td>
    </tr>
    <tr>
      <td colspan="2">Pembeli Barang Kena Pajak / Penerima Jasa Kena Pajak</td>
    </tr>
    <tr>
      <td>Nama : </td>
      <td><?php                  
                     echo form_input(
                                  array(
                                   'name'         => 'nama_penjual_pajak',
                                   'id'           => 'nama_penjual_pajak',                       
                                   'class'        => 'form-control input-sm ',
                                   'placeholder'  => 'Nama Penjual',
                                   'maxlength'=>'255'
                                   ),
                                   set_value('nama_penjual_pajak',$pajak['nama_penjual_pajak'])
                             );             
                    ?>
                   <?php echo form_error('nama_penjual_pajak');?></td>
    </tr>
    <tr>
      <td>Alamat : </td>
      <td><?php                  
                     echo form_textarea(
                              array(
                                  'id'            =>'alamat_penjual_pajak',
                                  'name'          =>'alamat_penjual_pajak',
                                  'rows'          =>'3',
                                  'class'         =>'form-control input-sm ',
                                  'placeholder'   =>'Alamat Penjual',
                                  
                                  ),
                              set_value('alamat_penjual_pajak',$pajak['alamat_penjual_pajak'])                           
                              );             
                    ?>
                   <?php echo form_error('alamat_penjual_pajak');?></td>
    </tr>
    <tr>
      <td>NPWP : </td>
      <td><?php                  
                     echo form_input(
                                  array(
                                   'name'         => 'npwp_penjual_pajak',
                                   'id'           => 'npwp_penjual_pajak',                       
                                   'class'        => 'form-control input-sm ',
                                   'placeholder'  => 'Npwp Penjual',
                                   'maxlength'=>'255'
                                   ),
                                   set_value('npwp_penjual_pajak',$pajak['npwp_penjual_pajak'])
                             );             
                    ?>
                   <?php echo form_error('npwp_penjual_pajak');?></td>
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
                <?php $a=0;foreach($data_barang as $row):?>
                <tr id="data_<?php echo $a?>" class="barang_items">
                  <td>
                    <a href="javascript:;" onclick="barang_items(this)" class="btn btn-danger btn-sm" data-tooltip="tooltip" data-placement="top" title="" data-original-title="Hapus Barang">
                      <i class="glyphicon glyphicon-minus"></i>
                    </a>
                  </td>
                  <td><input name="nama_barang[]" value="<?php echo $row->nama_barang?>" class="nama_mandor form-control input-sm"/></td>
                  <td>&nbsp;</td>
                  <td><input name="harga[]" oninput="hitung_total()" value="<?php echo $row->harga?>" class="jumlah_pekerja form-control input-sm number"/></td>
                </tr>
                <?php $a++;endforeach?>
              <?php else:?>
            <tr id="data_0" class="barang_items">
              <td>
                <a href="javascript:;" onclick="barang_items(this)" class="btn btn-danger btn-sm" data-tooltip="tooltip" data-placement="top" title="" data-original-title="Hapus Barang">
                  <i class="glyphicon glyphicon-minus"></i>
                </a>
              </td>
              <td><input name="nama_barang[]" value="" class="nama_barang form-control input-sm"/></td>
              <td>&nbsp;</td>
              <td><input name="harga[]"  oninput="hitung_total()" class="harga form-control input-sm number"/></td>
            </tr>
          <?php endif?>
          </tbody>
          <tr>
            <td><a href="javascript:;" onclick="tambah_barang()" class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="" data-original-title="Tambah Mandor">
                  <i class="glyphicon glyphicon-plus"></i>
                </a></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="2">Harga Jual <strike>/ Pengganti / Uang Muka / Termin</strike> **</td>
            <td></td>
            <td><?php                  
                   echo form_input(
                                array(
                                 'name'         => 'harga_jual',
                                 'id'           => 'harga_jual',                       
                                 'class'        => 'form-control input-sm number',
                                 'placeholder'  => 'Harga Jual',
                                 'readonly'     => 'readonly'
                                 
                                 ),
                                 set_value('harga_jual',$pajak['harga_jual'])
                           );             
                  ?>
                 <?php echo form_error('harga_jual');?></td>
          </tr>
          <tr>
            <td colspan="2">Dikurangi Potongan Harga</td>
            <td></td>
            <td><?php                  
                   echo form_input(
                                array(
                                 'name'         => 'harga_potongan',
                                 'id'           => 'harga_potongan',                       
                                 'class'        => 'form-control input-sm number',
                                 'placeholder'  => 'Harga Potongan',
                                 'oninput'      => ' hitung_total() ',
                                 
                                 ),
                                 set_value('harga_potongan',$pajak['harga_potongan'])
                           );             
                  ?>
                 <?php echo form_error('harga_potongan');?></td>
          </tr>
          <tr>
            <td colspan="2">Dikurangi Uang Muka yang telah diterima</td>
            <td></td>
            <td><?php                  
                   echo form_input(
                                array(
                                 'name'         => 'uang_muka_diterima',
                                 'id'           => 'uang_muka_diterima',                       
                                 'class'        => 'form-control input-sm number',
                                 'placeholder'  => 'Uang Muka Diterima',
                                'oninput'      => ' hitung_total() ',
                                 
                                 ),
                                 set_value('uang_muka_diterima',$pajak['uang_muka_diterima'])
                           );             
                  ?>
                 <?php echo form_error('uang_muka_diterima');?></td>
          </tr>
          <tr>
            <td colspan="2">Dasar Penggunaan Pajak</td>
            <td></td>
            <td><?php                  
                   echo form_input(
                                array(
                                 'name'         => 'dasar_pengenaan_pajak',
                                 'id'           => 'dasar_pengenaan_pajak',                       
                                 'class'        => 'form-control input-sm number',
                                 'placeholder'  => 'Dasar Pengenaan Pajak',
                                 'readonly'      => ' readonly ',
                                 
                                 ),
                                 set_value('dasar_pengenaan_pajak',$pajak['dasar_pengenaan_pajak'])
                           );             
                  ?>
                 <?php echo form_error('dasar_pengenaan_pajak');?></td>
          </tr>
          <tr>
            <td colspan="2">PPN = 10% x Dasar Pengenaan Pajak</td>
            <td></td>
            <td><?php                  
                   echo form_input(
                                array(
                                 'name'         => 'ppn',
                                 'id'           => 'ppn',                       
                                 'class'        => 'form-control input-sm number',
                                 'placeholder'  => 'Ppn',
                                 'readonly'      => ' readonly ',
                                 
                                 ),
                                 set_value('ppn',$pajak['ppn'])
                           );             
                  ?>
                 <?php echo form_error('ppn');?></td>
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
<div class="panel panel-default">
    <div class="panel-footer">   
          <div class="row"> 
              <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0">
                   <a href="<?php echo site_url('pajak'); ?>" class="btn btn-default">
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