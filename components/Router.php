<?php

namespace components;

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        //получить строку запроса
        $uri = $this->getUri();

        //проверить наличие такого запроса в routes.php
        foreach ($this->routes as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                //определить контроллер
                $segments = explode('/', $path);

                //$controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $modelName = ucfirst(array_shift($segments));
                $controllerName = $modelName . 'Controller';

                $actionName = 'action' . ucfirst(array_shift($segments));

                //подключить файл контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                //подключим модель
                $modelFile = ROOT . '/models/' . $modelName . '.php';
                if (file_exists($modelFile)) {
                    include_once($modelFile);
                }

                //создать объект и вызвать метод
                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();

                if ($result != null) {
                    break;
                }
            }
        }
    }
}