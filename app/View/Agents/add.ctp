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
                                    <label>Date of birth<span>*</span></label>
                                     <?php
                                        echo $this->Form->input(
                                            'date_of_birth',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'text', 
                                                'placeholder'  => 'DD-MM-YYYY',
                                                'id' => 'DOB',
                                                'readonly' => true

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
                                                'options' => $agentType_list
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
                                                'type'  => 'text'
                        
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
                                                'type'  => 'email'
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
                                                'type' => 'text'
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-12">
                                    <!-- <label>Address 2<span>*</span></label> -->
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
                                    <label>Appointment Date<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'appointment_date',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'text', 
                                                'placeholder'  => 'DD-MM-YYYY',
                                                'readonly' => true,
                                                'id' => 'appo_date'

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
                                    <label>Commission details</label>
                                    <table class="client_add_table">
                                        <tr>
                                            <!-- <th width="20%"><div class="main_heading">Product / schemes</div></th> -->
                                            <th><div class="main_heading">Effective from date</div></th>
                                            <th><div class="main_heading">Effective to date</div></th>
                                            <!-- <th><div class="main_heading">Number of installments</div></th> -->
                                            <th><div class="main_heading">Commission rate</div></th>
                                            <th><div class="main_heading">Tax on commission</div></th>
                                            <th><div class="main_heading">Commission from month</div></th>
                                            <th><div class="main_heading">Commission to month</div></th>
                                            <th></th>
                                        </tr>
                                        <tr class="addnewrow" id="remove_1">
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'AgentCommission.effective_from_date',
                                                        array(
                                                            'class' => 'form-control eff_com_date',
                                                            'label' => false,
                                                            'type' => 'text', 
                                                            'placeholder'  => 'DD-MM-YYYY',
                                                            'readonly' => true,
                                                            'div' => false
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'AgentCommission.effective_to_date',
                                                        array(
                                                            'class' => 'form-control eff_com_date',
                                                            'label' => false,
                                                            'type' => 'text', 
                                                            'placeholder'  => 'DD-MM-YYYY',
                                                            'readonly' => true,
                                                            'div' => false
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'AgentCommission.commission_rate',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                            'type' => 'text', 
                                                            'div' => false
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'AgentCommission.tax_on_commission',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                            'type' => 'text', 
                                                            'div' => false
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'AgentCommission.commision_from_month',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                            'type' => 'text', 
                                                            'div' => false
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'AgentCommission.commission_to_month',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                            'type' => 'text', 
                                                            'div' => false
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-circle addtype" id=""><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
								<div class="form-group col-sm-12"><br>
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
<?php echo $this->element('footer'); ?>
<?php echo $this->Html->script('../admin/js/plugins/datepicker/datepicker.js'); ?>
<script type="text/javascript">
    $('#DOB').datepicker({
        autoclose: true,  
        format: "dd/mm/yyyy"
    }); 
    $('#appo_date').datepicker({
        autoclose: true,  
        format: "dd/mm/yyyy"
    }); 

    $('.eff_com_date').datepicker({
        autoclose: true,  
        format: "dd/mm/yyyy"
    }); 
</script>   
<script>
    $( document ).ready(function() {
        $( "body" ).on( "click",'.addtype', function() {
            var id = $('.addnewrow').last().attr('id').split('_')[1];
            var nextid = parseInt(id) + parseInt(1);
            $('.addnewrow').last().after('<td> <input name="data[AgentCommission][effective_from_date]" class="form-control new_eff_com_date" placeholder="DD-MM-YYYY" readonly="readonly" type="text" id="AgentCommissionEffectiveFromDate"> </td><td> <input name="data[AgentCommission][effective_to_date]" class="form-control new_eff_com_date" placeholder="DD-MM-YYYY" readonly="readonly" type="text" id="AgentCommissionEffectiveToDate"> </td><td> <input name="data[AgentCommission][commission_rate]" class="form-control" type="text" id="AgentCommissionCommissionRate"> </td><td> <input name="data[AgentCommission][tax_on_commission]" class="form-control" type="text" id="AgentCommissionTaxOnCommission"> </td><td> <input name="data[AgentCommission][commision_from_month]" class="form-control" type="text" id="AgentCommissionCommisionFromMonth"> </td><td> <input name="data[AgentCommission][commission_to_month]" class="form-control" type="text" id="AgentCommissionCommissionToMonth"> </td><td> <button type="button" class="btn btn-info btn-circle addtype" id=""><i class="fa fa-plus"></i></button> </td>');

             $('.new_eff_com_date').datepicker({
                autoclose: true,  
                format: "dd/mm/yyyy"
            }); 
        });
        
        $( "body" ).on( "click",'.removetype', function() {
            var parent = $(this).parent().parent().attr('id');
            $('#'+parent).remove();
        });
    });
</script>