<?php echo form_open('', array('id' =>'form-organization_interestarea', 'onsubmit' => 'return false', 'style' => 'display:none')); ?>
	<input type = "hidden" name = "id" id = "interest_pk_id"/>
	<input type = "hidden" name = "organization_id" id = "organization_id" value="<?php echo $organization['id'];?>" />
    <table class="table table-condensed">
		<tr>
			<td width="10%"><label for='area_id'><?php echo lang('area_id')?></label></td>
			<td width="20%"><div id='interest_area_id' class="area_id" name='area_id'></div></td>
		</tr>
        <tr>
            <th colspan="6">
                <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxorganization_interestareaSubmitButton"><?php echo lang('general_save'); ?></button>
                <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxorganization_interestareaCancelButton"><?php echo lang('general_cancel'); ?></button>
            </th>
        </tr>
       
  </table>
<?php echo form_close(); ?>
<br />
<div id="jqxGridorganization_interestarea"></div>

<script language="javascript" type="text/javascript">

$(function(){

	if ( '<?php echo $organization['id'];?>' == '<?php echo $this->session->userdata('organization_id');?>' || <?php echo $this->session->userdata('group_id');?> == 2 ) {
		$('#form-organization_interestarea').show();
	}

	organization_interestinterestAreaDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'area_id', type: 'number' },
			{ name: 'area_name', value: 'area_id', values: { source: areaDataAdapter.records, value: 'id', name: 'name'}, type: 'string' }, 
			{ name: 'organization_id', type: 'number' },
			{ name: 'created_by', type: 'number' },
			{ name: 'modified_by', type: 'number' },
			{ name: 'created_date', type: 'date' },
			{ name: 'modified_date', type: 'date' },
			
        ],
		url: '<?php echo site_url("admin/organization_interestarea/json"); ?>',
		pagesize: defaultPageSize,
		root: 'rows',
		id : 'id',
		cache: true,
		pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	organization_interestinterestAreaDataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGridorganization_interestarea").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGridorganization_interestarea").jqxGrid('updatebounddata', 'sort');
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

                    if (data[key] == 'area_name') {
                        data[key] = 'area_id';
                        for (var j = 0; j < areaDataAdapter.records.length; j++){
                            v = 'filtervalue' + i;
                            if ( areaDataAdapter.records[j].name == data[val]) {
                                data[v] = areaDataAdapter.records[j].id;
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
        $("#jqxGridorganization_interestarea").jqxGrid('addfilter', 'organization_id', filtergroup);
        // apply the filters.
        $("#jqxGridorganization_interestarea").jqxGrid('applyfilters');
    };
	
	$("#jqxGridorganization_interestarea").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight-150,
		source: organization_interestinterestAreaDataSource,
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
					var e = '', d='', row =  $("#jqxGridorganization_interestarea").jqxGrid('getrowdata', index);
					e = '<a href="javascript:void(0)" onclick="editInterestAreaRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
					d = '<a href="javascript:void(0)" onclick="deleteInterestAreaRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
					
					return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '</div>';
				}
			},
			<?php endif; ?>
			{ text: '<?php echo lang("area_id"); ?>',datafield: 'area_name',width: 150,filterable: true,renderer: gridColumnsRenderer, filtertype: 'list', filteritems: array_area  },
			//{ text: '<?php echo lang("start_date"); ?>',datafield: 'start_date',width: 150,filterable: true,renderer: gridColumnsRenderer,  columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
			//{ text: '<?php echo lang("end_date"); ?>',datafield: 'end_date',width: 150,filterable: true,renderer: gridColumnsRenderer,  columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridorganization_interestarea").jqxGrid('refresh');
	});

	$("#jqxorganization_interestareaCancelButton").on('click', function () {
        $('#interest_pk_id').val('');
        $('#form-organization_interestarea')[0].reset();
    });


    $("#jqxorganization_interestareaSubmitButton").on('click', function () {
		saveInterestAreaRecord();

    });

});


function editInterestAreaRecord(index){

    var row =  $("#jqxGridorganization_interestarea").jqxGrid('getrowdata', index);
  	if (row) {
        $('#interest_pk_id').val(row.id);
		$('#interest_area_id').jqxComboBox('val', row.area_id);
    }
}

function deleteInterestAreaRecord(index){

    var row =  $("#jqxGridorganization_interestarea").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to delete this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/organization_interestarea/delete_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridorganization_interestarea').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function saveInterestAreaRecord(){
    var data = $("#form-organization_interestarea").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/organization_interestarea/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#interest_pk_id').val('');
                $('#form-organization_interestarea')[0].reset();
                $('#jqxGridorganization_interestarea').jqxGrid('updatebounddata');
            }

        }
    });
}

</script>

