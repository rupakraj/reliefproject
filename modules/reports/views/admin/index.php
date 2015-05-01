<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Reports</h1>
		<div class="breadcrumb" style="top:7px">
            <span class="label label-status-active">Active Records</span>
            <span class="label label-status-inactive">Inactive Records</span>
        </div>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- row -->
		<div class="row">
			<div class="col-xs-12 connectedSortable">

				<?php echo displayStatus(); ?>

				<!-- <button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGridDistrict_vdcInsert"><?php echo lang('create'); ?></button>
				<button type="button" class="btn btn-danger btn-flat btn-xs" id="jqxGridDistrict_vdcFilterClear"><?php echo lang('clear'); ?></button> -->

				<!-- <br /><br /> -->
				
				<div>
					<form>
						<p>District :  <input id="district" name="district" /></p>
						<p>VDC/ MUN :  <input id="vdc-mun" name="vdc-mun" /></p>
						<p>Ward :  <input id="ward" name="ward" /></p>
						<button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGridDistrict_vdcFilterClear">Submit</button>
					</form>
				</div>

				<div id="jqxGrid_reports"></div>

			</div><!-- /.col -->
		</div>
		<!-- /.row -->

	</section><!-- /.content -->
</aside><!-- /.right-side -->



<script language="javascript" type="text/javascript">


$(function(){
});
	

</script>

