<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Details of <?php echo $area->name.", ".$area->district_name;?></h1>
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
                            <li class="active"><a href="#area_details" data-toggle="tab">Area Details</a></li>
                            <li><a href="#area_req_items" data-toggle="tab">Required Items</a></li>
                            <li><a href="#area_involved_orgs" data-toggle="tab">Involved Organizations</a></li>
                            <li><a href="#area_delivered_items" data-toggle="tab">Delivered Items</a></li>
                            <li><a href="#area_next_delivery" data-toggle="tab">Next Delivery</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="area_details">
                                <?php //echo '<pre>';print_r($area);echo '</pre>';?>
                                <table class="table table-condensed">
                                    <tr>
                                        <td>Reported Date</td>
                                        <td><?php echo $area->reported_date;?></td>
                                        <td>First followup</td>
                                        <td><?php echo $area->first_followup;?></td>
                                    </tr>
                                    <tr>
                                        <td>Area Name</td>
                                        <td><?php echo $area->name;?></td>
                                        <td>Area Code</td>
                                        <td><?php echo $area->code;?></td>
                                    </tr>
                                    <tr>
                                        <td>District</td>
                                        <td><?php echo $area->district_name;?></td>
                                        <td>Address</td>
                                        <td><?php echo $area->address;?></td>
                                    </tr>
                                    <tr>
                                        <td>Accessibility</td>
                                        <td><?php echo $area->accessibility_name;?></td>
                                        <td>Area type</td>
                                        <td><?php echo $area->area_type_name;?></td>
                                    </tr>
                                    <tr>
                                        <td>Is obstructed?</td>
                                        <td><?php echo $area->road_obstructed==1?"Yes":"No";?></td>
                                        <td>Obstruction</td>
                                        <td><?php echo $area->obstruction_name;?></td>
                                    </tr>
                                    <tr>
                                        <td>Male Population</td>
                                        <td><?php echo $area->population_male;?></td>
                                        <td>Female Population</td>
                                        <td><?php echo $area->population_female;?></td>
                                    </tr>
                                    <tr>
                                        <td>Children Population</td>
                                        <td><?php echo $area->population_children;?></td>
                                        <td>Adult Population</td>
                                        <td><?php echo $area->population_adult;?></td>
                                    </tr>
                                    <tr>
                                        <td>Old Population</td>
                                        <td><?php echo $area->population_old;?></td>
                                        <td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td>Households</td>
                                        <td><?php echo $area->household;?></td>
                                        <td>Houses</td>
                                        <td><?php echo $area->houses;?></td>
                                    </tr>
                                    <tr>
                                        <td>Schools</td>
                                        <td><?php echo $area->schools;?></td>
                                        <td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td>Effected male</td>
                                        <td><?php echo $area->effected_male;?></td>
                                        <td>Effected female</td>
                                        <td><?php echo $area->effected_female;?></td>
                                    </tr>
                                    <tr>
                                        <td>Effected children</td>
                                        <td><?php echo $area->effected_children;?></td>
                                        <td>Effected adults</td>
                                        <td><?php echo $area->effected_adult;?></td>
                                    </tr>
                                    <tr>
                                        <td>Effected Old</td>
                                        <td><?php echo $area->effected_old;?></td>
                                        <td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td>Effected Households</td>
                                        <td><?php echo $area->effected_household;?></td>
                                        <td>Collapsed houses</td>
                                        <td><?php echo $area->houses_collapsed;?></td>
                                    </tr>
                                    <tr>
                                        <td>Damaged houses</td>
                                        <td><?php echo $area->houses_damaged;?></td>
                                        <td>Cracked houses</td>
                                        <td><?php echo $area->houses_cracked;?></td>
                                    </tr>
                                    <tr>
                                        <td>Deaths</td>
                                        <td><?php echo $area->death;?></td>
                                        <td>Trapped</td>
                                        <td><?php echo $area->trapped;?></td>
                                    </tr>
                                    <tr>
                                        <td>Sick</td>
                                        <td><?php echo $area->sick;?></td>
                                        <td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td>Contact detail</td>
                                        <td><?php echo $area->contact_detail;?></td>
                                        <td>Internal contact</td>
                                        <td><?php echo $area->internal_contact;?></td>
                                    </tr>
                                    <tr>
                                        <td>Security contact</td>
                                        <td><?php echo $area->security_contact;?></td>
                                        <td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td>Nearest hospital distance</td>
                                        <td><?php echo $area->nearest_hospital_distance;?></td>
                                        <td>Nearest hospital</td>
                                        <td><?php echo $area->nearest_hospital_name;?></td>
                                    </tr>
                                    <tr>
                                        <td>Nearest hospital contact</td>
                                        <td><?php echo $area->nearest_hospital_contact;?></td>
                                        <td></td><td></td>
                                    </tr>
                                    <tr>
                                        <td>Longitude</td>
                                        <td><?php echo $area->longitude;?></td>
                                        <td>Latitude</td>
                                        <td><?php echo $area->latitude;?></td>
                                    </tr>


                                </table>
                            </div>
                            <div class="tab-pane" id="area_req_items">
                                <?php echo $this->load->view('partial_area_req_items');?>
                            </div>
                            <div class="tab-pane" id="area_involved_orgs">
                                //
                            </div>
                            <div class="tab-pane" id="area_delivered_items">
                                //
                            </div>
                            <div class="tab-pane" id="area_next_delivery">
                                //
                            </div>
                        </div><!-- /.tab-content -->
                    </div>

                </div>
            </div>
        </div><!-- /.col -->
        </div>
        <!-- /.row -->

    </section><!-- /.content -->
</aside><!-- /.right-side -->