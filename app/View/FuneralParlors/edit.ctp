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
                            <?php echo $this->Form->create('FuneralParlor', array('id' => 'FuneralParlor')); ?>
                                <div class="form-group col-sm-12">
                                    <label>Parlor name<span>*</span></label>
                                    <?php
                                    	echo $this->Form->input('id');
                                        echo $this->Form->input(
                                            'parlor_name',
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
                                            'address',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'textarea'
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Contact number<span>*</span></label>
                                    <?php
                                        echo $this->Form->input(
                                            'contact_no',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                            )
                                        );
                                    ?>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Discount rate<span>*</span></label>
                                    <div class="input-group">
                                        <?php
	                                        echo $this->Form->input(
	                                            'discount_rate',
	                                            array(
	                                                'class' => 'form-control',
	                                                'label' => false,
	                                            )
	                                        );
	                                    ?>
                                        <span class="input-group-addon">%</span>
	                                </div>
                                </div>
								<div class="form-group col-sm-12">
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="reset" class="btn btn-primary">Reset</button>
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