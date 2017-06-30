<?php

class FeedbackController extends \components\Controller
{
    function __construct()
    {
        $this->model = new \models\Feedback();
        $this->view = new \components\View();
    }

    function actionIndex()
    {
        \models\User::checkLogged();
        $data = $this->model->getData();
        $this->view->generate('FeedbackList.php', $data);

        return true;
    }

    function actionSend()
    {
        $data = array(
            'email' => '',
            'name' => '',
            'message' => '',
            'result' => false,
            'errors' => ''
        );

        if (isset($_POST["Send"])) {

            $secret = '6Le6_CUUAAAAAMWsmYpfYC16XwgTbQHp-gjc2_zG';
            $response = $_POST['g-recaptcha-response'];
            $remoteip = $_SERVER['REMOTE_ADDR'];
            $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
            $result = json_decode($url, true);
            $data['email'] = $this->model->test_input($_POST["email"]);
            $data['name'] = $this->model->test_input($_POST["name"]);
            $data['message'] = $this->model->test_input($_POST["message"]);
            $data['errors'] = '';
            if ($result['success'] == 1) {
                $resultValidate = $this->model->validateFeedback($data);
                if (is_bool($resultValidate) && $resultValidate) {
                    $data['result'] = $this->model->setFeedback($data['name'], $data['email'], $data['message']);
                } else {
                    $data['errors'] = $resultValidate;
                }
                /*
                if (! $this->model::checkEmail($data['email'])) {
                    $data['errors'] = 'Invalid Email format!';
                } else {
                    if (! $this->model::checkName($data['name'])) {
                        $data['errors'] = 'The name must be at least 3 contains letters and whitespace!';
                    } else {
                        if (! $this->model::checkMessage($data['message'])) {
                            $data['errors'] = 'The message must contain at least 250 characters!';
                        } else {
                            $data['result'] =  $this->model::setFeedback($data['name'], $data['email'], $data['message']);
                        }
                    }
                }*/
            } else {
                $data['errors'] = 'You have not passed the test "I\'m not a robot". Try again.';
            }
        }
        $this->view->generate('Feedback.php', $data);

        return true;
    }

}