    <?php  echo $this->Html->css('../admin/css/plugins/chosen/bootstrap-chosen.css'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Role permission</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add role permission
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					<div class="row">
                        <div class="col-lg-12">
                            <?php echo $this->Form->create('Permission', array('id' => 'employee')); ?>
                                <div class="form-group col-sm-6">
                                    <label>Page name<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'page_name',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Page action<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'page_action',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Parent module<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'parent_id',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'empty' => 'Choose parent module'
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Role<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'Group',
                                            array(
                                                'class' => 'chosen-select form-control',
                                                'label' => false,
                                                'multiple' => 'multiple'
                                            )
                                        );
                                    ?>
                                </div>
								<div class="form-group col-sm-12">
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="reset" class="btn btn-primary">Reset</button>
								</div>
                            </form>
                        </div>
                        <!-- /.col-lg-12 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
</div>
<?php echo $this->element('footer'); ?>
<?php echo $this->Html->script('../admin/js/plugins/chosen/chosen.jquery.js'); ?>
<script>
// Search client script
    $('.chosen-select').chosen({width: "100%"});
</script>
<div class="permissions form">
<?php echo $this->Form->create('Permission'); ?>
	<fieldset>
		<legend><?php echo __('Add Permission'); ?></legend>
	<?php
		echo $this->Form->input('page_name');
		echo $this->Form->input('page_action');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('Group');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Permissions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
