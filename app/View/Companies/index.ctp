	<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Company details</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update company details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
						<div class="row">
                            <div class="col-lg-12">
                                <?php echo $this->Form->create('Company', array('id' => 'profile', 'class' => 'form-box')); ?>
									<div class="form-group col-sm-6">
                                        <label>Company name<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'Company.company_name',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Email id<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'Company.email_id',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'email',
                                                    'required' => true,
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Phone Number<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'Company.phone_no',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Mobile Number<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'Company.mobile_no',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group  col-sm-12">
                                        <label>Address<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'Company.address1',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group  col-sm-12">
                                        <?php
                                            echo $this->Form->input(
                                                'Company.address2',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Fax Number<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'Company.fax_no',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>City<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'Company.city',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Pincode<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'Company.pincode',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                )
                                            );
                                        ?>
                                    </div>
									<div class="form-group col-sm-12">
										<button type="submit" class="btn btn-primary">Submit</button>
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
