<?php

namespace App\Validation;

class MyRules
{
    public function valid_login(string $email, string $field, array $data): bool
    {
        $db = new \App\Libraries\NcrsEbnDb();
        $hashed_password = $db->getPassword(trim($email));
        if ($hashed_password == '')
            return false;
        else
            return password_verify(trim($data[$field]), $hashed_password);
    }

    public function valid_password(string $password, string $field, array $data): bool
    {
        $db = new \App\Libraries\NcrsEbnDb();
        $hashed_password = $db->getPassword(trim($data[$field]));
        if ($hashed_password == '')
            return false;
        else
            return password_verify(trim($password), $hashed_password);
    }
}
