<?php

class WeatherController extends \components\Controller
{
    function __construct()
    {
        $this->model = new \models\Weather();
        $this->view = new \components\View();
    }

    function actionIndex()
    {
        \models\User::checkLogged();
        $data = $this->model->getData();
        $this->view->generate('Weather.php', $data);

        return true;
    }
}