    <div id="feedbacklist">
        <div class="container">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">Feedback List</div>
                </div>
                <ul class="list-group panel-body">

                    <?php foreach ($data as $feedbackItem) : ?>

                        <li class="feedback-block list-group-item">
                            <div class="entry-header">
                                <div class="name col-md-6">
                                    <div class="row">
                                        <p><strong> <?php echo $feedbackItem['name']; ?> </strong></p>
                                    </div>
                                </div>
                                <div class="email col-md-6">
                                    <div class="row">
                                        <p> <?php echo $feedbackItem['email']; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <div class="feedback-content">
                                <p> <?php echo $feedbackItem['message']; ?> </p>
                            </div>
                        </li>

                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
    </div>