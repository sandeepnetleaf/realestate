<div class="right_col" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Users</h2>
                    <a class="btn btn-primary pull-right" href="<?= base_url('users'); ?>"><i class="glyphicon glyphicon-list"></i> List User</a>


                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <?php //Main Content stat ?>



                    <div id="infoMessage"><?php echo $message; ?></div>

                    <?php echo form_open("auth/create_user", 'data-parsley-validate class="form-horizontal form-label-left"'); ?>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(['name' => 'first_name', 'id' => 'first_name', 'class' => 'form-control col-md-7 col-xs-12', 'required' => 'required', 'value' => set_value('first_name')]); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(['name' => 'last_name', 'id' => 'last_name', 'class' => 'form-control col-md-7 col-xs-12', 'required' => 'required', 'value' => set_value('last_name')]); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(['name' => 'username', 'id' => 'username', 'class' => 'form-control col-md-7 col-xs-12', 'required' => 'required', 'value' => set_value('username')]); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="radio">
                                <?php echo form_radio(['name' => 'gender', 'value' => 'male', 'class' => 'flat', 'data-toggle-class' => 'btn-primary', 'data-toggle-passive-class' => 'tn-default']); ?> &nbsp; Male &nbsp;
                                <?php echo form_radio(['name' => 'gender', 'value' => 'female', 'class' => 'flat', 'data-toggle-class' => 'btn-primary', 'data-toggle-passive-class' => 'tn-default']); ?> Female
<!--                                  <input type="radio" class="flat" checked name="iCheck"> -->
                            </div>
                        </div>
                    </div>
                    <?php
                    //if($identity_column!=='email') {
                    echo '<div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span></label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">';

                    echo form_error('email');
                    echo form_input(['name' => 'email', 'id' => 'email', 'class' => 'form-control col-md-7 col-xs-12', 'required' => 'required', 'value' => set_value('email')]);
                    echo '</div>
                              </div>';
                    // }
                    ?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(['name' => 'phone', 'id' => 'phone', 'class' => 'form-control col-md-7 col-xs-12', 'required' => 'required', 'value' => set_value('phone')]); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Company <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_input(['name' => 'company', 'id' => 'company', 'class' => 'form-control col-md-7 col-xs-12', 'required' => 'required', 'value' => set_value('company')]); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Group <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php
                            foreach ($groups as $group) {
                                $gp[$group['id']] = ucfirst($group['name']);
                            }
                            echo form_dropdown('group', $gp, (isset($user->group_user_id) ? $user->group_user_id : ''), 'id="group" "required"="required" class="form-control"');
                            ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_password(['name' => 'password', 'id' => 'password', 'class' => 'form-control col-md-7 col-xs-12', 'required' => 'required', 'value' => set_value('password')]); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Confirm Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php echo form_password(['name' => 'confirm_password', 'id' => 'confirm_password', 'class' => 'form-control col-md-7 col-xs-12', 'required' => 'required', 'value' => set_value('confirm_password')]); ?>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <?php echo anchor('users', 'Cancel', array('class' => 'btn btn-danger')); ?>
                            <?php echo form_submit(['name' => 'reset', 'class' => "btn btn-primary", 'type' => 'reset', 'value' => 'Reset']); ?>
                            <?php echo form_submit(['name' => 'submit', 'class' => "btn btn-success", 'type' => 'submit', 'value' => 'Submit']); ?>

                        </div>
                    </div>




                    <?php echo form_close(); ?>
                    <?php //End Main Content stat ?>
                </div>
            </div>
        </div>
    </div>
</div>







