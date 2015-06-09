<div class="row">
  <div class="col-lg-12 col-md-12">   
    <?php 
                
                echo create_breadcrumb();   
                //echo $this->session->flashdata('notify');
                
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
                   echo form_input(
                                array(
                                 'name'         => 'hp',
                                 'id'           => 'hp',                       
                                 'class'        => 'form-control input-sm  required',
                                 'placeholder'  => 'HP',
                                 'maxlength'=>'255'
                                 ),
                                 set_value('hp',$barang_beli['hp'])
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
                                 'maxlength'=>'11',
                                 'readonly'  => 'readonly'
                                 ),
                                 set_value('kode_beli',$barang_beli['kode_beli'])
                           );             
                  ?>
                 <?php echo form_error('kode_beli');?>
            <b>Tanggal:</b> <?php echo date('d/m/Y')?><br/>
            <b>Account:</b> <?php echo $this->session->userdata('nama')?>
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
              <tbody class="data-detail">
                <?php $sub_total = $a = 0; ?>
                <?php if(!empty($barang_beli_details)):?>
                <?php foreach($barang_beli_details as $barang_beli_detail):?>
                <tr id="data_<?php echo $a?>" class="barang_items">
                  <td> 
                    <a href="javascript:;" onclick="hapus_barang(this)" class="btn btn-danger btn-sm" data-tooltip="tooltip" data-placement="top" title="" data-original-title="Hapus Barang">
                      <i class="glyphicon glyphicon-minus"></i>
                    </a>
                  </td>
                  <td><input type="text"  name="nama_barang[]"  onfocus="active_barang(this)" value="<?php echo $barang_beli_detail['nama_barang']?>" class="nama_barang form-control input-sm"/></td>
                  <td><input type="text" readonly name="kode_barang[]" value=<?php echo $barang_beli_detail['kode_barang']?> class="form-control input-sm"/></td>
                  <td><input type="text" name="harga[]" value=<?php echo $barang_beli_detail['harga']?> oninput="hitung(this)" class="form-control input-sm number"/></td>
                  <td><input type="text" name="jumlah[]" value=<?php echo $barang_beli_detail['jumlah']?> oninput="hitung(this)" size="3"  class="form-control input-sm number"/></td>
                  <td><input type="text" readonly name="id_satuan[]" value=<?php echo $barang_beli_detail['id_satuan']?> size="3" class="form-control input-sm"/></td>
                  <td><input type="text" readonly name="total_harga[]" value=<?php echo $barang_beli_detail['total_harga']?> class="form-control input-sm number"/></td>
                  <?php $a++;$sub_total += $barang_beli_detail['total_harga']?>
                </tr>
                <?php endforeach?>
                <?php else:?>
                <tr id="data_0" class="barang_items">
                  <td> 
                    <a href="javascript:;" onclick="hapus_barang(this)" class="btn btn-danger btn-sm" data-tooltip="tooltip" data-placement="top" title="" data-original-title="Hapus Barang">
                      <i class="glyphicon glyphicon-minus"></i>
                    </a>
                  </td>
                  <td><input type="text"   name="nama_barang[]"  onfocus="active_barang(this)" class="nama_barang form-control input-sm"/> </td>
                  <td><input type="text" readonly name="kode_barang[]" class="form-control input-sm"/></td>
                  <td><input type="text" name="harga[]"  oninput="hitung(this)" class="form-control input-sm number"/></td>
                  <td><input type="text" name="jumlah[]" oninput="hitung(this)" size="3"  class="form-control input-sm number"/></td>
                  <td><input type="text" readonly name="id_satuan[]" size="3" class="form-control input-sm"/></td>
                  <td><input type="text" readonly name="total_harga[]" class="form-control input-sm number"/></td>
                </tr>
                <?php endif?>
                <input type="hidden" class="parent_id" value="">
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
                       
                   echo form_input(
                                array(
                                 'name'         => 'sub_total',
                                 'id'           => 'sub_total',                       
                                 'class'        => 'form-control input-sm  required number',
                                 'placeholder'  => 'sub total',
                                 'maxlength'=>'11',
                                 'readonly'=>'readonly'
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
                                 'oninput'     => 'hitung_total(this)'
                                 
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
                                 'oninput'     => 'hitung_total()'
                                 
                                 ),
                                 set_value('total_ongkoskirim',$barang_beli['total_ongkoskirim'])
                           );             
                  ?>
                 <?php echo form_error('total_ongkoskirim');?></td>
                </tr>
                <tr>
                  <th>Total Upah:</th>
                  <td>
                    <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'total_upah',
                                 'id'           => 'total_upah',                       
                                 'class'        => 'form-control input-sm number',
                                 'placeholder'  => 'Total Upah',
                                 'oninput'     => 'hitung_total()'
                                 
                                 ),
                                 set_value('total_upah',$barang_beli['total_upah'])
                           );             
                  ?>
                 <?php echo form_error('total_upah');?>
                  </td>
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
                                 'readonly'     => 'readonly',
                                 
                                 ),
                                 set_value('total',$barang_beli['total'])
                           );             
                  ?>
                 <?php echo form_error('total');?></td>
                </tr>
                <tr>
                  <th>Total Bayar:</th>
                  <td><?php                  
                   echo form_input(
                                array(
                                 'name'         => 'total_bayar',
                                 'id'           => 'total_bayar',                       
                                 'class'        => 'form-control input-sm  required number',
                                 'placeholder'  => 'Total Bayar',
                                 'oninput'     => 'hitung_total_sisa()'
                                 ),
                                 set_value('total_bayar',$barang_beli['total_bayar'])
                           );             
                  ?>
                 <?php echo form_error('total_bayar');?></td>
                </tr>
                <tr>
                  <th>Total Sisa:</th>
                  <td><?php                  
                   echo form_input(
                                array(
                                 'name'         => 'total_sisa',
                                 'id'           => 'total_sisa',                       
                                 'class'        => 'form-control input-sm  required number',
                                 'placeholder'  => 'Total Sisa',
                                 'readonly'     => 'readonly'
                                 
                                 ),
                                 set_value('total_sisa',$barang_beli['total_sisa'])
                           );             
                  ?>
                 <?php echo form_error('total_sisa');?></td>
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
      </div> <!--/ Panel Body -->
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
<?php echo form_close(); ?>  

<script>
      function hitung(elm){
        if(typeof elm === 'object'){
          parent = $(elm).parent().parent().attr('id');
        }else{
          parent = elm;
        }

        harga = $('#'+parent+' input[name="harga[]"]').val();
        jumlah = $('#'+parent+' input[name="jumlah[]"]').val();

        // total setiap items
        total_val = parseFloat(harga)*parseFloat(jumlah);
        total = $('#'+parent+' input[name="total_harga[]"]').val(total_val);

        

        hitung_total();
      }

      function hitung_total(){

        // sub total
        sub_total_val = parseFloat(0);
        $( "tr.barang_items" ).each(function( index ) {
          console.log(this);
          barang_items_id = $( this ).attr('id');
          val_tmp = $('#'+barang_items_id+' input[name="total_harga[]"]').val();
          sub_total_val += parseFloat(val_tmp);
        });
        $('#sub_total').val(sub_total_val); 

        // grand total
        total_diskon =  $('#total_diskon').val();
        total_ongkoskirim = $('#total_ongkoskirim').val();
        total_upah = $('#total_upah').val();
        total_diskon = total_diskon==''?0:parseFloat(total_diskon);
        total_ongkoskirim = total_ongkoskirim==''?0:parseFloat(total_ongkoskirim);
        total_upah = total_upah==''?0:parseFloat(total_upah);

        grand_total = (sub_total_val-total_diskon)+total_ongkoskirim+total_upah;
        $('#total').val(grand_total);
      }


      function active_barang(elm){
        parent_id = $(elm).parent().parent().attr('id');
        $('.parent_id').val(parent_id);
        //alert(parent_id);
      }

     function pilih_barang(elm){
      data = elm.item.value;
      parent_id = $('.parent_id').val()
      arr = data.split('|');
      //$('#'+parent_id+' input[name="harga[]"]').val(arr[3]);
      $('#'+parent_id+' input[name="id_satuan[]"]').val(arr[2]);
      $('#'+parent_id+' input[name="kode_barang[]"]').val(arr[1]);
      $('#'+parent_id+' input[name="nama_barang[]"]').val(arr[0]);

      hitung(parent_id);

     }
     var availableTags = [

          <?php foreach($nama_barangs as $label=>$val):?>
          {
            label : "<?php echo str_replace('"','\"',$label)?>",
            value : "<?php echo str_replace('"','\"',$val)?>"
          },
          <?php endforeach?>
        ];

     function tambah_barang(){
      elem = $('.data-detail tr').first().html();
      $('.data-detail').append('<tr class="barang_items" id="data_'+$('.data-detail tr').length+'">'+elem+'</tr>');
      
      $( ".nama_barang" ).autocomplete({
        source: availableTags,
        select: function( event, ui ) {
          pilih_barang(ui);
          return false;
        }
      });
     }

     function hapus_barang(elm){
      $(elm).parent().parent().remove();
     }

    function hitung_total_sisa(){
      total = parseFloat($('#total').val());
      total_bayar = parseFloat($('#total_bayar').val());

      total_sisa = total-total_bayar;
      $('#total_sisa').val(total_sisa);
    }
      
    $( ".nama_barang" ).autocomplete({
      source: availableTags,
      select: function( event, ui ) {
        pilih_barang(ui);
        return false;
      }
    });


</script>