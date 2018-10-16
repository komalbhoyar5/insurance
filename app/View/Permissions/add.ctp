    <?php  echo $this->Html->css('../admin/css/plugins/chosen/bootstrap-chosen.css'); ?>
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
                                                'class' => 'chosen-select form-control',
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
<?php echo $this->Html->script('../admin/js/plugins/chosen/chosen.jquery.js'); ?>
<script>
// Search client script
    $('.chosen-select').chosen({width: "100%"});
</script>

