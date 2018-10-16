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
                   		if (in_array('schemes/add', array_column($childs, 'page_action'))) {
                   	?>
						<a href="<?php echo $this->webroot; ?>schemes/add" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
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
                                        <th>Scheme type</th>
                                        <th class="action"></th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach ($schemes as $scheme): ?>
                                    <tr class="odd gradeX">
                                        <td>1</td>
										<td><?php echo h($scheme['Scheme']['title']); ?></td>
										<td><?php echo h($scheme['Scheme']['scheme_type']); ?></td>
                                        <?php 
											if (in_array('schemes/edit', array_column($childs, 'page_action')) || 
												in_array('schemes/delete', array_column($childs, 'page_action'))) { ?>
												<td class="center">
													<div class="btn-group">
														<button type="button" class="btn btn-info  btn-edit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<i class="fa fa-cog" aria-hidden="true"></i>
														</button>
														<div class="dropdown-menu dropdown-menu-right">
															<ul>
																<?php
										                       		if (in_array('schemes/edit', array_column($childs, 'page_action'))) {
										                       	?>
																<li>
																	<a href="<?php echo $this->webroot; ?>schemes/edit/<?php echo $scheme['Scheme']['id']; ?>" class="dropdown-item" type="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
																</li>
																<?php
																	}
										                       		if (in_array('schemes/delete', array_column($childs, 'page_action'))) {
										                       	?>
																<li>
																	<a class="dropdown-item" type="button" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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
								<?php endforeach; ?>
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
           
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="delet-div">
        <p>Are you sure to delete?</p>
        <div class="delet-btn align-right">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-danger" href="<?php echo $this->webroot; ?>schemes/delete/<?php echo $scheme['Scheme']['id']; ?>">Delete</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="schemes index">
	<h2><?php echo __('Schemes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('suffix_code'); ?></th>
			<th><?php echo $this->Paginator->sort('scheme_type'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($schemes as $scheme): ?>
	<tr>
		<td><?php echo h($scheme['Scheme']['id']); ?>&nbsp;</td>
		<td><?php echo h($scheme['Scheme']['title']); ?>&nbsp;</td>
		<td><?php echo h($scheme['Scheme']['suffix_code']); ?>&nbsp;</td>
		<td><?php echo h($scheme['Scheme']['scheme_type']); ?>&nbsp;</td>
		<td><?php echo h($scheme['Scheme']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $scheme['Scheme']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $scheme['Scheme']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $scheme['Scheme']['id']), array(), __('Are you sure you want to delete # %s?', $scheme['Scheme']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Scheme'), array('action' => 'add')); ?></li>
	</ul>
</div>
