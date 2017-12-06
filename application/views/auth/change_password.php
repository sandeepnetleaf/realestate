
<div class="right_col" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo lang('change_password_heading');?></h2>
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


                    <?php $current_url = current_url(); ?>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        
                        <?php echo form_open("auth/change_password", 'data-parsley-validate class="form-horizontal form-level-left"');?>
                        
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="old_password"><?php echo lang('change_password_old_password_label', 'old_password');?> <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php echo form_input($old_password);?>
                            </div>

                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length);?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php echo form_input($new_password);?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_password_confirm"><?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm');?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?php echo form_input($new_password_confirm);?>
                            </div>
                        </div>
                        
                        <div class="ln_solid"></div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <?php echo anchor($current_url, 'Cancel', array('class' => 'btn btn-danger')); ?>
                                <?php echo form_submit(['name' => 'submit', 'class' => "btn btn-success", 'type' => 'submit', 'value' => 'Change Password']); ?>
                            </div>
                        </div>


                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>