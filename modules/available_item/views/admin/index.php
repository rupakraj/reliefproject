<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo lang('available_item'); ?></h1>
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

				<button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGridAvailable_itemInsert"><?php echo lang('create'); ?></button>
				<button type="button" class="btn btn-danger btn-flat btn-xs" id="jqxGridAvailable_itemFilterClear"><?php echo lang('clear'); ?></button>

				<br /><br />
				<div id="jqxGridAvailable_item"></div>
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
        <?php echo form_open('', array('id' =>'form-available_item', 'onsubmit' => 'return false')); ?>
        	<input type = "hidden" name = "id" id = "id"/>
            <table class="form-table">
				<tr>
					<td><label for='volunteer_id'><?php echo lang('volunteer_id')?></label></td>
					<td><div id='volunteer_id' class='number_general' name='volunteer_id'></div></td>
				</tr>
				<tr>
					<td><label for='organization_id'><?php echo lang('organization_id')?></label></td>
					<td><div id='organization_id' class='number_general' name='organization_id'></div></td>
				</tr>
				<tr>
					<td><label for='item_id'><?php echo lang('item_id')?></label></td>
					<td><div id='item_id' class='number_general' name='item_id'></div></td>
				</tr>
				<tr>
					<td><label for='quantity'><?php echo lang('quantity')?></label></td>
					<td><div id='quantity' class='number_general' name='quantity'></div></td>
				</tr>
				<tr>
					<td><label for='is_recurring'><?php echo lang('is_recurring')?></label></td>
					<td><div id='is_recurring' class='number_general' name='is_recurring'></div></td>
				</tr>
                <tr>
                    <th colspan="2">
                        <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxAvailable_itemSubmitButton"><?php echo lang('general_save'); ?></button>
                        <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxAvailable_itemCancelButton"><?php echo lang('general_cancel'); ?></button>
                    </th>
                </tr>
               
          </table>
        <?php echo form_close(); ?>
    </div>
</div>

<script language="javascript" type="text/javascript">


$(function(){

	var available_itemDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'volunteer_id', type: 'number' },
			{ name: 'organization_id', type: 'number' },
			{ name: 'item_id', type: 'number' },
			{ name: 'quantity', type: 'number' },
			{ name: 'is_recurring', type: 'number' },
			{ name: 'created_by', type: 'number' },
			{ name: 'modified_by', type: 'number' },
			{ name: 'created_date', type: 'date' },
			{ name: 'modified_date', type: 'date' },
			{ name: 'delete_flag', type: 'number' },
			
        ],
		url: '<?php echo site_url("admin/available_item/json"); ?>',
		pagesize: defaultPageSize,
		root: 'rows',
		id : 'id',
		cache: true,
		pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	available_itemDataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGridAvailable_item").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGridAvailable_item").jqxGrid('updatebounddata', 'sort');
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
	
	$("#jqxGridAvailable_item").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight,
		source: available_itemDataSource,
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
					var e = '', d='', row =  $("#jqxGridAvailable_item").jqxGrid('getrowdata', index);
					e = '<a href="javascript:void(0)" onclick="editRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
					if (row.delete_flag == 0) {
						d = '<a href="javascript:void(0)" onclick="deleteRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
					} else {
						d = '<a href="javascript:void(0)" onclick="restoreRecord(' + index + '); return false;" title="Restore"><i class="glyphicon glyphicon-repeat"></i></a>';
					}
					
					return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '</div>';
				}
			},
			{ text: '<?php echo lang("volunteer_id"); ?>',datafield: 'volunteer_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("organization_id"); ?>',datafield: 'organization_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("item_id"); ?>',datafield: 'item_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("quantity"); ?>',datafield: 'quantity',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("is_recurring"); ?>',datafield: 'is_recurring',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridAvailable_item").jqxGrid('refresh');
	});

	$('#jqxGridAvailable_itemFilterClear').on('click', function () { 
		$('#jqxGridAvailable_item').jqxGrid('clearfilters');
	});

	$('#jqxGridAvailable_itemInsert').on('click', function(){
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

     $("#jqxAvailable_itemCancelButton").on('click', function () {
        $('#id').val('');
        $('#form-available_item')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


    $('#form-available_item').jqxValidator({
        hintType: 'label',
        animationDuration: 500,
        rules: [
			{ input: '#volunteer_id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#volunteer_id').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#organization_id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#organization_id').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#item_id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#item_id').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#quantity', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#quantity').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#is_recurring', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#is_recurring').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

        ]
    });

    $("#jqxAvailable_itemSubmitButton").on('click', function () {

        var validationResult = function (isValid) {
                if (isValid) {
                   saveRecord();
                }
            };

        $('#form-available_item').jqxValidator('validate', validationResult);
       
    });

});


function editRecord(index){

    var row =  $("#jqxGridAvailable_item").jqxGrid('getrowdata', index);
  	if (row) {
        $('#id').val(row.id);
		$('#volunteer_id').jqxNumberInput('val', row.volunteer_id);
		$('#organization_id').jqxNumberInput('val', row.organization_id);
		$('#item_id').jqxNumberInput('val', row.item_id);
		$('#quantity').jqxNumberInput('val', row.quantity);
		$('#is_recurring').jqxNumberInput('val', row.is_recurring);
		
        openPopupWindow('<?php echo lang("general_edit")  . "&nbsp;" .  $header; ?>');
    }
}

function deleteRecord(index){

    var row =  $("#jqxGridAvailable_item").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to delete this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/available_item/delete_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridAvailable_item').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function restoreRecord(index){

    var row =  $("#jqxGridAvailable_item").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to restore this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/available_item/restore_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridAvailable_item').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function saveRecord(){
    var data = $("#form-available_item").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/available_item/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#id').val('');
                $('#form-available_item')[0].reset();
                $('#jqxGridAvailable_item').jqxGrid('updatebounddata');
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>

