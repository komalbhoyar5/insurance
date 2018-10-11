<div class="dependantTypes view">
<h2><?php echo __('Dependant Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($dependantType['DependantType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($dependantType['DependantType']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Age'); ?></dt>
		<dd>
			<?php echo h($dependantType['DependantType']['min_age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Age'); ?></dt>
		<dd>
			<?php echo h($dependantType['DependantType']['max_age']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Dependant Type'), array('action' => 'edit', $dependantType['DependantType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Dependant Type'), array('action' => 'delete', $dependantType['DependantType']['id']), array(), __('Are you sure you want to delete # %s?', $dependantType['DependantType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Dependant Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Dependant Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
