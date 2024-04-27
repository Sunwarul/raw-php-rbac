<?php

class Validator
{
    public static function validate($data) : bool
    {
        $errors = [];
        foreach ($data as $value => $type) {
            if ($type == 'email') {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors[$value] = "Email is not valid";
                }
            }
        }
        $_SESSION['errors'] = $errors;
        return empty($errors);
    }
}