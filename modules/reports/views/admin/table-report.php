<div id="jqxGridArea"></div>



<script>

 //location category
 var locCategoryDataSource = {
 	url : base_url + 'admin/location_category/combo_json',
 	datatype: 'json',
 	datafields: [
 	{ name: 'id', type: 'number' },
 	{ name: 'name', type: 'string' },
 	],
 	async: false
 }

 var locCategoryDataAdapter = new $.jqx.dataAdapter(locCategoryDataSource);

 var accessibilityDataSource = {
 	url : base_url + 'admin/accessibility/combo_json',
 	datatype: 'json',
 	datafields: [
 	{ name: 'id', type: 'number' },
 	{ name: 'name', type: 'string' },
 	],
 	async: false
 }

 var accessibilityDataAdapter = new $.jqx.dataAdapter(accessibilityDataSource);

 var array_loc_category = new Array();
 $.each(locCategoryDataAdapter.records, function(key,val) {
 	array_loc_category.push(val.name);
 });
    //end location category

    var districtDataSource = {
    	url : base_url + 'admin/district_vdc/district_combo_json',
    	datatype: 'json',
    	datafields: [
    	{ name: 'id', type: 'number' },
    	{ name: 'name_en', type: 'string' },
    	],
    	async: false
    }

    var districtDataAdapter = new $.jqx.dataAdapter(districtDataSource);


	 var array_district = new Array();
	 $.each(districtDataAdapter.records, function(key,val) {
	 	array_district.push(val.name);
	 });


    var areatypeDataSource = {
        url : base_url + 'admin/area_type/combo_json',
        datatype: 'json',
        datafields: [
            { name: 'id', type: 'number' },
            { name: 'name', type: 'string' },
        ],
        async: false
    }

    var areatypeDataAdapter = new $.jqx.dataAdapter(areatypeDataSource);

    //obstruction type
    var obstructionDataSource = {
        url : base_url + 'admin/obstruction_type/combo_json',
        datatype: 'json',
        datafields: [
            { name: 'id', type: 'number' },
            { name: 'name', type: 'string' },
        ],
        async: false
    }

    var obstructionDataAdapter = new $.jqx.dataAdapter(obstructionDataSource);

    var array_accessibility = new Array();
    $.each(accessibilityDataAdapter.records, function(key,val) {
        array_accessibility.push(val.name);
    });

    var array_areatype = new Array();
    $.each(areatypeDataAdapter.records, function(key,val) {
        array_areatype.push(val.name);
    });

    var array_obstruction = new Array();
    $.each(obstructionDataAdapter.records, function(key,val) {
        array_obstruction.push(val.name);
    });

    var areaDataSource =
    {
    	datatype: "json",
    	datafields: [
    	{ name: 'id', type: 'number' },
    	{ name: 'code', type: 'string' },
    	{ name: 'name', type: 'string' },
    	{ name: 'district', type: 'number' },
    	{ name: 'district_name', value:'district', type: 'string',values: { source: districtDataAdapter.records, value: 'id', name: 'name_en'} },
    	{ name: 'ward', type: 'number' },
    	{ name: 'address', type: 'string' },
    	{ name: 'location_category', type: 'string' },
    	{ name: 'location_category_name', value:'location_category', type: 'string',values: { source: locCategoryDataAdapter.records, value: 'id', name: 'name'} },
    	{ name: 'population_male', type: 'number' },
    	{ name: 'population_female', type: 'number' },
    	{ name: 'population_children', type: 'number' },
    	{ name: 'population_adult', type: 'number' },
    	{ name: 'population_old', type: 'number' },
    	{ name: 'household', type: 'number' },
    	{ name: 'houses', type: 'number' },
    	{ name: 'schools', type: 'number' },
    	{ name: 'effected_male', type: 'number' },
    	{ name: 'effected_female', type: 'number' },
    	{ name: 'effected_children', type: 'number' },
    	{ name: 'effected_adult', type: 'number' },
    	{ name: 'effected_old', type: 'number' },
    	{ name: 'effected_household', type: 'number' },
    	{ name: 'houses_collapsed', type: 'number' },
    	{ name: 'houses_damaged', type: 'number' },
    	{ name: 'houses_cracked', type: 'number' },
    	{ name: 'death', type: 'number' },
    	{ name: 'trapped', type: 'number' },
    	{ name: 'sick', type: 'number' },
    	{ name: 'accessibility_id', type: 'string' },
    	{ name: 'accessibility_name', type: 'string', value:'accessibility_id',values: { source: accessibilityDataAdapter.records, value: 'id', name: 'name'} },
    	{ name: 'distance_ktm', type: 'number' },
    	{ name: 'area_type', type: 'string' },
    	{ name: 'area_type_name', type: 'string',value:'area_type',values: { source: areatypeDataAdapter.records, value: 'id', name: 'name'} },
    	{ name: 'road_obstructed', type: 'bool' },
    	{ name: 'road_obstruct_detail', type: 'string' },
    	{ name: 'road_obstruct_detail_name', value:'road_obstruct_detail', type: 'string',values: { source: obstructionDataAdapter.records, value: 'id', name: 'name'} },
    	{ name: 'created_by', type: 'number' },
    	{ name: 'modified_by', type: 'number' },
    	{ name: 'created_date', type: 'date' },
    	{ name: 'modified_date', type: 'date' },
    	{ name: 'reported_date', type: 'date' },
    	{ name: 'first_followup', type: 'date' },
    	{ name: 'priority', type: 'string' },
    	{ name: 'contact_detail', type: 'string' },
    	{ name: 'internal_contact', type: 'string' },
    	{ name: 'security_contact', type: 'string' },
    	{ name: 'nearest_hospital_distance', type: 'string' },
    	{ name: 'nearest_hospital_name', type: 'string' },
    	{ name: 'nearest_hospital_contact', type: 'string' },
    	{ name: 'longitude', type: 'string' },
    	{ name: 'latitude', type: 'string' },
    	{ name: 'delete_flag', type: 'number' },

    	],
    	url: '<?php echo site_url("admin/area/json"); ?>',
    	pagesize: defaultPageSize,
    	root: 'rows',
    	id : 'id',
    	cache: true,
    	pager: function (pagenum, pagesize, oldpagenum) {
        	//callback called when a page or page size is changed.
        },
        beforeprocessing: function (data) {
        	areaDataSource.totalrecords = data.total;
        },
	    // update the grid and send a request to the server.
	    filter: function () {
	    	$("#jqxGridArea").jqxGrid('updatebounddata', 'filter');
	    },
	    // update the grid and send a request to the server.
	    sort: function () {
	    	$("#jqxGridArea").jqxGrid('updatebounddata', 'sort');
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
                    if (data[key] == 'location_category_name') {
                    	data[key] = 'location_category';
                    	for (var j = 0; j < locCategoryDataAdapter.records.length; j++){
                    		v = 'filtervalue' + i;
                    		if ( locCategoryDataAdapter.records[j].name == data[val]) {
                    			data[v] = locCategoryDataAdapter.records[j].id;
                    			break;
                    		}
                    	}
                    }
                    if (data[key] == 'district') {
                    	data[key] = 'district';
                    	for (var j = 0; j < districtDataAdapter.records.length; j++){
                    		v = 'filtervalue' + i;
                    		if ( districtDataAdapter.records[j].name_en == data[val]) {
                    			data[v] = districtDataAdapter.records[j].id;
                    			break;
                    		}
                    	}
                    }
                    if (data[key] == 'road_obstruct_detail_name') {
                    	data[key] = 'road_obstruct_detail';
                    	for (var j = 0; j < obstructionDataAdapter.records.length; j++){
                    		v = 'filtervalue' + i;
                    		if ( obstructionDataAdapter.records[j].name == data[val]) {
                    			data[v] = obstructionDataAdapter.records[j].id;
                    			break;
                    		}
                    	}
                    }
                    if (data[key] == 'accessibility_name') {
                    	data[key] = 'accessibility_id';
                    	for (var j = 0; j < accessibilityDataAdapter.records.length; j++){
                    		v = 'filtervalue' + i;
                    		if ( accessibilityDataAdapter.records[j].name == data[val]) {
                    			data[v] = accessibilityDataAdapter.records[j].id;
                    			break;
                    		}
                    	}
                    }
                    if (data[key] == 'area_type_name') {
                    	data[key] = 'area_type';
                    	for (var j = 0; j < areatypeDataAdapter.records.length; j++){
                    		v = 'filtervalue' + i;
                    		if ( areatypeDataAdapter.records[j].name == data[val]) {
                    			data[v] = areatypeDataAdapter.records[j].id;
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

    $("#jqxGridArea").jqxGrid({
    	theme: theme_grid,
    	width: '100%',
    	height: gridHeight,
    	source: areaDataSource,
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
    	{ text: '<?php echo lang("code"); ?>',datafield: 'code',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("name"); ?>',datafield: 'name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("district"); ?>',datafield: 'district_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_district },
    	{ text: '<?php echo lang("ward"); ?>',datafield: 'ward',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("address"); ?>',datafield: 'address',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("location_category"); ?>',datafield: 'location_category_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_loc_category },
    	{ text: '<?php echo lang("population_male"); ?>',datafield: 'population_male',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("population_female"); ?>',datafield: 'population_female',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("population_children"); ?>',datafield: 'population_children',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("population_adult"); ?>',datafield: 'population_adult',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("population_old"); ?>',datafield: 'population_old',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("household"); ?>',datafield: 'household',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("houses"); ?>',datafield: 'houses',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("schools"); ?>',datafield: 'schools',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("effected_male"); ?>',datafield: 'effected_male',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("effected_female"); ?>',datafield: 'effected_female',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("effected_children"); ?>',datafield: 'effected_children',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("effected_adult"); ?>',datafield: 'effected_adult',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("effected_old"); ?>',datafield: 'effected_old',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("effected_household"); ?>',datafield: 'effected_household',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("houses_collapsed"); ?>',datafield: 'houses_collapsed',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("houses_damaged"); ?>',datafield: 'houses_damaged',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("houses_cracked"); ?>',datafield: 'houses_cracked',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("death"); ?>',datafield: 'death',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("trapped"); ?>',datafield: 'trapped',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("sick"); ?>',datafield: 'sick',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("accessibility_id"); ?>',datafield: 'accessibility_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_accessibility },
    	{ text: '<?php echo lang("distance_ktm"); ?>',datafield: 'distance_ktm',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("area_type"); ?>',datafield: 'area_type_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_areatype },
    	{ text: '<?php echo lang("road_obstructed"); ?>',datafield: 'road_obstructed',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,columntype: 'checkbox', filtertype: 'bool' },
    	{ text: '<?php echo lang("road_obstruct_detail"); ?>',datafield: 'road_obstruct_detail_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname,filtertype:'list',filteritems:array_obstruction },
    	{ text: '<?php echo lang("reported_date"); ?>',datafield: 'reported_date',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
    	{ text: '<?php echo lang("first_followup"); ?>',datafield: 'first_followup',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname, columntype: 'date', filtertype: 'date', cellsformat:  formatString_yyyy_MM_dd},
    	{ text: '<?php echo lang("priority"); ?>',datafield: 'priority',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("contact_detail"); ?>',datafield: 'contact_detail',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("internal_contact"); ?>',datafield: 'internal_contact',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("security_contact"); ?>',datafield: 'security_contact',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("nearest_hospital_distance"); ?>',datafield: 'nearest_hospital_distance',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("nearest_hospital_name"); ?>',datafield: 'nearest_hospital_name',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("nearest_hospital_contact"); ?>',datafield: 'nearest_hospital_contact',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("longitude"); ?>',datafield: 'longitude',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },
    	{ text: '<?php echo lang("latitude"); ?>',datafield: 'latitude',width: 150,filterable: true,renderer: gridColumnsRenderer, cellclassname: cellclassname },

    	],
    	rendergridrows: function (result) {
    		return result.data;
    	}
    });


</script>