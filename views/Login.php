    <div class="forms">
        <div class="container">
            <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">

                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                    </div>

                    <div class="panel-body">
                        <?php if (\models\User::isGuest()): ?>

                            <?php if (!empty($data['errors'])): ?>
                                <div id="login-alert" class="alert alert-danger col-sm-12">
                                    <p><?php echo $data['errors']; ?></p>
                                </div>
                            <?php endif; ?>

                            <form method="post" id="loginform" class="form-horizontal" role="form">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="email" class="form-control" name="username"
                                           required placeholder="email" value="<?php echo $data['userLogin']; ?>">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control" name="password"
                                           required placeholder="password">
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12 controls">
                                        <input id="btn-login" type="submit" class="btn btn-success" name="login"
                                               value="Login">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div>
                                            Don't have an account!
                                            <a href="/"">
                                            Sign Up Here
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php else: ?>
                            You are authorized as <u><?php echo $_SESSION['userName'] ?></u>.
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>