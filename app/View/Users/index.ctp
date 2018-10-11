<?php  echo $this->Html->css('../admin/css/plugins/dataTables/datatables.min.css'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Employee Data
                    <a href="<?php echo $this->webroot. 'users/add'; ?>" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>UserName</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th class="actions">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?php echo h($user['User']['code']); ?></td>
                                    <td><?php echo ucwords($user['User']['f_name'] . " ". $user['User']['l_name']); ?></td>
                                    <td><?php echo h($user['User']['address']); ?></td>
                                    <td><?php echo h($user['User']['contact_no']); ?></td>
                                    <td><?php echo h($user['User']['email']); ?></td>
                                    <td><?php echo h($user['Group']['name']); ?></td>
                                    <td><?php echo h($user['User']['status']); ?></td>
                                    <td class="actions">
                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-info  btn-edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul>
                                                                    <li>
                                                                        <a href="<?php echo $this->webroot. 'users/edit/'.$user['User']['id'];  ?>" class="dropdown-item" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" type="button"><i class="fa fa-folder" aria-hidden="true"></i> View</a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" type="button" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                        <?php //echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id']), array('class'=>'btn btn-xs btn-white')); ?>
                                        <?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']), array('class'=>'btn btn-xs btn-white')); ?>
                                        <?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array('class'=>'btn btn-xs btn-white'), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
             
                        </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->element('footer'); ?>
<?php echo $this->Html->script('../admin/js/plugins/dataTables/datatables.min.js'); ?>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
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

        });

    </script>