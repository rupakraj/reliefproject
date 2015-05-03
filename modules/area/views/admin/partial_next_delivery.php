<div id="jqxGridArea_next_delivery"></div>
<script language="javascript" type="text/javascript">
    $(function(){
        //organizations combo
        var organizationsNextDelivDataSource = {
            url : base_url + 'admin/organization/combo_json',
            datatype: 'json',
            datafields: [
                { name: 'id', type: 'number' },
                { name: 'organization_name', type: 'string' }
            ],
            async: false
        }

        var organizationsNextDelivDataAdapter = new $.jqx.dataAdapter(organizationsNextDelivDataSource,{
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

        var array_organizations_next_deliv = new Array();
        $.each(organizationsNextDelivDataAdapter.records, function(key,val) {
            array_organizations_next_deliv.push(val.organization_name);
        });
        //end of organizations combo
        //district
        var districtNextDelivDataSource = {
            url : base_url + 'admin/district_vdc/district_combo_json',
            datatype: 'json',
            datafields: [
                { name: 'id', type: 'number' },
                { name: 'name_en', type: 'string' },
            ],
            async: false
        }

        var districtNextDelivDataAdapter = new $.jqx.dataAdapter(districtNextDelivDataSource,{
            autoBind:true
        });

        var array_district_nextdeliv = new Array();
        $.each(districtNextDelivDataAdapter.records, function(key,val) {
            array_district_nextdeliv.push(val.name_en);
        });
        //end district
        //vehicle
        var vehicleNextDelivDataSource = {
            url : base_url + 'admin/vehicle/combo_json',
            datatype: 'json',
            datafields: [
                { name: 'id', type: 'number' },
                { name: 'registration_number', type: 'string' },
                { name: 'capacity', type: 'number' },
                { name: 'fuel_capacity', type: 'number' }
            ],
            async: false
        }

        var vehicleNextDelivDataAdapter = new $.jqx.dataAdapter(vehicleNextDelivDataSource,{
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

        var array_vehicle_next_deliv = new Array();
        $.each(vehicleNextDelivDataAdapter.records, function(key,val) {
            array_vehicle_next_deliv.push(val.registration_number);
        });
        //end vehicle
        //location
        var locationDataSource = {
            url : base_url + 'admin/district_vdc/combo_json',
            datatype: 'json',
            datafields: [
                { name: 'id', type: 'number' },
                { name: 'name_en', type: 'string' },
            ],
            async: false
        }

        var locationDataAdapter = new $.jqx.dataAdapter(locationDataSource, {autoBind: true});
        //end location

        var area_next_delivery_datasource =
        {
            datatype: "json",
            datafields: [
                { name: 'id', type: 'number' },
                { name: 'area_id', type: 'number' },
                { name: 'organization_id', type: 'number' },
                { name: 'organization_name', value: 'organization_id', values: { source: organizationsNextDelivDataAdapter.records, value: 'id', name: 'organization_name'}, type: 'string' },
                { name: 'vehicle_id', type: 'number' },
                { name: 'vehicle_regno', value: 'vehicle_id', values: { source: vehicleNextDelivDataAdapter.records, value: 'id', name: 'registration_number'}, type: 'string' },
                { name: 'district_id', type: 'number' },
                { name: 'district_name', value: 'district_id', values: { source: districtNextDelivDataAdapter.records, value: 'id', name: 'name_en'}, type: 'string' },
                { name: 'mun_vdc_id', type: 'number' },
                { name: 'mun_vdc_name', value: 'mun_vdc_id', values: { source: locationDataAdapter.records, value: 'id', name: 'name_en'}, type: 'string' },
                { name: 'reporting_time', type: 'date' },
                { name: 'contact_name', type: 'string' },
                { name: 'contact_phone', type: 'string' },
                { name: 'street', type: 'number' },
                { name: 'status', type: 'number' },
                { name: 'created_by', type: 'number' },
                { name: 'modified_by', type: 'number' },
                { name: 'created_date', type: 'date' },
                { name: 'modified_date', type: 'date' },

            ],
            url: '<?php echo site_url("admin/next_delivery/json"); ?>',
            pagesize: defaultPageSize,
            root: 'rows',
            id : 'id',
            cache: true,
            pager: function (pagenum, pagesize, oldpagenum) {
                //callback called when a page or page size is changed.
            },
            beforeprocessing: function (data) {
                area_next_delivery_datasource.totalrecords = data.total;
            },
            // update the grid and send a request to the server.
            filter: function () {
                $("#jqxGridArea_next_delivery").jqxGrid('updatebounddata', 'filter');
            },
            // update the grid and send a request to the server.
            sort: function () {
                $("#jqxGridArea_next_delivery").jqxGrid('updatebounddata', 'sort');
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
                            for (var j = 0; j < organizationsNextDelivDataAdapter.records.length; j++){
                                v = 'filtervalue' + i;
                                if ( organizationsNextDelivDataAdapter.records[j].organization_name == data[val]) {
                                    data[v] = organizationsNextDelivDataAdapter.records[j].id;
                                    break;
                                }
                            }
                        }
                        /*if (data[key] == 'district_name') {
                            data[key] = 'district_id';
                            for (var j = 0; j < districtNextDelivDataAdapter.records.length; j++){
                                v = 'filtervalue' + i;
                                if ( districtNextDelivDataAdapter.records[j].name_en == data[val]) {
                                    data[v] = districtNextDelivDataAdapter.records[j].id;
                                    break;
                                }
                            }
                        }*/
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

        var addAreaDeliveryfilter = function () {

            var filtergroup = new $.jqx.filter(),

                filter_or_operator = 1,
                filtervalue = '<?php echo $area->id;?>',
                filtercondition = 'equal',
                filter1 = filtergroup.createfilter('numericfilter', filtervalue, filtercondition);


            filtergroup.operator = 'and';
            filtergroup.addfilter(filter_or_operator, filter1);
            // add the filters.
            $("#jqxGridArea_next_delivery").jqxGrid('addfilter', 'area_id', filtergroup);
            // apply the filters.
            $("#jqxGridArea_next_delivery").jqxGrid('applyfilters');
        };

        $("#jqxGridArea_next_delivery").jqxGrid({
            theme: theme_grid,
            width: '100%',
            height: gridHeight,
            source: area_next_delivery_datasource,
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
                addAreaDeliveryfilter();
            },
            columns: [
                { text: 'SN', width: 50, pinned: true, exportable: false,  columntype: 'number', cellclassname: 'jqx-widget-header', renderer: gridColumnsRenderer, cellsrenderer: rownumberRenderer , filterable: false},
                { text: 'Status',datafield: 'status',width: 50,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
                { text: 'Organization',datafield: 'organization_name',width: 200,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_organizations_next_deliv },
                { text: 'District',datafield: 'district_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_district_nextdeliv },
                { text: 'VDC/Mun',datafield: 'mun_vdc_name',width: 150,filterable: false,renderer: gridColumnsRenderer, cellclassname: cellclassname},
                { text: 'Street',datafield: 'street',width: 150,filterable: false,renderer: gridColumnsRenderer, cellclassname: cellclassname},
                { text: 'Vehicle',datafield: 'vehicle_regno',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_vehicle_next_deliv },
                { text: 'Reporting time',datafield: 'reporting_time',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd_HH_mm_ss },
                { text: 'Contact name',datafield: 'contact_name',width: 150,filterable: false,renderer: gridColumnsRenderer, cellclassname: cellclassname},
                { text: 'Contact phone',datafield: 'contact_phone',width: 150,filterable: false,renderer: gridColumnsRenderer, cellclassname: cellclassname},
                { text: 'Area',datafield: 'area_id',hidden:true},


            ],
            rendergridrows: function (result) {
                return result.data;
            }
        });
    });
</script>