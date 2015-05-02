<?php echo form_open('', array('id' =>'form-vehicle', 'onsubmit' => 'return false')); ?>
	<input type = "hidden" name = "id" id = "vehicle_pk_id"/>
	<input type = "hidden" name = "organization_id" id = "organization_id" value="<?php echo $organization['id'];?>" />
    <table class="table table-condensed">
		<tr>
			<td><label for='registration_number'><?php echo lang('registration_number')?></label></td>
			<td><input id='registration_number' class='text_input' name='registration_number'></td>
			<td><label for='capacity'><?php echo lang('capacity')?></label></td>
			<td><div id='capacity' class='number_general' name='capacity'></div></td>
		</tr>
		<tr>
			<td><label for='fuel_capacity'><?php echo lang('fuel_capacity')?></label></td>
			<td><div id='fuel_capacity' class='number_general' name='fuel_capacity'></div></td>
			<td><label for='mileage'><?php echo lang('mileage')?></label></td>
			<td><input id='mileage' class='text_input' name='mileage'></td>
		</tr>
		<tr>
			<td><label for='distance_coverage'><?php echo lang('distance_coverage')?></label></td>
			<td><input id='distance_coverage' class='text_input' name='distance_coverage'></td>
			<td><label for='vehicle_type_id'><?php echo lang('vehicle_type_id')?></label></td>
			<td><div id='vehicle_type_id' class='combo_box' name='vehicle_type_id'></div></td>
		</tr>
		<tr>
			<td><label for='current_location'><?php echo lang('current_location')?></label></td>
			<td colspan="3"><input id='current_location' class='text_input' name='current_location'></td>
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

	var vehicleDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'organization_id', type: 'number' },
			{ name: 'registration_number', type: 'string' },
			{ name: 'capacity', type: 'number' },
			{ name: 'fuel_capacity', type: 'number' },
			{ name: 'mileage', type: 'string' },
			{ name: 'distance_coverage', type: 'string' },
			{ name: 'vehicle_type_id', type: 'number' },
			{ name: 'current_location', type: 'string' },
			{ name: 'created_by', type: 'number' },
			{ name: 'modified_by', type: 'number' },
			{ name: 'created_date', type: 'date' },
			{ name: 'modified_date', type: 'date' },
			{ name: 'delete_flag', type: 'number' },
			
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
        $("#jqxGridVehicle").jqxGrid('addfilter', 'organization_id', filtergroup);
        // apply the filters.
        $("#jqxGridVehicle").jqxGrid('applyfilters');
    };
	
	$("#jqxGridVehicle").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: (gridHeight-200),
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
			{
				text: 'Action', datafield: 'action', width:75, sortable:false,filterable:false, pinned:true, align: 'center' , cellsalign: 'center', cellclassname: 'grid-column-center', 
				cellsrenderer: function (index) {
					var e = '', d='', row =  $("#jqxGridVehicle").jqxGrid('getrowdata', index);
					e = '<a href="javascript:void(0)" onclick="editVechicleRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
					d = '<a href="javascript:void(0)" onclick="deleteVechicleRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
					
					return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '</div>';
				}
			},
			
			{ text: '<?php echo lang("registration_number"); ?>',datafield: 'registration_number',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("capacity"); ?>',datafield: 'capacity',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("fuel_capacity"); ?>',datafield: 'fuel_capacity',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("mileage"); ?>',datafield: 'mileage',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("distance_coverage"); ?>',datafield: 'distance_coverage',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("vehicle_type_id"); ?>',datafield: 'vehicle_type_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("current_location"); ?>',datafield: 'current_location',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridVehicle").jqxGrid('refresh');
	});

	$('#jqxGridVehicleFilterClear').on('click', function () { 
		$('#jqxGridVehicle').jqxGrid('clearfilters');
	});

	$('#jqxGridVehicleInsert').on('click', function(){
		openPopupWindow('<?php echo lang("general_add")  . "&nbsp;" .  $header; ?>');
    });

     $("#jqxVehicleCancelButton").on('click', function () {
        $('#vehicle_pk_id').val('');
        $('#form-vehicle')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


    $("#jqxVehicleSubmitButton").on('click', function () {
 		saveVechicleRecord();      
    });

});


function editVechicleRecord(index){

    var row =  $("#jqxGridVehicle").jqxGrid('getrowdata', index);
  	if (row) {
        $('#vehicle_pk_id').val(row.id);
		$('#registration_number').val(row.registration_number);
		$('#capacity').jqxNumberInput('val', row.capacity);
		$('#fuel_capacity').jqxNumberInput('val', row.fuel_capacity);
		$('#mileage').val(row.mileage);
		$('#distance_coverage').val(row.distance_coverage);
		$('#vehicle_type_id').jqxNumberInput('val', row.vehicle_type_id);
		$('#current_location').val(row.current_location);
		
        openPopupWindow('<?php echo lang("general_edit")  . "&nbsp;" .  $header; ?>');
    }
}

function deleteVechicleRecord(index){

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

function saveVechicleRecord(){
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
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>

