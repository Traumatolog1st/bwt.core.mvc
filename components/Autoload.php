<?php

function __autoload($className)
{
    $class_pieces = explode('\\', $className);
    $directory = ucfirst(array_shift($class_pieces));
    $class = ucfirst(array_shift($class_pieces));
    $classPath = ROOT . '/' . $directory . '/' . $class . '.php';
    if (is_file($classPath)) {
        include_once($classPath);
    }
}