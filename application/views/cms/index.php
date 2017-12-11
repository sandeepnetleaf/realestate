            <div class="right_col" role="main">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>CMS</h2>
                                <a class="btn btn-primary pull-right" href="<?= base_url('cms/add_cms'); ?>"><i class="glyphicon glyphicon-plus"></i> Add CMS</a>
                                 <a class="btn btn-primary pull-right" href="<?= base_url('cms/pdf')?>">Download CMS</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content"><br />
                                <?php //Main Content stat ?>
                                <?php if(!empty($message)){ ?>
                                <div class="alert alert-success">
                                   <button data-dismiss="alert" class="close" type="button">×</button>
                                   <p><?php echo $message;?></p>                            
                                </div>
                                <?php } ?>
                                <script type="text/javascript">
                                    var CMSTable; 
                                    $(document).ready(function(){ 
                                       CMSTable = $('#cms_Table').DataTable({
                                           "bprocessing": true,
                                           "bserverSide": true,
                                           "bSearchable": true,
                                           "bFilter": true,
                                           "order": [],
                                           "ajax": {
                                               url: "<?= site_url('cms/get_cms') ?>",
                                               type:"post",
                                            },
                                       });
                                    });

                                    //reload table
                                    function reload_cms(){
                                        CMSTable.ajax.reload(null, false);
                                    }

                                //delete plan

                                function delete_cms(id = null) 
                                {
                                    if(id)
                                    {
                                        //click on remove button
                                        $("#removeBtn").unbind('click').bind('click', function()
                                        {
                                            $.ajax({
                                                url: "<?php echo site_url('cms/delete_cms') ?>/"+id,
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
                                                        reload_cms();

                                                        // close the modal
                                                        $("#removeCMSModal").modal('hide');

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
                                        <button class="btn btn-default" onclick="reload_cms()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                                        <table id="cms_Table" class="table-bordered table-hover table-striped table">
                                            <thead>
                                                <tr>
                                                    <th class="col-xs-1">
                                                        <input class="checkbox checkth" type="checkbox" name="check"/>
                                                    </th>
                                                    <th class="col-xs-2">CMS Title</th>
                                                    <th class="col-xs-3">Description</th>
                                                    <th class="col-xs-1">CMS Added Date</th>
                                                    <th class="col-xs-1">CMS Modified Date</th>
                                                    <th class="col-xs-1">Status</th>
                                                    <th class="col-xs-2">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="7" class="dataTables_empty">Loading data from server</td>
                                                </tr>
                                            </tbody>
                                            <tfoot class="dtFilter">
                                                <tr class="active">
                                                    <th class="col-xs-1">
                                                        <input class="checkbox checkth" type="checkbox" name="check"/>
                                                    </th>
                                                    <th class="col-xs-2">CMS Title</th>
                                                    <th class="col-xs-3">Description</th>
                                                    <th class="col-xs-1">CMS Added Date</th>
                                                    <th class="col-xs-1">CMS Modified Date</th>
                                                    <th class="col-xs-1">Status</th>
                                                    <th class="col-xs-2">Actions</th>
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
            <div class="modal fade" tabindex="-1" role="dialog" id="removeCMSModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove CMS</h4>
                        </div>
                        <div class="modal-body">
                            <p>Do you really want to delete CMS?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="removeBtn">Yes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <?php // end delete model ?>



            




