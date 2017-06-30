<?php

class UserController extends \components\Controller
{

    function __construct()
    {
        $this->model = new \models\User();
        $this->view = new \components\View();
    }


    function actionIndex()
    {
        $data = array(
            'email' => '',
            'name' => '',
            'lastName' => '',
            'password' => '',
            'birthday' => '',
            'sex' => '',
            'result' => false,
            'errors' => ''
        );
        if (isset($_POST["register"])) {
            $data['errors'] = '';
            $data['email'] = $this->model->test_input($_POST['email']);
            $data['name'] = $this->model->test_input($_POST['firstname']);
            $data['lastName'] = $this->model->test_input($_POST['lastname']);
            $data['password'] = $this->model->test_input($_POST['password']);
            if (!empty($_POST['birthday'])) {
                $data['birthday'] = $this->model->test_input($_POST['birthday']);
            } else {
                $data['birthday'] = 'none';
            }
            if (!empty($_POST['genderRadios'])) {
                $data['sex'] = $_POST['genderRadios'];
            } else {
                $data['sex'] = 'none';
            }
            $result = $this->model->validateRegister($data);
            if (is_bool($result) && $result) {
                $data['password'] = md5($data['password']);
                $data['result'] = $this->model->registrationUser($data['email'], $data['name'],
                    $data['lastName'], $data['password'], $data['birthday'], $data['sex']);
            } else {
                $data['errors'] = $result;
            }
        }
        $this->view->generate('Register.php', $data);

        return true;
    }

    function actionLogin()
    {
        $data = array(
            'userLogin' => '',
            'userPassword' => '',
            'errors' => ''
        );

        if (isset($_POST["login"])) {
            $data['errors'] = '';
            $data['userLogin'] = $this->model->test_input($_POST["username"]);
            $data['userPassword'] = $this->model->test_input($_POST["password"]);
            $result = $this->model->validateLogin($data);
            if (is_bool($result) && $result) {
                $data['userPassword'] = md5($data['userPassword']);
                $this->model::authorization($this->model->checkUserData($data['userLogin'], $data['userPassword']));
                header("Location: /feedback/list/");
            } else {
                $data['errors'] = $result;
            }
        }
        $this->view->generate('Login.php', $data);

        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION["user"]);
        unset($_SESSION['userName']);
        header("Location: /");
    }
}