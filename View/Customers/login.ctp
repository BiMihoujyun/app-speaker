<div class="login-page">
    <div class="container">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a href="#login" data-toggle="tab"><i class="fa fa-sign-in"></i> Login</a></li>
            <li><a href="#register" data-toggle="tab"><i class="fa fa-pencil"></i> Register</a></li>
            <li><a href="#contact" data-toggle="tab"><i class="fa fa-envelope"></i> Reissue</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade active in" id="login">

                <?php echo $this->Session->flash('auth');?>

                <!-- Login form -->
                    <?php echo $this->Form->create('Customer', array(
                        'url' => array(
                            'controller' => 'customers',
                            'action' => 'login',
                        ),
                        'inputDefaults' => array(
                            'label' => false,
                            'div' => false,
                            'wrapInput' => 'form-group',
                        )
                    )); ?>
                    <?php echo $this->Form->input('email', array(
                        'class' => 'form-control',
                        'placeholder' => 'メールアドレス',
                    )); ?>
                    <?php echo $this->Form->input('password', array(
                        'class' => 'form-control',
                        'placeholder' => 'パスワード',
                    )); ?>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember Me Next Time
                        </label>
                    </div>
                    <?php echo $this->Form->submit('ログイン', array(
                        'class' => 'btn btn-danger btn-sm',
                        'div' => false
                    )); ?>
                    <button type="reset" class="btn btn-black btn-sm">Reset</button>

                    <?php echo $this->Form->end(); ?>


            </div>


            <div class="tab-pane fade" id="register">
                <!-- Register form -->


                <?php echo $this->Form->create('Customer', array(
                    'url' => array(
                        'controller' => 'customers',
                        'action' => 'add',
                    ),
                    'type' => 'file',
                    'inputDefaults' => array(
                        'div' => 'form-group',
                        'wrapInput' => false,
                        'label' => false,
                        'class' => 'form-control',
                    ),
                )); ?>

                <?php echo $this->Form->input('email', array(
                    'placeholder' => 'メールアドレス',
                )); ?>
                <?php echo $this->Form->input('tmp_password', array(
                    'placeholder' => 'パスワード'
                )); ?>
                <?php echo $this->Form->input('confirm_password', array(
                    'placeholder' => 'パスワード（確認）'
                )); ?>
                <?php echo $this->Form->input('role', array(
                    'placeholder' => '権限'
                ,
                    'options' => [
                        '1' => '一般',
                        '0' => '管理者',
                    ]
                )); ?>

                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Agree <a href="#">Terms & Conditions</a>
                    </label>
                </div>
                <?php echo $this->Form->submit('保存', array(
                    'class' => 'btn btn-danger btn-sm',
                    'div' => false
                )); ?>
                <button type="reset" class="btn btn-black btn-sm">Reset</button>

                <?php echo $this->Form->end(); ?>

            </div>


            <div class="tab-pane fade" id="contact">

                <!-- Contact Form -->

                <form role="form" action="index.html">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea rows="3" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                    <button type="reset" class="btn btn-black btn-sm">Reset</button>
                </form>

            </div>
        </div>

    </div>

</div>

