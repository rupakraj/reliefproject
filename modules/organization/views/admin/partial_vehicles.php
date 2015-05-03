<?php echo form_open('', array('id' =>'form-vehicle', 'onsubmit' => 'return false', 'style' => 'display:none')); ?>
	<input type = "hidden" name = "id" id = "vehicle_pk_id"/>
	<input type = "hidden" name = "organization_id" id = "organization_id" value="<?php echo $organization['id'];?>" />
    <table class="table table-condensed">
		<tr>
			<td><label for='vehicle_type_id'><?php echo lang('vehicle_type_id')?></label></td>
			<td colspan="3"><div id='vehicle_type_id' name='vehicle_type_id'></div></td>
		</tr>
		<tr>
			<td><label for='registration_number'><?php echo lang('registration_number')?></label></td>
			<td><input id='registration_number' class='text_input' name='registration_number'></td>
			<td><label for='capacity'><?php echo lang('capacity')?></label></td>
			<td><input id='capacity' class='text_input' name='capacity'></td>
		</tr>
		<tr>
			<td><label for='distance_coverage'><?php echo lang('distance_coverage')?></label></td>
			<td><input id='distance_coverage' class='text_input' name='distance_coverage'></td>
			<td><label for='current_location'><?php echo lang('current_location')?></label></td>
			<td><input id='current_location' class='text_input' name='current_location'></td>
		</tr>
        <tr>
            <th colspan="4">
                <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxVehicleSubmitButton"><?php echo lang('general_save'); ?></button>
                <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxVehicleCancelButton"><?php echo lang('general_cancel'); ?></button>
            </th>
        </tr>
       
  </table>
<?php echo form_close(); ?>
<br />
<div id="jqxGridVehicle"></div>

<script language="javascript" type="text/javascript">

$(function(){
	if ( '<?php echo $organization['id'];?>' == '<?php echo $this->session->userdata('organization_id');?>' || <?php echo $this->session->userdata('group_id');?> == 2 ) {
		$('#form-vehicle').show();
	}
	var vehicleTypeDataSource = {
		url : base_url + 'admin/vehicle_type/combo_json',
        datatype: 'json',
        datafields: [ 
            { name: 'id', type: 'number' },
			{ name: 'name', type: 'string' },
        ],
        async: false
	}

	var vehicleTypeDataAdapter = new $.jqx.dataAdapter(vehicleTypeDataSource);

	$("#vehicle_type_id").jqxComboBox({ 
		width: 195, 
		height: 25, 
		selectionMode: 'dropDownList', 
		autoComplete: true, 
		searchMode: 'containsignorecase', 
		theme: theme_combo,
		source: vehicleTypeDataAdapter, 
		displayMember: "name", 
		valueMember: "id"
	});

	var array_vehicle_type = new Array();
	$.each(vehicleTypeDataAdapter.records, function(key,val) {
	        array_vehicle_type.push(val.name);
	    }); 

	var vehicleDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'organization_id', type: 'number' },
			{ name: 'registration_number', type: 'string' },
			{ name: 'capacity', type: 'string' },
			{ name: 'distance_coverage', type: 'string' },
			{ name: 'vehicle_type_id', type: 'number' },
			{ name: 'vehicle_type_name', value: 'vehicle_type_id', values: { source: vehicleTypeDataAdapter.records, value: 'id', name: 'name'}, type: 'string' },
			{ name: 'current_location', type: 'string' },
			{ name: 'delete_flag', type: 'number' },
			{ name: 'created_by', type: 'number' },
			{ name: 'modified_by', type: 'number' },
			{ name: 'created_date', type: 'date' },
			{ name: 'modified_date', type: 'date' },
			
        ],
		url: '<?php echo site_url("admin/vehicle/json"); ?>',
		pagesize: defaultPageSize,
		root: 'rows',
		id : 'id',
		cache: true,
		pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	vehicleDataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGridVehicle").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGridVehicle").jqxGrid('updatebounddata', 'sort');
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

                    if (data[key] == 'vehicle_type_name') {
                        data[key] = 'vehicle_type_id';
                        for (var j = 0; j < vehicleTypeDataAdapter.records.length; j++){
                            v = 'filtervalue' + i;
                            if ( vehicleTypeDataAdapter.records[j].name == data[val]) {
                                data[v] = vehicleTypeDataAdapter.records[j].id;
                                break;
                            }
                        }
                    }
                }
            }
	    }
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
        $("#jqxGridVehicle").jqxGrid('addfilter', 'organization_id', filtergroup);
        // apply the filters.
        $("#jqxGridVehicle").jqxGrid('applyfilters');
    };

	$("#jqxGridVehicle").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight-100,
		source: vehicleDataSource,
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
			<?php if ( $organization['id'] == $this->session->userdata('organization_id') || $this->session->userdata('group_id') == 2 ) :?>
			{
				text: 'Action', datafield: 'action', width:75, sortable:false,filterable:false, pinned:true, align: 'center' , cellsalign: 'center', cellclassname: 'grid-column-center', 
				cellsrenderer: function (index) {
					var e = '', d='', row =  $("#jqxGridVehicle").jqxGrid('getrowdata', index);
					e = '<a href="javascript:void(0)" onclick="editVehicleRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
					//d = '<a href="javascript:void(0)" onclick="deleteVehicleRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
					if (row.delete_flag == 0) {
						d = '<a href="javascript:void(0)" onclick="deleteVehicleRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
					} else {
						d = '<a href="javascript:void(0)" onclick="restoreVehicleRecord(' + index + '); return false;" title="Restore"><i class="glyphicon glyphicon-repeat"></i></a>';
					}
					
					return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '</div>';
				}
			},
			<?php endif;?>
			{ text: '<?php echo lang("vehicle_type_id"); ?>',datafield: 'vehicle_type_name',width: 150,filterable: true,renderer: gridColumnsRenderer,filtertype: 'list', filteritems: array_vehicle_type },
			{ text: '<?php echo lang("registration_number"); ?>',datafield: 'registration_number',width: 150,filterable: true,renderer: gridColumnsRenderer },
			{ text: '<?php echo lang("capacity"); ?>',datafield: 'capacity',width: 150,filterable: true,renderer: gridColumnsRenderer },
			{ text: '<?php echo lang("distance_coverage"); ?>',datafield: 'distance_coverage',width: 150,filterable: true,renderer: gridColumnsRenderer },
			{ text: '<?php echo lang("current_location"); ?>',datafield: 'current_location',width: 150,filterable: true,renderer: gridColumnsRenderer },
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridVehicle").jqxGrid('refresh');
	});


	$("#jqxVehicleCancelButton").on('click', function () {
        $('#vehicle_pk_id').val('');
        $('#form-vehicle')[0].reset();
    });

    $("#jqxVehicleSubmitButton").on('click', function () {
		saveVehicleRecord();
    });

});


function editVehicleRecord(index){

    var row =  $("#jqxGridVehicle").jqxGrid('getrowdata', index);
  	if (row) {
        $('#vehicle_pk_id').val(row.id);
		$('#registration_number').val(row.registration_number);
		$('#capacity').val(row.capacity);
		$('#distance_coverage').val(row.distance_coverage);
		$('#vehicle_type_id').jqxComboBox('val', row.vehicle_type_id);
		$('#current_location').val(row.current_location);
		
    }
}

function deleteVehicleRecord(index){

    var row =  $("#jqxGridVehicle").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to delete this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/vehicle/delete_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridVehicle').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function restoreVehicleRecord(index){

    var row =  $("#jqxGridVehicle").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to restore this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/vehicle/restore_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridVehicle').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function saveVehicleRecord(){
    var data = $("#form-vehicle").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/vehicle/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#vehicle_pk_id').val('');
                $('#form-vehicle')[0].reset();
                $('#jqxGridVehicle').jqxGrid('updatebounddata');

                //update next deliver vehicle combobox
                nextDeliveryVehicleDataSource = {
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

				nextDeliveryVehicleDataAdapter = new $.jqx.dataAdapter(nextDeliveryVehicleDataSource, {autoBind: true});
				$("#vehicle_id").jqxComboBox({ 
					source: nextDeliveryVehicleDataAdapter, 
					displayMember: "registration_number", 
					valueMember: "id"
				});

            }

        }
    });
}

</script>

