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
                                44444
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_5">
                                5555555
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_6">
                                <?php echo $this->load->view('partial_vehicles');?>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_7">
                                777777777
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