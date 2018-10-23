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
                            <?php echo $this->Form->create('Plan', array('id' => 'Plan')); ?>
                                <div class="form-group col-sm-6">
                                    <label>Plan code<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'plan_code',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label>Title<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'plan_name',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                        </div>
                        <div class="col-lg-12">
                                <div class="form-group col-sm-6">
                                    <label>Product / Schemes<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'product_id',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'options' => $product_list
                                            )
                                        );
                                    ?>
                                </div>
                              <!--   <div class="form-group col-sm-6">
                                    <label>Cause of claim / death<span>*</span></label>
                                    <?php
                                        // echo $this->Form->input(
                                        //     'cause_of_claim',
                                        //     array(
                                        //         'class' => 'form-control',
                                        //         'label' => false,
                                        //     )
                                        // );
                                    ?>
                                </div> -->
                                <div class="form-group col-sm-6">
                                    <label>Plan type<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'cover_type_id',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'options' => $coverType_list
                                            )
                                        );
                                    ?>
                                </div>
                        </div>
                        <div class="col-lg-12">
                                <div class="form-group col-sm-12">
                                    <label>Description</label>
                                    <?php
                                        echo $this->Form->input(
                                            'description',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'textarea'
                                            )
                                        );
                                    ?>

                                </div>
                                <div class="col-sm-12 policy_type">
                                    <table>
                                        <tr>
                                            <th width="14%"><div class="main_heading">Dependents</div></th>
                                            <th><div class="main_heading">Cover benefits</div></th>
                                            <th><div class="main_heading">Sum assured</div></th>
                                            <th><div class="main_heading">Min age</div></th>
                                            <th><div class="main_heading">Max age</div></th>
                                            <th><div class="main_heading">Living allowance per month</div></th>
                                            <th><div class="main_heading">Living allowance for month</div></th>
                                            <th><div class="main_heading">Fixed premium</div></th>
                                            <th><div class="main_heading">Employer contribution %</div></th>
                                            <th><div class="main_heading">Employee contribution %</div></th>
                                            <th></th>
                                        </tr>
                                        <tr class="addonerow"  id="addnewType_0">
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'PlanDependent.0.dependent_type_id',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                            'options' => $dependent_list
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'PlanDependent.0.cover_benefits_type',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                            'options' => $cover_list
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'PlanDependent.0.sub_assured',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'PlanDependent.0.min_age',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'PlanDependent.0.max_age',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'PlanDependent.0.living_allowance_per_month',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'PlanDependent.0.living_allowance_for_month',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'PlanDependent.0.fixed_premium',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'PlanDependent.0.employer_contribution',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                        )
                                                    );
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    echo $this->Form->input(
                                                        'PlanDependent.0.employee_contribution',
                                                        array(
                                                            'class' => 'form-control',
                                                            'label' => false,
                                                        )
                                                    );

                                                ?>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-circle addtype" id="plantypebtn_0"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
								<div class="form-group col-sm-12" style="margin-top:20px;">
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
</div>
<?php echo $this->element('footer'); ?>
<?php
    $dependent_type_id = $cover_benefits_type = "";
    // generate selctbox to pass in jqury
        foreach ($dependent_list as $key => $value) {
            $dependent_type_id .= '<option value="'.$key.'">'.$value.'</option>';
        }
?>
<?php
    // generate selctbox to pass in jqury
        foreach ($cover_list as $key => $value) {
            $cover_benefits_type .= '<option value="'.$key.'">'.$value.'</option>';
        }
?>
<script>
    function removeRow(position){
        $('.del'+position).remove();
    }
    
    // add new row
    $( document ).ready(function() {
        $( "body" ).on( "click",'.addtype', function() {
            console.log($('.addonerow').last().attr('id'));
            var id = $('.addonerow').last().attr('id').split('_')[1];
          console.log(id);
            var newposition = parseInt(id) + parseInt(1);
            $(' .addonerow').last().after('<tr class="addonerow" id="del_'+newposition+'">  <td> <select name="data[PlanDependent]['+newposition+'][dependent_type_id]" class="form-control" id="PlanDependentDependentTypeId" required="required"><?php echo $dependent_type_id; ?></select></td><td> <select name="data[PlanDependent]['+newposition+'][cover_benefits_type]" class="form-control" id="PlanDependentDependentTypeId" required="required"><?php echo $cover_benefits_type; ?> </select></td><td> <div class="input text required"><input name="data[PlanDependent]['+newposition+'][sub_assured]" class="form-control" maxlength="255" type="text" id="PlanDependentSubAssured" required="required"></div></td><td> <div class="input number required"><input name="data[PlanDependent]['+newposition+'][min_age]" class="form-control" type="number" id="PlanDependentMinAge" required="required"></div></td><td> <div class="input number required"><input name="data[PlanDependent]['+newposition+'][max_age]" class="form-control" type="number" id="PlanDependentMaxAge" required="required"></div></td><td> <div class="input number required"><input name="data[PlanDependent]['+newposition+'][living_allowance_per_month]" class="form-control" type="number" id="PlanDependentLivingAllowancePerMonth" required="required"></div></td><td> <div class="input number required"><input name="data[PlanDependent]['+newposition+'][living_allowance_for_month]" class="form-control" type="number" id="PlanDependentLivingAllowanceForMonth" required="required"></div></td><td> <div class="input number required"><input name="data[PlanDependent]['+newposition+'][fixed_premium]" class="form-control" type="number" id="PlanDependentFixedPremium" required="required"></div></td><td> <div class="input number required"><input name="data[PlanDependent]['+newposition+'][employer_contribution]" class="form-control" type="number" id="PlanDependentEmployerContribution" required="required"></div></td><td> <div class="input number required"><input name="data[PlanDependent]['+newposition+'][employee_contribution]" class="form-control" type="number" id="PlanDependentEmployeeContribution" required="required"></div></td><td> <button type="button" class="btn btn-danger btn-circle removetype"><i class="fa fa-remove"></i></button></td></tr>');
        });
        
        $( "body" ).on( "click",'.removetype', function() {
            var parent = $(this).parent().parent().attr('id');
            $('#'+parent).remove();
        });
    });
</script>
<script src="../js/chosen/chosen.jquery.js"></script>
<script>
// Search client script
    $('.chosen-select').chosen({width: "100%"});
</script>