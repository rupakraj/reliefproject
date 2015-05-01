<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo lang('item'); ?></h1>
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

				<button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGridItemInsert"><?php echo lang('create'); ?></button>
				<button type="button" class="btn btn-danger btn-flat btn-xs" id="jqxGridItemFilterClear"><?php echo lang('clear'); ?></button>

				<br /><br />
				<div id="jqxGridItem"></div>
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
        <?php echo form_open('', array('id' =>'form-item', 'onsubmit' => 'return false')); ?>
        	<input type = "hidden" name = "id" id = "id"/>
            <table class="form-table">
				<tr>
					<td><label for='name'><?php echo lang('name')?></label></td>
					<td><input id='name' class='text_input' name='name'></td>
				</tr>
				<tr>
					<td><label for='unit_id'><?php echo lang('unit_id')?></label></td>
					<td><div id="unit_id" name="unit_id"></div></td>
				</tr>
				<tr>
					<td><label for="is_recurring"><?php echo lang('is_recurring')?></label></td>
                    <td>
                        <input type="radio" value="1" name="is_recurring" id="is_recurring1" />&nbsp;<?php echo lang("general_yes")?> &nbsp;
                        <input type="radio" value="0" name="is_recurring" id="is_recurring0" />&nbsp;<?php echo lang("general_no")?>
                    </td>

				</tr>
				<tr>
					<td><label for='expected_till'><?php echo lang('expected_till')?></label></td>
					<td><div id='expected_till' class='date_box' name='expected_till'></div></td>
				</tr>
                <tr>
                    <th colspan="2">
                        <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxItemSubmitButton"><?php echo lang('general_save'); ?></button>
                        <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxItemCancelButton"><?php echo lang('general_cancel'); ?></button>
                    </th>
                </tr>
               
          </table>
        <?php echo form_close(); ?>
    </div>
</div>

<script language="javascript" type="text/javascript">


$(function(){

	var unitDataSource = {
		url : base_url + 'admin/unit/combo_json',
        datatype: 'json',
        datafields: [ 
            { name: 'id', type: 'number' },
			{ name: 'name', type: 'string' },
        ],
        async: false
	}

	var unitDataAdapter = new $.jqx.dataAdapter(unitDataSource);

	$("#unit_id").jqxComboBox({ 
	    	theme: theme_combo, 
	    	width: 195, 
			height: 25, 
			selectionMode: 'dropDownList', 
			autoComplete: true, 
			searchMode: 'containsignorecase',
			source: unitDataAdapter, 
			displayMember: "name", 
			valueMember: "id"
		});

	var array_unit = new Array();
	$.each(unitDataAdapter.records, function(key,val) {
	        array_unit.push(val.name);
	    }); 

	var itemDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'name', type: 'string' },
			{ name: 'unit_id', type: 'number' },
			{ name: 'unit_name', value: 'unit_id', values: { source: unitDataAdapter.records, value: 'id', name: 'name'}, type: 'string' }, 
			{ name: 'is_recurring', type: 'bool' },
			{ name: 'expected_till', type: 'date' },
			{ name: 'created_by', type: 'number' },
			{ name: 'modified_by', type: 'number' },
			{ name: 'created_date', type: 'date' },
			{ name: 'modified_date', type: 'date' },
			{ name: 'delete_flag', type: 'number' },
			
        ],
		url: '<?php echo site_url("admin/item/json"); ?>',
		pagesize: defaultPageSize,
		root: 'rows',
		id : 'id',
		cache: true,
		pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	itemDataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGridItem").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGridItem").jqxGrid('updatebounddata', 'sort');
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

                    if (data[key] == 'unit_name') {
                        data[key] = 'unit_id';
                        for (var j = 0; j < unitDataAdapter.records.length; j++){
                            v = 'filtervalue' + i;
                            if ( unitDataAdapter.records[j].name == data[val]) {
                                data[v] = unitDataAdapter.records[j].id;
                                break;
                            }
                        }
                    } else if (data[key] == 'expected_till') { 
                    	data[val] = Date.parse(data[val]).toString('yyyy-MM-dd');
                    }
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
	
	$("#jqxGridItem").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight,
		source: itemDataSource,
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
					var e = '', d='', row =  $("#jqxGridItem").jqxGrid('getrowdata', index);
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
			{ text: '<?php echo lang("unit_id"); ?>',datafield: 'unit_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype: 'list', filteritems: array_unit },
			{ text: '<?php echo lang("is_recurring"); ?>',datafield: 'is_recurring',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,columntype: 'checkbox', filtertype: 'bool' },
			{ text: '<?php echo lang("expected_till"); ?>',datafield: 'expected_till',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat: formatString_yyyy_MM_dd},
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridItem").jqxGrid('refresh');
	});

	$('#jqxGridItemFilterClear').on('click', function () { 
		$('#jqxGridItem').jqxGrid('clearfilters');
	});

	$('#jqxGridItemInsert').on('click', function(){
		openPopupWindow('<?php echo lang("general_add")  . "&nbsp;" .  $header; ?>');
    });

	// initialize the popup window
    $("#jqxPopupWindow").jqxWindow({ 
        theme: theme_window,
        width: 400,
        maxWidth: '75%',
        height: 300,  
        maxHeight: '75%',  
        isModal: true, 
        autoOpen: false,
        modalOpacity: 0.7,
        showCollapseButton: false 
    });

     $("#jqxItemCancelButton").on('click', function () {
        $('#id').val('');
        $('#form-item')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


    $('#form-item').jqxValidator({
        hintType: 'label',
        animationDuration: 500,
        rules: [
			{ input: '#name', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#name').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#unit_id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#unit_id').jqxComboBox('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			}
        ]
    });

    $("#jqxItemSubmitButton").on('click', function () {

        var validationResult = function (isValid) {
                if (isValid) {
                   saveRecord();
                }
            };

        $('#form-item').jqxValidator('validate', validationResult);
       
    });

});


function editRecord(index){

    var row =  $("#jqxGridItem").jqxGrid('getrowdata', index);
  	if (row) {
        $('#id').val(row.id);
		$('#name').val(row.name);
		$('#unit_id').jqxComboBox('val', row.unit_id);
		if(row.is_recurring == true) {
            $('#is_recurring1').prop('checked', 'checked');   
        } else {
            $('#is_recurring0').prop('checked', 'checked');   
        }
        if (row.expected_till != null && row.expected_till != '0000-00-00' && row.expected_till != '') {
			$('#expected_till').jqxDateTimeInput('setDate', row.expected_till);
		}
		
        openPopupWindow('<?php echo lang("general_edit")  . "&nbsp;" .  $header; ?>');
    }
}

function deleteRecord(index){

    var row =  $("#jqxGridItem").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to delete this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/item/delete_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridItem').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function restoreRecord(index){

    var row =  $("#jqxGridItem").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to restore this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/item/restore_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridItem').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function saveRecord(){
    var data = $("#form-item").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/item/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#id').val('');
                $('#form-item')[0].reset();
                $('#jqxGridItem').jqxGrid('updatebounddata');
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>

