<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php print $header.' | '. $this->preference->item('site_name');?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="shortcut icon" href="<?php echo site_url("assets/icons/favicon.ico");?> " type="image/x-icon">
        <?php print $this->bep_site->get_metatags();?>
		<?php print $this->bep_site->get_variables();?>
		<?php print $this->bep_assets->get_header_assets();?>
		<?php print $this->bep_site->get_js_blocks();?>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script type="text/javascript">
            $(document).ready(function() {
                $('body').show();
            });
        </script>   
    </head>
    <body style="display:none" class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php print $this->load->view($this->config->item('template_admin') . 'header');?>

        <div class="wrapper row-offcanvas row-offcanvas-left" style="margin-top:0px">
            <!-- Left side column. contains the logo and sidebar -->
            <?php print $this->load->view($this->config->item('template_admin') . 'menu');?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <?php print $this->load->view($this->config->item('template_admin') . 'content');?>

        </div><!-- ./wrapper -->
<?php print $this->bep_assets->get_footer_assets();?>

<script>
$(window).load(function() {
    $('.content').append('<div id="footer"><?php echo $this->preference->item("site_name"); ?> © <?php echo date("Y");?> All Rights Reserved.</div>');
    /*if ($(window).height() > $('.content').height()) {
        $('#footer').css({position: 'fixed', bottom: 0, right:0});
    }*/
});
</script>
</body>
</html>