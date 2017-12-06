<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Users</h2>
                    
                        <!--<li><a class=" btn btn-success"  data-toggle="modal" data-target="#addUser" id="addUserModalBtn"><i class="glyphicon glyphicon-plus"></i> Add User</a></li>-->
                        <a class=" btn btn-primary pull-right" href="<?= site_url('users/create_user')?>" id="addUserModalBtn"><i class="glyphicon glyphicon-plus"></i> Add User</a>
                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <?php /* datatbale script for get user list info */?>
                    <script type="text/javascript">

                      var dataTable;
                    $(document).ready(function () 
                    {
                         dataTable = $('#userTable').DataTable({
                                "bprocessing": true,
                                "bserverSide": true,
                                "bSearchable":true,
                                "bFilter": true,
                                "order": [], //Initial no order.
                                "ajax": {
                                    url: "<?= site_url('auth/getUserDetails') ?>", // json datasource
                                    type: "post", // method  , by default get
                                    error: function () {  // error handling
                                      $(".employee-grid-error").html("");
                                      $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                                      $("#employee-grid_processing").css("display", "none");
                                    }
                                },
                                //Set column definition initialisation properties.
                                "columnDefs": [
                                    { 
                                        "targets": [ 0 ], //first column
                                        "orderable": false, //set not orderable
                                    },
                                    { 
                                        "targets": [ -1 ], //last column
                                        "orderable": false, //set not orderable
                                    },

                                ],
                        });
                        
                        
                        //set input/textarea/select event when change value, remove class error and remove text help block 
                        $("input").change(function(){
                            $(this).parent().parent().removeClass('has-error');
                            $(this).next().empty();
                        });
                        $("textarea").change(function(){
                            $(this).parent().parent().removeClass('has-error');
                            $(this).next().empty();
                        });
                        $("select").change(function(){
                            $(this).parent().parent().removeClass('has-error');
                            $(this).next().empty();
                        });


                        //check all
                        $("#check-all").click(function () {
                            $(".data-check").prop('checked', $(this).prop('checked'));
                        });
                        
                        //delete user
                    });
                    
                    //function for table refresh
                    function reload_table()
                    {
                        dataTable.ajax.reload(null,false); //reload datatable ajax 
                    }

                  /* function for delete user */
                          function delete_person(id = null) 
                          {
                            if(id) 
                            {
                                // click on remove button
                                $("#removeBtn").unbind('click').bind('click', function() {
                                    $.ajax({
                                        url : "<?php echo site_url('auth/user_ajax_delete')?>/"+id,
                                        type: 'post',
                                       // data: {member_id : id},
                                        dataType: 'json',
                                        success:function(response) {
                                            if(response.success == true) {                      
                                                $(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                                                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                                     '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                                                    '</div>');
                         
                                                // refresh the table
                                                reload_table();
                         
                                                // close the modal
                                                $("#removeUserModal").modal('hide');
                         
                                            } else {
                                                $(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                                                     '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                                     '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                                                    '</div>');
                                            }
                                        }
                                    });
                                }); // click remove btn
                            } else {
                                alert('Error: Refresh the page again');
                            }
                        }

                        $("body").on('click', '.edit_user', function (e) {
                          e.preventDefault();
                          var url = $(this).attr('href');
                          //alert(url);
                          //$('#editUserModal').find('#editUserModal').html('Order Items');
                          $('#MyModel').find('.modal-body').load(url, function () {
                              $('#MyModel').modal('show');
                          });
                      });


                    </script>
                    <div class="removeMessages"></div>
                  <?php if(!empty($message)){ ?>
                  
                    <div class="alert alert-success">
                       <button data-dismiss="alert" class="close" type="button">×</button>
                       <p><?php echo $message;?></p>                            
                    </div>
                  <?php } ?>
                  
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="table-responsive">
                    <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                    <table id="userTable" class="table-bordered table-hover table-striped table">
                        <thead>
                        <tr>
                            <th style="min-width:30px; width: 30px; text-align: center;">
                                <input class="checkbox checkth" type="checkbox" name="check"/>
                            </th>
                            <th>first_name</th>
                            <th class="col-xs-2">last_name</th>
                            <th class="col-xs-2">email_address</th>
                            <th class="col-xs-2">Mobile Number</th>
                            <th class="col-xs-1">group</th>
                            <th class="col-xs-1">status</th>
                            <th class="col-xs-2">actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="8" class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                        </tr>
                        </tbody>
                        <tfoot class="dtFilter">
                        <tr class="active">
                            <th style="min-width:30px; width: 30px; text-align: center;">
                                <input class="checkbox checkft" type="checkbox" name="check"/>
                            </th>
                            <th>first_name</th>
                            <th class="col-xs-2">last_name</th>
                            <th class="col-xs-2">email_address</th>
                            <th class="col-xs-2">Mobile Number</th>
                            <th class="col-xs-1">group</th>
                            <th class="col-xs-1"">status</th>
                            <th class="col-xs-2">actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       


    <!-- add modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="addUser">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><span class="glyphicon glyphicon-plus-sign"></span>  Add User</h4>
          </div>
          <div id="infoMessage"><?php echo $message;?></div>
          <!-- <form class="form-horizontal" action="php_action/create.php" method="POST" id="createMemberForm"> -->
            <?php echo form_open("auth/create_user", 'data-parsley-validate class="form-horizontal form-label-left"');?>
 
            <div class="modal-body">
                <div class="messages"></div>
                
                

                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="first-name">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['name'=>'first_name', 'id'=>'first_name', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('first_name')]);?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['name'=>'last_name', 'id'=>'last_name', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('last_name')]);?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['name'=>'username', 'id'=>'username', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('username')]);?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12">Gender <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            
                            <label class="btn btn-success" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <?php echo form_radio(['name' => 'gender', 'value' => 'male', 'class' => 'btn btn-default', 'data-toggle-class'=>'btn-primary', 'data-toggle-passive-class'=>'tn-default']); ?> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <?php echo form_radio(['name' => 'gender', 'value' => 'female', 'class' => 'btn btn-default', 'data-toggle-class'=>'btn-primary', 'data-toggle-passive-class'=>'tn-default']); ?> Female
                            </label>
                          </div>
                        </div>
                      </div>
                      <?php
                      //if($identity_column!=='email') {
                          echo '<div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Email <span class="required">*</span></label>
                                   <div class="col-md-6 col-sm-6 col-xs-12">';
                  
                          echo form_error('identity');
                          echo form_input(['name'=>'identity', 'id'=>'identity', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('identity')]);
                          echo '</div>
                              </div>';
                     // }
                      ?>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <?php echo form_input(['name'=>'phone', 'id'=>'phone', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('phone')]);?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Company <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_input(['name'=>'company', 'id'=>'company', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('company')]);?>
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
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php echo form_password(['name'=>'password', 'id'=>'password', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('password')]);?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-4 col-sm-4 col-xs-12" for="last-name">Confirm Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <?php echo form_password(['name'=>'confirm_password', 'id'=>'confirm_password', 'class'=>'form-control col-md-7 col-xs-12', 'required'=>'required', 'value'=>set_value('confirm_password')]);?>
                        </div>
                      </div>
                </div>
            <div class="modal-footer" style="text-align:center;">
              <?php echo anchor('users', 'Cancel', array('class' => 'btn btn-danger')); ?>
              <?php echo form_submit(['name'=>'reset', 'class'=>"btn btn-primary", 'type'=>'reset', 'value'=>'Reset']);?>
              <?php echo form_submit(['name'=>'submit', 'class'=>"btn btn-success", 'type'=>'submit', 'value'=>'Submit']);?>
            </div>
            <?php echo form_close();?>  
          <!-- </form>  -->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /add modal -->




<!--- Edit Model -->

<!-- edit modal -->
  <div class="modal fade" tabindex="-1" role="dialog" id="MyModel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-edit"></span> Edit User</h4>
        </div>
        <div class="modal-body">
        </div>
       </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- /edit modal -->
<!-- // Edit Model -->


              
<!-- remove modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove User</h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to delete user?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="removeBtn">Yes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove modal -->
              

              