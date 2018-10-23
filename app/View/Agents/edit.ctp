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
                            <?php echo $this->Form->create('Agent', array('id' => 'Agent')); ?>
                                                                <div class="form-group col-sm-6">
                                    <label>Agent code<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'agent_code',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>First name<span>*</span></label>
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
                                 <div class="form-group col-sm-6 controls input-append date form_datetime">
                                    <label>Last name<span>*</span></label>
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
                                 <div class="form-group col-sm-6 ">

                                    <label>Date of birth<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'date_of_birth',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Gender<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'gender',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'options' => array('Male'=>'Male', 'female' => 'female')
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Agent type<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'agenttype_id',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'options' => array('Agent'=>'Agent', 'Partner' => 'Partner','Regional_manager'=>'Regional manager')
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Parent agent<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'parent_agent_id',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'options' => array('Agent'=>'Agent', 'Partner' => 'Partner','Regional_manager'=>'Regional manager')
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Contact person<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'contact_person',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Agent NRC<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'NRC',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Email<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'email_id',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
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
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Fax Number<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'fax_no',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Other Number<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'other_no',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-12">
                                    <label>Address<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'address1',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-12">
                                    <label>Address 2<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'address2',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
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
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Country<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'country',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Zip code<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'zip_code',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Appointment date<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'appointment_date',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Security deposit<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'security_deposite',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Credit Limit<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'credit_limit',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Credit Period<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'credit_period',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
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
								<div class="form-group col-sm-12">
									<a href="<?php echo $pagetitlelink; ?>" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-success" name="submit" value="add_cont">Save and continue</button>
                                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
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
</div>
<?php echo $this->element('footer'); ?>

