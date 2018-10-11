<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default login-window">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <?php echo $this->Form->create('User', array('id' => 'login-box', 'class' => 'form-box')); ?>
                        <fieldset>
                            <div class="form-group">
                                <?php
                                    echo $this->Form->input(
                                        'f_name',
                                        array(
                                            'class' => 'form-control',
                                            'placeholder' => 'First name',
                                            'label' => ''
                                        )
                                    );
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                    echo $this->Form->input(
                                        'l_name',
                                        array(
                                            'class' => 'form-control',
                                            'placeholder' => 'Last name',
                                            'label' => ''
                                        )
                                    );
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                    echo $this->Form->input(
                                        'email',
                                        array(
                                            'class' => 'form-control',
                                            'placeholder' => 'Email id',
                                            'label' => ''
                                        )
                                    );
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                    echo $this->Form->input(
                                        'password',
                                        array(
                                            'class' => 'form-control',
                                            'placeholder' => 'Password',
                                            'label' => '',
                                            'type' => 'password'
                                        )
                                    );
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                    echo $this->Form->input(
                                        'confirm_password',
                                        array(
                                            'class' => 'form-control',
                                            'placeholder' => 'Confirm password',
                                            'label' => '',
                                            'type' => 'password'
                                        )
                                    );
                                ?>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                        </fieldset>
                    <?php
                        echo $this->Form->end(
                            array(
                                'label' => 'Login',
                                'class' => 'btn btn-lg btn-success btn-block'
                            )
                        );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

