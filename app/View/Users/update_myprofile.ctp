
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
                            Update my profile
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<div class="row">
                                <div class="col-lg-12">
                                    <?php echo $this->Form->create('User', array('id' => 'profile')); ?>
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
                                        <div class="form-group col-sm-6">
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
                                        <div class="form-group col-sm-6">
                                            <label>Email id<span>*</span></label>
                                            <?php
                                                echo $this->Form->input(
                                                    'email',
                                                    array(
                                                        'class' => 'form-control',
                                                        'label' => false,
                                                        'disabled' => 'disabled'
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Phone Number</label>
                                            <?php
                                                echo $this->Form->input(
                                                    'contact_no',
                                                    array(
                                                        'class' => 'form-control',
                                                        'label' => false
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
                                                        'label' => false
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Fax Number</label>
                                            <?php
                                                echo $this->Form->input(
                                                    'fax_no',
                                                    array(
                                                        'class' => 'form-control',
                                                        'label' => false
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
                                                        'label' => false
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
                                                        'label' => false
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Country</label>
                                            <?php
                                                echo $this->Form->input(
                                                    'country',
                                                    array(
                                                        'class' => 'form-control',
                                                        'label' => false,
                                                        'id' => 'country',
                                                        'options' => $countries,
                                                        'empty'=> 'Select country'
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>State</label>
                                            <?php
                                                echo $this->Form->input(
                                                    'state',
                                                    array(
                                                        'class' => 'form-control',
                                                        'label' => false,
                                                        'id' => 'state',
                                                        'options' => isset($states) ? $states : '',
                                                        'empty'=> 'Select state'
                                                    )
                                                );
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>City</label>
                                            <?php
                                                echo $this->Form->input(
                                                    'city',
                                                    array(
                                                        'class' => 'form-control',
                                                        'label' => false,
                                                        'id' => 'city',
                                                        // 'options' => isset($city) ? $city : '',
                                                        // 'empty'=> 'Select city'
                                                    )
                                                );
                                            ?>
                                        </div>
										<div class="form-group col-sm-12">
											<button type="submit" class="btn btn-primary">Update</button>
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
            <!-- /#page-wrapper -->
<?php echo $this->element('footer'); ?>
<script>
    $('#country').change(function() {
        country_id = $('#country').val();
        formData = {
            'country_id' : country_id
        };
        url = '<?php echo Router::url(array('controller'=>'users','action'=>'getstate'));?>',
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            dataType: 'HTML',
            beforeSend: function() {
                
            },
            success: function (resp) {
                if (resp != '_ERROR') {
                    $('#state').html(resp);
                }else{
                }

            }
        });
    });
</script>
<script>
    $('#state').change(function() {
        country_id = $('#country').val();
        state_id = $('#state').val();
        formData = {
            'country_id' : country_id,  
            'state_id' : state_id
        };
        url = '<?php echo Router::url(array('controller'=>'users','action'=>'getcity'));?>',
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            async: true,
            cache: false,
            dataType: 'HTML',
            beforeSend: function() {
                
            },
            success: function (resp) {
                if (resp != '_ERROR') {
                    $('#city').html(resp);
                    console.log(resp);
                    
                }else{
                }

            }
        });
    });
</script>