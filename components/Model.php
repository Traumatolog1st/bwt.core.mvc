<?php

namespace components;

class Model
{

    public $db;
    public $query;

    public function __construct()
    {
        $this->db = DB::connect();
        $this->query = new DBQuery($this->db);
    }

    //сбор данных для view
    public function getData()
    {

    }

    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    public function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    public function checkName($name, $min)
    {
        if ((strlen($name) >= $min) && (preg_match("/^[a-zA-Z ]*$/", $name))) {
            return true;
        }

        return false;
    }
}