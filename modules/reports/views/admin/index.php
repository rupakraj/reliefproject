<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Table</h1>
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

				<div class="form_fields_area">
        <?php echo form_open('', array('id' =>'form-reports', 'onsubmit' => 'return false')); ?>
        	<table class="report-table">
				<tr>
					<td><label for='demographic'>Demographic</label></td>
				</tr>
				<tr>
					<td><label for='district'>District</label></td>
					<td><input id='district' class='text_input' name='district'></td>
					<td><label for='vdc_mun'>VDC / MUN</label></td>
					<td><input id='vdc_mun' class='text_input' name='vdc_mun'></td>
					<td><label for='ward'>Ward</label></td>
					<td><input id='ward' class='text_input' name='ward'></td>

				</tr>
				<tr>
					<td><label for='male'>Effected</label></td>
				</tr>
				<tr>
					<td><input id='male' type="checkbox" value="male" name='effected'> MALE</td>
					<td><input id='female' type="checkbox" value='female' name='effected'> FEMALE</td>
					<td><input id='child' type="checkbox" value='child' name='effected'>CHILD</td>
					<td><input id='death' type="checkbox" value='death' name='effected'>DEATH</td>
					<td><input id='trapped' type="checkbox" value='trapped' name='effected'>TRAPPED</td>
					<td><input id='injured' type="checkbox" value='injured' name='effected'>INJURED</td>
				</tr>
				<tr>
					<td><label for='male'>House</label></td>
				</tr>
				<tr>
					<td><input type="checkbox" id='damage' name='damage'> Damage</td>
					<td><input type="checkbox" id='collapsed' name='collapsed'>  Collapsed</td>
					<td><input type="checkbox"id='cracked' name='cracked'> Cracked</td>
					
				</tr>
				<tr>
					<td><label for='accesibility'>Accesibility</label></td>
					<td><input id='accesibility' class='text_input' name='accesibility'/></td>
					
				</tr>
				<tr>
					<td><label for='area_type'>Area_type</label></td>
					<td><input id='area_type' class='text_input' name='area_type'></td>
				</tr>
				<tr>
					<td><label for='priority'>Priority</label></td>
					<td><input id='priority' class='text_input' name='priority'></td>
				</tr>
				<tr>
					<td><label for='road_obbstruction'>Road Obstruction</label></td>
					<td><input id='road_obbstruction' class='text_input' name='road_obbstruction'></td>
				</tr>

				<tr>
					<td><label for='food'>Food</label></td>
					<td><input type="checkbox" value="rice_packet" name='food'>Rice Packet</td>
					<td><input type="checkbox" value="dry_food" name='food'>Dry Food</td>
					<td><input type="checkbox" value="water_drinks" name='food'>Water / Drinks</td>
					<td><input type="checkbox" value="baby_food" name='food'>Baby Food</td>
				</tr>
				<tr>
					<td><label for='medicine'>Medicine</label></td>
					<td><input type="checkbox" value="antiseptics" name='medicine'>Antiseptics</td>
					<td><input type="checkbox" value="first-aid" name='medicine'>First-aid</td>
				</tr>

                <tr>
                    <th colspan="4">
                        <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxOrganizationSubmitButton"><?php echo lang('general_save'); ?></button>
                        <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxOrganizationCancelButton"><?php echo lang('general_cancel'); ?></button>
                    </th>
                </tr>
               
          </table>
        <?php echo form_close(); ?>
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

