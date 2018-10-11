<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">My profile</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Change password
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php echo $this->Form->create('User', array( 'action' => "change_password", 'class'=>"form-box")); ?>
                                <div class="form-group col-sm-12">
                                    <label>Password</label>
                                    <?php
                                        echo $this->Form->input(
                                            'password',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'placeholder' => "New Password"
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Confirm password</label>
                                    <?php
                                        echo $this->Form->input(
                                            'confirm_password',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'password',
                                                'placeholder' => "Confirm Password"
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-12">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-primary">Reset</button>
                                </div>
                            <?php echo $this->Form->end(); ?>
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
<?php echo $this->element('footer'); ?>
