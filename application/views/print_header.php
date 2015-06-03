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
   
    <title>Print</title>
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/parsley/parsley.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url(); ?>assets/datepicker/datepicker3.min.css" rel="stylesheet" type="text/css">
	
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery-2.1.1.min.js"></script>
</head>

<body onload="window.print()">
    <div class="container">
            <div class="row">
              <div class="col-xs-12">
                   <strong>CV. RASAMALA</strong>
                  
                    <small class="pull-right">Komp. Taman Kopo Katapang<br/>
                    0987654321<br/>
                    info@rcpindonesia.com<br/></small>
              </div><!-- /.col -->
              <div style="border-bottom:1px solid #DDD">&nbsp;</div>
              <br>
              <?php echo $content?>
            </div>
    </div>
</body>