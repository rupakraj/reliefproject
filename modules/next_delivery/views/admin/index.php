<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo lang('next_delivery'); ?></h1>
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

				<button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGridNext_deliveryInsert"><?php echo lang('create'); ?></button>
				<button type="button" class="btn btn-danger btn-flat btn-xs" id="jqxGridNext_deliveryFilterClear"><?php echo lang('clear'); ?></button>

				<br /><br />
				<div id="jqxGridNext_delivery"></div>
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
        <?php echo form_open('', array('id' =>'form-next_delivery', 'onsubmit' => 'return false')); ?>
        	<input type = "hidden" name = "id" id = "id"/>
            <table class="form-table">
				<tr>
					<td><label for='organization_id'><?php echo lang('organization_id')?></label></td>
					<td><div id='organization_id' class='number_general' name='organization_id'></div></td>
				</tr>
				<tr>
					<td><label for='area_id'><?php echo lang('area_id')?></label></td>
					<td><div id='area_id' class='number_general' name='area_id'></div></td>
				</tr>
				<tr>
					<td><label for='vehicle_id'><?php echo lang('vehicle_id')?></label></td>
					<td><div id='vehicle_id' class='number_general' name='vehicle_id'></div></td>
				</tr>
				<tr>
					<td><label for='district_vdc_id'><?php echo lang('district_vdc_id')?></label></td>
					<td><div id='district_vdc_id' class='number_general' name='district_vdc_id'></div></td>
				</tr>
				<tr>
					<td><label for='street'><?php echo lang('street')?></label></td>
					<td><input id='street' class='text_input' name='street'></td>
				</tr>
				<tr>
					<td><label for='contact_name'><?php echo lang('contact_name')?></label></td>
					<td><input id='contact_name' class='text_input' name='contact_name'></td>
				</tr>
				<tr>
					<td><label for='contact_phone'><?php echo lang('contact_phone')?></label></td>
					<td><input id='contact_phone' class='text_input' name='contact_phone'></td>
				</tr>
				<tr>
					<td><label for='status'><?php echo lang('status')?></label></td>
					<td><input id='status' class='text_input' name='status'></td>
				</tr>
				<tr>
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
    </div>
</div>

<script language="javascript" type="text/javascript">


$(function(){

	var next_deliveryDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'organization_id', type: 'number' },
			{ name: 'area_id', type: 'number' },
			{ name: 'vehicle_id', type: 'number' },
			{ name: 'district_vdc_id', type: 'number' },
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
		columns: [
			{ text: 'SN', width: 50, pinned: true, exportable: false,  columntype: 'number', cellclassname: 'jqx-widget-header', renderer: gridColumnsRenderer, cellsrenderer: rownumberRenderer , filterable: false},
			{
				text: 'Action', datafield: 'action', width:75, sortable:false,filterable:false, pinned:true, align: 'center' , cellsalign: 'center', cellclassname: 'grid-column-center', 
				cellsrenderer: function (index) {
					var e = '', d='', row =  $("#jqxGridNext_delivery").jqxGrid('getrowdata', index);
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
			{ text: '<?php echo lang("area_id"); ?>',datafield: 'area_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("vehicle_id"); ?>',datafield: 'vehicle_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("district_vdc_id"); ?>',datafield: 'district_vdc_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("street"); ?>',datafield: 'street',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("contact_name"); ?>',datafield: 'contact_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("contact_phone"); ?>',datafield: 'contact_phone',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("status"); ?>',datafield: 'status',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("reporting_time"); ?>',datafield: 'reporting_time',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridNext_delivery").jqxGrid('refresh');
	});

	$('#jqxGridNext_deliveryFilterClear').on('click', function () { 
		$('#jqxGridNext_delivery').jqxGrid('clearfilters');
	});

	$('#jqxGridNext_deliveryInsert').on('click', function(){
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

     $("#jqxNext_deliveryCancelButton").on('click', function () {
        $('#id').val('');
        $('#form-next_delivery')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


    $('#form-next_delivery').jqxValidator({
        hintType: 'label',
        animationDuration: 500,
        rules: [
			{ input: '#organization_id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#organization_id').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#area_id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#area_id').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#vehicle_id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#vehicle_id').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#district_vdc_id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#district_vdc_id').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#street', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#street').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#contact_name', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#contact_name').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#contact_phone', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#contact_phone').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#status', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#status').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

        ]
    });

    $("#jqxNext_deliverySubmitButton").on('click', function () {

        var validationResult = function (isValid) {
                if (isValid) {
                   saveRecord();
                }
            };

        $('#form-next_delivery').jqxValidator('validate', validationResult);
       
    });

});


function editRecord(index){

    var row =  $("#jqxGridNext_delivery").jqxGrid('getrowdata', index);
  	if (row) {
        $('#id').val(row.id);
		$('#organization_id').jqxNumberInput('val', row.organization_id);
		$('#area_id').jqxNumberInput('val', row.area_id);
		$('#vehicle_id').jqxNumberInput('val', row.vehicle_id);
		$('#district_vdc_id').jqxNumberInput('val', row.district_vdc_id);
		$('#street').val(row.street);
		$('#contact_name').val(row.contact_name);
		$('#contact_phone').val(row.contact_phone);
		$('#status').val(row.status);
		$('#reporting_time').jqxDateTimeInput('setDate', row.reporting_time);
		
        openPopupWindow('<?php echo lang("general_edit")  . "&nbsp;" .  $header; ?>');
    }
}

function deleteRecord(index){

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

function restoreRecord(index){

    var row =  $("#jqxGridNext_delivery").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to restore this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/next_delivery/restore_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridNext_delivery').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function saveRecord(){
    var data = $("#form-next_delivery").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/next_delivery/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#id').val('');
                $('#form-next_delivery')[0].reset();
                $('#jqxGridNext_delivery').jqxGrid('updatebounddata');
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>

