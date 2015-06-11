<?php if($this->uri->segment(4)=='print'):?>
<?php include_once('print_header.php')   ?>
<?php else:?>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--/ No cache -->
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />
   
    <title><?php echo set_label($this->uri->segment(1))?> - PT. RCP</title>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/parsley/parsley.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.min.css" rel="stylesheet" type="text/css">
	
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery-ui.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/typeahead.js"></script>
</head>

<body>
  
    <!-- Fixed navbar -->
    <?php if($this->session->userdata('level')!=''):?>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="<?php echo site_url(); ?>">PT. RCP</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-windows"></i> Dahsboard</a></li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa  fa-database"></i> Data Master <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('barang_stock')?>">Barang Stock</a></li>
                <li><a href="<?php echo site_url('category')?>">Category</a></li>
                <li><a href="<?php echo site_url('satuan')?>">Satuan</a></li>
                <li><a href="<?php echo site_url('users')?>">Pengguna</a></li>
              </ul>
             </li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-shopping-cart"></i> Penjualan <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('barang_jual')?>">Barang Keluar</a></li>
                <li><a href="<?php echo site_url('piutang')?>">Piutang</a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-cart-arrow-down"></i> Pembelian <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('barang_beli')?>">Barang Masuk</a></li>
                <li><a href="<?php echo site_url('hutang')?>">Hutang</a></li>
              </ul>
            </li>
            <li><a href="<?php echo site_url('penggajian'); ?>"><i class="fa fa-money"></i> Data Gaji</a></li>
            <li><a href="<?php echo site_url('pajak'); ?>"><i class="fa  fa-file-powerpoint-o"></i> Faktur Pajak</a></li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bar-chart"></i> Laporan <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('laporan/keuangan')?>">Laporan Keuangan</a></li>
                <li><a href="<?php echo site_url('laporan/barang')?>">Laporan Barang</a></li>
              </ul>
            </li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-user"></i> User <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('login/logout')?>">Log Out</a></li>
              </ul>
            
           


            <!--li><a href="<?php echo site_url('builder'); ?>"><i class="fa fa-code"></i> Builder</a></li-->
            <!--  <li><a href="<?php echo site_url('builder/tools'); ?>"><i class="fa fa-wrench"></i> Tools</a></li> -->
			   
            
            
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <?php endif?>
 
   
    <div class="container">
        <div class="row">
                <?php  echo $this->session->flashdata('notif')?>
                <?php echo $content; ?>
            
        </div>
       
       
    </div><!--/ Content -->
   
     

  




<!--[if lt IE 9]>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/html5shiv.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/holder.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.file-input.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/parsley/parsley.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/parsley/i18n/id.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/locales/bootstrap-datepicker.id.js"></script>

<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";    
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>



<?php echo $js; ?>


</body>
</html>
<?php endif?>
