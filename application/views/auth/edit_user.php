         <?php //print_r($user); ?>
         <?php echo form_open("auth/edit_user/".$user->id, 'data-parsley-validate class="form-horizontal form-label-left" id="updateUserForm"');?>     
          <div class="messages"><?php if(!empty($message)){ echo $message;} ?></div>
                <?php //print_r($user);?>
                <?php form_input(['type'=>'hidden', 'name'=>'id', 'value'=>$user->id])?>

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['name'=>'first_name', 'id'=>'first_name', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('first_name', $user->first_name)]);?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['name'=>'last_name', 'id'=>'last_name', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('last_name', $user->last_name)]);?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['name'=>'username', 'id'=>'username', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('username', $user->username)]);?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Gender <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div id="gender" class="btn-group" data-toggle="buttons">
                                <input type="radio" class="flat" name="gender" value="male" <?php if($user->gender==='male'){  echo 'checked';}?>  data-parsley-multiple="gender" >&nbsp; Male &nbsp;
                                <input type="radio" class="flat" name="gender" value="female" <?php if($user->gender==='female'){  echo 'checked';}?>  data-parsley-multiple="gender" > Female
                            </div>
                        </div>
                      </div>
                      <?php
                      //if($identity_column!=='email') {
                          echo '<div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Email <span class="required">*</span></label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">';
                  
                          echo form_error('identity');
                          echo form_input(['name'=>'email', 'id'=>'email', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('email', $user->email)]);
                          echo '</div>
                              </div>';
                     // }
                      ?>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <?php echo form_input(['name'=>'phone', 'id'=>'phone', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('phone', $user->phone)]);?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Company <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['name'=>'company', 'id'=>'company', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('company', $user->company)]);?>
                        </div>
                      </div>

                      <div class="form-group">
                        
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Group <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php 
                          foreach($groups as $group){
                            $gp[$group['id']] = ucfirst($group['name']);
                          }
                          echo form_dropdown('group', $gp, (isset($user->group_user_id) ? $user->group_user_id : ''), 'id="group" "required"="required" class="form-control"');
                          ?>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <?php 
                          $selected = ($user->active);  

                          $data = array('name' => 'active', 'class'=>'form-control');
                          $options = array(
                                      '1'  => 'Active',
                                      '0'    => 'Inactive',
                                     );

                          echo form_dropdown($data, $options, set_value('active', $selected))?>
                        </div>
                      </div>
                      
                      <div class="text-center foter-line" >
                      <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
                      <?php echo form_submit(['name'=>'update_user', 'class'=>"btn btn-primary", 'type'=>'submit', 'value'=>'Save changes']);?>
                    </div>
                      <?php echo form_close();?>  