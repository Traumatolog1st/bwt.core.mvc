<?php

namespace components;

class Controller
{

    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function __autoload($className)
    {
        $fileName = ROOT . '/models/' . $className . '.php';
        echo $fileName;
    }

    function actionIndex()
    {

    }
}