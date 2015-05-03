<div id="jqxGridArea_delivered_items"></div>
<script language="javascript" type="text/javascript">
    $(function(){
        //items combo
        var areaDelivItemsDataSource = {
            url : base_url + 'admin/item/combo_json',
            datatype: 'json',
            datafields: [
                { name: 'id', type: 'number' },
                { name: 'name', type: 'string' },
                { name: 'unit', type: 'string' },
            ],
            async: false
        }

        var areaDelivItemsDataAdapter = new $.jqx.dataAdapter(areaDelivItemsDataSource,{
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

        var array_areadelivitems = new Array();
        $.each(areaDelivItemsDataAdapter.records, function(key,val) {
            array_areadelivitems.push(val.item_name);
        });
        //end of item combo

        //organizations combo
        var organizationsItemDelivDataSource = {
            url : base_url + 'admin/organization/combo_json',
            datatype: 'json',
            datafields: [
                { name: 'id', type: 'number' },
                { name: 'organization_name', type: 'string' }
            ],
            async: false
        }

        var organizationsItemDelivDataAdapter = new $.jqx.dataAdapter(organizationsItemDelivDataSource,{
            autoBind:true,
            beforeLoadComplete: function (records) {
                var data = new Array();
                for (var i = 0; i < records.length; i++) {
                    var item = records[i];
                    data.push(item);
                }
                return data;
            }
        });

        var array_organizationsItemDeliv = new Array();
        $.each(organizationsItemDelivDataAdapter.records, function(key,val) {
            array_organizationsItemDeliv.push(val.organization_name);
        });
        //end of item combo

        var area_delivereditems_itemDataSource =
        {
            datatype: "json",
            datafields: [
                { name: 'id', type: 'number' },
                { name: 'area_id', type: 'number' },
                { name: 'organization_id', type: 'number' },
                { name: 'organization_name', value: 'organization_id', values: { source: organizationsItemDelivDataAdapter.records, value: 'id', name: 'organization_name'}, type: 'string' },
                { name: 'item_id', type: 'number' },
                { name: 'item_name', value: 'item_id', values: { source: areaDelivItemsDataAdapter.records, value: 'id', name: 'item_name'}, type: 'string' },
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
                area_delivereditems_itemDataSource.totalrecords = data.total;
            },
            // update the grid and send a request to the server.
            filter: function () {
                $("#jqxGridArea_delivered_items").jqxGrid('updatebounddata', 'filter');
            },
            // update the grid and send a request to the server.
            sort: function () {
                $("#jqxGridArea_delivered_items").jqxGrid('updatebounddata', 'sort');
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
                        if (data[key] == 'organization_name') {
                            data[key] = 'organization_id';
                            for (var j = 0; j < organizationsItemDelivDataAdapter.records.length; j++){
                                v = 'filtervalue' + i;
                                if ( organizationsItemDelivDataAdapter.records[j].organization_name == data[val]) {
                                    data[v] = organizationsItemDelivDataAdapter.records[j].id;
                                    break;
                                }
                            }
                        }
                        if (data[key] == 'item_name') {
                            data[key] = 'item_id';
                            for (var j = 0; j < areaDelivItemsDataAdapter.records.length; j++){
                                v = 'filtervalue' + i;
                                if ( areaDelivItemsDataAdapter.records[j].item_name == data[val]) {
                                    data[v] = areaDelivItemsDataAdapter.records[j].id;
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

        var addAreaDeliveredfilter = function () {

            var filtergroup = new $.jqx.filter(),

                filter_or_operator = 1,
                filtervalue = '<?php echo $area->id;?>',
                filtercondition = 'equal',
                filter1 = filtergroup.createfilter('numericfilter', filtervalue, filtercondition);


            filtergroup.operator = 'and';
            filtergroup.addfilter(filter_or_operator, filter1);
            // add the filters.
            $("#jqxGridArea_delivered_items").jqxGrid('addfilter', 'area_id', filtergroup);
            // apply the filters.
            $("#jqxGridArea_delivered_items").jqxGrid('applyfilters');
        };

        $("#jqxGridArea_delivered_items").jqxGrid({
            theme: theme_grid,
            width: '100%',
            height: gridHeight,
            source: area_delivereditems_itemDataSource,
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
                addAreaDeliveredfilter();
            },
            columns: [
                { text: 'SN', width: 50, pinned: true, exportable: false,  columntype: 'number', cellclassname: 'jqx-widget-header', renderer: gridColumnsRenderer, cellsrenderer: rownumberRenderer , filterable: false},
                { text: '<?php echo lang("item_id"); ?>',datafield: 'item_name',width: 300,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:areaDelivItemsDataAdapter },
                { text: 'Quantity',datafield: 'quantity',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
                { text: 'Delivering Organization',datafield: 'organization_name',width: 300,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_organizationsItemDeliv },
                { text: 'Delivered date',datafield: 'delivered_date',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd },
                { text: 'Area',datafield: 'area_id',hidden:true},

            ],
            rendergridrows: function (result) {
                return result.data;
            }
        });
    });
</script>