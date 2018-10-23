<div class="customers view">
<h2><?php echo __('Customer'); ?></h2>
	<dl>
		<dt><?php echo __('Occupation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($customer['occupation']['title'], array('controller' => 'occupations', 'action' => 'view', $customer['occupation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('F Name'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['f_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('L Name'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['l_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact Person'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['contact_person']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nrc'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['nrc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile No'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['mobile_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Id'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['email_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customer Type'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['customer_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Name'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['company_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['created_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated Date'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['updated_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted By'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['deleted_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted Date'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['deleted_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted Status'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['deleted_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Id'); ?></dt>
		<dd>
			<?php echo h($customer['Customer']['company_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Customer'), array('action' => 'edit', $customer['Customer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Customer'), array('action' => 'delete', $customer['Customer']['id']), array(), __('Are you sure you want to delete # %s?', $customer['Customer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Occupations'), array('controller' => 'occupations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Occupation'), array('controller' => 'occupations', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Occupations'); ?></h3>
	<?php if (!empty($customer['occupation'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $customer['occupation']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
	<?php echo $customer['occupation']['title']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
	<?php echo $customer['occupation']['created_by']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
	<?php echo $customer['occupation']['created_date']; ?>
&nbsp;</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
	<?php echo $customer['occupation']['updated_by']; ?>
&nbsp;</dd>
		<dt><?php echo __('Updated Date'); ?></dt>
		<dd>
	<?php echo $customer['occupation']['updated_date']; ?>
&nbsp;</dd>
		<dt><?php echo __('Deleted By'); ?></dt>
		<dd>
	<?php echo $customer['occupation']['deleted_by']; ?>
&nbsp;</dd>
		<dt><?php echo __('Deleted Date'); ?></dt>
		<dd>
	<?php echo $customer['occupation']['deleted_date']; ?>
&nbsp;</dd>
		<dt><?php echo __('Deleted Status'); ?></dt>
		<dd>
	<?php echo $customer['occupation']['deleted_status']; ?>
&nbsp;</dd>
		<dt><?php echo __('Company Id'); ?></dt>
		<dd>
	<?php echo $customer['occupation']['company_id']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Occupation'), array('controller' => 'occupations', 'action' => 'edit', $customer['occupation']['id'])); ?></li>
			</ul>
		</div>
	</div>
	