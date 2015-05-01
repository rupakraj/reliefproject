<!DOCTYPE html>
<html class="bg-black">
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
<body style="display:none" class="bg-black">

<div class="form-box" id="login-box">
    <div class="header" style="font-family: 'Kaushan Script', cursive; font-weight:normal"><?php print $this->preference->item('site_name'); ?></div>
    <?php print form_open('auth/login')?>
    <div class="body bg-gray">

        <?php print displayStatus();?>

        <div class="form-group">
            <input type="text" name="login_field" id="login_field" value="<?php print $this->validation->login_field?>" class="form-control"  placeholder="<?php print $login_field?>">
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" class="form-control" placeholder="<?php print $this->lang->line('userlib_password')?>">
        </div>          
        <div class="form-group">
            <input type="checkbox" id="remember" name="remember" value="yes"/> <?php print $this->lang->line('userlib_remember_me')?>?
        </div>
    </div>
    <div class="footer">                                                               
        <button type="submit" class="btn bg-navy btn-block"><?php print $this->lang->line('userlib_login')?></button>  
    </div>
    <?php print form_close()?>
</div>


<?php print $this->bep_assets->get_footer_assets();?>
</body>
</html>