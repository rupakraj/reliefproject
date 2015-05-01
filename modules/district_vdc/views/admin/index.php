<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo lang('district_vdc'); ?></h1>
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

				<button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGridDistrict_vdcInsert"><?php echo lang('create'); ?></button>
				<button type="button" class="btn btn-danger btn-flat btn-xs" id="jqxGridDistrict_vdcFilterClear"><?php echo lang('clear'); ?></button>

				<br /><br />
				<div id="jqxGridDistrict_vdc"></div>
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
        <?php echo form_open('', array('id' =>'form-district_vdc', 'onsubmit' => 'return false')); ?>
            <table class="form-table">
				<tr>
					<td><label for='id'><?php echo lang('id')?></label></td>
					<td><input id='id' class='text_input' name='id'></td>
					<td><label for='code'><?php echo lang('code')?></label></td>
					<td><input id='code' class='text_input' name='code'></td>
				</tr>
				<tr>
					<td><label for='name_en'><?php echo lang('name_en')?></label></td>
					<td><input id='name_en' class='text_input' name='name_en'></td>
					<td><label for='name_np'><?php echo lang('name_np')?></label></td>
					<td><input id='name_np' class='text_input' name='name_np'></td>
				</tr>
				<tr>
					<td><label for='hierarchy_name'><?php echo lang('hierarchy_name')?></label></td>
					<td><div id='hierarchy_name' class='combo_box' name='hierarchy_name'></div></td>
					<td><label for='location_type'><?php echo lang('location_type')?></label></td>
					<td><div id='location_type' class='combo_box' name='location_type'></div></td>
				</tr>
				<tr>
					<td><label for='parent_location_id'><?php echo lang('parent_location_id')?></label></td>
					<td><div id='parent_location_id' class='combo_box' name='parent_location_id'></div></td>
				</tr>
                <tr>
                    <th colspan="2">
                        <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxDistrict_vdcSubmitButton"><?php echo lang('general_save'); ?></button>
                        <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxDistrict_vdcCancelButton"><?php echo lang('general_cancel'); ?></button>
                    </th>
                </tr>
               
          </table>
        <?php echo form_close(); ?>
    </div>
</div>

<script language="javascript" type="text/javascript">


$(function(){

	//$("#hierarchy_name").jqxComboBox({ source: array_hierarchy_names });
	//$("#location_type").jqxComboBox({ source: array_location_types });

	var locationDataSource = {
		url : base_url + 'admin/district_vdc/combo_json',
        datatype: 'json',
        datafields: [ 
            { name: 'id', type: 'number' },
			{ name: 'code', type: 'string' },
			{ name: 'name_en', type: 'string' },
			{ name: 'name_np', type: 'string' },
        ],
        async: false
	};

	var locationDataAdapter = new $.jqx.dataAdapter(locationDataSource, {autoBind:true});

	$("#parent_location_id").jqxComboBox({ 
	    	theme: theme_combo, 
	    	width: 195, 
			height: 25, 
			selectionMode: 'dropDownList', 
			autoComplete: true, 
			searchMode: 'containsignorecase',
			source: locationDataAdapter, 
			displayMember: "name_en", 
			valueMember: "id", 
			dropDownWidth: 600, 
			dropDownHorizontalAlignment: 'right', 
	        /*renderer: function (index, label, value) {
                var datarecord = areaDataAdapter.records[index];
                var table = '<table style="width: 600px;"><tr><td><b>' + datarecord.name  + '</b></td></tr><tr><td>' + datarecord.coverage + '</td></tr></table>';
                return table;
            }*/
	    });

	var district_vdcDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'code', type: 'string' },
			{ name: 'name_en', type: 'string' },
			{ name: 'name_np', type: 'string' },
			{ name: 'parent_location_id', type: 'number' },
			{ name: 'hierarchy_level', type: 'string' },
			{ name: 'location_type', type: 'string' },
			{ name: 'hierarchy_name', type: 'string' },
			{ name: 'display_order', type: 'string' },
			{ name: 'created_by', type: 'number' },
			{ name: 'modified_by', type: 'number' },
			{ name: 'created_date', type: 'date' },
			{ name: 'modified_date', type: 'date' },
			{ name: 'delete_flag', type: 'number' },
			
        ],
		url: '<?php echo site_url("admin/district_vdc/json"); ?>',
		pagesize: defaultPageSize,
		root: 'rows',
		id : 'id',
		cache: true,
		pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	district_vdcDataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGridDistrict_vdc").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGridDistrict_vdc").jqxGrid('updatebounddata', 'sort');
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
	
	$("#jqxGridDistrict_vdc").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight,
		source: district_vdcDataSource,
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
					var e = '', d='', row =  $("#jqxGridDistrict_vdc").jqxGrid('getrowdata', index);
					e = '<a href="javascript:void(0)" onclick="editRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
					if (row.delete_flag == 0) {
						d = '<a href="javascript:void(0)" onclick="deleteRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
					} else {
						d = '<a href="javascript:void(0)" onclick="restoreRecord(' + index + '); return false;" title="Restore"><i class="glyphicon glyphicon-repeat"></i></a>';
					}
					
					return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '</div>';
				}
			},
			{ text: '<?php echo lang("id"); ?>',datafield: 'id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("code"); ?>',datafield: 'code',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("name_en"); ?>',datafield: 'name_en',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("name_np"); ?>',datafield: 'name_np',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			// { text: '<?php echo lang("parent_location_id"); ?>',datafield: 'parent_location_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			// { text: '<?php echo lang("hierarchy_level"); ?>',datafield: 'hierarchy_level',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			// { text: '<?php echo lang("location_type"); ?>',datafield: 'location_type',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("hierarchy_name"); ?>',datafield: 'hierarchy_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, filtertype:'list', filteritems: array_hierarchy_names },
			// { text: '<?php echo lang("display_order"); ?>',datafield: 'display_order',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridDistrict_vdc").jqxGrid('refresh');
	});

	$('#jqxGridDistrict_vdcFilterClear').on('click', function () { 
		$('#jqxGridDistrict_vdc').jqxGrid('clearfilters');
	});

	$('#jqxGridDistrict_vdcInsert').on('click', function(){
		openPopupWindow('<?php echo lang("general_add")  . "&nbsp;" .  $header; ?>');
    });

	// initialize the popup window
    $("#jqxPopupWindow").jqxWindow({ 
        theme: theme_window,
        width: 700,
        maxWidth: '75%',
        height: 350,  
        maxHeight: '75%',  
        isModal: true, 
        autoOpen: false,
        modalOpacity: 0.7,
        showCollapseButton: false 
    });

     $("#jqxDistrict_vdcCancelButton").on('click', function () {
        $('#id').val('');
        $('#form-district_vdc')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


    $('#form-district_vdc').jqxValidator({
        hintType: 'label',
        animationDuration: 500,
        rules: [
			{ input: '#id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#id').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},
			{ input: '#code', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#code').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},
			{ input: '#name_en', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#name_en').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},
			{ input: '#name_np', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#name_np').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},
        ]
    });

    $("#jqxDistrict_vdcSubmitButton").on('click', function () {

        var validationResult = function (isValid) {
                if (isValid) {
                   saveRecord();
                }
            };

        $('#form-district_vdc').jqxValidator('validate', validationResult);
       
    });

});


function editRecord(index){

    var row =  $("#jqxGridDistrict_vdc").jqxGrid('getrowdata', index);
  	if (row) {
  		console.log(row);
        $('#id').val(row.id);
		$('#code').val(row.code);
		$('#name_en').val(row.name_en);
		$('#name_np').val(row.name_np);
		$('#parent_location_id').jqxComboBox('val', row.parent_location_id);
		$('#location_type').jqxComboBox('val',row.location_type);
		$('#hierarchy_name').jqxComboBox('val',row.hierarchy_name);
		
        openPopupWindow('<?php echo lang("general_edit")  . "&nbsp;" .  $header; ?>');
    }
}

function deleteRecord(index){

    var row =  $("#jqxGridDistrict_vdc").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to delete this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/district_vdc/delete_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridDistrict_vdc').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function restoreRecord(index){

    var row =  $("#jqxGridDistrict_vdc").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to restore this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/district_vdc/restore_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridDistrict_vdc').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function saveRecord(){
    var data = $("#form-district_vdc").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/district_vdc/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#id').val('');
                $('#form-district_vdc')[0].reset();
                $('#jqxGridDistrict_vdc').jqxGrid('updatebounddata');
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>

