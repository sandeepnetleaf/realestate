            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>CMS</h2>
                                <a class="btn btn-primary pull-right" href="<?= base_url('cms'); ?>"><i class="glyphicon glyphicon-list"></i> List CMS</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content"><br />
                                <?php //Main Content stat ?>
                                <div id="infoMessage"><?php if(!empty($message)){ echo $message; } ?></div>
                                
                                    <?=  form_open_multipart('cms/add_cms', array('id'=>'vFORM', 'class'=>'form-horizontal form-label-left'))?>
                                        <div class="form-group">
                                            <?php 
                                                foreach($cms_types as $id => $cms_type){
                                                    $options[$id] = ucfirst($cms_type);
                                                }
                                                $sd= array('name'=>'cms_type', 'id'=>'cms_type', 'required'=>'required',  'class'=>'form-control');
                                                ?>
                                            <?php echo form_label('CMS Title <span class="required">*</span>', 'cms_title', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12'));?>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?php echo form_dropdown($sd, $options);?>
                                            </div>
                                        </div>
                                
                                        <div class="form-group">
                                            <?php echo form_label('CMS Title <span class="required">*</span>', 'cms_title', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12'));?>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?php echo form_input(['name'=>'cms_title', 'id'=>'cms_title', 'palceholder'=>'CMS title', 'class'=>'form-control', 'required'=>'required', set_value('cms_title')]);?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <?php echo form_label('CMS Description <span class="required">*</span>', 'cms_description', array('class'=>'control-label col-md-3 col-sm-3 col-xs-12')) ?>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?=form_textarea(['name'=>'cms_description', 'id'=>'cms_description', 'placeholder'=>'CMS Description', 'class'=>'form-control ckeditor'], set_value('cms_description'));?>
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <?php echo anchor('cms', 'Cancel', array('class' => 'btn btn-danger')); ?>
                                                <?php //echo form_submit(['name' => 'reset', 'class' => "btn btn-primary", 'type' => 'reset', 'value' => 'Reset']); ?>
                                                <?php echo form_submit(['name' => 'submit', 'class' => "btn btn-success", 'type' => 'submit', 'value' => 'Submit']); ?>

                                            </div>
                                        </div>
                                    <?=form_close()?>
                                
                                <?php //End Main Content stat ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


