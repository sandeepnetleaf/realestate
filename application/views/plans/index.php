            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Plans</h2>
                                <a class="btn btn-primary pull-right" href="<?= base_url('plans/add_plan'); ?>"><i class="glyphicon glyphicon-plus"></i> Add Plan</a>
                                 <a class="btn btn-primary pull-right" href="<?=  base_url('plans/pdf')?>">Download Plans</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content"><br />
                                <?php //Main Content stat ?>
                                <div id="infoMessage"><?php if(!empty($message)){ echo $message; } ?></div>
                                
                                <script type="text/javascript">
                                    var planTable;
                                    $(document).ready(function(){
                                       planTable = $('#plan_table').DataTable({
                                           "bprocessing": true,
                                           "bserverSide": true,
                                           "bSearchable": true,
                                           "bFilter": true,
                                           "order": [],
                                           "ajax": {
                                               url: "<?= site_url('plans/plan_details')?>",
                                               type:"post",
                                           },
                                       });
                                    });

                                    //reload table
                                    function reload_plan(){
                                        planTable.ajax.reload(null, false);
                                    }
                                    
                                    //delete plan
                                    function delete_plan(id = null) 
                                    {
                                        if(id)
                                        {
                                            //click on remove button
                                            $("#removeBtn").unbind('click').bind('click', function()
                                            {
                                                $.ajax({
                                                    url: "<?php echo site_url('plans/delete_plan')?>"+id,
                                                    type: 'post',
                                                    dataType: 'json',
                                                    success:function(response) 
                                                    {
                                                        if(response.success == true) 
                                                        {                      
                                                            $(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
                                                                 '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                                                 '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
                                                                '</div>');

                                                            // refresh the table
                                                            reload_plan();

                                                            // close the modal
                                                            $("#removePlanModal").modal('hide');

                                                        } 
                                                        else 
                                                        {
                                                            $(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
                                                                 '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                                                 '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
                                                                '</div>');
                                                        }
                                                    }
                                                });
                                            }); // click remove btn
                                        } 
                                        else 
                                        {
                                            alert('Error: Refresh the page again');
                                        }
                                    }
                               </script> 
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                                        <table id="plan_table" class="table-bordered table-hover table-striped table">
                                            <thead>
                                                <tr>
                                                    <th style="min-width:10px; width: 10px; text-align: center;">
                                                        <input class="checkbox checkft" type="checkbox" name="check"/>
                                                    </th>
                                                    <th >Plan Title</th>
                                                    <th >Plan Type</th>
                                                    <th >Plan SKU/Code</th>
                                                    <th>Plan Price</th>														
                                                    <th>Modified Date</th>														
                                                    <th >Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="8" class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="dtFilter">
                                                <tr class="active">
                                                    <th style="min-width:10px; width: 10px; text-align: center;">
                                                        <input class="checkbox checkft" type="checkbox" name="check"/>
                                                    </th>
                                                    <th>Plan Title</th>
                                                    <th>Plan Type</th>
                                                    <th>Plan SKU/Code</th>
                                                    <th>Plan Price</th>														
                                                    <th>Modified Date</th>														
                                                    <th >Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <?php //End Main Content stat ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php // start delete model ?>
            
            <!-- remove modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="removePlanModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove Plan</h4>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to delete plan?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="removeBtn">Yes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- /remove modal -->
            
            <?php // end delete model ?>







