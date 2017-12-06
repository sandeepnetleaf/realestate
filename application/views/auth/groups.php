<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Groups</h2>

                    <a class="btn btn-primary pull-right" href="<?= base_url('groups/create_group') ?>" id="addGroupModalBtn"><i class="glyphicon glyphicon-plus"></i> Create Group</a>
                   
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="removeMessages"></div>
                    <?php if (!empty($message)) { ?>

                        <div class="alert alert-success">
                            <button data-dismiss="alert" class="close" type="button">×</button>
                            <p><?php echo $message; ?></p>                            
                        </div>
                    <?php } ?>
                    <script type="text/javascript">
                        //datatable 
                        var groupTable;

                        $(document).ready(function () {
                            //alert('sddfsdf');
                            groupTable = $('#groupTable').DataTable({
                                "bprocessing": true,
                                "bserverSide": true,
                                "bSearchable": true,
                                "bFilter": true,
                                "order": [], //Initial no order.
                                "ajax": {
                                    url: "<?= site_url('auth/users_groups') ?>", // json datasource
                                    type: "post", // method  , by default get

                                },
                            });
                        });

                        //check all
                        $("#check-all").click(function () {
                            $(".data-check").prop('checked', $(this).prop('checked'));
                        });




                        function reload_group()
                        {
                            console.log(groupTable);
                            groupTable.ajax.reload(); //reload datatable ajax 
                        }

                        function delete_group(id = null)
                        {
                            if (id)
                            {
                                $("#removeBtn").unbind('click').bind('click', function ()
                                {
                                    $.ajax({
                                        url: '<?= site_url('auth/group_delete') ?>/' + id,
                                        type: 'post',
                                        dataType: 'json',
                                        success: function (response) {
                                            if (response.success == true) {
                                                $("#removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                                        '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                                                        '</div>');
                                                <?php $this->session->set_flashdata('message', 'Group successfully deleted'); ?>
                                                reload_group();
                                                $("#removeGroupModal").hide();
                                            } else
                                            {
                                                $(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                                        '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                                                        '</div>');
                                            }
                                        }
                                    });
                                });
                            } else {
                                alert('Error: Refresh the page again');
                                reload_group();
                            }
                        }

                    </script>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                            <button class="btn btn-default" onclick="reload_group()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                            <table id="groupTable" class="table-bordered table-hover table-striped table">
                                <thead>
                                    <tr>
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkth" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
                                        <th class="col-xs-4">Description</th>
                                        <th class="col-xs-4">actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="dataTables_empty"><?= lang('loading_data_from_server') ?></td>
                                    </tr>
                                </tbody>
                                <tfoot class="dtFilter">
                                    <tr class="active">
                                        <th style="min-width:30px; width: 30px; text-align: center;">
                                            <input class="checkbox checkft" type="checkbox" name="check"/>
                                        </th>
                                        <th>Name</th>
                                        <th class="col-xs-4">Description</th>
                                        <th class="col-xs-4">actions</th>
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


<!-- delete modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeGroupModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Remove Group</h4>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete group?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="removeBtn">Yes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove modal -->
