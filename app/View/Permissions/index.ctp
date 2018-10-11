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
                       <?php echo $title; ?> data
						<a href="<?php echo $this->webroot; ?>permissions/add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
							<div class="table-outer">
								<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
										<tr>
											<th></th>
											<th>Page name</th>
											<th>Page action</th>
											<th>Role permissions</th>
											<th class="action"></th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$count = 1;
										foreach ($permissions as $permission) {
										?>
											<tr>
												<td><?php echo $count; ?></td>
												<td><?php echo h($permission['Permission']['page_name']); ?>&nbsp;</td>
												<td><?php echo h($permission['Permission']['page_action']); ?>&nbsp;</td>
												<td><?php 
													if (isset($permission['Group'])) {
														$roles = array();
															foreach ($permission['Group'] as $Groups) {
																$roles[] = $Groups['name'];
															}
															echo implode(', ', $roles);
													}
												?></td>
												<td class="center">
													<div class="btn-group">
														<button type="button" class="btn btn-info  btn-edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fa fa-cog" aria-hidden="true"></i>
														</button>
														<div class="dropdown-menu dropdown-menu-right">
															<ul>
																<li>
																	<a href="<?php echo $this->webroot; ?>permissions/edit/<?php echo $permission['Permission']['id']; ?>" class="dropdown-item" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
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
												</td>
											</tr>
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
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
	  <div class="delet-div">
		<p>Are you sure to delete date?</p>
		<div class="delet-btn align-right">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Cancle</button>
			<button type="button" class="btn btn-danger">Delete</button>
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

