<?php

namespace models;


use components\DB;
use components\DBQuery;
use components\Model;

class Feedback extends Model
{
    public function getData()
    {
        return $this->query->queryAll('SELECT * FROM feedback');
    }

    public function setFeedback($name, $email, $message)
    {
        return $this->query->execute("INSERT INTO `feedback`(`name`, `email`, `message`) VALUES (:name, :email, :message)",
            [
                'name' => $name,
                'email' => $email,
                'message' => $message
            ]);
    }

    public function validateFeedback($data)
    {
        if (!$this->checkEmail($data['email'])) {
            return 'Invalid Email format!';
        }

        if (!$this->checkName($data['name'], 3)) {
            return 'The name must be at least 3 contains letters and whitespace!';
        }
        if (!self::checkMessage($data['message'])) {
            return 'The message must contain at least 250 characters!';
        }

        return true;
    }

    public static function checkMessage($message)
    {
        if (strlen($message) <= 250) {
            return true;
        }

        return false;
    }
}