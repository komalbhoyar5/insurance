<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><a href="<?php echo $pagetitlelink; ?>"><?php echo $parenttitle; ?></a></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $title; ?>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					<div class="row">
                        <div class="col-lg-12">
                            <?php echo $this->Form->create('DependentType', array('id' => 'DependentType')); ?>
                                <div class="form-group col-sm-12">
                                    <label>Title<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'title',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Mininum age in year</label>
                                    <?php
                                        echo $this->Form->input(
                                            'min_age',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'required' => false,
                                                'type' => "numeric"
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Maximum age in year</label>
                                    <?php
                                        echo $this->Form->input(
                                            'max_age',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'required' => false,
                                                'type' => "numeric"
                                            )
                                        );
                                    ?>
                                </div>
								<div class="form-group col-sm-12">
									<a href="<?php echo $pagetitlelink; ?>" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success" name="submit" value="add_cont">Save and continue</button>
                                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
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
