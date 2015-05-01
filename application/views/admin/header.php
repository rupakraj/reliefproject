<header class="header">
    <a href="<?php echo site_url('admin'); ?>" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        <?php print $this->preference->item('site_name'); ?>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
         <a href="javascript:void(0)" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
   <?php /*/?>          
<div class="nav navbar-nav btn-group" style="margin: 7px 0px 0px 0px">
    <button type="button" class="btn btn-default btn-flat" style="background:#3c8dbc"><?php echo $this->session->userdata('username'); ?></button>
    <button type="button" class="btn btn-default btn-flat dropdown-toggle" style="background:#3c8dbc" data-toggle="dropdown">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" role="menu">
        <li><a href="javascript:void(0)">Change Password</a></li>
        <li><a href="<?php echo site_url("auth/logout"); ?>">Sign out</a></li>
        
        
    </ul>
</div>
            <?php /*/?>
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->                
                <!-- Notifications: style can be found in dropdown.less -->                
                <!-- Tasks: style can be found in dropdown.less -->                
                <?php /* ?>
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Some task I need to do
                                            <small class="pull-right">60%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">60% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Make beautiful transitions
                                            <small class="pull-right">80%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">80% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                            </ul>
                        </li>
                    </ul>
                </li>
                
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <span><?php echo $this->session->userdata('username'); ?><i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu" style="width:100px;">
                        <li style="height:30px"><a href="javascript:void(0)">Change Password</a></li>
                        <li style="height:30px"><a href="<?php echo site_url("auth/logout"); ?>">Sign out</a></li>
                    </ul>
                </li>
                <?php */ ?>
            </ul>
            
        </div>
    </nav>
</header>