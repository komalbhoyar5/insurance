<div class="funeralParlors view">
<h2><?php echo __('Funeral Parlor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($funeralParlor['FuneralParlor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parlor Name'); ?></dt>
		<dd>
			<?php echo h($funeralParlor['FuneralParlor']['parlor_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($funeralParlor['FuneralParlor']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contact No'); ?></dt>
		<dd>
			<?php echo h($funeralParlor['FuneralParlor']['contact_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount Rate'); ?></dt>
		<dd>
			<?php echo h($funeralParlor['FuneralParlor']['discount_rate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Funeral Parlor'), array('action' => 'edit', $funeralParlor['FuneralParlor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Funeral Parlor'), array('action' => 'delete', $funeralParlor['FuneralParlor']['id']), array(), __('Are you sure you want to delete # %s?', $funeralParlor['FuneralParlor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Funeral Parlors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Funeral Parlor'), array('action' => 'add')); ?> </li>
	</ul>
</div>
