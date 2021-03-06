<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Role</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update Role
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					<div class="row">
                        <div class="col-lg-12">
                            <?php echo $this->Form->create('User', array('id' => 'role')); ?>
								<div class="form-group col-sm-12">
                                    <label>Role name<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'Group.name',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
								<div class="form-group col-sm-12">
                                    <label>Description</label>
                                    <?php
                                        echo $this->Form->input(
                                            'Group.desc',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'textarea'
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Is employee</label>
                                    <?php
                                        echo $this->Form->input(
                                            'Group.is_employee',
                                            array(
                                                'label' => false,
                                                'type' => 'radio',
                                                'legend' => false,
                                                'required' => true,
                                                'options' => array('Yes' =>'Yes', 'No' => 'No')
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-12">
                                    <a href="<?php echo $pagetitlelink; ?>" class="btn btn-danger">Cancel</a>
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
<!-- /#page-wrapper -->

</div>
<?php echo $this->element('footer'); ?>
