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
                       		if (in_array('plans/add', array_column($childs, 'page_action'))) {
                       	?>
							<a href="<?php echo $this->webroot; ?>plans/add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
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
											<th>Plan code</th>
											<th>Plan name</th>
											<th>Product/scheme</th>
											<th>Plan type</th>
											<?php 
											if (in_array('plans/edit', array_column($childs, 'page_action')) || 
												in_array('plans/delete', array_column($childs, 'page_action'))) { ?>
												<th class="action"></th>
											<?php
											}
											?>
										</tr>
									</thead>
									<tbody>
										<?php 
											$count = 1;
										 foreach ($plans as $plan){
										?>
											<tr>
												<td><?php echo $count; ?></td>
												<td><?php echo h($plan['Plan']['plan_code']); ?>&nbsp;</td>
												<td><?php echo h($plan['Plan']['plan_name']); ?>&nbsp;</td>
												<td><?php echo h($plan['Product']['title']); ?>&nbsp;</td>
												<td><?php echo h($plan['CoverType']['title']); ?>&nbsp;</td>
												<?php 
												if (in_array('plans/edit', array_column($childs, 'page_action')) || 
													in_array('plans/delete', array_column($childs, 'page_action'))) { ?>
													<td class="center">
														<div class="btn-group">
															<button type="button" class="btn btn-info  btn-edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="fa fa-cog" aria-hidden="true"></i>
															</button>
															<div class="dropdown-menu dropdown-menu-right">
																<ul>
																	<?php
											                       		if (in_array('plans/edit', array_column($childs, 'page_action'))) {
											                       	?>
																	<li>
																		<a href="<?php echo $this->webroot; ?>plans/edit/<?php echo $plan['Plan']['id']; ?>" class="dropdown-item" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
																	</li>
																	<?php
																		}
											                       		if (in_array('plans/delete', array_column($childs, 'page_action'))) {
											                       	?>
																	<li>
																		<a class="dropdown-item" type="button" data-toggle="modal" data-target="#<?php echo $plan['Plan']['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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
											<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="<?php echo $plan['Plan']['id']; ?>">
											  <div class="modal-dialog modal-sm">
												<div class="modal-content">
												  <div class="delet-div">
													<p>Are you sure to delete?</p>
													<div class="delet-btn align-right">
														<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
														<a type="button" href="<?php echo $this->webroot; ?>plans/delete/<?php echo $plan['Plan']['id']; ?>" class="btn btn-danger">Delete</a>
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
 