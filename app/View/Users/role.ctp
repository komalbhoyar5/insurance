<?php  echo $this->Html->css('../admin/css/plugins/dataTables/datatables.min.css'); ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $title; ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <?php echo $title; ?> Data
                        <?php
                            if (in_array('users/add_role', array_column($childs, 'page_action'))) {
                        ?>
                        <a href="<?php echo $this->webroot; ?>users/add_role" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                        <?php } ?>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <div class="table-outer">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Role id</th>
                                            <th>Role name</th>
                                            <th class="action"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $count = 1;
                                            foreach ($groups as $group): ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><?php echo h($group['Group']['id']); ?></td>
                                                <td><?php echo h($group['Group']['name']); ?></td>
                                                
                                                <td class="center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info  btn-edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul>
                                                                <?php
                                                                    if (in_array('users/update_role', array_column($childs, 'page_action'))) {
                                                                ?>
                                                                <li>
                                                                    <a href="<?php echo $this->webroot; ?>users/update_role/<?php echo $group['Group']['id']; ?>" class="dropdown-item" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                                </li>
                                                                <?php
                                                                    }
                                                                    if (in_array('users/view_role', array_column($childs, 'page_action'))) {
                                                                ?>
                                                                <li>
                                                                    <a class="dropdown-item" href="<?php echo $this->webroot; ?>users/view_role/<?php echo $group['Group']['id']; ?>" class="dropdown-item"><i class="fa fa-folder" aria-hidden="true"></i> View</a>
                                                                </li>
                                                                <?php
                                                                    }
                                                                    if (in_array('users/delete_user_type', array_column($childs, 'page_action'))) {
                                                                ?>
                                                                <li>
                                                                    <a class="dropdown-item"  data-toggle="modal" data-target=".bd-example-modal-sm_<?php echo $group['Group']['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                                </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="modal fade bd-example-modal-sm_<?php echo $group['Group']['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                  <div class="delet-div">
                                                    <p>Are you sure to delete?</p>
                                                    <div class="delet-btn align-right">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                                                        <a type="button" class="btn btn-danger" href="<?php echo $this->webroot; ?>users/delete_user_type/<?php echo $group['Group']['id']; ?>">Delete</a>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        <?php $count++;
                                        endforeach; ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php echo $this->element('footer'); ?>
<?php echo $this->Html->script('../admin/js/plugins/dataTables/datatables.min.js'); ?>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('#dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
            $('.editbtn').click(function(){
                var id = $(this).attr('typeid');
                var name = $(this).attr('typename');
                $('#typeid').val(id);
                $('#typename').val(name);
            });
            function updatetype(id, name){
                $('#typeid').val(id);
                $('#typename').val(name);
            }

        });

    </script>