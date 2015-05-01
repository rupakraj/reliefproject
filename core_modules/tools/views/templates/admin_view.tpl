<aside class="right-side">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>{PHP_START}echo lang('{MODULE}'); {PHP_END}</h1>
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

				{PHP_START}echo displayStatus(); {PHP_END}

				<button type="button" class="btn btn-primary btn-flat btn-xs" id="jqxGrid{MODULE_TITLE}Insert">{PHP_START}echo lang('create'); {PHP_END}</button>
				<button type="button" class="btn btn-danger btn-flat btn-xs" id="jqxGrid{MODULE_TITLE}FilterClear">{PHP_START}echo lang('clear'); {PHP_END}</button>

				<br /><br />
				<div id="jqxGrid{MODULE_TITLE}"></div>
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
        {PHP_START}echo form_open('', array('id' =>'form-{MODULE}', 'onsubmit' => 'return false')); {PHP_END}
        	<input type = "hidden" name = "id" id = "id"/>
            <table class="form-table">{FORMFIELDS}
                <tr>
                    <th colspan="2">
                        <button type="button" class="btn btn-success btn-xs btn-flat" id="jqx{MODULE_TITLE}SubmitButton">{PHP_START}echo lang('general_save'); {PHP_END}</button>
                        <button type="button" class="btn btn-default btn-xs btn-flat" id="jqx{MODULE_TITLE}CancelButton">{PHP_START}echo lang('general_cancel'); {PHP_END}</button>
                    </th>
                </tr>
               
          </table>
        {PHP_START}echo form_close(); {PHP_END}
    </div>
</div>

<script language="javascript" type="text/javascript">


$(function(){

	var {MODULE}DataSource =
	{
		datatype: "json",
		datafields: [
			{DATAFIELDS}
        ],
		url: '{PHP_START}echo site_url("admin/{MODULE}/json"); {PHP_END}',
		pagesize: defaultPageSize,
		root: 'rows',
		id : 'id',
		cache: true,
		pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	{MODULE}DataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGrid{MODULE_TITLE}").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGrid{MODULE_TITLE}").jqxGrid('updatebounddata', 'sort');
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
	
	$("#jqxGrid{MODULE_TITLE}").jqxGrid({
		theme: theme_grid,
		width: '100%',
		height: gridHeight,
		source: {MODULE}DataSource,
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
					var e = '', d='', row =  $("#jqxGrid{MODULE_TITLE}").jqxGrid('getrowdata', index);
					e = '<a href="javascript:void(0)" onclick="editRecord(' + index + '); return false;" title="<?php echo lang("general_edit"); ?>"><i class="glyphicon glyphicon-edit"></i></a>';
					if (row.delete_flag == 0) {
						d = '<a href="javascript:void(0)" onclick="deleteRecord(' + index + '); return false;" title="<?php echo lang("general_delete"); ?>"><i class="glyphicon glyphicon-trash"></i></a>';
					} else {
						d = '<a href="javascript:void(0)" onclick="restoreRecord(' + index + '); return false;" title="<?php echo lang("general_restore"); ?>"><i class="glyphicon glyphicon-repeat"></i></a>';
					}
					
					return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '</div>';
				}
			},
			{COLUMN_FIELDS}
		],
		rendergridrows: function (result) {
			return result.data;
		}
	});


	$("[data-toggle='offcanvas']").click(function(e) {
	    e.preventDefault();
	    $("#jqxGrid{MODULE_TITLE}").jqxGrid('refresh');
	});

	$('#jqxGrid{MODULE_TITLE}FilterClear').on('click', function () { 
		$('#jqxGrid{MODULE_TITLE}').jqxGrid('clearfilters');
	});

	$('#jqxGrid{MODULE_TITLE}Insert').on('click', function(){
		openPopupWindow('{PHP_START}echo lang("general_add")  . "&nbsp;" .  $header; {PHP_END}');
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

     $("#jqx{MODULE_TITLE}CancelButton").on('click', function () {
        $('#id').val('');
        $('#form-{MODULE}')[0].reset();
        $('#jqxPopupWindow').jqxWindow('close');
    });


    $('#form-{MODULE}').jqxValidator({
        hintType: 'label',
        animationDuration: 500,
        rules: [{VALIDATION_RULES}
        ]
    });

    $("#jqx{MODULE_TITLE}SubmitButton").on('click', function () {

        var validationResult = function (isValid) {
                if (isValid) {
                   saveRecord();
                }
            };

        $('#form-{MODULE}').jqxValidator('validate', validationResult);
       
    });

});


function editRecord(index){

    var row =  $("#jqxGrid{MODULE_TITLE}").jqxGrid('getrowdata', index);
  	if (row) {
        {EDITFIELDS}
        openPopupWindow('{PHP_START}echo lang("general_edit")  . "&nbsp;" .  $header; {PHP_END}');
    }
}

function deleteRecord(index){

    var row =  $("#jqxGrid{MODULE_TITLE}").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to delete this Record???");
		if (r == true) {
			$.ajax({
                url: "{PHP_START}echo site_url('admin/{MODULE}/delete_json'); {PHP_END}",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGrid{MODULE_TITLE}').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function restoreRecord(index){

    var row =  $("#jqxGrid{MODULE_TITLE}").jqxGrid('getrowdata', index);
  	if (row) {
		var r = confirm("Do you want to restore this Record???");
		if (r == true) {
			$.ajax({
                url: "{PHP_START}echo site_url('admin/{MODULE}/restore_json'); {PHP_END}",
                type: 'POST',
                data: {id:[row.id]},
                success: function (result) {
                   $('#jqxGrid{MODULE_TITLE}').jqxGrid('updatebounddata');
                }
            });
		}  
    }
}

function saveRecord(){
    var data = $("#form-{MODULE}").serialize();
   
    $.ajax({
        type: "POST",
        url: '{PHP_START}echo site_url("admin/{MODULE}/save"); {PHP_END}',
        data: data,
        success: function (result) {
            var result = eval('('+result+')');
            if (result.success) {
                $('#id').val('');
                $('#form-{MODULE}')[0].reset();
                $('#jqxGrid{MODULE_TITLE}').jqxGrid('updatebounddata');
                $('#jqxPopupWindow').jqxWindow('close');
            }

        }
    });
}

</script>

