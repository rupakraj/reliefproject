<?php echo form_open('', array('id' =>'form-delivered_item', 'onsubmit' => 'return false')); ?>
        	<input type = "hidden" name = "id" id = "id"/>
            <table class="form-table">
				<tr>
					<td><label for='area_id'><?php echo lang('area_id')?></label></td>
					<td><div id='delivered_item_area_id' class='combo_box' name='area_id'></div></td>
				</tr>
				<tr>
					<td><label for='organization_id'><?php echo lang('organization_id')?></label></td>
					<td><div id='organization_id' class='number_general' name='organization_id'></div></td>
				</tr>
				<tr>
					<td><label for='item_id'><?php echo lang('item_id')?></label></td>
					<td><div id='delivered_item_item_id' class='combo_box' name='item_id'></div></td>
				</tr>
				<tr>
					<td><label for='delivered_date'><?php echo lang('delivered_date')?></label></td>
					<td><div id='delivered_date' class='date_box' name='delivered_date'></div></td>
				</tr>
				<tr>
					<td><label for='quantity'><?php echo lang('quantity')?></label></td>
					<td><div id='quantity' class='number_general' name='quantity'></div></td>
				</tr>
                <tr>
                    <th colspan="2">
                        <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxDelivered_itemSubmitButton"><?php echo lang('general_save'); ?></button>
                        <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxDelivered_itemCancelButton"><?php echo lang('general_cancel'); ?></button>
                    </th>
                </tr>
               
          </table>
        <?php echo form_close(); ?>
        <br />
<div id="jqxGridDelivered_item"></div>




<script language="javascript" type="text/javascript">


$(function(){



	var deliveredItemAreaDataSource = {
		url : base_url + 'admin/area/combo_json',
        datatype: 'json',
        datafields: [ 
            { name: 'id', type: 'number' },
			{ name: 'code', type: 'string' },
			{ name: 'name', type: 'string' },
        ],
        async: false
	}

	var deliveredItemAreaDataAdapter = new $.jqx.dataAdapter(deliveredItemAreaDataSource);

	$("#delivered_item_area_id").jqxComboBox({ 
	   theme: theme_combo, 
    	width: 195, 
		height: 25, 
		selectionMode: 'dropDownList', 
		source:deliveredItemAreaDataAdapter, 
		autoComplete: true, 
		displayMember: "name", 
		valueMember: "id", 
		dropDownWidth: 400, 
		dropDownHorizontalAlignment: 'left'
	});




	var deliveredItemItemDataSource = {
		url : base_url + 'admin/item/combo_json',
        datatype: 'json',
        datafields: [ 
            { name: 'id', type: 'number' },
			{ name: 'name', type: 'string' }
        ],
        async: false
	}

	var deliveredItemItemDataAdapter = new $.jqx.dataAdapter(deliveredItemItemDataSource);

	$("#delivered_item_item_id").jqxComboBox({ 
	   theme: theme_combo, 
    	width: 195, 
		height: 25, 
		selectionMode: 'dropDownList', 
		source:deliveredItemItemDataAdapter, 
		autoComplete: true, 
		displayMember: "name", 
		valueMember: "id", 
		dropDownWidth: 400, 
		dropDownHorizontalAlignment: 'left'
	});


	$("#delivered_item_item_id").jqxComboBox({
		theme: theme_combo, 
    	width: 195, 
		height: 25, 
		selectionMode: 'dropDownList', 
		source:deliveredItemItemDataAdapter, 
		autoComplete: true, 
		displayMember: "name", 
		valueMember: "id", 
		dropDownWidth: 400, 
		dropDownHorizontalAlignment: 'left'
	});


	var array_delivered_item_area = new Array();
	$.each(deliveredItemAreaDataAdapter.records, function(key,val) {
		array_delivered_item_area.push(val.name);
	}); 

	var array_delivered_item_item = new Array();
	$.each(deliveredItemItemDataAdapter.records, function(key,val) {
		array_delivered_item_item.push(val.name);
	}); 



	var delivered_itemDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'area_id', type: 'number' },
			{ name: 'area_name', value: 'area_id', values: { source: deliveredItemAreaDataAdapter.records, value: 'id', name: 'name'}, type: 'string' },
			{ name: 'organization_id', type: 'number' },
			{ name: 'item_id', type: 'number' },
			{ name: 'item_name', value: 'item_id', values: { source: deliveredItemItemDataAdapter.records, value: 'id', name: 'name'}, type: 'string' },
			{ name: 'delivered_date', type: 'date' },
			{ name: 'quantity', type: 'number' },
			{ name: 'created_by', type: 'number' },
			{ name: 'modified_by', type: 'number' },
			{ name: 'created_date', type: 'date' },
			{ name: 'modified_date', type: 'date' },
			
        ],
		url: '<?php echo site_url("admin/delivered_item/json"); ?>',
		pagesize: defaultPageSize,
		root: 'rows',
		id : 'id',
		cache: true,
		pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	delivered_itemDataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGridDelivered_item").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGridDelivered_item").jqxGrid('updatebounddata', 'sort');
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
                    
                    if (data[key] == 'item_name') {
                        data[key] = 'item_id';
                        for (var j = 0; j < deliveredItemItemDataAdapter.records.length; j++){
                            v = 'filtervalue' + i;
                            if ( deliveredItemItemDataAdapter.records[j].name == data[val]) {
                                data[v] = deliveredItemItemDataAdapter.records[j].id;
                                break;
                            }
                        }
                    }
                    else if (data[key] == 'area_name') {
                        data[key] = 'area_id';
                        for (var j = 0; j < deliveredItemAreaDataAdapter.records.length; j++){
                            v = 'filtervalue' + i;
                            if ( deliveredItemAreaDataAdapter.records[j].name == data[val]) {
                                data[v] = deliveredItemAreaDataAdapter.records[j].id;
                                break;
                            }
                        }
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
	
	$("#jqxGridDelivered_item").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight,
		source: delivered_itemDataSource,
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
					var e = '', d='', row =  $("#jqxGridDelivered_item").jqxGrid('getrowdata', index);
					e = '<a href="javascript:void(0)" onclick="editOrgDeliveredRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
					if (row.delete_flag == 0) {
						d = '<a href="javascript:void(0)" onclick="deleteOrgDeliveredRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
					} else {
						d = '<a href="javascript:void(0)" onclick="restoreRecord(' + index + '); return false;" title="Restore"><i class="glyphicon glyphicon-repeat"></i></a>';
					}
					
					return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '</div>';
				}
			},
			{ text: '<?php echo lang("area_id"); ?>',datafield: 'area_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_delivered_item_area },
			{ text: '<?php echo lang("organization_id"); ?>',datafield: 'organization_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("item_id"); ?>',datafield: 'item_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_delivered_item_item },
			{ text: '<?php echo lang("delivered_date"); ?>',datafield: 'delivered_date',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
			{ text: '<?php echo lang("quantity"); ?>',datafield: 'quantity',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridDelivered_item").jqxGrid('refresh');
	});

	$('#jqxGridDelivered_itemFilterClear').on('click', function () { 
		$('#jqxGridDelivered_item').jqxGrid('clearfilters');
	});

	$('#jqxGridDelivered_itemInsert').on('click', function(){
		openPopupWindow('<?php echo lang("general_add")  . "&nbsp;" .  $header; ?>');
    });

	

     $("#jqxDelivered_itemCancelButton").on('click', function () {
        $('#id').val('');
        $('#form-delivered_item')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


   

    $("#jqxDelivered_itemSubmitButton").on('click', function () {

    	 saveOrgDeliveredRecord();
        
    });

});


function editOrgDeliveredRecord(index){

    var row =  $("#jqxGridDelivered_item").jqxGrid('getrowdata', index);
  	if (row) {
        $('#id').val(row.id);
		$('#area_id').jqxNumberInput('val', row.area_id);
		$('#organization_id').jqxNumberInput('val', row.organization_id);
		$('#item_id').jqxNumberInput('val', row.item_id);

		$('#delivered_date').jqxDateTimeInput('setDate', row.delivered_date);
		$('#quantity').jqxNumberInput('val', row.quantity);
		
        openPopupWindow('<?php echo lang("general_edit")  . "&nbsp;" .  $header; ?>');
    }
}

function deleteOrgDeliveredRecord(index){

    var row =  $("#jqxGridDelivered_item").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to delete this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/delivered_item/delete_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridDelivered_item').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}



function saveOrgDeliveredRecord(){
    var data = $("#form-delivered_item").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/delivered_item/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#id').val('');
                $('#form-delivered_item')[0].reset();
                $('#jqxGridDelivered_item').jqxGrid('updatebounddata');
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>
