<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>SIMKES | <?php echo ucfirst($title);?></title>

    <link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">

    <script src="<?php echo base_url("assets/js/vendors/jquery-3.2.1.min.js");?>"></script>
    <script src="<?php echo base_url('assets/js/vendors/selectize.min.js');?>"></script>
    <script src="<?php echo base_url("assets/js/require.min.js");?>"></script>

    <script>
    requirejs.config({
        baseUrl: '<?php echo base_url();?>'
    });
    </script>
    <!-- Dashboard Core -->
    <link href="<?php echo base_url('assets/css/dashboard.css'); ?>" rel="stylesheet" />
    <script src="<?php echo base_url('assets/js/dashboard.js');?>"></script>
    <!-- c3.js Charts Plugin -->
    <link href="<?php echo base_url('assets/plugins/charts-c3/plugin.css'); ?>" rel="stylesheet" />
    <script src="<?php echo base_url('assets/plugins/charts-c3/plugin.js');?>"></script>
    <!-- Google Maps Plugin -->
    <link href="<?php echo base_url('assets/plugins/maps-google/plugin.css');?>" rel="stylesheet" />
    <script src="<?php echo base_url('assets/plugins/maps-google/plugin.js');?>"></script>
    <!-- Input Mask Plugin -->
    <script src="<?php echo base_url('assets/plugins/input-mask/plugin.js');?>"></script>
    
</head>

<body class="">
    <?php if ($title == 'login') {?>
    <?php $this->load->view($page);?>
    <?} else {?>
    <div class="page">
        <?php $this->load->view('templates/header');?>
        <div class="my-3 my-md-5">
            <div class="container">
                <?php $this->load->view($page);?>
            </div>
        </div>
    </div>
    <?php $this->load->view('templates/footer');?>
    </div>
    <?}?>
    <?php echo $menu?>
</body>
<script>
function prev() {
    history.back();
}
</script>

</html>