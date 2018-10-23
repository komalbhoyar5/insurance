<div class="agents view">
<h2><?php echo __('Agent'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Agent Code'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['agent_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('F Name'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['f_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('L Name'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['l_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Of Birth'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['date_of_birth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['gender']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Agenttype Id'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['agenttype_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Agent Id'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['parent_agent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact Person'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['contact_person']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('NRC'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['NRC']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email Id'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['email_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone No'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['phone_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile No'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['mobile_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fax No'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['fax_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Other No'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['other_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zip Code'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['zip_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Appointment Date'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['appointment_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Security Deposite'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['security_deposite']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Credit Limit'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['credit_limit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Credit Period'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['credit_period']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created By'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['created_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created Date'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['created_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated Date'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['updated_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted By'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['deleted_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted Date'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['deleted_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted Status'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['deleted_status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company Id'); ?></dt>
		<dd>
			<?php echo h($agent['Agent']['company_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Agent'), array('action' => 'edit', $agent['Agent']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Agent'), array('action' => 'delete', $agent['Agent']['id']), array(), __('Are you sure you want to delete # %s?', $agent['Agent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Agents'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Agent'), array('action' => 'add')); ?> </li>
	</ul>
</div>
