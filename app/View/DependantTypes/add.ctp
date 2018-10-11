<div class="dependantTypes form">
<?php echo $this->Form->create('DependantType'); ?>
	<fieldset>
		<legend><?php echo __('Add Dependant Type'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('min_age');
		echo $this->Form->input('max_age');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Dependant Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
