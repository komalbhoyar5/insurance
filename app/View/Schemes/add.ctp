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
							<?php echo $this->Form->create('Scheme'); ?>
                            <div class="col-lg-12">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Title</label>
									<?php
										echo $this->Form->input(
                                            'title',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'text'
                                            )
                                        );
									?>
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Suffix code</label>
									<?php
										echo $this->Form->input(
                                            'suffix_code',
                                            array(
                                                'class' => 'form-control',
                                                'label' => false,
                                                'type' => 'text'
                                            )
                                        );
									?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>Scheme type</label>
	                                    <div class="row">
	                                    <?php
											echo $this->Form->radio(
	                                            'scheme_type',
	                                            array('Individual'=>'Individual', 'Group' => 'Group'),
	                                            array(
	                                                'legend' => false,
	                                                'label' => false,
	                                                'type' => 'textarea'
	                                            )
	                                        );
										?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group col-sm-12 col-md-12">
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