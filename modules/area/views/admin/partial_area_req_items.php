<?php echo form_open('', array('id' =>'form-area_req_item', 'onsubmit' => 'return false')); ?>
<input type = "hidden" name = "id" id = "id"/>
<input type = "hidden" name = "area_id" id = "area_id" value="<?php echo $area->id;?>"/>
<table class="form-table">
    <tr>
        <td><label for='item_id'><?php echo lang('item_id')?></label></td>
        <td><div id='item_id' class='number_general' name='item_id'></div></td>
    </tr>
    <tr>
        <td><label for='quantity'><?php echo lang('quantity')?></label></td>
        <td><div id='quantity' class='number_general' name='quantity'></div><span id="item_unit"></span></td>
    </tr>
    <tr>
        <td><label for='expected_date'><?php echo lang('expected_date')?></label></td>
        <td><div id='expected_date' class='date_box' name='expected_date'></div></td>
    </tr>
    <tr>
        <td><label for='priority'><?php echo lang('priority')?></label></td>
        <td><div id='priority' class='number_general' name='priority'></div></td>
    </tr>
    <tr>
        <th colspan="2">
            <button type="button" class="btn btn-success btn-xs btn-flat" id="jqxArea_req_itemSubmitButton"><?php echo lang('general_save'); ?></button>
            <button type="button" class="btn btn-default btn-xs btn-flat" id="jqxArea_req_itemCancelButton"><?php echo lang('general_cancel'); ?></button>
        </th>
    </tr>

</table>
<?php echo form_close(); ?>
<p>&nbsp;</p>
<div id="jqxGridArea_req_item"></div>

<script language="javascript" type="text/javascript">


    $(function(){

        //priority
        var priorityDataSource = {
            url : base_url + 'admin/priority/combo_json',
            datatype: 'json',
            datafields: [
                { name: 'id', type: 'number' },
                { name: 'name', type: 'string' },
            ],
            async: false
        }

        var priorityDataAdapter = new $.jqx.dataAdapter(priorityDataSource);

        $("#priority").jqxComboBox({
            theme: theme_combo,
            width: 195,
            height: 25,
            selectionMode: 'dropDownList',
            autoComplete: true,
            searchMode: 'containsignorecase',
            source: priorityDataAdapter,
            displayMember: "name",
            valueMember: "id"
        });

        var array_priority = new Array();
        $.each(priorityDataAdapter.records, function(key,val) {
            array_priority.push(val.name);
        });
        //end priority

        //items combo
        var itemsDataSource = {
            url : base_url + 'admin/item/combo_json',
            datatype: 'json',
            datafields: [
                { name: 'id', type: 'number' },
                { name: 'name', type: 'string' },
                { name: 'unit', type: 'string' },
            ],
            async: false
        }

        var itemsDataAdapter = new $.jqx.dataAdapter(itemsDataSource,{
            autoBind:true,
            beforeLoadComplete: function (records) {
                var data = new Array();
                for (var i = 0; i < records.length; i++) {
                    var item = records[i];
                    item.item_name = item.name + " (in " + item.unit + ")";
                    data.push(item);
                }
                return data;
            }
        });

        $("#item_id").jqxComboBox({
            theme: theme_combo,
            width: 195,
            height: 25,
            selectionMode: 'dropDownList',
            autoComplete: true,
            searchMode: 'containsignorecase',
            source: itemsDataAdapter,
            displayMember: "item_name",
            valueMember: "id"
        });

        var array_items = new Array();
        $.each(itemsDataAdapter.records, function(key,val) {
            array_items.push(val.item_name);
        });
        //end of item combo

        var area_req_itemDataSource =
        {
            datatype: "json",
            datafields: [
                { name: 'id', type: 'number' },
                { name: 'area_id', type: 'number' },
                { name: 'item_id', type: 'number' },
                { name: 'item_name', value: 'item_id', values: { source: itemsDataAdapter.records, value: 'id', name: 'item_name'}, type: 'string' },
                { name: 'quantity', type: 'number' },
                { name: 'expected_date', type: 'date' },
                { name: 'priority', type: 'number' },
                { name: 'priority_name', type: 'string', value:'priority', values: { source: priorityDataAdapter.records, value: 'id', name: 'name'}},
                { name: 'created_by', type: 'number' },
                { name: 'modified_by', type: 'number' },
                { name: 'created_date', type: 'date' },
                { name: 'modified_date', type: 'date' },
                { name: 'delete_flag', type: 'number' },

            ],
            url: '<?php echo site_url("admin/area_req_item/json"); ?>',
            pagesize: defaultPageSize,
            root: 'rows',
            id : 'id',
            cache: true,
            pager: function (pagenum, pagesize, oldpagenum) {
                //callback called when a page or page size is changed.
            },
            beforeprocessing: function (data) {
                area_req_itemDataSource.totalrecords = data.total;
            },
            // update the grid and send a request to the server.
            filter: function () {
                $("#jqxGridArea_req_item").jqxGrid('updatebounddata', 'filter');
            },
            // update the grid and send a request to the server.
            sort: function () {
                $("#jqxGridArea_req_item").jqxGrid('updatebounddata', 'sort');
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
                            for (var j = 0; j < itemsDataAdapter.records.length; j++){
                                v = 'filtervalue' + i;
                                if ( itemsDataAdapter.records[j].item_name == data[val]) {
                                    data[v] = itemsDataAdapter.records[j].id;
                                    break;
                                }
                            }
                        }
                        if (data[key] == 'priority_name') {
                            data[key] = 'priority';
                            for (var j = 0; j < priorityDataAdapter.records.length; j++){
                                v = 'filtervalue' + i;
                                if ( priorityDataAdapter.records[j].name == data[val]) {
                                    data[v] = priorityDataAdapter.records[j].id;
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

        var addfilter = function () {

            var filtergroup = new $.jqx.filter(),

                filter_or_operator = 1,
                filtervalue = '<?php echo $area->id;?>',
                filtercondition = 'equal',
                filter1 = filtergroup.createfilter('numericfilter', filtervalue, filtercondition);


            filtergroup.operator = 'and';
            filtergroup.addfilter(filter_or_operator, filter1);
            // add the filters.
            $("#jqxGridArea_req_item").jqxGrid('addfilter', 'area_id', filtergroup);
            // apply the filters.
            $("#jqxGridArea_req_item").jqxGrid('applyfilters');
        };

        $("#jqxGridArea_req_item").jqxGrid({
            theme: theme_grid,
            width: '100%',
            height: gridHeight,
            source: area_req_itemDataSource,
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
                { text: 'Area',datafield: 'area_id',hidden:true},
                { text: 'SN', width: 50, pinned: true, exportable: false,  columntype: 'number', cellclassname: 'jqx-widget-header', renderer: gridColumnsRenderer, cellsrenderer: rownumberRenderer , filterable: false},
                {
                    text: 'Action', datafield: 'action', width:75, sortable:false,filterable:false, pinned:true, align: 'center' , cellsalign: 'center', cellclassname: 'grid-column-center',
                    cellsrenderer: function (index) {
                        var e = '', d='', row =  $("#jqxGridArea_req_item").jqxGrid('getrowdata', index);
                        e = '<a href="javascript:void(0)" onclick="editRecord(' + index + '); return false;" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>';
                        if (row.delete_flag == 0) {
                            d = '<a href="javascript:void(0)" onclick="deleteRecord(' + index + '); return false;" title="Delete"><i class="glyphicon glyphicon-trash"></i></a>';
                        } else {
                            d = '<a href="javascript:void(0)" onclick="restoreRecord(' + index + '); return false;" title="Restore"><i class="glyphicon glyphicon-repeat"></i></a>';
                        }

                        return '<div style="text-align: center; margin-top: 8px;">' + e + '&nbsp;' + d + '</div>';
                    }
                },
                { text: '<?php echo lang("item_id"); ?>',datafield: 'item_name',width: 300,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_items },
                { text: '<?php echo lang("quantity"); ?>',datafield: 'quantity',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
                { text: '<?php echo lang("expected_date"); ?>',datafield: 'expected_date',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
                { text: '<?php echo lang("priority"); ?>',datafield: 'priority_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_priority },

            ],
            rendergridrows: function (result) {
                return result.data;
            }
        });


        $("[data-toggle='offcanvas']").click(function(e) {
            e.preventDefault();
            $("#jqxGridArea_req_item").jqxGrid('refresh');
        });

        $('#jqxGridArea_req_itemFilterClear').on('click', function () {
            $('#jqxGridArea_req_item').jqxGrid('clearfilters');
        });

        $("#jqxArea_req_itemCancelButton").on('click', function () {
            $('#id').val('');
            $('#form-area_req_item')[0].reset();
            //$('#jqxPopupWindow').jqxWindow('close');
        });


        /*$('#form-area_req_item').jqxValidator({
            hintType: 'label',
            animationDuration: 500,
            rules: [
                { input: '#area_id', message: 'Required', action: 'blur',
                    rule: function(input) {
                        val = $('#area_id').jqxNumberInput('val');
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

            ]
        });*/

        $("#jqxArea_req_itemSubmitButton").on('click', function () {
            saveRecord();
            /*var validationResult = function (isValid) {
                if (isValid) {
                    saveRecord();
                }
            };

            $('#form-area_req_item').jqxValidator('validate', validationResult);*/

        });

    });


    function editRecord(index){
        var row =  $("#jqxGridArea_req_item").jqxGrid('getrowdata', index);
        if (row) {
            $('#id').val(row.id);
            //$('#area_id').jqxNumberInput('val', row.area_id);
            //$('#item_id').jqxNumberInput('val', row.item_id);
            $('#item_id').jqxComboBox('val', row.item_id);
            $('#quantity').jqxNumberInput('val', row.quantity);
            $('#expected_date').jqxDateTimeInput('setDate', row.expected_date);
            $('#priority').jqxComboBox('val', row.priority);
        }
    }

    function deleteRecord(index){

        var row =  $("#jqxGridArea_req_item").jqxGrid('getrowdata', index);
        if (row) {
            var r = confirm("Do you want to delete this Record???");
            if (r == true) {
                $.ajax({
                    url: "<?php echo site_url('admin/area_req_item/delete_json'); ?>",
                    type: 'POST',
                    data: {id:[row.id]},
                    success: function (result) {
                        $('#jqxGridArea_req_item').jqxGrid('updatebounddata');
                    }
                });
            }
        }
    }

    function restoreRecord(index){

        var row =  $("#jqxGridArea_req_item").jqxGrid('getrowdata', index);
        if (row) {
            var r = confirm("Do you want to restore this Record???");
            if (r == true) {
                $.ajax({
                    url: "<?php echo site_url('admin/area_req_item/restore_json'); ?>",
                    type: 'POST',
                    data: {id:[row.id]},
                    success: function (result) {
                        $('#jqxGridArea_req_item').jqxGrid('updatebounddata');
                    }
                });
            }
        }
    }

    function saveRecord(){
        var data = $("#form-area_req_item").serialize();

        $.ajax({
            type: "POST",
            url: '<?php echo site_url("admin/area_req_item/save"); ?>',
            data: data,
            success: function (result) {
                var result = eval('('+result+')');
                if (result.success) {
                    $('#id').val('');
                    $('#form-area_req_item')[0].reset();
                    $('#jqxGridArea_req_item').jqxGrid('updatebounddata');
                    //$('#jqxPopupWindow').jqxWindow('close');
                }

            }
        });
    }

</script>

