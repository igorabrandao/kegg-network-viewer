    <?php

        // Check if the action was informed
        if ( isset($_GET['action']) && strcmp($_GET['action'], "logout") == 0 )
        {
            $modelo->logout();
        }
        else
        {
            // Check if exist an active session
            if ( !isset($_COOKIE[SESSION_COOKIE]) )
            {
                $modelo->check_userlogin();
            }
            else
            {
                // Redirection
                $login_uri  = HOME_URI . '/modulo_admin/home_admin';
                echo '<meta http-equiv="Refresh" content="0; url=' . $login_uri . '">';
                echo '<script type="text/javascript">window.location.href = "' . $login_uri . '";</script>';
                // header('location: ' . $login_uri);
            }
        }

    ?>

    <body class="login-page">
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);">Weblog_<b>Interativa</b></a>
                <small>Dsenvolvido por Igor Brandão</small>
            </div>
            <div class="card">
                <div class="body">
                    <form id="sign_in" method="POST" action="#">
                        <div class="msg">Acesso de usuário: <strong>interativa / K5uGP8m</strong></div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Nome de usuário" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Senha" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                                <label for="rememberme">Lembrar-me</label>
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-pink waves-effect" type="submit">ENTRAR!</button>
                            </div>
                        </div>
                        <?php if ( isset($modelo->login_error) ) { ?>
                            <div class="row">
                                <div class="alert alert-danger alert-dismissible">
                                    <strong>Ops: </strong><?php echo $modelo->login_error; ?>
                                </div>
                            </div>
                        <?php } ?>
                        <!--<div class="row m-t-15 m-b--20">
                            <div class="col-xs-6">
                                <a href="sign-up.html">Register Now!</a>
                            </div>
                            <div class="col-xs-6 align-right">
                                <a href="forgot-password.html">Forgot Password?</a>
                            </div>
                        </div>-->
                        <input type="hidden" name="userdata" value="1"></input>
                    </form>
                </div>
            </div>
        </div>

        <!-- Jquery Core Js -->
        <script src="<?php echo HOME_URI;?>/assets/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="<?php echo HOME_URI;?>/assets/plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="<?php echo HOME_URI;?>/assets/plugins/node-waves/waves.js"></script>

        <!-- Validation Plugin Js -->
        <script src="<?php echo HOME_URI;?>/assets/plugins/jquery-validation/jquery.validate.js"></script>

        <!-- Custom Js -->
        <script src="<?php echo HOME_URI;?>/assets/js/admin.js"></script>
        <script src="<?php echo HOME_URI;?>/assets/js/pages/examples/sign-in.js"></script>
    </body>

</html>