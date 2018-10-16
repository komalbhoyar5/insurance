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
                       		if (in_array('cover_types/add', array_column($childs, 'page_action'))) {
                       	?>
							<a href="<?php echo $this->webroot; ?>cover_types/add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
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
											<th>Title</th>
											<?php 
											if (in_array('cover_types/edit', array_column($childs, 'page_action')) || 
												in_array('cover_types/delete', array_column($childs, 'page_action'))) { ?>
												<th class="action"></th>
											<?php
											}
											?>
										</tr>
									</thead>
									<tbody>
										<?php 
											$count = 1;
										 foreach ($coverTypes as $coverType){
										?>
											<tr>
												<td><?php echo $count; ?></td>
												<td><?php echo h($coverType['CoverType']['title']); ?>&nbsp;</td>
												<?php 
												if (in_array('cover_types/edit', array_column($childs, 'page_action')) || 
													in_array('cover_types/delete', array_column($childs, 'page_action'))) { ?>
													<td class="center">
														<div class="btn-group">
															<button type="button" class="btn btn-info  btn-edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<i class="fa fa-cog" aria-hidden="true"></i>
															</button>
															<div class="dropdown-menu dropdown-menu-right">
																<ul>
																	<?php
											                       		if (in_array('cover_types/edit', array_column($childs, 'page_action'))) {
											                       	?>
																	<li>
																		<a href="<?php echo $this->webroot; ?>cover_types/edit/<?php echo $coverType['CoverType']['id']; ?>" class="dropdown-item" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
																	</li>
																	<?php
																		}
											                       		if (in_array('cover_types/delete', array_column($childs, 'page_action'))) {
											                       	?>
																	<li>
																		<a class="dropdown-item" type="button" data-toggle="modal" data-target="#<?php echo $coverType['CoverType']['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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
											<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="<?php echo $coverType['CoverType']['id']; ?>">
											  <div class="modal-dialog modal-sm">
												<div class="modal-content">
												  <div class="delet-div">
													<p>Are you sure to delete?</p>
													<div class="delet-btn align-right">
														<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
														<a type="button" href="<?php echo $this->webroot; ?>cover_types/delete/<?php echo $coverType['CoverType']['id']; ?>" class="btn btn-danger">Delete</a>
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

<div class="coverTypes index">
	<h2><?php echo __('Cover Types'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('desc'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($coverTypes as $coverType): ?>
	<tr>
		<td><?php echo h($coverType['CoverType']['id']); ?>&nbsp;</td>
		<td><?php echo h($coverType['CoverType']['title']); ?>&nbsp;</td>
		<td><?php echo h($coverType['CoverType']['desc']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $coverType['CoverType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $coverType['CoverType']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $coverType['CoverType']['id']), array(), __('Are you sure you want to delete # %s?', $coverType['CoverType']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Cover Type'), array('action' => 'add')); ?></li>
	</ul>
</div>
