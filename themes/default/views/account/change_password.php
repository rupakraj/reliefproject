<style>
/*
 * Style tweaks
 * --------------------------------------------------
 */
 html,
 body {
 	overflow-x: hidden; /* Prevent scroll on narrow devices */
 }
 body {
 	padding-top: 70px;
 }
 footer {
 	padding: 30px 0;
 }

/*
 * Off Canvas
 * --------------------------------------------------
 */
 @media screen and (max-width: 767px) {
 	.row-offcanvas {
 		position: relative;
 		-webkit-transition: all .25s ease-out;
 		-o-transition: all .25s ease-out;
 		transition: all .25s ease-out;
 	}

 	.row-offcanvas-right {
 		right: 0;
 	}

 	.row-offcanvas-left {
 		left: 0;
 	}

 	.row-offcanvas-right
 	.sidebar-offcanvas {
 		right: -50%; /* 6 columns */
 	}

 	.row-offcanvas-left
 	.sidebar-offcanvas {
 		left: -50%; /* 6 columns */
 	}

 	.row-offcanvas-right.active {
 		right: 50%; /* 6 columns */
 	}

 	.row-offcanvas-left.active {
 		left: 50%; /* 6 columns */
 	}

 	.sidebar-offcanvas {
 		position: absolute;
 		top: 0;
 		width: 50%; /* 6 columns */
 	}
 }
 </style>
 <div class="row row-offcanvas row-offcanvas-right">
 	<div class="col-xs-12 col-sm-9">
 		<p class="pull-right visible-xs">
 			<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
 		</p>

 		<div class="row">
 			<div class="col-xs-6 col-lg-4">
 				<h2>Change Password</h2>
 				<form method="post" id="login" action="<?php echo site_url('account/change_password')?>">
 				<?php echo  form_open('account/change_password', array()); ?>

 					<label for="password"><?php echo lang('password')?>: </label>
 					<input type="password" name="password" id="password" class="span4" />
 					<span class="text-error"><?php echo form_error('password'); ?></span>

 					<label for="new_password"><?php echo lang('new_password')?>: </label>
 					<input type="password" name="new_password" id="new_password" class="span4"/>
 					<span class="text-error"><?php echo form_error('new_password'); ?></span>

 					<label for="conf_password"><?php echo lang('conf_password')?>: </label>
 					<input type="password" name="conf_password" id="conf_password" class="span4"/>
 					<span class="text-error"><?php echo form_error('conf_password'); ?></span>

 					<br/>
 					<input class="btn btn-primary" type="submit" id="contactbtn" name="confirm" value="Change Password" />
 				<?php form_close(); ?>
 			</div><!--/.col-xs-6.col-lg-4-->
 		</div><!--/row-->
 	</div><!--/.col-xs-12.col-sm-9-->

 	 	<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
 		<div class="list-group">
 			<a href="#" class="list-group-item active">Link</a>
 			<a href="#" class="list-group-item">Link</a>
 			<a href="#" class="list-group-item">Link</a>
 			<a href="#" class="list-group-item">Link</a>
 			<a href="#" class="list-group-item">Link</a>
 			<a href="#" class="list-group-item">Link</a>
 			<a href="#" class="list-group-item">Link</a>
 			<a href="#" class="list-group-item">Link</a>
 			<a href="#" class="list-group-item">Link</a>
 			<a href="#" class="list-group-item">Link</a>
 		</div>
 	</div><!--/.sidebar-offcanvas-->
</div><!--/row-->