<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo lang('organization'); ?></h1>
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

				<button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGridOrganizationInsert"><?php echo lang('create'); ?></button>
				<button type="button" class="btn btn-danger btn-flat btn-xs" id="jqxGridOrganizationFilterClear"><?php echo lang('clear'); ?></button>

				<br /><br />
				<div id="jqxGridOrganization"></div>
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
        <?php echo form_open('', array('id' =>'form-organization', 'onsubmit' => 'return false')); ?>
        	<input type = "hidden" name = "id" id = "id"/>
            <table class="form-table">
				<tr>
					<td><label for='code'><?php echo lang('code')?></label></td>
					<td><input id='code' class='text_input' name='code'></td>
					<td><label for='organization_name'><?php echo lang('organization_name')?></label></td>
					<td><input id='organization_name' class='text_input' name='organization_name'></td>
				</tr>
				<tr>
					<td><label for='specialization'><?php echo lang('specialization')?></label></td>
					<td><div id='specialization' class='combo_box' name='specialization'></div></td>
					<td><label for='total_volunteer'><?php echo lang('total_volunteer')?></label></td>
					<td><div id='total_volunteer' class='number_general' name='total_volunteer'></div></td>
				</tr>
				<tr>
					<td><label for='start_date'><?php echo lang('start_date')?></label></td>
					<td><div id='start_date' class='date_box' name='start_date'></div></td>
					<td><label for='end_date'><?php echo lang('end_date')?></label></td>
					<td><div id='end_date' class='date_box' name='end_date'></div></td>
				</tr>
				<tr>
					<td><label for='country'><?php echo lang('country')?></label></td>
					<td><input id='country' class='text_input' name='country'></td>
				</tr>
				<tr>
					<td><label for='contact_name'><?php echo lang('contact_name')?></label></td>
					<td><input id='contact_name' class='text_input' name='contact_name'></td>
				</tr>
				<tr>
					<td><label for='contact_phone'><?php echo lang('contact_phone')?></label></td>
					<td><input id='contact_phone' class='text_input' name='contact_phone'></td>
					<td><label for='contact_email'><?php echo lang('contact_email')?></label></td>
					<td><input id='contact_email' class='text_input' name='contact_email'></td>
				</tr>

                <tr>
                    <th colspan="4">
                        <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxOrganizationSubmitButton"><?php echo lang('general_save'); ?></button>
                        <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxOrganizationCancelButton"><?php echo lang('general_cancel'); ?></button>
                    </th>
                </tr>
               
          </table>
        <?php echo form_close(); ?>
    </div>
</div>

<script language="javascript" type="text/javascript">


$(function(){

	$("#country").jqxInput({ source: array_countries });

	var specializationDataSource = {
		url : base_url + 'admin/specialization/combo_json',
        datatype: 'json',
        datafields: [ 
            //{ name: 'id', type: 'number' },
			{ name: 'name', type: 'string' },
        ],
        async: false
	}

	var specializationDataAdapter = new $.jqx.dataAdapter(specializationDataSource, {autoBind: true});

	$("#specialization").jqxComboBox({ 
		displayMember: "name", 
        valueMember: "name",
        source: specializationDataAdapter,
        checkboxes: true
    });


	var organizationDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'code', type: 'string' },
			{ name: 'organization_name', type: 'string' },
			{ name: 'specialization', type: 'string' },
			{ name: 'start_date', type: 'date' },
			{ name: 'end_date', type: 'date' },
			{ name: 'total_volunteer', type: 'number' },
			{ name: 'contact_name', type: 'string' },
			{ name: 'contact_phone', type: 'string' },
			{ name: 'contact_email', type: 'string' },
			{ name: 'country', type: 'string' },
			{ name: 'created_by', type: 'number' },
			{ name: 'modified_by', type: 'number' },
			{ name: 'created_date', type: 'date' },
			{ name: 'modified_date', type: 'date' },
			{ name: 'delete_flag', type: 'number' },
			
        ],
		url: '<?php echo site_url("admin/organization/json"); ?>',
		pagesize: defaultPageSize,
		root: 'rows',
		id : 'id',
		cache: true,
		pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	organizationDataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGridOrganization").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGridOrganization").jqxGrid('updatebounddata', 'sort');
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
	
	$("#jqxGridOrganization").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight,
		source: organizationDataSource,
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
					var e = '', d='', detail='' ,row =  $("#jqxGridOrganization").jqxGrid('getrowdata', index);
					e = '<a href="javascript:void(0)" onclick="editRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
					if (row.delete_flag == 0) {
						d = '<a href="javascript:void(0)" onclick="deleteRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
					} else {
						d = '<a href="javascript:void(0)" onclick="restoreRecord(' + index + '); return false;" title="Restore"><i class="glyphicon glyphicon-repeat"></i></a>';
					}
					var link = '<?php echo site_url('admin/organization/detail');?>'  + '/' + row.id;
                    detail = '<a target="blank" href="' + link + '" title="Detail"><i class="glyphicon glyphicon-align-justify"></i></a>';
					
					return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '&nbsp;' + detail + '</div>';
				}
			},
			{ text: '<?php echo lang("code"); ?>',datafield: 'code',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("organization_name"); ?>',datafield: 'organization_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("specialization"); ?>',datafield: 'specialization',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("start_date"); ?>',datafield: 'start_date',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
			{ text: '<?php echo lang("end_date"); ?>',datafield: 'end_date',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
			{ text: '<?php echo lang("total_volunteer"); ?>',datafield: 'total_volunteer',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("country"); ?>',datafield: 'country',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, filtertype: 'list', filteritems: array_countries  },
			{ text: '<?php echo lang("contact_name"); ?>',datafield: 'contact_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("contact_phone"); ?>',datafield: 'contact_phone',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("contact_email"); ?>',datafield: 'contact_email',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridOrganization").jqxGrid('refresh');
	});

	$('#jqxGridOrganizationFilterClear').on('click', function () { 
		$('#jqxGridOrganization').jqxGrid('clearfilters');
	});

	$('#jqxGridOrganizationInsert').on('click', function(){
		openPopupWindow('<?php echo lang("general_add")  . "&nbsp;" .  $header; ?>');
    });

	// initialize the popup window
    $("#jqxPopupWindow").jqxWindow({ 
        theme: theme_window,
        width: '50%',
        maxWidth: '50%',
        height: '65%',  
        maxHeight: '65%',  
        isModal: true, 
        autoOpen: false,
        modalOpacity: 0.7,
        showCollapseButton: false 
    });

     $("#jqxOrganizationCancelButton").on('click', function () {
        $('#id').val('');
        $("#specialization").jqxComboBox('uncheckAll');
        $('#form-organization')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


    $('#form-organization').jqxValidator({
        hintType: 'label',
        animationDuration: 500,
        rules: [
			{ input: '#code', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#code').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#organization_name', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#organization_name').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#specialization', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#specialization').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#total_volunteer', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#total_volunteer').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#country', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#country').val();
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

        ]
    });

    $("#jqxOrganizationSubmitButton").on('click', function () {

        var validationResult = function (isValid) {
                if (isValid) {
                   saveRecord();
                }
            };

        $('#form-organization').jqxValidator('validate', validationResult);
       
    });

});


function editRecord(index){

    var row =  $("#jqxGridOrganization").jqxGrid('getrowdata', index);
  	if (row) {
        $('#id').val(row.id);
		$('#code').val(row.code);
		$('#organization_name').val(row.organization_name);
		
		if (row.specialization != '') {
			str = row.specialization;
			itemArray = str.split(",");
			console.log(itemArray);
			$.each(itemArray, function(key,val) {
	        	$("#specialization").jqxComboBox('checkItem',val);
	    	}); 
		}
		

		if (row.start_date != null && row.start_date != '0000-00-00' && row.start_date != '') {
			$('#start_date').jqxDateTimeInput('setDate', row.start_date);
		}
		if (row.end_date != null && row.end_date != '0000-00-00' && row.end_date != '') {
			$('#end_date').jqxDateTimeInput('setDate', row.end_date);
		}
		$('#country').val(row.country);
		$('#contact_name').val(row.contact_name);
		$('#contact_phone').val(row.contact_phone);
		$('#contact_email').val(row.contact_email);
		$('#total_volunteer').jqxNumberInput('val', row.total_volunteer);
		
        openPopupWindow('<?php echo lang("general_edit")  . "&nbsp;" .  $header; ?>');
    }
}

function deleteRecord(index){

    var row =  $("#jqxGridOrganization").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to delete this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/organization/delete_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridOrganization').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function restoreRecord(index){

    var row =  $("#jqxGridOrganization").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to restore this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/organization/restore_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridOrganization').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function saveRecord(){
    var data = $("#form-organization").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/organization/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#id').val('');
                $("#specialization").jqxComboBox('uncheckAll');
                $('#form-organization')[0].reset();
                $('#jqxGridOrganization').jqxGrid('updatebounddata');
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>

