<? require_once(ROOT . '/views/Header.php'); ?>

    <div id="feedback">
        <div class="container">
            <div id="feedbackbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">Feedback</div>
                    </div>
                    <div class="panel-body">


                        <form id="feedbackform" class="form-horizontal" role="form" method="post">


                            <?php if ($data['result']): ?>
                                <p>Thank you for your feedback!!!</p>
                            <?php else: ?>

                                <?php if (!empty($data['errors'])): ?>
                                    <div id="signupalert" class="alert alert-danger">
                                        <p><?php echo $data['errors']; ?></p>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="email"
                                               placeholder="Email Address"
                                               required value="<?php echo $data['email']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-md-3 control-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" placeholder="Name"
                                               required value="<?php echo $data['name']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message" class="col-md-3 control-label">Message</label>
                                    <div class="col-md-9">
                                    <textarea name="message" class="form-control" cols="50" rows="5" required
                                              placeholder="Message"><?php echo $data['message']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="recaptcha col-md-offset-3 col-md-9">
                                        <div class="g-recaptcha"
                                             data-sitekey="6Le6_CUUAAAAAJXHKZ_BDDirobbmSgsnrgW38eLz"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-3 col-md-9">
                                        <input id="btn-submit" type="submit" class="btn btn-info" name="Send"
                                               value="Send">
                                    </div>
                                </div>

                            <?php endif; ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<? require_once(ROOT . '/views/Footer.php'); ?>