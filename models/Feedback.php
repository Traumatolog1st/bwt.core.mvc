<?php

namespace models;


use components\DB;
use components\DBQuery;
use components\Model;

class Feedback extends Model
{
    public function getData()
    {
        $db = DB::connect();
        $query = new DBQuery($db);

        return $query->queryAll('SELECT * FROM feedback');
    }

    public static function setFeedback($name, $email, $message)
    {
        $db = DB::connect();
        $query = new DBQuery($db);

        return $query->execute("INSERT INTO `feedback`(`name`, `email`, `message`) VALUES (:name, :email, :message)",
            [
                'name' => $name,
                'email' => $email,
                'message' => $message
            ]);
    }

    public static function validateFeedback($data)
    {
        if (!self::checkEmail($data['email'])) {
            return 'Invalid Email format!';
        }

        if (!self::checkName($data['name'])) {
            return 'The name must be at least 3 contains letters and whitespace!';
        }

        if (!self::checkMessage($data['message'])) {
            return 'The message must contain at least 250 characters!';
        }

        return true;
    }

    public static function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkName($name)
    {
        if ((strlen($name) >= 3) && (preg_match("/^[a-zA-Z ]*$/", $name))) {
            return true;
        }
        return false;
    }

    public static function checkMessage($message)
    {
        if (strlen($message) <= 250) {
            return true;
        }
        return false;
    }
}