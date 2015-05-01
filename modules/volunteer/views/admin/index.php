<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?php echo lang('volunteer'); ?></h1>
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

				<button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGridVolunteerInsert"><?php echo lang('create'); ?></button>
				<button type="button" class="btn btn-danger btn-flat btn-xs" id="jqxGridVolunteerFilterClear"><?php echo lang('clear'); ?></button>

				<br /><br />
				<div id="jqxGridVolunteer"></div>
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
        <?php echo form_open('', array('id' =>'form-volunteer', 'onsubmit' => 'return false')); ?>
        	<input type = "hidden" name = "id" id = "id"/>
            <table class="form-table">
				<tr>
					<td><label for='name'><?php echo lang('name')?></label></td>
					<td><input id='name' class='text_input' name='name'></td>
				</tr>
				<tr>
					<td><label for='gender'><?php echo lang('gender')?></label></td>
					<td><input id='gender' class='text_input' name='gender'></td>
				</tr>
				<tr>
					<td><label for='dob'><?php echo lang('dob')?></label></td>
					<td><input id='dob' class='text_input' name='dob'></td>
				</tr>
				<tr>
					<td><label for='district'><?php echo lang('district')?></label></td>
					<td><input id='district' class='text_input' name='district'></td>
				</tr>
				<tr>
					<td><label for='address'><?php echo lang('address')?></label></td>
					<td><input id='address' class='text_input' name='address'></td>
				</tr>
				<tr>
					<td><label for='phone'><?php echo lang('phone')?></label></td>
					<td><input id='phone' class='text_input' name='phone'></td>
				</tr>
				<tr>
					<td><label for='email'><?php echo lang('email')?></label></td>
					<td><input id='email' class='text_input' name='email'></td>
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
					<td><label for='total_days'><?php echo lang('total_days')?></label></td>
					<td><div id='total_days' class='number_general' name='total_days'></div></td>
				</tr>
				<tr>
					<td><label for='organization_id'><?php echo lang('organization_id')?></label></td>
					<td><div id='organization_id' class='number_general' name='organization_id'></div></td>
				</tr>
				<tr>
					<td><label for='skills'><?php echo lang('skills')?></label></td>
					<td><input id='skills' class='text_input' name='skills'></td>
				</tr>
				<tr>
					<td><label for='can_travel'><?php echo lang('can_travel')?></label></td>
					<td><div id='can_travel' class='number_general' name='can_travel'></div></td>
				</tr>
                <tr>
                    <th colspan="2">
                        <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxVolunteerSubmitButton"><?php echo lang('general_save'); ?></button>
                        <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxVolunteerCancelButton"><?php echo lang('general_cancel'); ?></button>
                    </th>
                </tr>
               
          </table>
        <?php echo form_close(); ?>
    </div>
</div>

<script language="javascript" type="text/javascript">


$(function(){

	var volunteerDataSource =
	{
		datatype: "json",
		datafields: [
			{ name: 'id', type: 'number' },
			{ name: 'name', type: 'string' },
			{ name: 'gender', type: 'string' },
			{ name: 'dob', type: 'string' },
			{ name: 'district', type: 'string' },
			{ name: 'address', type: 'string' },
			{ name: 'phone', type: 'string' },
			{ name: 'email', type: 'string' },
			{ name: 'start_date', type: 'date' },
			{ name: 'end_date', type: 'date' },
			{ name: 'total_days', type: 'number' },
			{ name: 'organization_id', type: 'number' },
			{ name: 'skills', type: 'string' },
			{ name: 'can_travel', type: 'number' },
			{ name: 'created_date', type: 'number' },
			{ name: 'modified_date', type: 'date' },
			{ name: 'created_by', type: 'number' },
			{ name: 'modified_by', type: 'number' },
			{ name: 'delete_flag', type: 'number' },
			
        ],
		url: '<?php echo site_url("admin/volunteer/json"); ?>',
		pagesize: defaultPageSize,
		root: 'rows',
		id : 'id',
		cache: true,
		pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	volunteerDataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGridVolunteer").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGridVolunteer").jqxGrid('updatebounddata', 'sort');
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
	
	$("#jqxGridVolunteer").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight,
		source: volunteerDataSource,
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
					var e = '', d='', row =  $("#jqxGridVolunteer").jqxGrid('getrowdata', index);
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
			{ text: '<?php echo lang("gender"); ?>',datafield: 'gender',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("dob"); ?>',datafield: 'dob',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("district"); ?>',datafield: 'district',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("address"); ?>',datafield: 'address',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("phone"); ?>',datafield: 'phone',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("email"); ?>',datafield: 'email',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("start_date"); ?>',datafield: 'start_date',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
			{ text: '<?php echo lang("end_date"); ?>',datafield: 'end_date',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
			{ text: '<?php echo lang("total_days"); ?>',datafield: 'total_days',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("organization_id"); ?>',datafield: 'organization_id',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("skills"); ?>',datafield: 'skills',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			{ text: '<?php echo lang("can_travel"); ?>',datafield: 'can_travel',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
			
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGridVolunteer").jqxGrid('refresh');
	});

	$('#jqxGridVolunteerFilterClear').on('click', function () { 
		$('#jqxGridVolunteer').jqxGrid('clearfilters');
	});

	$('#jqxGridVolunteerInsert').on('click', function(){
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

     $("#jqxVolunteerCancelButton").on('click', function () {
        $('#id').val('');
        $('#form-volunteer')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


    $('#form-volunteer').jqxValidator({
        hintType: 'label',
        animationDuration: 500,
        rules: [
			{ input: '#name', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#name').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#gender', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#gender').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#dob', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#dob').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#district', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#district').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#address', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#address').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#phone', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#phone').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#email', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#email').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#total_days', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#total_days').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#organization_id', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#organization_id').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#skills', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#skills').val();
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

			{ input: '#can_travel', message: 'Required', action: 'blur', 
				rule: function(input) {
					val = $('#can_travel').jqxNumberInput('val');
					return (val == '' || val == null || val == 0) ? false: true;
				}
			},

        ]
    });

    $("#jqxVolunteerSubmitButton").on('click', function () {

        var validationResult = function (isValid) {
                if (isValid) {
                   saveRecord();
                }
            };

        $('#form-volunteer').jqxValidator('validate', validationResult);
       
    });

});


function editRecord(index){

    var row =  $("#jqxGridVolunteer").jqxGrid('getrowdata', index);
  	if (row) {
        $('#id').val(row.id);
		$('#name').val(row.name);
		$('#gender').val(row.gender);
		$('#dob').val(row.dob);
		$('#district').val(row.district);
		$('#address').val(row.address);
		$('#phone').val(row.phone);
		$('#email').val(row.email);
		$('#start_date').jqxDateTimeInput('setDate', row.start_date);
		$('#end_date').jqxDateTimeInput('setDate', row.end_date);
		$('#total_days').jqxNumberInput('val', row.total_days);
		$('#organization_id').jqxNumberInput('val', row.organization_id);
		$('#skills').val(row.skills);
		$('#can_travel').jqxNumberInput('val', row.can_travel);
		
        openPopupWindow('<?php echo lang("general_edit")  . "&nbsp;" .  $header; ?>');
    }
}

function deleteRecord(index){

    var row =  $("#jqxGridVolunteer").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to delete this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/volunteer/delete_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridVolunteer').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function restoreRecord(index){

    var row =  $("#jqxGridVolunteer").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to restore this Record???");
		if (r == true) {
			$.ajax({
                url: "<?php echo site_url('admin/volunteer/restore_json'); ?>",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGridVolunteer').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function saveRecord(){
    var data = $("#form-volunteer").serialize();
   
    $.ajax({
        type: "POST",
        url: '<?php echo site_url("admin/volunteer/save"); ?>',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#id').val('');
                $('#form-volunteer')[0].reset();
                $('#jqxGridVolunteer').jqxGrid('updatebounddata');
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>

