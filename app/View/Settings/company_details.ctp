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
                                <?php echo $this->Form->create('Setting', array('id' => 'profile', 'class' => 'form-box')); ?>
									<div class="form-group col-sm-6">
                                        <label>Company name<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'company_name',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                    'value' => isset($addr_details['company_name']) ? $addr_details['company_name'] : '',
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Email id<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'email',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'email',
                                                    'required' => true,
                                                    'value' => isset($addr_details['email']) ? $addr_details['email'] : '',
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Phone Number<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'phone_no',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                    'value' => isset($addr_details['phone_no']) ? $addr_details['phone_no'] : '',
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Mobile Number<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'mobile_no',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                    'value' => isset($addr_details['mobile_no']) ? $addr_details['mobile_no'] : '',
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group  col-sm-12">
                                        <label>Address<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'address1',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                    'value' => isset($addr_details['address1']) ? $addr_details['address1'] : '',
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group  col-sm-12">
                                        <?php
                                            echo $this->Form->input(
                                                'address2',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                    'value' => isset($addr_details['address2']) ? $addr_details['address2'] : '',
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Fax Number<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'fax',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                    'value' => isset($addr_details['fax']) ? $addr_details['fax'] : '',
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>City<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'city',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                    'value' => isset($addr_details['city']) ? $addr_details['city'] : '',
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Pincode<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'pincode',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                    'required' => true,
                                                    'value' => isset($addr_details['pincode']) ? $addr_details['pincode'] : '',
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
