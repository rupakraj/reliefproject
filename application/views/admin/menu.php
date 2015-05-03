<?php $uri = explode("/", $this->uri->uri_string()); ?>
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo site_url('admin'); ?>">
                    <i class="fa fa-dashboard"></i> <span><?php echo lang('backendpro_dashboard');?></span>
                </a>
            </li>

            <?php if(check('System',NULL,FALSE)):?>
                <?php $css = (isset($uri[1]) && $uri[1] == 'auth') ? 'active' : ''; ?> 
                <li class="sidetreeview <?php echo $css; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-gear"></i>
                    <span><?php echo lang('backendpro_system')?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <?php if(check('Users',NULL,FALSE)):?>
                    <?php $css = (isset($uri[2]) && $uri[2] == 'users') ? 'class="active"' : ''; ?> 
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/auth/users')?>"><i class="fa fa-angle-double-right"></i> <?php echo lang('backendpro_users')?></a></li>
                    <?php endif; ?>
 
                    <?php if(check('Access Control',NULL,FALSE)):?>
                    <?php $css = (isset($uri[2]) && in_array($uri[2], array('access_control', 'groups', 'permissions','actions','resources'))) ? 'class="active"' : ''; ?> 
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/auth/access_control')?>"><i class="fa fa-angle-double-right"></i> <?php echo lang('backendpro_access_control')?></a></li>
                    <?php endif; ?>
                    
                    <?php if(check('Settings',NULL,FALSE)):?>
                    <?php $css = (isset($uri[2]) && $uri[2] == 'settings') ? 'class="active"' : ''; ?> 
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/auth/settings')?>"><i class="fa fa-angle-double-right"></i> <?php echo lang('backendpro_settings')?></a></li>
                    <?php endif; ?>
                    
                </ul>
            </li>
            <?php endif;?>

            <?php $css = (isset($uri[1]) && in_array($uri[1], array('skill', 'unit','specialization', 'item','accessibility','vehicle_type','area_type','obstruction_type'))) ? 'active' : ''; ?> 
            <li class="sidetreeview <?php echo $css; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-tags"></i>
                    <span><?php echo lang('rfsys_master_data'); ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <?php $css = (isset($uri[1]) && $uri[1] == 'skill') ? 'class="active"' : ''; ?> 
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/skill'); ?>"><i class="fa fa-angle-double-right"></i><?php echo lang('rfsys_skill'); ?></a></li>
                    <?php $css = (isset($uri[1]) && $uri[1] == 'unit') ? 'class="active"' : ''; ?> 
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/unit'); ?>"><i class="fa fa-angle-double-right"></i><?php echo lang('rfsys_unit');?></a></li>

                    <?php $css = (isset($uri[1]) && $uri[1] == 'priority') ? 'class="active"' : ''; ?>
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/priority'); ?>"><i class="fa fa-angle-double-right"></i>Priority</a></li>
                    <?php $css = (isset($uri[1]) && $uri[1] == 'location_category') ? 'class="active"' : ''; ?>
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/location_category'); ?>"><i class="fa fa-angle-double-right"></i>Location category</a></li>


                    <?php $css = (isset($uri[1]) && $uri[1] == 'specialization') ? 'class="active"' : ''; ?> 
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/specialization'); ?>"><i class="fa fa-angle-double-right"></i><?php echo lang('rfsys_specialization');?></a></li>
                    <?php $css = (isset($uri[1]) && $uri[1] == 'item') ? 'class="active"' : ''; ?>
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/item'); ?>"><i class="fa fa-angle-double-right"></i><?php echo lang('rfsys_item');?></a></li>
                    <?php $css = (isset($uri[1]) && $uri[1] == 'accessibility') ? 'class="active"' : ''; ?> 
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/accessibility'); ?>"><i class="fa fa-angle-double-right"></i><?php echo lang('rfsys_accessibility');?></a></li>
                    <?php $css = (isset($uri[1]) && $uri[1] == 'vehicle_type') ? 'class="active"' : ''; ?> 
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/vehicle_type'); ?>"><i class="fa fa-angle-double-right"></i><?php echo lang('rfsys_vehicle_type');?></a></li>
                    <?php $css = (isset($uri[1]) && $uri[1] == 'area_type') ? 'class="active"' : ''; ?> 
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/area_type'); ?>"><i class="fa fa-angle-double-right"></i><?php echo lang('rfsys_area_type');?></a></li>
                    <?php $css = (isset($uri[1]) && $uri[1] == 'obstruction_type') ? 'class="active"' : ''; ?> 
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/obstruction_type'); ?>"><i class="fa fa-angle-double-right"></i><?php echo lang('rfsys_obstruction_type');?></a></li>
                    <?php $css = (isset($uri[1]) && $uri[1] == 'district_vdc') ? 'class="active"' : ''; ?> 
                    <li <?php echo $css; ?>><a href="<?php echo site_url('admin/district_vdc'); ?>"><i class="fa fa-angle-double-right"></i><?php echo lang('rfsys_district_vdc');?></a></li>
                </ul>
            </li>
            <?php /*
            <li>
                <a href="<?php echo site_url('admin/volunteer'); ?>">
                    <i class="fa fa-tag"></i> <span>Volunteer</span>
                </a>
            </li>

            <li>
                <a href="<?php echo site_url('admin/vehicle'); ?>">
                    <i class="fa fa-tag"></i> <span>Vehicle</span>
                </a>
            </li>
            */?>

            <li>
                <a href="<?php echo site_url('admin/area'); ?>">
                    <i class="fa fa-tag"></i> <span>Area</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('admin/area_sms'); ?>">
                    <i class="fa fa-tag"></i> <span>Area SMS</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('admin/organization'); ?>">
                    <i class="fa fa-tag"></i> <span>Organization</span>
                </a>
            </li>

            <li class="sidetreeview ">
                <a href="javascript:void(0)">
                    <i class="fa fa-user"></i>
                    <span>Reports</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/reports'); ?>"><i class="fa fa-angle-double-right"></i>Table</a></li>
                    <li><a href="<?php echo site_url('admin/reports/gis'); ?>"><i class="fa fa-angle-double-right"></i>GIS CLUSTER</a></li>
                    <li><a href="<?php echo site_url('admin/reports/gismarker'); ?>"><i class="fa fa-angle-double-right"></i>GIS MARKER</a></li>
                    <li><a href="<?php echo site_url('admin/reports'); ?>"><i class="fa fa-angle-double-right"></i>Charts</a></li>
                    
                </ul>
            </li>
            
            <li>
                <a href="<?php echo site_url('admin/schedule'); ?>">
                    <i class="fa fa-tag"></i> <span>Schedule</span>
                </a>
            </li>

            <?php $css = ((isset($uri[0]) && $uri[0] == 'account') && (isset($uri[1]) && $uri[1] == 'change_password') )? 'active' : ''; ?> 
            <li class="sidetreeview <?php echo $css; ?>">
                <a href="javascript:void(0)">
                    <i class="fa fa-user"></i>
                    <span><?php echo $this->session->userdata('username'); ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <?php $css = (isset($uri[1]) && $uri[1] == 'change_password') ? 'class="active"' : ''; ?> 
                    <li <?php echo $css; ?>><a href="<?php echo site_url('account/change_password'); ?>"><i class="fa fa-angle-double-right"></i>Change Password</a></li>
                    <li><a href="<?php echo site_url('auth/logout'); ?>"><i class="fa fa-angle-double-right"></i>Logout</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>