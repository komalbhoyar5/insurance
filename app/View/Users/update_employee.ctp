    <?php  echo $this->Html->css('../admin/css/plugins/chosen/bootstrap-chosen.css'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><a href="<?php echo $pagetitlelink; ?>">Employee</a></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Employee
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
					<div class="row">
                        <div class="col-lg-12">
                            <?php echo $this->Form->create('User', array('id' => 'employee')); ?>
                                <div class="form-group col-sm-6">
                                    <label>Employee Code</label>
                                    <?php
                                        echo $this->Form->input(
                                            'code',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
								<div class="form-group col-sm-6">
                                    <label>First name</label>
                                    <?php
                                        echo $this->Form->input(
                                            'f_name',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Last name</label>
                                    <?php
                                        echo $this->Form->input(
                                            'l_name',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Contact Number</label>
                                    <?php
                                        echo $this->Form->input(
                                            'contact_no',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
								<div class="form-group  col-sm-12">
                                    <label>Address</label>
                                    <?php
                                        echo $this->Form->input(
                                            'address1',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'textarea'
                                            )
                                        );
                                    ?>
								</div>
                                <div class="form-group col-sm-6">
                                    <label>Role</label>
                                    <?php
                                        echo $this->Form->input(
                                            'group_id',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'options' => $groups
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Status</label>
                                    <?php
                                        echo $this->Form->input(
                                            'status',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'options' => array('Active'=>'Active', 'Inactive' => 'Inactive')
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Username</label>
                                    <?php
                                        echo $this->Form->input(
                                            'email',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'email'
                                            )
                                        );
                                    ?>
                                </div>
								<div class="form-group col-sm-6">
                                    <label>Password</label>
                                    <?php
                                        echo $this->Form->input(
                                            'password',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'password',
                                                'required' => false,
                                                'value' => ''
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