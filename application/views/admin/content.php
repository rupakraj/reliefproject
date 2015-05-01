<?php if (isset($content)): ?>

<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo lang('backendpro_system'); ?><small><?php echo lang('backendpro_settings'); ?></small></h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<?php print displayStatus();?>
		<?php print $content; ?>
	</section><!-- /.content -->
</aside><!-- /.right-side -->

<?php endif; ?>


<?php
if( isset($page)) {
	if( isset($module)){
		$this->load->view($module.'/'.$page);
	} else {
		$this->load->view($page);
	}
}
?>