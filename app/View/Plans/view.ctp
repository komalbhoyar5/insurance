<div class="plans view">
<h2><?php echo __('Plan'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plan Code'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['plan_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plan Name'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['plan_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Id'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['product_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cause Of Claim'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['cause_of_claim']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cover Type Id'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['cover_type_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['created_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated Date'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['updated_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted By'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['deleted_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted Date'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['deleted_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted Status'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['deleted_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Id'); ?></dt>
		<dd>
			<?php echo h($plan['Plan']['company_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Plan'), array('action' => 'edit', $plan['Plan']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Plan'), array('action' => 'delete', $plan['Plan']['id']), array(), __('Are you sure you want to delete # %s?', $plan['Plan']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Plans'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plan'), array('action' => 'add')); ?> </li>
	</ul>
</div>
