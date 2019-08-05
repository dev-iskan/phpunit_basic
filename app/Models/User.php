<?php

namespace App\Models;

class User
{
    protected $first_name;
    protected $email;

    public function setFirstName($value)
    {
        $this->first_name = trim($value);
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getEmailVariables()
    {
        return [
            'first_name' => $this->first_name,
            'email' => $this->email
        ];
    }
}