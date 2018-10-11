<div class="agenttypes view">
<h2><?php echo __('Agenttype'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($agenttype['Agenttype']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($agenttype['Agenttype']['title']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Agenttype'), array('action' => 'edit', $agenttype['Agenttype']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Agenttype'), array('action' => 'delete', $agenttype['Agenttype']['id']), array(), __('Are you sure you want to delete # %s?', $agenttype['Agenttype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Agenttypes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agenttype'), array('action' => 'add')); ?> </li>
	</ul>
</div>
