<?php

class Validator
{
    public static function validate($data): bool
    {
        $errors = [];
        foreach ($data as $value => $type) {
            switch ($type) {
                case 'numeric':
                    if (!is_numeric($value)) {
                        $errors[$value] = $value . ' should be numeric.';
                    }
                    break;
                case 'integer':
                    if (!is_int($value)) {
                        $errors[$value] = $value . ' should be integer.';
                    }
                    break;
                case 'float':
                    if (!is_float($value)) {
                        $errors[$value] = $value . ' should be float.';
                    }
                    break;
                case 'string':
                    if (!is_string($value) && !is_numeric($value)) {
                        $errors[$value] = $value . ' should be string.';
                    }
                    break;
                case 'email':
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        var_dump($type, $value);
                        $errors[$value] = $value . ' is invalid email address';
                    }
                    break;
                default:
                    break;
            }
        }
        $_SESSION['errors'] = $errors;
        return empty($errors);
    }
}
