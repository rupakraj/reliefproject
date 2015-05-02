<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo lang('vehicle'); ?></h1>
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

				<button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGridVehicleInsert"><?php echo lang('create'); ?></button>
				<button type="button" class="btn btn-danger btn-flat btn-xs" id="jqxGridVehicleFilterClear"><?php echo lang('clear'); ?></button>

				<br /><br />
				<div id="jqxGridVehicle"></div>
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
        <?php echo form_open('', array('id' =>'form-vehicle', 'onsubmit' => 'return false')); ?>
        	<input type = "hidden" name = "id" id = "id"/>
            <table class="form-table">
				<tr>
					<td><label for='organization_id'><?php echo lang('organization_id')?></label></td>
					<td><div id='organization_id' class='number_general' name='organization_id'></div></td>
				</tr>
				<tr>
					<td><label for='registration_number'><?php echo lang('registration_number')?></label></td>
					<td><input id='registration_number' class='text_input' name='registration_number'></td>
				</tr>
				<tr>
					<td><label for='capacity'><?php echo lang('capacity')?></label></td>
					<td><input id='capacity' class='text_input' name='capacity'></td>
				</tr>
				<tr>
					<td><label for='distance_coverage'><?php echo lang('distance_coverage')?></label></td>
					<td><input id='distance_coverage' class='text_input' name='distance_coverage'></td>
				</tr>
				<tr>
					<td><label for='vehicle_type_id'><?php echo lang('vehicle_type_id')?></label></td>
					<td><div id='vehicle_type_id' class='number_general' name='vehicle_type_id'></div></td>
				</tr>
				<tr>
					<td><label for='current_location'><?php echo lang('current_location')?></label></td>
					<td><input id='current_location' class='text_input' name='current_location'></td>
				</tr>
                <tr>
                    <th colspan="2">
                        <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxVehicleSubmitButton"><?php echo lang('general_save'); ?></button>
                        <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxVehicleCancelButton"><?php echo lang('general_cancel'); ?></button>
                    </th>
                </tr>
               
          </table>
        <?php echo form_close(); ?>
    </div>
</div>

<script language="javascript" type="text/javascript">


$(function(){

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
	
	$("#jqxGridVehicle").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight,
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
		columns: [
			{ text: 'SN', width: 50, pinned: true, exportable: false,  columntype: 'number', cellclassname: 'jqx-widget-header', renderer: gridColumnsRenderer, cellsrenderer: rownumberRenderer , filterable: false},
			{
				text: 'Action', datafield: 'action', width:75, sortable:false,filterable:false, pinned:true, align: 'center' , cellsalign: 'center', cellclassname: 'grid-column-center', 
				cellsrenderer: function (index) {
					var e = '', d='', row =  $("#jqxGridVehicle").jqxGrid('getrowdata', index);
					e = '<a href="javascript:void(0)" onclick="editRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
					if (row.delete_flag == 0) {
						d = '<a href="javascript:void(0)" onclick="deleteRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
					} else {
						d = '<a href="javascript:void(0)" onclick="restoreRecord(' + index + '); return false;" title="Restore"><i class="glyphicon glyphicon-repeat"></i></a>';
					}
					
					return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '</div>';
				}
			},
			{ text: '<?php echo lang("organization_id"); ?>',datafield: 'organization_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("registration_number"); ?>',datafield: 'registration_number',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("capacity"); ?>',datafield: 'capacity',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
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

     $("#jqxVehicleCancelButton").on('click', function () {
        $('#id').val('');
        $('#form-vehicle')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


    $('#form-vehicle').jqxValidator({
        hintType: 'label',
        animationDuration: 500,
        rules: [
			{ input: '#organization_id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#organization_id').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#registration_number', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#registration_number').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#capacity', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#capacity').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#distance_coverage', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#distance_coverage').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#vehicle_type_id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#vehicle_type_id').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#current_location', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#current_location').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

        ]
    });

    $("#jqxVehicleSubmitButton").on('click', function () {

        var validationResult = function (isValid) {
                if (isValid) {
                   saveRecord();
                }
            };

        $('#form-vehicle').jqxValidator('validate', validationResult);
       
    });

});


function editRecord(index){

    var row =  $("#jqxGridVehicle").jqxGrid('getrowdata', index);
  	if (row) {
        $('#id').val(row.id);
		$('#organization_id').jqxNumberInput('val', row.organization_id);
		$('#registration_number').val(row.registration_number);
		$('#capacity').val(row.capacity);
		$('#distance_coverage').val(row.distance_coverage);
		$('#vehicle_type_id').jqxNumberInput('val', row.vehicle_type_id);
		$('#current_location').val(row.current_location);
		
        openPopupWindow('<?php echo lang("general_edit")  . "&nbsp;" .  $header; ?>');
    }
}

function deleteRecord(index){

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

function restoreRecord(index){

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

function saveRecord(){
    var data = $("#form-vehicle").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/vehicle/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#id').val('');
                $('#form-vehicle')[0].reset();
                $('#jqxGridVehicle').jqxGrid('updatebounddata');
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>

