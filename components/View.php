<?php

namespace components;

class View
{
    // $templateView - html код
    // $data - массив данный. Генерится в модели
    function generate($templateView, $data = null)
    {
        require_once(ROOT . '/views/Header.php');
        require_once(ROOT . '/views/' . $templateView);
        require_once(ROOT . '/views/Footer.php');
    }
}