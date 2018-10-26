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
                                    <label>Date of birth</label>
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
                                    <label>Parent agent</label>
                                    <?php
                                        echo $this->Form->input(
                                            'parent_agent_id',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'empty' => 'Please select parent agent',
                                                'options' => $agents
                        
                                            )
                                        );
                                    ?>
                                </div>
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
                                    <label>Agent NRC</label>
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
                                    <label>Email</label>
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
                                    <label>Phone number</label>
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
                                 <div class="form-group col-sm-6">
                                    <label>Fax number</label>
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
                                    <label>Other number</label>
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
                                    <label>Address</label>
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
                                    <label>City</label>
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
                                    <label>Country</label>
                                    <?php
                                        echo $this->Form->input(
                                            'country',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'options' => $countries,
                                                'empty'=> 'Select country'
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Zip code</label>
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
                                    <label>Appointment date</label>
                                    <?php
                                        echo $this->Form->input(
                                            'appointment_date',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'text', 
                                                'placeholder'  => 'DD/MM/YYYY',
                                                'id' => 'appo_date'

                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Security deposit</label>
                                    <?php
                                        echo $this->Form->input(
                                            'security_deposite',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'number',
                                                'step' => '.01'
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Credit Limit</label>
                                    <?php
                                        echo $this->Form->input(
                                            'credit_limit',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'number',
                                                'step' => '.01'
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Credit period</label>
                                    <?php
                                        echo $this->Form->input(
                                            'credit_period',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'number',
                                                'step' => '.01'
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
                                            <th><div class="main_heading">Effective from date<span>*</span></div></th>
                                            <th><div class="main_heading">Effective to date<span>*</span></div></th>
                                            <!-- <th><div class="main_heading">Number of installments</div></th> -->
                                            <th><div class="main_heading">Commission rate</div></th>
                                            <th><div class="main_heading">Tax on commission</div></th>
                                            <th><div class="main_heading">Commission from month<span>*</span></div></th>
                                            <th><div class="main_heading">Commission to month<span>*</span></div></th>
                                            <th></th>
                                        </tr>
                                        <tr class="addnewrow" id="remove_0">
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'AgentCommission.0.effective_from_date',
                                                        array(
                                                            'class' => 'form-control eff_com_date',
                                                            'label' => false,
                                                            'type' => 'text', 
                                                            'placeholder'  => 'DD/MM/YYYY',
                                                            'div' => false
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'AgentCommission.0.effective_to_date',
                                                        array(
                                                            'class' => 'form-control eff_com_date',
                                                            'label' => false,
                                                            'type' => 'text', 
                                                            'placeholder'  => 'DD/MM/YYYY',
                                                            'div' => false
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'AgentCommission.0.commission_rate',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                            'type' => 'text', 
                                                            'div' => false,
                                                            'type' => 'number',
                                                            'step' => '.01',
                                                            'min' => '0',
                                                            'max' => '100'
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'AgentCommission.0.tax_on_commission',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                            'type' => 'text', 
                                                            'div' => false,
                                                            'type' => 'number',
                                                            'step' => '.01'
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'AgentCommission.0.commision_from_month',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                            'type' => 'text', 
                                                            'div' => false,
                                                            'type' => 'number'
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'AgentCommission.0.commission_to_month',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                            'type' => 'text', 
                                                            'div' => false,
                                                            'type' => 'number'
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
            var newposition = parseInt(id) + parseInt(1);
            $('.addnewrow').last().after('<tr class="addnewrow" id="del_'+newposition+'"> <td> <input name="data[AgentCommission]['+newposition+'][effective_from_date]" class="form-control new_eff_com_date" placeholder="DD/MM/YYYY" type="text" required id="AgentCommissionEffectiveFromDate"> </td><td> <input name="data[AgentCommission]['+newposition+'][effective_to_date]" class="form-control new_eff_com_date" placeholder="DD/MM/YYYY" type="text" required id="AgentCommissionEffectiveToDate"> </td><td> <input name="data[AgentCommission]['+newposition+'][commission_rate]" class="form-control" type="number" step=".01" min="0" max="99" id="AgentCommissionCommissionRate"> </td><td> <input name="data[AgentCommission]['+newposition+'][tax_on_commission]" class="form-control" type="number" step=".01" id="AgentCommissionTaxOnCommission"> </td><td> <input name="data[AgentCommission]['+newposition+'][commision_from_month]" class="form-control" type="number" required id="AgentCommissionCommisionFromMonth"> </td><td> <input name="data[AgentCommission]['+newposition+'][commission_to_month]" class="form-control" type="number" required id="AgentCommissionCommissionToMonth"> </td><td> <button type="button" class="btn btn-danger btn-circle removetype"><i class="fa fa-remove"></i></button> </td></tr>');

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