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
                       	<?php echo $title; ?> list
						<?php
                       		if (in_array('agents/add', array_column($childs, 'page_action'))) {
                       	?>
							<a href="<?php echo $this->webroot; ?>agents/add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                       	<?php
                       		}
                       	?>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
							<div class="table-outer">
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th></th>
											<th>Code</th>
											<th>Name</th>
											<th>Email</th>
											<th>Telephone</th>
											<th>City/Town</th>
											<th>Commission</th>
											<th>Security Deposit</th>
											<th>Credit limit</th>
											<th>Credit Period</th>


											<?php 
											if (in_array('agents/edit', array_column($childs, 'page_action')) || 
												in_array('agents/delete', array_column($childs, 'page_action'))) { ?>
												<th class="action"></th>
											<?php
											}
											?>
										</tr>
									</thead>
									<tbody>
										<?php 
											$count = 1;
										 foreach ($agents as $agent){
										?>
											<tr>
												<td><?php echo $count; ?></td>
												
												<td><?php echo h($agent['Agent']['agent_code']); ?></td>
												<td><?php echo h($agent['Agent']['f_name']); ?></td>
												<td><?php echo h($agent['Agent']['email_id']); ?></td>
												<td><?php echo h($agent['Agent']['phone_no']); ?></td>
												<td><?php echo h($agent['Agent']['city']); ?></td>
												<td></td>
												<td><?php echo h($agent['Agent']['security_deposite']); ?></td>
												<td><?php echo h($agent['Agent']['credit_limit']); ?></td>
												<td><?php echo h($agent['Agent']['credit_period']); ?></td>
												
												<?php 
												if (in_array('agents/edit', array_column($childs, 'page_action')) || 
													in_array('agents/delete', array_column($childs, 'page_action'))) { ?>
													<td class="center">
														<div class="btn-group">
															<button type="button" class="btn btn-info  btn-edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="fa fa-cog" aria-hidden="true"></i>
															</button>
															<div class="dropdown-menu dropdown-menu-right">
																<ul>
																	<?php
											                       		if (in_array('agents/edit', array_column($childs, 'page_action'))) {
											                       	?>
																	<li>
																		<a href="<?php echo $this->webroot; ?>agents/edit/<?php echo $agent['Agent']['id']; ?>" class="dropdown-item" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
																	</li>
																	<?php
																		}
											                       		if (in_array('agents/delete', array_column($childs, 'page_action'))) {
											                       	?>
																	<li>
																		<a class="dropdown-item" type="button" data-toggle="modal" data-target="#<?php echo $agent['Agent']['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
																	</li>
																	<?php } ?>
																</ul>
															</div>
														</div>
													</td>
												<?php
												}
												?> 
											</tr>
											<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="<?php echo $agent['Agent']['id']; ?>">
											  <div class="modal-dialog modal-sm">
												<div class="modal-content">
												  <div class="delet-div">
													<p>Are you sure to delete data?</p>
													<div class="delet-btn align-right">
														<button type="button" class="btn btn-primary" data-dismiss="modal">Cancle</button>
														<a type="button" href="<?php echo $this->webroot; ?>agents/delete/<?php echo $agent['Agent']['id']; ?>" class="btn btn-danger">Delete</a>
													</div>
												  </div>
												</div>
											  </div>
											</div>
										<?php $count++; } ?>
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
</div>
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
                { extend: 'copy',
		            	exportOptions: {
		                columns: [0,1,2,3,4,5,6,7]
		            }		
		        },
                {extend: 'csv',
		            	exportOptions: {
		                columns: [0,1,2,3,4,5,6,7]
		            }		
		        },
                {extend: 'excel', title: 'Employee list',
		            	exportOptions: {
		                columns: [0,1,2,3,4,5,6,7]
		            }		
		        },
                {extend: 'pdf', title: 'Employee list',
		            	exportOptions: {
		                columns: [0,1,2,3,4,5,6,7]
		            }		
		        },

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

