<div class="coverTypes view">
<h2><?php echo __('Cover Type'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coverType['CoverType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($coverType['CoverType']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desc'); ?></dt>
		<dd>
			<?php echo h($coverType['CoverType']['desc']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cover Type'), array('action' => 'edit', $coverType['CoverType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cover Type'), array('action' => 'delete', $coverType['CoverType']['id']), array(), __('Are you sure you want to delete # %s?', $coverType['CoverType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cover Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cover Type'), array('action' => 'add')); ?> </li>
	</ul>
</div>
