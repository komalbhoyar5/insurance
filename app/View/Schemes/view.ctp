<div class="schemes view">
<h2><?php echo __('Scheme'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($scheme['Scheme']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($scheme['Scheme']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suffix Code'); ?></dt>
		<dd>
			<?php echo h($scheme['Scheme']['suffix_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Scheme Type'); ?></dt>
		<dd>
			<?php echo h($scheme['Scheme']['scheme_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($scheme['Scheme']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Scheme'), array('action' => 'edit', $scheme['Scheme']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Scheme'), array('action' => 'delete', $scheme['Scheme']['id']), array(), __('Are you sure you want to delete # %s?', $scheme['Scheme']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Schemes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Scheme'), array('action' => 'add')); ?> </li>
	</ul>
</div>
