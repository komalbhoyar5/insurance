<div class="coverBenefits view">
<h2><?php echo __('Cover Benefit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coverBenefit['CoverBenefit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($coverBenefit['CoverBenefit']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($coverBenefit['CoverBenefit']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
			<?php echo h($coverBenefit['CoverBenefit']['created_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($coverBenefit['CoverBenefit']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated Date'); ?></dt>
		<dd>
			<?php echo h($coverBenefit['CoverBenefit']['updated_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($coverBenefit['CoverBenefit']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted Date'); ?></dt>
		<dd>
			<?php echo h($coverBenefit['CoverBenefit']['deleted_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted By'); ?></dt>
		<dd>
			<?php echo h($coverBenefit['CoverBenefit']['deleted_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted Status'); ?></dt>
		<dd>
			<?php echo h($coverBenefit['CoverBenefit']['deleted_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Id'); ?></dt>
		<dd>
			<?php echo h($coverBenefit['CoverBenefit']['company_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cover Benefit'), array('action' => 'edit', $coverBenefit['CoverBenefit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cover Benefit'), array('action' => 'delete', $coverBenefit['CoverBenefit']['id']), array(), __('Are you sure you want to delete # %s?', $coverBenefit['CoverBenefit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Cover Benefits'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cover Benefit'), array('action' => 'add')); ?> </li>
	</ul>
</div>
