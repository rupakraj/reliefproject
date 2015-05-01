<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo lang('backendpro_dashboard');?><small><?php echo lang('backendpro_control_panel'); ?></small></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php print displayStatus();?>
        <?php print $dashboard ?>
    </section><!-- /.content -->
</aside><!-- /.right-side -->

