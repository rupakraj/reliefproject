<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo lang('vehicle_type'); ?></h1>
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

				<button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGridVehicle_typeInsert"><?php echo lang('create'); ?></button>
				<button type="button" class="btn btn-danger btn-flat btn-xs" id="jqxGridVehicle_typeFilterClear"><?php echo lang('clear'); ?></button>

				<br /><br />
				<div id="jqxGridVehicle_type"></div>
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
        <?php echo form_open('', array('id' =>'form-vehicle_type', 'onsubmit' => 'return false')); ?>
        	<input type = "hidden" name = "id" id = "id"/>
            <table class="form-table">
				<tr>
					<td><label for='name'><?php echo lang('name')?></label></td>
					<td><input id='name' class='text_input' name='name'></td>
				</tr>
                <tr>
                    <th colspan="2">
                        <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxVehicle_typeSubmitButton"><?php echo lang('general_save'); ?></button>
                        <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxVehicle_typeCancelButton"><?php echo lang('general_cancel'); ?></button>
                    </th>
                </tr>
               
          </table>
        <?php echo form_close(); ?>
    </div>
</div>

<script language="javascript" type="text/javascript">


$(function(){

	var vehicle_typeDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'name', type: 'string' },
			{ name: 'created_by', type: 'number' },
			{ name: 'modified_by', type: 'number' },
			{ name: 'created_date', type: 'date' },
			{ name: 'modified_date', type: 'date' },
			{ name: 'delete_flag', type: 'number' },
			
        ],
		url: '<?php echo site_url("admin/vehicle_type/json"); ?>',
		pagesize: defaultPageSize,
		root: 'rows',
		id : 'id',
		cache: true,
		pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	vehicle_typeDataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGridVehicle_type").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGridVehicle_type").jqxGrid('updatebounddata', 'sort');
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
	
	$("#jqxGridVehicle_type").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight,
		source: vehicle_typeDataSource,
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
					var e = '', d='', row =  $("#jqxGridVehicle_type").jqxGrid('getrowdata', index);
					e = '<a href="javascript:void(0)" onclick="editRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
					if (row.delete_flag == 0) {
						d = '<a href="javascript:void(0)" onclick="deleteRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
					} else {
						d = '<a href="javascript:void(0)" onclick="restoreRecord(' + index + '); return false;" title="Restore"><i class="glyphicon glyphicon-repeat"></i></a>';
					}
					
					return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '</div>';
				}
			},
			{ text: '<?php echo lang("name"); ?>',datafield: 'name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridVehicle_type").jqxGrid('refresh');
	});

	$('#jqxGridVehicle_typeFilterClear').on('click', function () { 
		$('#jqxGridVehicle_type').jqxGrid('clearfilters');
	});

	$('#jqxGridVehicle_typeInsert').on('click', function(){
		openPopupWindow('<?php echo lang("general_add")  . "&nbsp;" .  $header; ?>');
    });

	// initialize the popup window
    $("#jqxPopupWindow").jqxWindow({ 
        theme: theme_window,
        width: 400,
        maxWidth: '75%',
        height: 150,  
        maxHeight: '75%', 
        isModal: true, 
        autoOpen: false,
        modalOpacity: 0.7,
        showCollapseButton: false 
    });

     $("#jqxVehicle_typeCancelButton").on('click', function () {
        $('#id').val('');
        $('#form-vehicle_type')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


    $('#form-vehicle_type').jqxValidator({
        hintType: 'label',
        animationDuration: 500,
        rules: [
			{ input: '#name', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#name').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

        ]
    });

    $("#jqxVehicle_typeSubmitButton").on('click', function () {

        var validationResult = function (isValid) {
                if (isValid) {
                   saveRecord();
                }
            };

        $('#form-vehicle_type').jqxValidator('validate', validationResult);
       
    });

});


function editRecord(index){

    var row =  $("#jqxGridVehicle_type").jqxGrid('getrowdata', index);
  	if (row) {
        $('#id').val(row.id);
		$('#name').val(row.name);
		
        openPopupWindow('<?php echo lang("general_edit")  . "&nbsp;" .  $header; ?>');
    }
}

function deleteRecord(index){

    var row =  $("#jqxGridVehicle_type").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to delete this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/vehicle_type/delete_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridVehicle_type').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function restoreRecord(index){

    var row =  $("#jqxGridVehicle_type").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to restore this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/vehicle_type/restore_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridVehicle_type').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function saveRecord(){
    var data = $("#form-vehicle_type").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/vehicle_type/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#id').val('');
                $('#form-vehicle_type')[0].reset();
                $('#jqxGridVehicle_type').jqxGrid('updatebounddata');
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>

