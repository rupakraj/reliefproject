<style>
#footer{
	z-index: 99999999;
}
</style>
<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Table</h1>
		<div class="breadcrumb" style="top:7px">
            <!-- <span class="label label-status-active">Active Records</span>
            <span class="label label-status-inactive">Inactive Records</span> -->
        </div>
    </section>

    <button type="button" class="btn btn-success btn-xs btn-flat pull-right" id="toggle" style="margin-right:10px;">
    	<span class="fa fa-align-justify"></span>
    </button>

    <!-- Main content -->
    <section class="content" id="fields">

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
							<!-- <td><input id='district' class='text_input' name='district'></td> -->
							<td><div id='district' class='number_general' name='district'></div></td>
							<td><label for='vdc_mun'>VDC / MUN</label></td>
							<!-- <td><input id='vdc_mun' class='text_input' name='vdc_mun'></td> -->
							<td><div id='vdc_mun' class='combo_box' name='vdc_mun'></div></td>
							<td><label for='ward'>Ward</label></td>
							<!-- <td><input id='ward' class='text_input' name='ward'></td> -->
							<td><div id='ward' class='number_general' name='ward'></div></td>

						</tr>
						<tr>
							<td><label for='male'>Effected</label></td>
						</tr>
						<tr>
							<td><input id='male' type="checkbox" value="male" name='effected'> MALE</td>
							<td><input id='female' type="checkbox" value='female' name='effected'> FEMALE</td>
							<td><input id='child' type="checkbox" value='child' name='effected'> CHILD</td>
							<td><input id='death' type="checkbox" value='death' name='effected'> DEATH</td>
							<td><input id='trapped' type="checkbox" value='trapped' name='effected'> TRAPPED</td>
							<td><input id='injured' type="checkbox" value='injured' name='effected'> INJURED</td>
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
							<!-- <td><input id='accesibility' class='text_input' name='accesibility'/></td> -->
							<td><div id='accesibility' class='combo_box' name='accesibility'></div></td>

						</tr>
						<tr>
							<td><label for='area_type'>Area Type</label></td>
							<!-- <td><input id='area_type' class='text_input' name='area_type'></td> -->
							<td><div id='area_type' class='combo_box' name='area_type'></div></td>
						</tr>
						<tr>
							<td><label for='priority'>Priority</label></td>
							<!-- <td><input id='priority' class='text_input' name='priority'></td> -->
							<td><div id='priority' class='combo_box' name='priority'></div></td>
						</tr>
						<tr>
							<td><label for='road_obbstruction'>Road Obstruction</label></td>
							<!-- <td><input id='road_obbstruction' class='text_input' name='road_obbstruction'></td> -->
							<td><div id='obstruction_type' class='combo_box' name='obstruction_type'></div></td>
						</tr>

						<tr>
							<td><label for='food'>Food</label></td>
							<td><input type="checkbox" value="rice_packet" name='food'> Rice Packet</td>
							<td><input type="checkbox" value="dry_food" name='food'> Dry Food</td>
							<td><input type="checkbox" value="water_drinks" name='food'> Water / Drinks</td>
							<td><input type="checkbox" value="baby_food" name='food'> Baby Food</td>
						</tr>

						<tr>
							<td><label for='medicine'> Medicine</label></td>
							<td><input type="checkbox" value="antiseptics" name='medicine'> Antiseptics</td>
							<td><input type="checkbox" value="first-aid" name='medicine'> First-aid</td>
						</tr>

						<tr>
							<th colspan="4">
								<button type="button" class="btn btn-success btn-xs btn-flat" id="jqxReportSubmitButton"><?php echo lang('general_submit'); ?></button>
								<button type="button" class="btn btn-default btn-xs btn-flat" id="jqxReportCancelButton"><?php echo lang('general_cancel'); ?></button>
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

	<!-- Main content -->
	<section class="content">

		<!-- row -->
		<div class="row">
			<div class="col-xs-12 connectedSortable">

				<div id="result"></div>				

			</div><!-- /.col -->
		</div>
		<!-- /.row -->


	</section><!-- /.content -->
</aside><!-- /.right-side -->



<script language="javascript" type="text/javascript">


$(function(){
	// console.log(base_url + 'admin/district_vdc/district_combo_json');

	$('#toggle').click(function(){
		$('#fields').slideToggle();
	});	

	 //districts
	 var districtDataSource = {
	 	url : base_url + 'admin/district_vdc/district_combo_json',
	 	datatype: 'json',
	 	datafields: [
	 	{ name: 'id', type: 'number' },
	 	{ name: 'name_en', type: 'string' },
	 	],
	 	async: false
	 }

	 var districtDataAdapter = new $.jqx.dataAdapter(districtDataSource);

	 $("#district").jqxComboBox({
	 	theme: theme_combo,
	 	width: 195,
	 	height: 25,
	 	selectionMode: 'dropDownList',
	 	autoComplete: true,
	 	searchMode: 'containsignorecase',
	 	source: districtDataAdapter,
	 	displayMember: "name_en",
	 	valueMember: "name"
	 });

	 $('#vdc_mun').jqxComboBox({
	 	theme: theme_combo,
	 	width: 195,
	 	height: 25,
	 	selectionMode: 'dropDownList',
	 	autoComplete: true,
	 	searchMode: 'containsignorecase',
	 	source: {},
	 	displayMember: "name_en",
	 	valueMember: "id"
	 });

	 $('#district').bind('change', function (event) {

	 	var args = event.args;
	 	var item = $('#district').jqxComboBox('getItem', args.index);
	 	var id = item.originalItem.id;

	 	var vdcDataSource = {
	 		url : base_url + 'admin/district_vdc/vdc_combo_json/'+id,
	 		datatype: 'json',
	 		datafields: [
	 		{ name: 'id', type: 'number' },
	 		{ name: 'name_en', type: 'string' },
	 		],
	 		async: false
	 	}

	 	var vdcDataAdapter = new $.jqx.dataAdapter(vdcDataSource);

	 	$('#vdc_mun').jqxComboBox({
	 		theme: theme_combo,
	 		width: 195,
	 		height: 25,
	 		selectionMode: 'dropDownList',
	 		autoComplete: true,
	 		searchMode: 'containsignorecase',
	 		source: vdcDataAdapter,
	 		displayMember: "name_en",
	 		valueMember: "id"
	 	});


	 });

	 var array_district = new Array();
	 $.each(districtDataAdapter.records, function(key,val) {
	 	array_district.push(val.name);
	 });



	 // accesibility

	 var accesibilityDataSource = {
	 	url : base_url + 'admin/accessibility/combo_json',
	 	datatype: 'json',
	 	datafields: [
	 	{ name: 'id', type: 'number' },
	 	{ name: 'name', type: 'string' },
	 	],
	 	async: false
	 }

	 var accesibilityDataAdapter = new $.jqx.dataAdapter(accesibilityDataSource);

	 $("#accesibility").jqxComboBox({
	 	theme: theme_combo,
	 	width: 195,
	 	height: 25,
	 	selectionMode: 'dropDownList',
	 	autoComplete: true,
	 	searchMode: 'containsignorecase',
	 	source: accesibilityDataAdapter,
	 	displayMember: "name",
	 	valueMember: "id"
	 }); 

	 // area_type

	 var area_typeDataSource = {
	 	url : base_url + 'admin/area_type/combo_json',
	 	datatype: 'json',
	 	datafields: [
	 	{ name: 'id', type: 'number' },
	 	{ name: 'name', type: 'string' },
	 	],
	 	async: false
	 }

	 var area_typeDataAdapter = new $.jqx.dataAdapter(area_typeDataSource);

	 $("#area_type").jqxComboBox({
	 	theme: theme_combo,
	 	width: 195,
	 	height: 25,
	 	selectionMode: 'dropDownList',
	 	autoComplete: true,
	 	searchMode: 'containsignorecase',
	 	source: area_typeDataAdapter,
	 	displayMember: "name",
	 	valueMember: "id"
	 });

	 // area_type

	 var priorityDataSource = {
	 	url : base_url + 'admin/priority/combo_json',
	 	datatype: 'json',
	 	datafields: [
	 	{ name: 'id', type: 'number' },
	 	{ name: 'name', type: 'string' },
	 	],
	 	async: false
	 }

	 var priorityDataAdapter = new $.jqx.dataAdapter(priorityDataSource);

	 $("#priority").jqxComboBox({
	 	theme: theme_combo,
	 	width: 195,
	 	height: 25,
	 	selectionMode: 'dropDownList',
	 	autoComplete: true,
	 	searchMode: 'containsignorecase',
	 	source: priorityDataAdapter,
	 	displayMember: "name",
	 	valueMember: "id"
	 });


	 // Obstruction

	 var obstruction_typeDataSource = {
	 	url : base_url + 'admin/obstruction_type/combo_json',
	 	datatype: 'json',
	 	datafields: [
	 	{ name: 'id', type: 'number' },
	 	{ name: 'name', type: 'string' },
	 	],
	 	async: false
	 }

	 var obstruction_typeDataAdapter = new $.jqx.dataAdapter(obstruction_typeDataSource);

	 $("#obstruction_type").jqxComboBox({
	 	theme: theme_combo,
	 	width: 195,
	 	height: 25,
	 	selectionMode: 'dropDownList',
	 	autoComplete: true,
	 	searchMode: 'containsignorecase',
	 	source: obstruction_typeDataAdapter,
	 	displayMember: "name",
	 	valueMember: "id"
	 });

	 // submit btn code
	 $("#jqxReportSubmitButton").on('click', function () {
	 	table_report();       
	 });

	 // cancel btn code
	 $("#jqxReportCancelButton").on('click', function () {
	 	$('#result').html('');      
	 });

	});


function table_report(){
	var data = $("#form-reports").serialize();

	$.ajax({
		type: "POST",
		url: '<?php echo site_url("admin/reports/table_report"); ?>',
		data: data,
		success: function (result) {
			$('#result').html(result);
		}
	});

}



</script>

