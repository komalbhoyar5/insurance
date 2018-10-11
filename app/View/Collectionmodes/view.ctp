<div class="collectionmodes view">
<h2><?php echo __('Collectionmode'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($collectionmode['Collectionmode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($collectionmode['Collectionmode']['title']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Collectionmode'), array('action' => 'edit', $collectionmode['Collectionmode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Collectionmode'), array('action' => 'delete', $collectionmode['Collectionmode']['id']), array(), __('Are you sure you want to delete # %s?', $collectionmode['Collectionmode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Collectionmodes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Collectionmode'), array('action' => 'add')); ?> </li>
	</ul>
</div>
