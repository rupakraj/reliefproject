<div id="jqxGridArea_organizations"></div>
<script language="javascript" type="text/javascript">
$(function(){
    //items combo
    var organizationsDataSource = {
        url : base_url + 'admin/organization/combo_json',
        datatype: 'json',
        datafields: [
            { name: 'id', type: 'number' },
            { name: 'organization_name', type: 'string' },
            { name: 'country', type: 'string' }
        ],
        async: false
    }

    var organizationsDataAdapter = new $.jqx.dataAdapter(organizationsDataSource,{
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

    var array_organizations = new Array();
    $.each(organizationsDataAdapter.records, function(key,val) {
        array_organizations.push(val.organization_name);
    });
    //end of item combo

    var area_organizations_itemDataSource =
    {
        datatype: "json",
        datafields: [
            { name: 'id', type: 'number' },
            { name: 'area_id', type: 'number' },
            { name: 'organization_id', type: 'number' },
            { name: 'organization_name', value: 'organization_id', values: { source: organizationsDataAdapter.records, value: 'id', name: 'organization_name'}, type: 'string' },
            { name: 'country', value: 'organization_id', values: { source: organizationsDataAdapter.records, value: 'id', name: 'country'}, type: 'string' },
            { name: 'start_date', type: 'date' },
            { name: 'end_date', type: 'date' },
            { name: 'created_by', type: 'number' },
            { name: 'modified_by', type: 'number' },
            { name: 'created_date', type: 'date' },
            { name: 'modified_date', type: 'date' },

        ],
        url: '<?php echo site_url("admin/organization_workarea/json"); ?>',
        pagesize: defaultPageSize,
        root: 'rows',
        id : 'id',
        cache: true,
        pager: function (pagenum, pagesize, oldpagenum) {
            //callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
            area_organizations_itemDataSource.totalrecords = data.total;
        },
        // update the grid and send a request to the server.
        filter: function () {
            $("#jqxGridArea_organizations").jqxGrid('updatebounddata', 'filter');
        },
        // update the grid and send a request to the server.
        sort: function () {
            $("#jqxGridArea_organizations").jqxGrid('updatebounddata', 'sort');
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
                        for (var j = 0; j < organizationsDataAdapter.records.length; j++){
                            v = 'filtervalue' + i;
                            if ( organizationsDataAdapter.records[j].organization_name == data[val]) {
                                data[v] = organizationsDataAdapter.records[j].id;
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
        $("#jqxGridArea_organizations").jqxGrid('addfilter', 'area_id', filtergroup);
        // apply the filters.
        $("#jqxGridArea_organizations").jqxGrid('applyfilters');
    };

    $("#jqxGridArea_organizations").jqxGrid({
        theme: theme_grid,
        width: '100%',
        height: gridHeight,
        source: area_organizations_itemDataSource,
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
            { text: 'SN', width: 50, pinned: true, exportable: false,  columntype: 'number', cellclassname: 'jqx-widget-header', renderer: gridColumnsRenderer, cellsrenderer: rownumberRenderer , filterable: false},

            { text: 'Organization',datafield: 'organization_name',width: 300,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_organizations },
            { text: 'Country',datafield: 'country',width: 300,filterable: false,renderer: gridColumnsRenderer, cellclassname: cellclassname },
            { text: 'Start date',datafield: 'start_date',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd },
            { text: 'End date',datafield: 'end_date',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd },

        ],
        rendergridrows: function (result) {
            return result.data;
        }
    });
});
</script>