<?php echo form_open('', array('id' =>'form-next_delivery', 'onsubmit' => 'return false')); ?>
	<input type = "hidden" name = "id" id = "next_delivery_pk_id"/>
	<input type = "hidden" name = "organization_id" id = "organization_id" value="<?php echo $organization['id'];?>" />
	<table class="form-table">
		<tr>
			<td><label for='area_id'><?php echo lang('area_id')?></label></td>
			<td><div id='next_delivery_area_id' class='combo_box' name='area_id'></div></td>
			<td><label for='vehicle_id'><?php echo lang('vehicle_id')?></label></td>
			<td><div id='vehicle_id' class='combo_box' name='vehicle_id'></div></td>
		</tr>
		<tr>
			<td><label for='district_id'><?php echo lang('district_id')?></label></td>
			<td><div id='district_id' class='combo_box' name='district_id'></div></td>
			<td><label for='mun_vdc_id'><?php echo lang('mun_vdc_id')?></label></td>
			<td><div id='mun_vdc_id' class='combo_box' name='mun_vdc_id'></div></td>
		</tr>
		<tr>
			<td><label for='street'><?php echo lang('street')?></label></td>
			<td colspan="3"><input id='street' class='text_input' name='street'></td>
		</tr>
		<tr>
			<td><label for='contact_name'><?php echo lang('contact_name')?></label></td>
			<td><input id='contact_name' class='text_input' name='contact_name'></td>
			<td><label for='contact_phone'><?php echo lang('contact_phone')?></label></td>
			<td><input id='contact_phone' class='text_input' name='contact_phone'></td>
		</tr>
		<tr>
			<td><label for='status'><?php echo lang('status')?></label></td>
			<td><input id='status' class='text_input' name='status'></td>
			<td><label for='reporting_time'><?php echo lang('reporting_time')?></label></td>
			<td><div id='reporting_time' class='date_box' name='reporting_time'></div></td>
		</tr>
	    <tr>
	        <th colspan="2">
	            <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxNext_deliverySubmitButton"><?php echo lang('general_save'); ?></button>
	            <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxNext_deliveryCancelButton"><?php echo lang('general_cancel'); ?></button>
	        </th>
	    </tr>
	   
	</table>
	<?php echo form_close(); ?>
<br />
<div id="jqxGridNext_delivery"></div>


<script language="javascript" type="text/javascript">


$(function(){

	var array_next_delivery_status = new Array('Waiting', 'Delivered', 'Moved');

	$('#status').jqxInput({source: array_next_delivery_status});
	$("#reporting_time").jqxDateTimeInput({ formatString: formatString_yyyy_MM_dd_HH_mm });

	var nextDeliveryAreaDataSource = {
		url : base_url + 'admin/area/combo_json',
        datatype: 'json',
        datafields: [ 
            { name: 'id', type: 'number' },
			{ name: 'name', type: 'string' },
        ],
        async: false
	}

	var nextDeliveryAreaDataAdapter = new $.jqx.dataAdapter(nextDeliveryAreaDataSource);

	$("#next_delivery_area_id").jqxComboBox({ 
	    	theme: theme_combo, 
	    	width: 195, 
			height: 25, 
			selectionMode: 'dropDownList', 
			autoComplete: true, 
			searchMode: 'containsignorecase',
			source: nextDeliveryAreaDataAdapter, 
			displayMember: "name", 
			valueMember: "id"
		});

	var array_next_delivery_area = new Array();
	$.each(nextDeliveryAreaDataAdapter.records, function(key,val) {
	        array_next_delivery_area.push(val.name);
	    }); 


	var nextDeliveryVehicleDataSource = {
		url : base_url + 'admin/vehicle/combo_json',
        datatype: 'json',
        datafields: [ 
            { name: 'id', type: 'number' },
			{ name: 'registration_number', type: 'string' },
        ],
        data: {
			organization_id: "<?php echo $organization['id'];?>",
		},
        async: false
	}

	var nextDeliveryVehicleDataAdapter = new $.jqx.dataAdapter(nextDeliveryVehicleDataSource);

	$("#vehicle_id").jqxComboBox({ 
	    	theme: theme_combo, 
	    	width: 195, 
			height: 25, 
			selectionMode: 'dropDownList', 
			autoComplete: true, 
			searchMode: 'containsignorecase',
			source: nextDeliveryVehicleDataAdapter, 
			displayMember: "registration_number", 
			valueMember: "id"
		});

	var array_next_delivery_vehicle = new Array();
	$.each(nextDeliveryVehicleDataAdapter.records, function(key,val) {
	        array_next_delivery_vehicle.push(val.registration_number);
	    }); 

	//districts
    var locationDataSource = {
        url : base_url + 'admin/district_vdc/combo_json',
        datatype: 'json',
        datafields: [
            { name: 'id', type: 'number' },
            { name: 'name_en', type: 'string' },
        ],
        async: false
    }

    var locationDataAdapter = new $.jqx.dataAdapter(locationDataSource, {autoBind: true});


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

    $("#district_id").jqxComboBox({
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
        array_district.push(val.name_en);
    });
   

    $("#mun_vdc_id").jqxComboBox({
	        theme: theme_combo,
	        width: 195,
	        height: 25,
	        selectionMode: 'dropDownList',
	        autoComplete: true,
	        searchMode: 'containsignorecase',
	        source: munVdcDataAdapter,
	        displayMember: "name_en",
	        valueMember: "id"
	    });

	//var array_mun_vdc = array_district;
	var munVdcDataSource, munVdcDataAdapter;
	$("#district_id").on('select', function (event) {
		val = $("#district_id").jqxComboBox('val');
        //districts
	    munVdcDataSource  = {
	        url : base_url + 'admin/district_vdc/combo_json',
	        datatype: 'json',
	        datafields: [
	            { name: 'id', type: 'number' },
	            { name: 'name_en', type: 'string' },
	        ],
	        data: {
				parent_location_id: val,
			},
	        async: false
	    }

    	munVdcDataAdapter = new $.jqx.dataAdapter(munVdcDataSource, { autobind: true });
		$("#mun_vdc_id").jqxComboBox({source: munVdcDataAdapter});

    });


	var next_deliveryDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'organization_id', type: 'number' },
			{ name: 'area_id', type: 'number' },
			{ name: 'area_name', value: 'area_id', values: { source: nextDeliveryAreaDataAdapter.records, value: 'id', name: 'name'}, type: 'string' }, 
			{ name: 'vehicle_id', type: 'number' },
			{ name: 'vehicle_reg_number', value: 'vehicle_id', values: { source: nextDeliveryVehicleDataAdapter.records, value: 'id', name: 'registration_number'}, type: 'string' }, 
			{ name: 'district_id', type: 'number' },
			{ name: 'district_name', value: 'district_id', values: { source: locationDataAdapter.records, value: 'id', name: 'name_en'}, type: 'string' }, 
			{ name: 'mun_vdc_id', type: 'number' },
			{ name: 'mun_vdc_name', value: 'mun_vdc_id', values: { source: locationDataAdapter.records, value: 'id', name: 'name_en'}, type: 'string' }, 
			{ name: 'street', type: 'string' },
			{ name: 'contact_name', type: 'string' },
			{ name: 'contact_phone', type: 'string' },
			{ name: 'status', type: 'string' },
			{ name: 'reporting_time', type: 'date' },
			{ name: 'created_by', type: 'number' },
			{ name: 'modified_by', type: 'number' },
			{ name: 'created_date', type: 'date' },
			{ name: 'modified_date', type: 'date' },
			
        ],
		url: '<?php echo site_url("admin/next_delivery/json"); ?>',
		pagesize: defaultPageSize,
		root: 'rows',
		id : 'id',
		cache: true,
		pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	next_deliveryDataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGridNext_delivery").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGridNext_delivery").jqxGrid('updatebounddata', 'sort');
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

    var addfilter = function () {

        var filtergroup = new $.jqx.filter(),

            filter_or_operator = 1,
            filtervalue = '<?php echo $organization['id'];?>',
            filtercondition = 'equal',
            filter1 = filtergroup.createfilter('numericfilter', filtervalue, filtercondition);

        
        filtergroup.operator = 'and';
        filtergroup.addfilter(filter_or_operator, filter1);
        // add the filters.
        $("#jqxGridNext_delivery").jqxGrid('addfilter', 'organization_id', filtergroup);
        // apply the filters.
        $("#jqxGridNext_delivery").jqxGrid('applyfilters');
    };
	
	$("#jqxGridNext_delivery").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight,
		source: next_deliveryDataSource,
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
		ready: function () {
            addfilter();
        },
		columns: [
			{ text: '<?php echo lang("organization_id"); ?>',datafield: 'organization_id', hidden:true},
			{ text: 'SN', width: 50, pinned: true, exportable: false,  columntype: 'number', cellclassname: 'jqx-widget-header', renderer: gridColumnsRenderer, cellsrenderer: rownumberRenderer , filterable: false},
			{
				text: 'Action', datafield: 'action', width:75, sortable:false,filterable:false, pinned:true, align: 'center' , cellsalign: 'center', cellclassname: 'grid-column-center', 
				cellsrenderer: function (index) {
					var e = '', d='', row =  $("#jqxGridNext_delivery").jqxGrid('getrowdata', index);
					e = '<a href="javascript:void(0)" onclick="editNextDeliveryRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
					d = '<a href="javascript:void(0)" onclick="deleteNextDeliveryRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
					
					return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '</div>';
				}
			},
			{ text: '<?php echo lang("area_id"); ?>',datafield: 'area_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, filtertype: 'list', filteritems: array_next_delivery_area },
			{ text: '<?php echo lang("vehicle_id"); ?>',datafield: 'vehicle_reg_number',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype: 'list', filteritems: array_next_delivery_vehicle },
			{ text: '<?php echo lang("district_id"); ?>',datafield: 'district_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, filtertype: 'list', filteritems: array_district },
			{ text: '<?php echo lang("mun_vdc_id"); ?>',datafield: 'mun_vdc_name',width: 150,filterable: false,renderer: gridColumnsRenderer, cellclassname: cellclassname,},
			{ text: '<?php echo lang("street"); ?>',datafield: 'street',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("contact_name"); ?>',datafield: 'contact_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("contact_phone"); ?>',datafield: 'contact_phone',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("status"); ?>',datafield: 'status',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("reporting_time"); ?>',datafield: 'reporting_time',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd_HH_mm},
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridNext_delivery").jqxGrid('refresh');
	});

	$("#jqxNext_deliveryCancelButton").on('click', function () {
        $('#next_delivery_pk_id').val('');
        $('#form-next_delivery')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


    $("#jqxNext_deliverySubmitButton").on('click', function () {
		saveNextDeliveryRecord();
    });

});


function editNextDeliveryRecord(index){

    var row =  $("#jqxGridNext_delivery").jqxGrid('getrowdata', index);
  	if (row) {
        $('#next_delivery_pk_id').val(row.id);
		$('#next_delivery_area_id').jqxComboBox('val', row.area_id);
		$('#vehicle_id').jqxComboBox('val', row.vehicle_id);
		$('#district_id').jqxComboBox('val', row.district_id);
		$('#mun_vdc_id').jqxComboBox('val', row.mun_vdc_id);
		$('#street').val(row.street);
		$('#contact_name').val(row.contact_name);
		$('#contact_phone').val(row.contact_phone);
		$('#status').val(row.status);
		if (row.reporting_time != null && row.reporting_time != '0000-00-00' && row.reporting_time != '') {
			$('#reporting_time').jqxDateTimeInput('setDate', row.reporting_time);
		}
		
    }
}

function deleteNextDeliveryRecord(index){

    var row =  $("#jqxGridNext_delivery").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to delete this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/next_delivery/delete_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridNext_delivery').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function saveNextDeliveryRecord(){
    var data = $("#form-next_delivery").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/next_delivery/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#next_delivery_pk_id').val('');
                $('#form-next_delivery')[0].reset();
                $('#jqxGridNext_delivery').jqxGrid('updatebounddata');
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>

