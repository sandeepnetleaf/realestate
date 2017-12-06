<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Groups</h2>
                    <a class="btn btn-primary pull-right" href="<?= base_url('groups'); ?>"><i class="glyphicon glyphicon-list"></i> List Group</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <div class="removeMessages"></div>
                    <?php if (!empty($message)) { ?>
                        <div class="alert alert-success">
                            <button data-dismiss="alert" class="close" type="button">×</button>
                            <p><?php echo $message; ?></p>                            
                        </div>
                    <?php } ?>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                 <!-- <div id="infoMessage"><?php echo $message; ?></div> -->

                        <?php echo form_open("auth/create_group", 'data-parsley-validate class="form-horizontal form-level-left"'); ?>
                        <div class="form-group">

                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php echo lang('create_group_subheading'); ?> 
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Group Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php echo form_input(['name' => 'group_name', 'id' => 'group_name', 'class' => 'form-control col-md-7 col-xs-12', 'required' => 'required', 'value' => set_value('group_name')]); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Description <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
<!--                        <textarea class="ckeditor" name="vnama"></textarea>                -->
           <?php echo form_textarea(['name' => 'description', 'id' => 'description', 'class' => 'form-control col-md-7 col-xs-12 ckeditor', 'required' => 'required', 'value' => set_value('description')]); ?>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <?php echo anchor('groups', 'Cancel', array('class' => 'btn btn-danger')); ?>
                                <?php echo form_submit(['name' => 'reset', 'class' => "btn btn-primary", 'type' => 'reset', 'value' => 'Reset']); ?>
                                <?php echo form_submit(['name' => 'submit', 'class' => "btn btn-success", 'type' => 'submit', 'value' => 'Create Group']); ?>

                            </div>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>