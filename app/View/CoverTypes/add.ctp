<div class="coverTypes form">
<?php echo $this->Form->create('CoverType'); ?>
	<fieldset>
		<legend><?php echo __('Add Cover Type'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('desc');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Cover Types'), array('action' => 'index')); ?></li>
	</ul>
</div>
