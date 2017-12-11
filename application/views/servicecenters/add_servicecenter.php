            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            
                            <div class="x_title">
                                <h2>Service Center</h2>
                                <a class="btn btn-primary pull-right" href="<?= base_url('servicecenters'); ?>"><i class="glyphicon glyphicon-list"></i> Service Centers</a>
                                <div class="clearfix"></div>
                            </div>
                            
                            <div class="x_content"><br />
                                <?php //Main Content stat ?>
                                <div id="infoMessage"><?php echo $message; ?></div>
                                <?php echo form_open_multipart('servicecenter/add_servicecenter', array('id'=>'vFORM'));?>    
                                <div class="form-body pal">
                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group"><?php echo form_label('Service Provider Name <span class="required">*</span>', 'sc_service_provider', array('class' => 'control-label'));?>  
                                                <?=form_input(['name'=>'sc_service_provider', 'id'=>'sc_service_provider', 'required'=>'required', 'placeholder'=>'Service Provider Name', 'class'=>'form-control', set_value('sc_service_provider')]);?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo form_label('Service Center <span class="required">*</span>', 'sc_service_center', array('class' => 'control-label'));?>
                                                <?=form_input(['name'=>'sc_service_center', 'id'=>'sc_service_center', 'required'=>'required', 'placeholder'=>'Service Center', 'class'=>'form-control', set_value('sc_service_center')]);?>
                                            </div>
                                        </div>														
                                    </div>
                                    
                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo form_label('Item Type <span class="required">*</span>', 'sc_service_provider', array('class' => 'control-label'));?>
                                                <?php 
                                                $options = array(
                                                        '' => '-- Select item type --',
                                                        '1' => 'Mobile Phones',
                                                        '2' => 'Tablets',
                                                        '3' => 'Laptop',
                                                );
                                                $sd= array('name'=>'sc_item_type', 'id'=>'sc_item_type', 'required'=>'required',  'class'=>'form-control');
                                                echo form_dropdown($sd, $options);
                                                ?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo form_label('Item Service Provider Brand <span class="required">*</span>', 'sc_service_center', array('class' => 'control-label'));?>
                                                <?php 
                                                $options = array(
                                                       
                                                        
                                                );
                                                $sd= array('name'=>'sc_service_brand', 'id'=>'sc_service_brand','required'=>'required', 'class'=>'form-control');
                                                echo form_dropdown($sd, $options);
                                                ?>
                                            </div>
                                        </div>														
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo form_label('Address <span class="required">*</span>', 'sc_address', array('class' => 'control-label'));?>
                                                <?=  form_textarea(array('name'=>'sc_address','id'=>'sc_address', 'required'=>'required', 'class'=>'form-control ckeditor', 'placeholder'=>'Address', set_value('sc_address')))?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <?php echo form_label('Region <span class="required">*</span>', 'sc_region', array('class' => 'control-label'));?>
                                                        <?php 
                                                        
                                                        foreach($regions as $id => $val){
                                                            $options[$id] = ucfirst($val);
                                                        }
                                                        $sd= array('name'=>'sc_region', 'id'=>'sc_region','required'=>'required', 'class'=>'form-control');
                                                        echo form_dropdown($sd, $options);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <?php echo form_label('State <span class="required">*</span>', 'sc_state', array('class' => 'control-label'));?>
                                                        <?php 
                                                    $options = array(
                                                            '' => '-- Select State --',

                                                    );
                                                    $sd= array('name'=>'sc_state', 'id'=>'sc_state', 'class'=>'form-control', 'required'=>'required');
                                                    echo form_dropdown($sd, $options);
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <?php echo form_label('City <span class="required">*</span>', 'sc_city', array('class' => 'control-label'));?>
                                                        <?php 
                                                        $options = array(
                                                                '' => '-- Select City --',

                                                        );
                                                        $sd= array('name'=>'sc_city', 'id'=>'sc_city', 'class'=>'form-control');
                                                        echo form_dropdown($sd, $options);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <?php echo form_label('Contact Number One <span class="required">*</span>', 'sc_contact1', array('class' => 'control-label'));?>
                                                        <?=form_input(['name'=>'sc_contact1', 'id'=>'sc_contact1', 'required'=>'required', 'placeholder'=>'Contact Number One', 'class'=>'form-control', set_value('sc_contact1')]);?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo form_label('Contact Number Two', 'sc_contact2', array('class' => 'control-label'));?>
                                                <?=form_input(['name'=>'sc_contact2', 'id'=>'sc_contact2', 'placeholder'=>'Contact Number Two', 'class'=>'form-control', set_value('sc_contact2')]);?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo form_label('Contact Number Three', 'sc_contact3', array('class' => 'control-label'));?>
                                                <?=form_input(['name'=>'sc_contact3', 'id'=>'sc_contact3', 'placeholder'=>'Contact Number Three', 'class'=>'form-control', set_value('sc_contact3')]);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo form_label('Email <span class="required">*</span>', 'sc_email', array('class' => 'control-label'));?>  
                                                <?=form_input(['name'=>'sc_email', 'id'=>'sc_email', 'placeholder'=>'Email', 'required'=>'required', 'class'=>'form-control', set_value('sc_email')]);?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo form_label('Web site', 'sc_website', array('class' => 'control-label'));?>
                                                <?=form_input(['name'=>'sc_website', 'id'=>'sc_website', 'placeholder'=>'Website', 'class'=>'form-control', set_value('sc_website')]);?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo form_label('Working Days <span class="required">*</span>', 'sc_service_provider', array('class' => 'control-label'));?>
                                                <br/>
                                                <input type="checkbox" name="sc_working_days[]" id="sc_working_days1" value="1" >
                                                <?php echo form_label('Monday ', 'sc_working_days1', array('class' => 'control-label'));?>
                                                <input type="checkbox" name="sc_working_days[]" id="sc_working_days2" value="2" >
                                                <?php echo form_label('Tuesday ', 'sc_working_days2', array('class' => 'control-label'));?>
                                                <input type="checkbox" name="sc_working_days[]" id="sc_working_days3" value="3" >
                                                <?php echo form_label('Wednesday ', 'sc_working_days3', array('class' => 'control-label'));?>
                                                <input type="checkbox" name="sc_working_days[]" id="sc_working_days4" value="4" >
                                                <?php echo form_label('Thursday ', 'sc_working_days4', array('class' => 'control-label'));?>
                                                <input type="checkbox" name="sc_working_days[]" id="sc_working_days5" value="5" >
                                                <?php echo form_label('Friday ', 'sc_working_days5', array('class' => 'control-label'));?>
                                                <input type="checkbox" name="sc_working_days[]" id="sc_working_days6" value="6" >
                                                <?php echo form_label('Saturday ', 'sc_working_days6', array('class' => 'control-label'));?>
                                                <input type="checkbox" name="sc_working_days[]" id="sc_working_days7" value="7" >
                                                <?php echo form_label('Sunday ', 'sc_working_days7', array('class' => 'control-label'));?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Time From <span class="required">*</span>', 'sc_time_from', array('class' => 'control-label'));?>
                                                        <select name="sc_time_from" id="sc_time_from" required="required" class="form-control">
                                                            <option value="">--Select--</option>
                                                            <option value="00:00" >12:00 AM</option>
                                                            <option value="00:30" >12:30 AM</option>
                                                            <option value="01:00" >01:00 AM</option>
                                                            <option value="01:30" >01:30 AM</option>
                                                            <option value="02:00" >02:00 AM</option>
                                                            <option value="02:30" >02:30 AM</option>
                                                            <option value="03:00" >03:00 AM</option>
                                                            <option value="03:30" >03:30 AM</option>
                                                            <option value="04:00" >04:00 AM</option>
                                                            <option value="04:30" >04:30 AM</option>
                                                            <option value="05:00" >05:00 AM</option>
                                                            <option value="05:30" >05:30 AM</option>
                                                            <option value="06:00" >06:00 AM</option>
                                                            <option value="06:30" >06:30 AM</option>
                                                            <option value="07:00" >07:00 AM</option>
                                                            <option value="07:30" >07:30 AM</option>
                                                            <option value="08:00" >08:00 AM</option>
                                                            <option value="08:30" >08:30 AM</option>
                                                            <option value="09:00" >09:00 AM</option>
                                                            <option value="09:30" >09:30 AM</option>
                                                            <option value="10:00" >10:00 AM</option>
                                                            <option value="10:30" >10:30 AM</option>
                                                            <option value="11:00" >11:00 AM</option>
                                                            <option value="11:30" >11:30 AM</option>
                                                            <option value="12:00" >12:00 PM</option>
                                                            <option value="12:30" >12:30 PM</option>
                                                            <option value="13:00" >01:00 PM</option>
                                                            <option value="13:30" >01:30 PM</option>
                                                            <option value="14:00" >02:00 PM</option>
                                                            <option value="14:30" >02:30 PM</option>
                                                            <option value="15:00" >03:00 PM</option>
                                                            <option value="15:30" >03:30 PM</option>
                                                            <option value="16:00" >04:00 PM</option>
                                                            <option value="16:30" >04:30 PM</option>
                                                            <option value="17:00" >05:00 PM</option>
                                                            <option value="17:30" >05:30 PM</option>
                                                            <option value="18:00" >06:00 PM</option>
                                                            <option value="18:30" >06:30 PM</option>
                                                            <option value="19:00" >07:00 PM</option>
                                                            <option value="19:30" >07:30 PM</option>
                                                            <option value="20:00" >08:00 PM</option>
                                                            <option value="20:30" >08:30 PM</option>
                                                            <option value="21:00" >09:00 PM</option>
                                                            <option value="21:30" >09:30 PM</option>
                                                            <option value="22:00" >10:00 PM</option>
                                                            <option value="22:30" >10:30 PM</option>
                                                            <option value="23:00" >11:00 PM</option>
                                                            <option value="23:30" >11:30 PM</option>
                                                        </select>    
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <?php echo form_label('Time To <span class="required">*</span>', 'sc_time_to', array('class' => 'control-label'));?>
                                                        <select name="sc_time_to" id="sc_time_to" required="required" class="form-control">
                                                            <option value="">--Select--</option>
                                                            <option value="00:00" >12:00 AM</option>
                                                            <option value="00:30" >12:30 AM</option>
                                                            <option value="01:00" >01:00 AM</option>
                                                            <option value="01:30" >01:30 AM</option>
                                                            <option value="02:00" >02:00 AM</option>
                                                            <option value="02:30" >02:30 AM</option>
                                                            <option value="03:00" >03:00 AM</option>
                                                            <option value="03:30" >03:30 AM</option>
                                                            <option value="04:00" >04:00 AM</option>
                                                            <option value="04:30" >04:30 AM</option>
                                                            <option value="05:00" >05:00 AM</option>
                                                            <option value="05:30" >05:30 AM</option>
                                                            <option value="06:00" >06:00 AM</option>
                                                            <option value="06:30" >06:30 AM</option>
                                                            <option value="07:00" >07:00 AM</option>
                                                            <option value="07:30" >07:30 AM</option>
                                                            <option value="08:00" >08:00 AM</option>
                                                            <option value="08:30" >08:30 AM</option>
                                                            <option value="09:00" >09:00 AM</option>
                                                            <option value="09:30" >09:30 AM</option>
                                                            <option value="10:00" >10:00 AM</option>
                                                            <option value="10:30" >10:30 AM</option>
                                                            <option value="11:00" >11:00 AM</option>
                                                            <option value="11:30" >11:30 AM</option>
                                                            <option value="12:00" >12:00 PM</option>
                                                            <option value="12:30" >12:30 PM</option>
                                                            <option value="13:00" >01:00 PM</option>
                                                            <option value="13:30" >01:30 PM</option>
                                                            <option value="14:00" >02:00 PM</option>
                                                            <option value="14:30" >02:30 PM</option>
                                                            <option value="15:00" >03:00 PM</option>
                                                            <option value="15:30" >03:30 PM</option>
                                                            <option value="16:00" >04:00 PM</option>
                                                            <option value="16:30" >04:30 PM</option>
                                                            <option value="17:00" >05:00 PM</option>
                                                            <option value="17:30" >05:30 PM</option>
                                                            <option value="18:00" >06:00 PM</option>
                                                            <option value="18:30" >06:30 PM</option>
                                                            <option value="19:00" >07:00 PM</option>
                                                            <option value="19:30" >07:30 PM</option>
                                                            <option value="20:00" >08:00 PM</option>
                                                            <option value="20:30" >08:30 PM</option>
                                                            <option value="21:00" >09:00 PM</option>
                                                            <option value="21:30" >09:30 PM</option>
                                                            <option value="22:00" >10:00 PM</option>
                                                            <option value="22:30" >10:30 PM</option>
                                                            <option value="23:00" >11:00 PM</option>
                                                            <option value="23:30" >11:30 PM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>														
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php echo form_label('Status <span class="required">*</span>', 'sc_status', array('class' => 'control-label'));?>
                                                <input type="radio" name="sc_status" class="flat" id="sc_status" value="1" checked> Active
						<input type="radio" name="sc_status" class="flat" id="sc_status" value="0" > Inactive
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="control-label"> </label>
                                                
                                            </div>
                                        </div>														
                                    </div>
                                   
                                    <div class="ln_solid"></div>
                                    <div class="form-actions text-center">
                                        <?php echo anchor('servicecenters', 'Cancel', array('class' => 'btn btn-danger')); ?>
                                        <?php echo form_submit(['name' => 'reset', 'class' => "btn btn-primary", 'type' => 'reset', 'value' => 'Reset']); ?>
                                        <?php echo form_submit(['name' => 'submit', 'class' => "btn btn-success", 'type' => 'submit', 'value' => 'Submit']); ?>
                                    </div>
                                </div>
                                <?=form_close(); ?>
                                <?php //End Main Content stat ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
