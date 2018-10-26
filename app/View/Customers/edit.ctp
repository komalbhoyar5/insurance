<?php  echo $this->Html->css('../admin/css/plugins/datepicker/datepicker.css'); ?>
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
                    <div class="col-md-12">
                        <?php echo $this->Form->create('Customer', array('id' => 'Customer')); ?>
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label>Customer Type<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'customer_type',
                                            array(
                                                'label' => true,
                                                'type' => 'radio',
                                                'legend' => false,
                                                'options' => array('Individual' =>'Individual', 'Group' => 'Group'),
                                            )
                                        );
                                    ?>
                                </div>
                            </div>
                            <div class="user" id="individual" style="display:none;">
                                <div class="row">
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
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6" id="data_1">
                                        <label style="" class="font-normal">Date of birth<span>*</span></label>
                                         <?php
                                            echo $this->Form->input(
                                                'date_of_birth',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text', 
                                                    'placeholder'  => 'DD/MM/YYYY',
                                                    'id' => 'DOB'
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
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Contact person</label>
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
                                        <label>NRC / Passport number<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'nrc',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                )
                                            );
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Email</label>
                                        <?php
                                            echo $this->Form->input(
                                                'email_id',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                   
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Mobile number<span>*</span></label>
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
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label>Physical address</label>
                                        <?php
                                            echo $this->Form->input(
                                                'address1',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text'
                                                )
                                            );
                                        ?>
                                    </div>
                                     <div class="form-group col-sm-12">
                                        <label>Post address</label>
                                        <?php
                                            echo $this->Form->input(
                                                'address2',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text'
                                                )
                                            );
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Occupation</label>
                                        <?php
                                            echo $this->Form->input(
                                                'occupation_id',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'options' => $occupation_list,
                                                    'empty' => 'Select occupation'
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
                                </div>
                                <div class="row">
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <a href="<?php echo $pagetitlelink; ?>" class="btn btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
                                    </div>
                                </div>
                            </div>

                            <div class="company" id="group" style="display:none;">
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Company name<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'c_name',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Company registration no.<span>*</span></label>
                                        <?php
                                            echo $this->Form->input(
                                                'c_register_no',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                )
                                            );
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Email</label>
                                        <?php
                                            echo $this->Form->input(
                                                'email_id',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text',
                                                   
                                                )
                                            );
                                        ?>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Mobile number<span>*</span></label>
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
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label>Physical address</label>
                                        <?php
                                            echo $this->Form->input(
                                                'address1',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text'
                                                )
                                            );
                                        ?>
                                    </div>
                                     <div class="form-group col-sm-12">
                                        <label>Post address</label>
                                        <?php
                                            echo $this->Form->input(
                                                'address2',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text'
                                                )
                                            );
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Contact person</label>
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
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <a href="<?php echo $pagetitlelink; ?>" class="btn btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->element('footer'); ?>
<?php echo $this->Html->script('../admin/js/plugins/datepicker/datepicker.js'); ?>

<script>
    $('#DOB').datepicker({
        autoclose: true,  
        format: "dd/mm/yyyy"
    });  
</script>
<script>
    $( document ).ready(function() {
        if($("input[name='data[Customer][customer_type]']:checked").val() == 'Group'){
           $('#group').attr('style', 'display: block;');
           $('#individual').attr('style', 'display: none;');
           $('#individual :input').attr('disabled', true);
           $('#group :input').attr('disabled', false);
        }else{
           $('#individual').attr('style', 'display: block;');
           $('#group').attr('style', 'display: none;');
           $('#individual :input').attr('disabled', false);
           $('#group :input').attr('disabled', true);
        }

    $('input:radio[name="data[Customer][customer_type]"]').change(function(){
        if($(this).val() == 'Group'){
           $('#group').attr('style', 'display: block;');
           $('#individual').attr('style', 'display: none;');
           $('#individual :input').attr('disabled', true);
           $('#group :input').attr('disabled', false);
        }else{
           $('#individual').attr('style', 'display: block;');
           $('#group').attr('style', 'display: none;');
           $('#individual :input').attr('disabled', false);
           $('#group :input').attr('disabled', true);
        }
    });
        console.log( "ready!" );
    });
</script>

