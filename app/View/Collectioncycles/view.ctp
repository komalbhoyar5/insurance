<div class="collectioncycles view">
<h2><?php echo __('Collectioncycle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($collectioncycle['Collectioncycle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($collectioncycle['Collectioncycle']['title']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Collectioncycle'), array('action' => 'edit', $collectioncycle['Collectioncycle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Collectioncycle'), array('action' => 'delete', $collectioncycle['Collectioncycle']['id']), array(), __('Are you sure you want to delete # %s?', $collectioncycle['Collectioncycle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Collectioncycles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Collectioncycle'), array('action' => 'add')); ?> </li>
	</ul>
</div>
