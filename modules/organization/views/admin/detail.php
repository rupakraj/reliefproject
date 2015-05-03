<script language="javascript" type="text/javascript">
var areaDataSource, areaDataAdapter, array_area, itemDataSource, itemDataAdapter, array_item;
$(function(){
    areaDataSource = {
        cache: true,
        url : base_url + 'admin/area/combo_json',
        datatype: 'json',
        datafields: [ 
            { name: 'id', type: 'number' },
            { name: 'code', type: 'string' },
            { name: 'name', type: 'string' },
        ],
        async: true
    }

    areaDataAdapter = new $.jqx.dataAdapter(areaDataSource);

    if ($(".area_id")[0]){
    $(".area_id").jqxComboBox({ 
        width: 195, 
        height: 25, 
        selectionMode: 'dropDownList', 
        autoComplete: true, 
        searchMode: 'containsignorecase', 
        theme: theme_combo,
        source: areaDataAdapter, 
        displayMember: "name", 
        valueMember: "id", 
        dropDownWidth: 400, 
        dropDownHorizontalAlignment: 'left'
    });
    }

    array_area = new Array();
    $.each(areaDataAdapter.records, function(key,val) {
        array_area.push(val.name);
    });

    itemItemDataSource = {
        cache: true,
        url : base_url + 'admin/item/combo_json',
        datatype: 'json',
        datafields: [ 
            { name: 'id', type: 'number' },
            { name: 'name', type: 'string' }
        ],
        async: true
    }

    itemDataAdapter = new $.jqx.dataAdapter(itemItemDataSource);

    if ($(".item_id")[0]){
    $(".item_id").jqxComboBox({ 
       width: 195, 
        height: 25, 
        selectionMode: 'dropDownList', 
        autoComplete: true, 
        searchMode: 'containsignorecase', 
        theme: theme_combo,
        source: itemDataAdapter, 
        displayMember: "name", 
        valueMember: "id", 
        dropDownWidth: 400, 
        dropDownHorizontalAlignment: 'left'
    });
    }

    var array_item = new Array();
    $.each(itemDataAdapter.records, function(key,val) {
        array_item.push(val.name);
    }); 
}); 
</script>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Organization Detail</h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- row -->
        <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-default">
                <div class="box-body">
                    <!-- Custm Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Details</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Interested Areas</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Working Area</a></li>
                            <li><a href="#tab_4" data-toggle="tab">Available Items</a></li>
                            <li><a href="#tab_5" data-toggle="tab">Delivered Items</a></li>
                            <li><a href="#tab_6" data-toggle="tab">Vehicle</a></li>
                            <li><a href="#tab_7" data-toggle="tab">Next Delivery</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <?php echo $this->load->view('partial_organization_details');?>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                               <?php echo $this->load->view('partial_organization_interestareas');?>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <?php echo $this->load->view('partial_organization_workareas');?>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_4">
                                 <?php echo $this->load->view('partial_availale_items');?>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_5">
                                <?php echo $this->load->view('partial_organization_delivered_item');?>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_6">
                                <?php echo $this->load->view('partial_vehicles');?>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_7">
                                <?php echo $this->load->view('partial_next_delivery');?>
                            </div><!-- /.tab-pane -->
                            <?php /*
                            <div class="tab-pane" id="tab_12">
                                <?php //echo $this->load->view('partial_area_req_items');?>
                            </div><!-- /.tab-pane -->
                            */?>
                        </div><!-- /.tab-content -->
                    </div>

                </div>
            </div>
        </div><!-- /.col -->
        </div>
        <!-- /.row -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->