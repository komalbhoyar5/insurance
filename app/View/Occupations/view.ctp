<div class="occupations view">
<h2><?php echo __('Occupation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($occupation['Occupation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($occupation['Occupation']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($occupation['Occupation']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
			<?php echo h($occupation['Occupation']['created_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($occupation['Occupation']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated Date'); ?></dt>
		<dd>
			<?php echo h($occupation['Occupation']['updated_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted By'); ?></dt>
		<dd>
			<?php echo h($occupation['Occupation']['deleted_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted Date'); ?></dt>
		<dd>
			<?php echo h($occupation['Occupation']['deleted_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted Status'); ?></dt>
		<dd>
			<?php echo h($occupation['Occupation']['deleted_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Id'); ?></dt>
		<dd>
			<?php echo h($occupation['Occupation']['company_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Occupation'), array('action' => 'edit', $occupation['Occupation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Occupation'), array('action' => 'delete', $occupation['Occupation']['id']), array(), __('Are you sure you want to delete # %s?', $occupation['Occupation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Occupations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Occupation'), array('action' => 'add')); ?> </li>
	</ul>
</div>
