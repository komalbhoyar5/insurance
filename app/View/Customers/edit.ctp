<?php  echo $this->Html->css('../admin/css/plugins/datapicker/datepicker3.css'); ?>
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
                            <?php echo $this->Form->create('Customer', array('id' => 'Customer')); ?>

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
                                
                                <div class="form-group col-sm-6" id="data_1">
                                    <label style="" class="font-normal">Date of birth</label>
                                    <div class="input-group date" style="cursor: no-drop;">
                                        <span class="input-group-addon" ><i class="fa fa-calendar"></i></span>
                                         <?php
                                            echo $this->Form->input(
                                                'date_of_birth',
                                                array(
                                                    'class' => 'form-control',
                                                    'label' => false,
                                                    'type' => 'text', 
                                                    'placeholder'  => 'YYYY-MM-DD',
                                                    'readonly'
                                                    

                                                )
                                            );
                                        ?>
                                    </div>
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
                                    <label> 
                                        NRC / Passport number<span>*</span></label>
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
                                 <div class="form-group col-sm-6">
                                    <label>Email<span>*</span></label>
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
                                 <div class="form-group col-sm-12">
                                    <label>Physical Address<span>*</span></label>
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
                                    <label>Post address<span>*</span></label>
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
                                    <label>Occupation<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'occupation_id',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'options' => $occupation_list
                                            )
                                        );
                                    ?>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label>Company Name<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'company_name',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                 <div class="form-group col-sm-6">
                                    <label>Customer Type<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'customer_type',
                                            array(
                                                'label' => false,
                                                'type' => 'radio',
                                                'legend' => false,
                                                'options' => array('Individual' =>'Individual', 'Group' => 'Group')
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
<?php echo $this->Html->script('../admin/js/plugins/datapicker/bootstrap-datepicker.js'); ?>

<script>

            $('#data_1 .input-group.date').datepicker({
                format: 'yyyy-mm-dd',
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: false,
                autoclose: true,
            });
        
</script>
<script>
    $( document ).ready(function() {
        $( "body" ).on( "click",'.addtype', function() {
            var id = $('.addnewrow').last().attr('id').split('_')[1];
            var nextid = parseInt(id) + parseInt(1);
            $('.addnewrow').last().after('<tr class="addnewrow" id="remove_'+nextid+'"><td> <div class="controls input-append date form_datetime" data-date-format="dd MM yyyy" data-link-field="dtp_input1"> <input size="16" type="text" value="" class="form-control" readonly> <span class="add-on"><i class="icon-remove"></i></span> <span class="add-on"><i class="icon-th"></i></span> </div><input type="hidden" id="dtp_input1" value=""/> </td><td> <div class="controls input-append date form_datetime" data-date-format="dd MM yyyy" data-link-field="dtp_input1"> <input size="16" type="text" value="" class="form-control" readonly> <span class="add-on"><i class="icon-remove"></i></span> <span class="add-on"><i class="icon-th"></i></span> </div><input type="hidden" id="dtp_input1" value=""/> </td><td> <input type="text" class="form-control"> </td><td> <input type="text" class="form-control"> </td><td> <input type="text" class="form-control"> </td><td> <input type="text" class="form-control"> </td><td> <button type="button" class="btn btn-danger btn-circle removetype"><i class="fa fa-remove"></i></button></td></tr>');

            $('.form_date'+nextid).datetimepicker({
                language:  'fr',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0
            });
        });
        
        $( "body" ).on( "click",'.removetype', function() {
            var parent = $(this).parent().parent().attr('id');
            $('#'+parent).remove();
        });
    });
</script>