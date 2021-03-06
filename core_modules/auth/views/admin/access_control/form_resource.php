
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo lang('backendpro_access_control');?><small><?php echo lang('access_resources'); ?></small></h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php print form_open('admin/auth/resources/form/'.$this->validation->id,array('class'=>'horizontal'))?>
        <?php print form_hidden('id',$this->validation->id)?>
        <!-- row -->
        <div class="row">
            <?php print displayStatus();?>

            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <?php print form_label($this->lang->line('access_name'),'name')?>
                            <?php print form_input('name',$this->validation->name,'class="form-control'.($this->validation->id==''?'"':' readonly" READONLY'))?>
                        </div>

                        <div class="form-group">
                            <?php print form_label($this->lang->line('access_parent_name'),'parent')?>
                            <?php print form_dropdown('parent',$resources,$this->validation->parent,' class="form-control" size="10"')?>
                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat btn-xs no-shadow" name="submit" value="submit">
                        <?php print $this->lang->line('general_save')?>
                    </button>

                    <a href="<?php print site_url('admin/auth/resources')?>" class="btn btn-primary btn-flat btn-xs no-shadow">
                        <?php print $this->lang->line('general_cancel')?>
                    </a>
                </div>  

            </div>
        </div>
        <?php print form_close()?>

    </section><!-- /.content -->
</aside><!-- /.right-side -->