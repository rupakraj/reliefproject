<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo lang('organization_available_item'); ?></h1>
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

				<button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGridOrganization_available_itemInsert"><?php echo lang('create'); ?></button>
				<button type="button" class="btn btn-danger btn-flat btn-xs" id="jqxGridOrganization_available_itemFilterClear"><?php echo lang('clear'); ?></button>

				<br /><br />
				<div id="jqxGridOrganization_available_item"></div>
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
        <?php echo form_open('', array('id' =>'form-organization_available_item', 'onsubmit' => 'return false')); ?>
        	<input type = "hidden" name = "id" id = "id"/>
            <table class="form-table">
				<tr>
					<td><label for='area_id'><?php echo lang('area_id')?></label></td>
					<td><div id='area_id' class='number_general' name='area_id'></div></td>
				</tr>
				<tr>
					<td><label for='organization_id'><?php echo lang('organization_id')?></label></td>
					<td><div id='organization_id' class='number_general' name='organization_id'></div></td>
				</tr>
				<tr>
					<td><label for='start_date'><?php echo lang('start_date')?></label></td>
					<td><div id='start_date' class='date_box' name='start_date'></div></td>
				</tr>
				<tr>
					<td><label for='end_date'><?php echo lang('end_date')?></label></td>
					<td><div id='end_date' class='date_box' name='end_date'></div></td>
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
					<td><label for='deliver_quantity'><?php echo lang('deliver_quantity')?></label></td>
					<td><div id='deliver_quantity' class='number_general' name='deliver_quantity'></div></td>
				</tr>
                <tr>
                    <th colspan="2">
                        <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxOrganization_available_itemSubmitButton"><?php echo lang('general_save'); ?></button>
                        <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxOrganization_available_itemCancelButton"><?php echo lang('general_cancel'); ?></button>
                    </th>
                </tr>
               
          </table>
        <?php echo form_close(); ?>
    </div>
</div>

<script language="javascript" type="text/javascript">


$(function(){

	var organization_available_itemDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'area_id', type: 'number' },
			{ name: 'organization_id', type: 'number' },
			{ name: 'start_date', type: 'date' },
			{ name: 'end_date', type: 'date' },
			{ name: 'created_by', type: 'number' },
			{ name: 'modified_by', type: 'number' },
			{ name: 'created_date', type: 'date' },
			{ name: 'modified_date', type: 'date' },
			{ name: 'item_id', type: 'number' },
			{ name: 'quantity', type: 'number' },
			{ name: 'deliver_quantity', type: 'number' },
			
        ],
		url: '<?php echo site_url("admin/organization_available_item/json"); ?>',
		pagesize: defaultPageSize,
		root: 'rows',
		id : 'id',
		cache: true,
		pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	organization_available_itemDataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGridOrganization_available_item").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGridOrganization_available_item").jqxGrid('updatebounddata', 'sort');
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
	
	$("#jqxGridOrganization_available_item").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight,
		source: organization_available_itemDataSource,
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
					var e = '', d='', row =  $("#jqxGridOrganization_available_item").jqxGrid('getrowdata', index);
					e = '<a href="javascript:void(0)" onclick="editRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
					if (row.delete_flag == 0) {
						d = '<a href="javascript:void(0)" onclick="deleteRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
					} else {
						d = '<a href="javascript:void(0)" onclick="restoreRecord(' + index + '); return false;" title="Restore"><i class="glyphicon glyphicon-repeat"></i></a>';
					}
					
					return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '</div>';
				}
			},
			{ text: '<?php echo lang("area_id"); ?>',datafield: 'area_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("organization_id"); ?>',datafield: 'organization_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("start_date"); ?>',datafield: 'start_date',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
			{ text: '<?php echo lang("end_date"); ?>',datafield: 'end_date',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
			{ text: '<?php echo lang("item_id"); ?>',datafield: 'item_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("quantity"); ?>',datafield: 'quantity',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("deliver_quantity"); ?>',datafield: 'deliver_quantity',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridOrganization_available_item").jqxGrid('refresh');
	});

	$('#jqxGridOrganization_available_itemFilterClear').on('click', function () { 
		$('#jqxGridOrganization_available_item').jqxGrid('clearfilters');
	});

	$('#jqxGridOrganization_available_itemInsert').on('click', function(){
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

     $("#jqxOrganization_available_itemCancelButton").on('click', function () {
        $('#id').val('');
        $('#form-organization_available_item')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


    $('#form-organization_available_item').jqxValidator({
        hintType: 'label',
        animationDuration: 500,
        rules: [
			{ input: '#area_id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#area_id').jqxNumberInput('val');
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

			{ input: '#deliver_quantity', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#deliver_quantity').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

        ]
    });

    $("#jqxOrganization_available_itemSubmitButton").on('click', function () {

        var validationResult = function (isValid) {
                if (isValid) {
                   saveRecord();
                }
            };

        $('#form-organization_available_item').jqxValidator('validate', validationResult);
       
    });

});


function editRecord(index){

    var row =  $("#jqxGridOrganization_available_item").jqxGrid('getrowdata', index);
  	if (row) {
        $('#id').val(row.id);
		$('#area_id').jqxNumberInput('val', row.area_id);
		$('#organization_id').jqxNumberInput('val', row.organization_id);
		$('#start_date').jqxDateTimeInput('setDate', row.start_date);
		$('#end_date').jqxDateTimeInput('setDate', row.end_date);
		$('#item_id').jqxNumberInput('val', row.item_id);
		$('#quantity').jqxNumberInput('val', row.quantity);
		$('#deliver_quantity').jqxNumberInput('val', row.deliver_quantity);
		
        openPopupWindow('<?php echo lang("general_edit")  . "&nbsp;" .  $header; ?>');
    }
}

function deleteRecord(index){

    var row =  $("#jqxGridOrganization_available_item").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to delete this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/organization_available_item/delete_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridOrganization_available_item').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function restoreRecord(index){

    var row =  $("#jqxGridOrganization_available_item").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to restore this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/organization_available_item/restore_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridOrganization_available_item').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function saveRecord(){
    var data = $("#form-organization_available_item").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/organization_available_item/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#id').val('');
                $('#form-organization_available_item')[0].reset();
                $('#jqxGridOrganization_available_item').jqxGrid('updatebounddata');
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>

