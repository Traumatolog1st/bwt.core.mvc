<? //require_once(ROOT . '/views/Header.php'); ?>

    <div class="forms">
        <div class="container">
            <div id="signupbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Sign Up</div>
                        <div class="sing_in_block"><a id="signinlink" href="/login">Sign In</a></div>
                    </div>
                    <div class="panel-body">
                        <form method="post" id="signupform" class="form-horizontal" role="form">

                            <?php if ($data['result']): ?>
                                <p>Congratulations, you registered your account!!!</p>
                            <?php else: ?>

                                <?php if (!empty($data['errors'])): ?>
                                    <div id="signupalert" class="alert alert-danger">
                                        <p><?php echo $data['errors']; ?></p>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">* Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email" required
                                               placeholder="Email Address" value="<?php echo $data['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">* Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password"
                                               required placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">* First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname"
                                               required placeholder="First Name"
                                               value="<?php echo $data['name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">* Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name"
                                               required value="<?php echo $data['lastName']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="birtday" class="col-md-3 control-label">Birthday</label>
                                    <div id="date1" class="col-md-9">
                                        <input type="text" id="date" name="birthday" class="form-control" placeholder="00/00/0000" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="sex" class="col-md-3 control-label">Sex</label>
                                    <div class="col-md-9">
                                        <label class="radio-inline">
                                            <input type="radio" name="genderRadios" value="male"> Male
                                        </label><label class="radio-inline">
                                            <input type="radio" name="genderRadios" value="female"> Female
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <input id="btn-signup" type="submit" class="btn btn-info" name="register"
                                               value="Sign Up">
                                    </div>
                                </div>

                            <?php endif; ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<? //require_once(ROOT . '/views/Footer.php'); ?>