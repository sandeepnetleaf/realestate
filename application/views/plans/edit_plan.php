            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Edit Plan</h2>
                                <a class="btn btn-primary pull-right" href="<?= base_url('plans'); ?>"><i class="glyphicon glyphicon-list"></i> Plans</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content"><br />
                                <?php //Main Content stat ?>
                                <div id="infoMessage"><?php echo $message; ?></div>
                                <!--<form action="/login/public/admin/cms/updateplans?actype=edit&id=14" method="POST" enctype="multipart/form-data" class="" id="vFORM" >-->
                                <?php echo form_open_multipart('plans/add_plan', array('id'=>'vFORM'));?>    
                                <div class="form-body pal">
                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label" for="plan_title">Plan Name <span class="required">*</span></label>
                                                <?=form_input(['name'=>'plan_title', 'id'=>'plan_title', 'placeholder'=>'Plan Title', 'class'=>'form-control'], set_value('plan_title'));?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plan_title" class="control-label">Plan Type <span class="required">*</span></label>
                                                <?=form_input(['name'=>'plan_type', 'id'=>'plan_type', 'placeholder'=>'Plan Type', 'class'=>'form-control'], set_value('plan_type'));?>
                                            </div>
                                        </div>														
                                    </div>

                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plan_title" class="control-label">SKU/Product No. <span class="required">*</span></label>
                                                <?=form_input(['name'=>'sku_prod_no', 'id'=>'sku_prod_no', 'placeholder'=>'SKU/Product No', 'class'=>'form-control'], set_value('sku_prod_no'));?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plan_title" class="control-label">Length of Coverage (in Months) <span class="required">*</span></label>
                                                <?=form_input(['name'=>'length_of_coverage', 'id'=>'length_of_coverage', 'placeholder'=>'Length of Coverage', 'class'=>'form-control'], set_value('length_of_coverage'));?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plan_title" class="control-label">Coverage will start after </label>
                                                <?=form_input(['name'=>'coverage_start', 'id'=>'coverage_start', 'placeholder'=>'Coverage', 'class'=>'form-control'], set_value('coverage_start'));?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plan_title" class="control-label">This Plan is applicable for Mobile & Tablets </label>
                                                <?=form_input(['name'=>'applicable_for', 'id'=>'applicable_for', 'placeholder'=>'Applicable for', 'class'=>'form-control'], set_value('applicable_for'));?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plan_title" class="control-label">What will be delivered? </label>
                                                <?=form_input(['name'=>'plan_pin', 'id'=>'plan_pin', 'placeholder'=>'16 Digit PIN(s)', 'class'=>'form-control'], set_value('plan_pin'));?>
                                            </div>
                                        </div>



                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plan_title" class="control-label">Standard Delivery </label>
                                                <?=form_input(['name'=>'standard_delivery', 'id'=>'standard_delivery', 'placeholder'=>'Standard Delivery', 'class'=>'form-control'], set_value('standard_delivery'));?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plan_title" class="control-label">Is Mobile & Tablets Health Check Required? </label>
                                                <input type="radio" name="health_check_required" class="flat" value="1" checked> : Yes
                                                <input type="radio" name="health_check_required" class="flat" value="2" > : No
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plan_title" class="control-label">Is registration required in Warranty Bazaar </label>
                                                <input type="radio" name="registration_required" class="flat" value="1" checked> : Yes
                                                <input type="radio" name="registration_required" class="flat" value="2" > : No
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plan_price" class="control-label">Price (Rs.)</label>
                                                <?=form_input(['name'=>'plan_price', 'id'=>'plan_price', 'placeholder'=>'Plan Price', 'class'=>'form-control'], set_value('plan_price'));?>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plan_price" class="control-label">Availability </label>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <input type="radio" name="availability" class="flat" value="1" checked> : Available
                                                <input type="radio" name="availability" class="flat" value="2" > : Sold Out
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row"> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plan_image" class="control-label">Plan Image </label>
                                                    <?=form_upload(['name'=>'plan_image', 'id'=>'plan_image'])?>
                                                </div>
                                        </div>
                                        
                                        <div class="row">                                                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="plan_price" class="control-label">Gadgets Values</label>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-6 pull-left">
                                                            <?=form_input(['name'=>'r1', 'id'=>'r1', 'placeholder'=>'Value1', 'class'=>'form-control'], set_value('r1'));?>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
                                                            <?=form_input(['name'=>'r2', 'id'=>'r2', 'placeholder'=>'Value2', 'class'=>'form-control'], set_value('r2'));?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                    <!-- PLAN IMAGE -->
                                    

                                    <div class="row">                                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="plan_content" class="control-label">Plan Description</label>
                                                <?= form_textarea(['id'=>'plan_content', 'name'=>'plan_content', 'class'=>'ckeditor', set_value('plan_content')])?>
                                                <!--<textarea name="plan_content" class="form-control">
                                                    <p>Accidental Damage / Liquid Damage Cover Support for 1st Year*</p>
                                                    <p>Anti-Virus Protection*</p>
                                                    <p>Call Blocker*</p>
                                                    <p>Parental Control*</p>
                                                    <p>Personal Accidental Cover Support of Value 1 lac For 1st Year*</p>
                                                    <p>Extended Warranty For 2nd Year* FREE</p>
                                                </textarea>-->
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="plan_status" class="control-label">
                                                                Show on Home</label>
                                                            <div class="input-icon right">
                                                                <input type="checkbox" class="flat" name="show_on_home" id="show_on_home" value="1" checked> Yes
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="plan_status" class="control-label">
                                                                Status</label>
                                                            <div class="input-icon right">
                                                                <input type="radio" name="plan_status" class="flat" id="plan_status" value="1" checked> Active
                                                                <input type="radio" name="plan_status" class="flat" id="plan_status" value="2" > InActive
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>	
                                    
                                        <div class="ln_solid"></div>
                                        
                                        <div class="form-actions text-center">
                                            <?php echo anchor('plans', 'Cancel', array('class' => 'btn btn-danger')); ?>
                                            <?php echo form_submit(['name' => 'reset', 'class' => "btn btn-primary", 'type' => 'reset', 'value' => 'Reset']); ?>
                                            <?php echo form_submit(['name' => 'submit', 'class' => "btn btn-success", 'type' => 'submit', 'value' => 'Submit']); ?>
                                            <!--<a href="/login/public/admin/cms/plans?act=cancelled" class="btn btn-primary">Cancel</a>
                                            <button type="submit" class="btn btn-primary">Submit</button>-->
                                        </div>
                                    <?=form_close(); ?>
                                </div>

                                <?php //End Main Content stat ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
