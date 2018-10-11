        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $title; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            My profile details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Employee code:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details">84811e2</div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Name:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details"><?php echo ucwords($user['User']['f_name'] . " " . $user['User']['l_name']); ?></div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Email id:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details"><?php echo $user['User']['email']; ?></div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Phone Number:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details"><?php echo $user['User']['contact_no']; ?></div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Mobile Number:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details"><?php echo $user['User']['mobile_no']; ?></div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Fax Number:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details"><?php echo $user['User']['fax_no']; ?></div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Other Number:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details"><?php echo $user['User']['other_no']; ?></div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Address:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details"><?php echo $user['User']['address1'] . ' '. $user['User']['address2']; ?></div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>City:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details"><?php echo $user['User']['country']; ?></div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>City:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details"><?php echo $user['User']['city']; ?></div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                                <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Commission:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details">Rs 1000</div>
                                        </div>
                                    </div>  
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Security deposit:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details">Rs 500</div>
                                        </div>
                                    </div>  
                                </div>

                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Credit Limit:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details">Rs 10,000</div>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Credit Period:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="details">230 days</div>
                                        </div>
                                    </div>  
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
