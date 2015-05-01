<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Reports</h1>
		<div class="breadcrumb" style="top:7px">
            <!-- <span class="label label-status-active">Active Records</span>
            <span class="label label-status-inactive">Inactive Records</span> -->
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
						<p>
							District :  <input id="district" name="district" />
						 	VDC/ MUN :  <input id="vdc_mun" name="vdc_mun" />
					 	</p>
						<p>
							Ward :  <input id="ward" name="ward" />
							Male : <input id="male" name="male" />
						</p>
						<p>
							Female : <input id="female" name="female" />
							Child : <input id="child" name="child" />
						</p>	
						<p>
							Death : <input id="death" name="death" />	
							Trapped : <input id="trapped" name="trapped" />
						</p>	
						<p>
							Injured : <input id="injured" name="injured" />
							Damage : <input id="damage" name="damage" />
						</p>
						<p>
							Collapsed : <input id="collapsed" name="collapsed" />
							Cracked : <input id="cracked" name="cracked" />
						</p>
						<p> 
							Accesibility : <input id="accesibility" name="accesibility" />
							Area_type : <input id="area_type" name="area_type" />
						</p>
						<p>
							Priority : <input id="Priority" name="Priority" />
							Road Obstruction : <input id="road_obstruction" name="road_obstruction" />
						</p>
						<p>
							Food : <input id="Priority" name="Priority" />
							Medicine : <input id="road_obstruction" name="road_obstruction" />
						</p>
						
						<button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGridDistrict_vdcFilterClear">Submit</button>
					</form>
				</div>

				<div id="jqxGrid_reports">
					
				</div>

			</div><!-- /.col -->
		</div>
		<!-- /.row -->

	</section><!-- /.content -->
</aside><!-- /.right-side -->



<script language="javascript" type="text/javascript">


$(function(){
});
	

</script>

