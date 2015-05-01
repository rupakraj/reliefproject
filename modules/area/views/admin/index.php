<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo lang('area'); ?></h1>
		<div class="breadcrumb" style="top:7px">
            <span class="label label-status-active">Active</span>
            <span class="label label-status-inactive">Inactive</span>
        </div>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- row -->
		<div class="row">
			<div class="col-xs-12 connectedSortable">

				<?php echo displayStatus(); ?>

				<button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGridAreaInsert"><?php echo lang('create'); ?></button>
				<button type="button" class="btn btn-danger btn-flat btn-xs" id="jqxGridAreaFilterClear"><?php echo lang('clear'); ?></button>

				<br /><br />
				<div id="jqxGridArea"></div>
			</div><!-- /.col -->
		</div>
		<!-- /.row -->

	</section><!-- /.content -->
</aside><!-- /.right-side -->


<div id="jqxPopupWindow">
   <div class='jqxExpander-custom-div'>
        <span class='popup_title' id="window_poptup_title"></span>
    </div>
    <div class="form_fields_area">
        <?php echo form_open('', array('id' =>'form-area', 'onsubmit' => 'return false')); ?>
        	<input type = "hidden" name = "id" id = "id"/>
            <table class="form-table">
				<tr>
					<td><label for='code'><?php echo lang('code')?></label></td>
					<td><input id='code' class='text_input' name='code'></td>
				</tr>
				<tr>
					<td><label for='name'><?php echo lang('name')?></label></td>
					<td><input id='name' class='text_input' name='name'></td>
				</tr>
				<tr>
					<td><label for='district'><?php echo lang('district')?></label></td>
					<td><div id='district' class='number_general' name='district'></div></td>
				</tr>
				<tr>
					<td><label for='ward'><?php echo lang('ward')?></label></td>
					<td><div id='ward' class='number_general' name='ward'></div></td>
				</tr>
				<tr>
					<td><label for='address'><?php echo lang('address')?></label></td>
					<td><input id='address' class='text_input' name='address'></td>
				</tr>
				<tr>
					<td><label for='location_category'><?php echo lang('location_category')?></label></td>
					<td><input id='location_category' class='text_input' name='location_category'></td>
				</tr>
				<tr>
					<td><label for='population_male'><?php echo lang('population_male')?></label></td>
					<td><div id='population_male' class='number_general' name='population_male'></div></td>
				</tr>
				<tr>
					<td><label for='population_female'><?php echo lang('population_female')?></label></td>
					<td><div id='population_female' class='number_general' name='population_female'></div></td>
				</tr>
				<tr>
					<td><label for='population_children'><?php echo lang('population_children')?></label></td>
					<td><div id='population_children' class='number_general' name='population_children'></div></td>
				</tr>
				<tr>
					<td><label for='population_adult'><?php echo lang('population_adult')?></label></td>
					<td><div id='population_adult' class='number_general' name='population_adult'></div></td>
				</tr>
				<tr>
					<td><label for='population_old'><?php echo lang('population_old')?></label></td>
					<td><div id='population_old' class='number_general' name='population_old'></div></td>
				</tr>
				<tr>
					<td><label for='household'><?php echo lang('household')?></label></td>
					<td><div id='household' class='number_general' name='household'></div></td>
				</tr>
				<tr>
					<td><label for='houses'><?php echo lang('houses')?></label></td>
					<td><div id='houses' class='number_general' name='houses'></div></td>
				</tr>
				<tr>
					<td><label for='schools'><?php echo lang('schools')?></label></td>
					<td><div id='schools' class='number_general' name='schools'></div></td>
				</tr>
				<tr>
					<td><label for='effected_male'><?php echo lang('effected_male')?></label></td>
					<td><div id='effected_male' class='number_general' name='effected_male'></div></td>
				</tr>
				<tr>
					<td><label for='effected_female'><?php echo lang('effected_female')?></label></td>
					<td><div id='effected_female' class='number_general' name='effected_female'></div></td>
				</tr>
				<tr>
					<td><label for='effected_children'><?php echo lang('effected_children')?></label></td>
					<td><div id='effected_children' class='number_general' name='effected_children'></div></td>
				</tr>
				<tr>
					<td><label for='effected_adult'><?php echo lang('effected_adult')?></label></td>
					<td><div id='effected_adult' class='number_general' name='effected_adult'></div></td>
				</tr>
				<tr>
					<td><label for='effected_old'><?php echo lang('effected_old')?></label></td>
					<td><div id='effected_old' class='number_general' name='effected_old'></div></td>
				</tr>
				<tr>
					<td><label for='effected_household'><?php echo lang('effected_household')?></label></td>
					<td><div id='effected_household' class='number_general' name='effected_household'></div></td>
				</tr>
				<tr>
					<td><label for='houses_collapsed'><?php echo lang('houses_collapsed')?></label></td>
					<td><div id='houses_collapsed' class='number_general' name='houses_collapsed'></div></td>
				</tr>
				<tr>
					<td><label for='houses_damaged'><?php echo lang('houses_damaged')?></label></td>
					<td><div id='houses_damaged' class='number_general' name='houses_damaged'></div></td>
				</tr>
				<tr>
					<td><label for='houses_cracked'><?php echo lang('houses_cracked')?></label></td>
					<td><div id='houses_cracked' class='number_general' name='houses_cracked'></div></td>
				</tr>
				<tr>
					<td><label for='death'><?php echo lang('death')?></label></td>
					<td><div id='death' class='number_general' name='death'></div></td>
				</tr>
				<tr>
					<td><label for='trapped'><?php echo lang('trapped')?></label></td>
					<td><div id='trapped' class='number_general' name='trapped'></div></td>
				</tr>
				<tr>
					<td><label for='sick'><?php echo lang('sick')?></label></td>
					<td><div id='sick' class='number_general' name='sick'></div></td>
				</tr>
				<tr>
					<td><label for='accessibility_id'><?php echo lang('accessibility_id')?></label></td>
					<td><div id='accessibility_id' class='number_general' name='accessibility_id'></div></td>
				</tr>
				<tr>
					<td><label for='distance_ktm'><?php echo lang('distance_ktm')?></label></td>
					<td><div id='distance_ktm' class='number_general' name='distance_ktm'></div></td>
				</tr>
				<tr>
					<td><label for='area_type'><?php echo lang('area_type')?></label></td>
					<td><div id='area_type' class='number_general' name='area_type'></div></td>
				</tr>
				<tr>
					<td><label for='road_obstructed'><?php echo lang('road_obstructed')?></label></td>
					<td>
                        <input type="radio" value="1" name="road_obstructed" id="road_obstructed1" />&nbsp;<?php echo lang("general_yes")?> &nbsp;
                        <input type="radio" value="0" name="road_obstructed" id="road_obstructed0" checked="checked" />&nbsp;<?php echo lang("general_no")?>
                    </td>
				</tr>
				<tr>
					<td><label for='road_obstruct_detail'><?php echo lang('road_obstruct_detail')?></label></td>
					<td><div id='road_obstruct_detail' class='number_general' name='road_obstruct_detail'></div></td>
				</tr>
				<tr>
					<td><label for='reported_date'><?php echo lang('reported_date')?></label></td>
					<td><div id='reported_date' class='date_box' name='reported_date'></div></td>
				</tr>
				<tr>
					<td><label for='first_followup'><?php echo lang('first_followup')?></label></td>
					<td><div id='first_followup' class='date_box' name='first_followup'></div></td>
				</tr>
				<tr>
					<td><label for='priority'><?php echo lang('priority')?></label></td>
					<td><input id='priority' class='text_input' name='priority'></td>
				</tr>
				<tr>
					<td><label for='contact_detail'><?php echo lang('contact_detail')?></label></td>
					<td><textarea id='contact_detail' class='text_input' name='contact_detail'></textarea></td>
				</tr>
				<tr>
					<td><label for='internal_contact'><?php echo lang('internal_contact')?></label></td>
					<td><textarea id='internal_contact' class='text_input' name='internal_contact'></textarea></td>
				</tr>
				<tr>
					<td><label for='security_contact'><?php echo lang('security_contact')?></label></td>
					<td><textarea id='security_contact' class='text_input' name='security_contact'></textarea></td>
				</tr>
				<tr>
					<td><label for='nearest_hospital_distance'><?php echo lang('nearest_hospital_distance')?></label></td>
					<td><input id='nearest_hospital_distance' class='text_input' name='nearest_hospital_distance'> (in km.)</td>
				</tr>
				<tr>
					<td><label for='nearest_hospital_name'><?php echo lang('nearest_hospital_name')?></label></td>
					<td><input id='nearest_hospital_name' class='text_input' name='nearest_hospital_name'></td>
				</tr>
				<tr>
					<td><label for='nearest_hospital_contact'><?php echo lang('nearest_hospital_contact')?></label></td>
					<td><textarea id='nearest_hospital_contact' class='text_input' name='nearest_hospital_contact'></textarea></td>
				</tr>
				<tr>
					<td><label for='longitude'><?php echo lang('longitude')?></label></td>
					<td><input id='longitude' class='text_input' name='longitude'></td>
				</tr>
				<tr>
					<td><label for='latitude'><?php echo lang('latitude')?></label></td>
					<td><input id='latitude' class='text_input' name='latitude'></td>
				</tr>
                <tr>
                    <th colspan="2">
                        <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxAreaSubmitButton"><?php echo lang('general_save'); ?></button>
                        <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxAreaCancelButton"><?php echo lang('general_cancel'); ?></button>
                    </th>
                </tr>
               
          </table>
        <?php echo form_close(); ?>
    </div>
</div>

<script language="javascript" type="text/javascript">


$(function(){

    //accessibility
    var accessibilityDataSource = {
        url : base_url + 'admin/accessibility/combo_json',
        datatype: 'json',
        datafields: [
            { name: 'id', type: 'number' },
            { name: 'name', type: 'string' },
        ],
        async: false
    }

    var accessibilityDataAdapter = new $.jqx.dataAdapter(accessibilityDataSource);

    $("#accessibility_id").jqxComboBox({
        theme: theme_combo,
        width: 195,
        height: 25,
        selectionMode: 'dropDownList',
        autoComplete: true,
        searchMode: 'containsignorecase',
        source: accessibilityDataAdapter,
        displayMember: "name",
        valueMember: "id"
    });

    var array_accessibility = new Array();
    $.each(accessibilityDataAdapter.records, function(key,val) {
        array_accessibility.push(val.name);
    });
    //area types
    var areatypeDataSource = {
        url : base_url + 'admin/area_type/combo_json',
        datatype: 'json',
        datafields: [
            { name: 'id', type: 'number' },
            { name: 'name', type: 'string' },
        ],
        async: false
    }

    var areatypeDataAdapter = new $.jqx.dataAdapter(areatypeDataSource);

    $("#area_type").jqxComboBox({
        theme: theme_combo,
        width: 195,
        height: 25,
        selectionMode: 'dropDownList',
        autoComplete: true,
        searchMode: 'containsignorecase',
        source: areatypeDataAdapter,
        displayMember: "name",
        valueMember: "id"
    });

    var array_areatype = new Array();
    $.each(areatypeDataAdapter.records, function(key,val) {
        array_areatype.push(val.name);
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
        valueMember: "id"
    });

    var array_district = new Array();
    $.each(districtDataAdapter.records, function(key,val) {
        array_district.push(val.name);
    });
    //obstruction type
    var obstructionDataSource = {
        url : base_url + 'admin/obstruction_type/combo_json',
        datatype: 'json',
        datafields: [
            { name: 'id', type: 'number' },
            { name: 'name', type: 'string' },
        ],
        async: false
    }

    var obstructionDataAdapter = new $.jqx.dataAdapter(obstructionDataSource);

    $("#road_obstruct_detail").jqxComboBox({
        theme: theme_combo,
        width: 195,
        height: 25,
        selectionMode: 'dropDownList',
        autoComplete: true,
        searchMode: 'containsignorecase',
        source: obstructionDataAdapter,
        displayMember: "name",
        valueMember: "id"
    });

    var array_obstruction = new Array();
    $.each(obstructionDataAdapter.records, function(key,val) {
        array_obstruction.push(val.name);
    });


    var areaDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'code', type: 'string' },
			{ name: 'name', type: 'string' },
			{ name: 'district', type: 'string',values: { source: districtDataAdapter.records, value: 'id', name: 'name_en'} },
			{ name: 'ward', type: 'number' },
			{ name: 'address', type: 'string' },
			{ name: 'location_category', type: 'string' },
			{ name: 'population_male', type: 'number' },
			{ name: 'population_female', type: 'number' },
			{ name: 'population_children', type: 'number' },
			{ name: 'population_adult', type: 'number' },
			{ name: 'population_old', type: 'number' },
			{ name: 'household', type: 'number' },
			{ name: 'houses', type: 'number' },
			{ name: 'schools', type: 'number' },
			{ name: 'effected_male', type: 'number' },
			{ name: 'effected_female', type: 'number' },
			{ name: 'effected_children', type: 'number' },
			{ name: 'effected_adult', type: 'number' },
			{ name: 'effected_old', type: 'number' },
			{ name: 'effected_household', type: 'number' },
			{ name: 'houses_collapsed', type: 'number' },
			{ name: 'houses_damaged', type: 'number' },
			{ name: 'houses_cracked', type: 'number' },
			{ name: 'death', type: 'number' },
			{ name: 'trapped', type: 'number' },
			{ name: 'sick', type: 'number' },
			{ name: 'accessibility_id', type: 'string',values: { source: accessibilityDataAdapter.records, value: 'id', name: 'name'} },
			{ name: 'distance_ktm', type: 'number' },
			{ name: 'area_type', type: 'string',values: { source: areatypeDataAdapter.records, value: 'id', name: 'name'} },
			{ name: 'road_obstructed', type: 'bool' },
			{ name: 'road_obstruct_detail', type: 'string',values: { source: obstructionDataAdapter.records, value: 'id', name: 'name'} },
			{ name: 'created_by', type: 'number' },
			{ name: 'modified_by', type: 'number' },
			{ name: 'created_date', type: 'date' },
			{ name: 'modified_date', type: 'date' },
			{ name: 'reported_date', type: 'date' },
			{ name: 'first_followup', type: 'date' },
			{ name: 'priority', type: 'string' },
			{ name: 'contact_detail', type: 'string' },
			{ name: 'internal_contact', type: 'string' },
			{ name: 'security_contact', type: 'string' },
			{ name: 'nearest_hospital_distance', type: 'string' },
			{ name: 'nearest_hospital_name', type: 'string' },
			{ name: 'nearest_hospital_contact', type: 'string' },
			{ name: 'longitude', type: 'string' },
			{ name: 'latitude', type: 'string' },
			{ name: 'delete_flag', type: 'number' },
			
        ],
		url: '<?php echo site_url("admin/area/json"); ?>',
		pagesize: defaultPageSize,
		root: 'rows',
		id : 'id',
		cache: true,
		pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	areaDataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGridArea").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGridArea").jqxGrid('updatebounddata', 'sort');
	    },
	    processdata: function(data) {
			filterscount = data.filterscount;
            if (data.filterscount > 0) {
                for(i = 0; i< filterscount; i++  ) {
                    key = 'filterdatafield' + i;
                    val = 'filtervalue' + i;

                    //NOTE if DATE FIELD 
                    //use following chunk of codes
                    //if (data[key] == 'FIELD_NAME') {
                    //    data[val] = Date.parse(data[val]).toString('yyyy-MM-dd');
                }
            }
	    }
	};

	var cellclassname = function (row, column, value, data) {

        if (data.delete_flag == '0')
            return 'status-active';
        else if (data.delete_flag == '1')
            return 'status-inactive';
    };
	
	$("#jqxGridArea").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight,
		source: areaDataSource,
		altrows: true,
		pageable: true,
		sortable: true,
		rowsheight: 30,
		columnsheight:30,
		showfilterrow: true,
		filterable: true,
		columnsresize: true,
		autoshowfiltericon: true,
		columnsreorder: true,
		selectionmode: 'none',
		virtualmode: true,
		enableanimations: false,
		pagesizeoptions: pagesizeoptions,
		columns: [
			{ text: 'SN', width: 50, pinned: true, exportable: false,  columntype: 'number', cellclassname: 'jqx-widget-header', renderer: gridColumnsRenderer, cellsrenderer: rownumberRenderer , filterable: false},
			{
				text: 'Action', datafield: 'action', width:75, sortable:false,filterable:false, pinned:true, align: 'center' , cellsalign: 'center', cellclassname: 'grid-column-center', 
				cellsrenderer: function (index) {
					var e = '', d='', detail = '', row =  $("#jqxGridArea").jqxGrid('getrowdata', index);
					e = '<a href="javascript:void(0)" onclick="editRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
					if (row.delete_flag == 0) {
						d = '<a href="javascript:void(0)" onclick="deleteRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
					} else {
						d = '<a href="javascript:void(0)" onclick="restoreRecord(' + index + '); return false;" title="Restore"><i class="glyphicon glyphicon-repeat"></i></a>';
					}
                    var link = '<?php echo site_url('admin/area/detail');?>'  + '/' + row.id;
                    detail = '<a target="blank" href="' + link + '" title="Detail"><i class="glyphicon glyphicon-edit"></i></a>';

					return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '&nbsp;' + detail + '</div>';
				}
			},
			{ text: '<?php echo lang("code"); ?>',datafield: 'code',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("name"); ?>',datafield: 'name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("district"); ?>',datafield: 'district',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("ward"); ?>',datafield: 'ward',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("address"); ?>',datafield: 'address',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("location_category"); ?>',datafield: 'location_category',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("population_male"); ?>',datafield: 'population_male',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("population_female"); ?>',datafield: 'population_female',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("population_children"); ?>',datafield: 'population_children',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("population_adult"); ?>',datafield: 'population_adult',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("population_old"); ?>',datafield: 'population_old',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("household"); ?>',datafield: 'household',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("houses"); ?>',datafield: 'houses',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("schools"); ?>',datafield: 'schools',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("effected_male"); ?>',datafield: 'effected_male',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("effected_female"); ?>',datafield: 'effected_female',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("effected_children"); ?>',datafield: 'effected_children',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("effected_adult"); ?>',datafield: 'effected_adult',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("effected_old"); ?>',datafield: 'effected_old',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("effected_household"); ?>',datafield: 'effected_household',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("houses_collapsed"); ?>',datafield: 'houses_collapsed',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("houses_damaged"); ?>',datafield: 'houses_damaged',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("houses_cracked"); ?>',datafield: 'houses_cracked',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("death"); ?>',datafield: 'death',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("trapped"); ?>',datafield: 'trapped',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("sick"); ?>',datafield: 'sick',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("accessibility_id"); ?>',datafield: 'accessibility_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("distance_ktm"); ?>',datafield: 'distance_ktm',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("area_type"); ?>',datafield: 'area_type',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("road_obstructed"); ?>',datafield: 'road_obstructed',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,columntype: 'checkbox', filtertype: 'bool' },
			{ text: '<?php echo lang("road_obstruct_detail"); ?>',datafield: 'road_obstruct_detail',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("reported_date"); ?>',datafield: 'reported_date',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
			{ text: '<?php echo lang("first_followup"); ?>',datafield: 'first_followup',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
			{ text: '<?php echo lang("priority"); ?>',datafield: 'priority',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("contact_detail"); ?>',datafield: 'contact_detail',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("internal_contact"); ?>',datafield: 'internal_contact',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("security_contact"); ?>',datafield: 'security_contact',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("nearest_hospital_distance"); ?>',datafield: 'nearest_hospital_distance',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("nearest_hospital_name"); ?>',datafield: 'nearest_hospital_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("nearest_hospital_contact"); ?>',datafield: 'nearest_hospital_contact',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("longitude"); ?>',datafield: 'longitude',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("latitude"); ?>',datafield: 'latitude',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridArea").jqxGrid('refresh');
	});

	$('#jqxGridAreaFilterClear').on('click', function () { 
		$('#jqxGridArea').jqxGrid('clearfilters');
	});

	$('#jqxGridAreaInsert').on('click', function(){
		openPopupWindow('<?php echo lang("general_add")  . "&nbsp;" .  $header; ?>');
        $('#first_followup').jqxDateTimeInput('setDate', null);
    });

	// initialize the popup window
    $("#jqxPopupWindow").jqxWindow({ 
        theme: theme_window,
        width: '75%',
        maxWidth: '75%',
        height: '75%',  
        maxHeight: '75%',  
        isModal: true, 
        autoOpen: false,
        modalOpacity: 0.7,
        showCollapseButton: false 
    });

     $("#jqxAreaCancelButton").on('click', function () {
        $('#id').val('');
        $('#form-area')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


    /*$('#form-area').jqxValidator({
        hintType: 'label',
        animationDuration: 500,
        rules: [
			{ input: '#code', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#code').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#name', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#name').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#district', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#district').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#ward', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#ward').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#address', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#address').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#location_category', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#location_category').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#population_male', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#population_male').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#population_female', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#population_female').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#population_children', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#population_children').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#population_adult', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#population_adult').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#population_old', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#population_old').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#household', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#household').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#houses', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#houses').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#schools', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#schools').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#effected_male', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#effected_male').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#effected_female', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#effected_female').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#effected_children', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#effected_children').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#effected_adult', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#effected_adult').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#effected_old', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#effected_old').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#effected_household', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#effected_household').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#houses_collapsed', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#houses_collapsed').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#houses_damaged', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#houses_damaged').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#houses_cracked', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#houses_cracked').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#death', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#death').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#trapped', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#trapped').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#sick', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#sick').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#accessibility_id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#accessibility_id').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#distance_ktm', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#distance_ktm').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#area_type', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#area_type').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#road_obstructed', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#road_obstructed').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#road_obstruct_detail', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#road_obstruct_detail').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#priority', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#priority').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#contact_detail', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#contact_detail').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#internal_contact', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#internal_contact').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#security_contact', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#security_contact').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#nearest_hospital_distance', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#nearest_hospital_distance').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#nearest_hospital_name', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#nearest_hospital_name').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#nearest_hospital_contact', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#nearest_hospital_contact').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#longitude', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#longitude').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#latitude', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#latitude').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

        ]
    });*/

    $("#jqxAreaSubmitButton").on('click', function () {
        saveRecord();

        /*var validationResult = function (isValid) {
                if (isValid) {
                   saveRecord();
                }
            };

        $('#form-area').jqxValidator('validate', validationResult);*/
       
    });

});


function editRecord(index){

    var row =  $("#jqxGridArea").jqxGrid('getrowdata', index);
  	if (row) {
        console.log(row.road_obstructed);
        $('#id').val(row.id);
		$('#code').val(row.code);
		$('#name').val(row.name);
		$('#district').val(row.district);
		$('#ward').jqxNumberInput('val', row.ward);
		$('#address').val(row.address);
		$('#location_category').val(row.location_category);
		$('#population_male').jqxNumberInput('val', row.population_male);
		$('#population_female').jqxNumberInput('val', row.population_female);
		$('#population_children').jqxNumberInput('val', row.population_children);
		$('#population_adult').jqxNumberInput('val', row.population_adult);
		$('#population_old').jqxNumberInput('val', row.population_old);
		$('#household').jqxNumberInput('val', row.household);
		$('#houses').jqxNumberInput('val', row.houses);
		$('#schools').jqxNumberInput('val', row.schools);
		$('#effected_male').jqxNumberInput('val', row.effected_male);
		$('#effected_female').jqxNumberInput('val', row.effected_female);
		$('#effected_children').jqxNumberInput('val', row.effected_children);
		$('#effected_adult').jqxNumberInput('val', row.effected_adult);
		$('#effected_old').jqxNumberInput('val', row.effected_old);
		$('#effected_household').jqxNumberInput('val', row.effected_household);
		$('#houses_collapsed').jqxNumberInput('val', row.houses_collapsed);
		$('#houses_damaged').jqxNumberInput('val', row.houses_damaged);
		$('#houses_cracked').jqxNumberInput('val', row.houses_cracked);
		$('#death').jqxNumberInput('val', row.death);
		$('#trapped').jqxNumberInput('val', row.trapped);
		$('#sick').jqxNumberInput('val', row.sick);
		$('#accessibility_id').jqxNumberInput('val', row.accessibility_id);
		$('#distance_ktm').jqxNumberInput('val', row.distance_ktm);
		$('#area_type').val(row.area_type);
		//$('#road_obstructed').jqxNumberInput('val', row.road_obstructed);
        if(row.road_obstructed == 1) {
            $('#road_obstructed1').prop('checked', 'checked');
        } else {
            $('#road_obstructed0').prop('checked', 'checked');
        }
		$('#road_obstruct_detail').val(row.road_obstruct_detail);
        if (row.reported_date != null && row.reported_date != '0000-00-00 00:00:00' && row.reported_date != '') {
            $('#reported_date').jqxDateTimeInput('setDate', row.reported_date);
        }
        if (row.first_followup != null && row.first_followup != '0000-00-00 00:00:00' && row.first_followup != '') {
            $('#first_followup').jqxDateTimeInput('setDate', row.first_followup);
        }

		$('#priority').val(row.priority);
		$('#contact_detail').val(row.contact_detail);
		$('#internal_contact').val(row.internal_contact);
		$('#security_contact').val(row.security_contact);
		$('#nearest_hospital_distance').val(row.nearest_hospital_distance);
		$('#nearest_hospital_name').val(row.nearest_hospital_name);
		$('#nearest_hospital_contact').val(row.nearest_hospital_contact);
		$('#longitude').val(row.longitude);
		$('#latitude').val(row.latitude);
		
        openPopupWindow('<?php echo lang("general_edit")  . "&nbsp;" .  $header; ?>');
    }
}

function deleteRecord(index){

    var row =  $("#jqxGridArea").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to delete this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/area/delete_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridArea').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function restoreRecord(index){

    var row =  $("#jqxGridArea").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to restore this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/area/restore_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridArea').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function saveRecord(){
    var data = $("#form-area").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/area/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#id').val('');
                $('#form-area')[0].reset();
                $('#jqxGridArea').jqxGrid('updatebounddata');
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>

