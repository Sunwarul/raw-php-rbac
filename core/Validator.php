<?php

class Validator
{
    public static function validate($data, $rules): bool
    {
        $errors = [];
        foreach ($rules as $field => $types) {
            $typesArr = explode('|', $types);
            foreach ($typesArr as $type) {
                switch ($type) {
                    case 'required':
                        if (isset($data[$field]) && empty($data[$field])) {
                            $errors[$field] = $field . ' is required.';
                        }
                        break;
                    case 'numeric':
                        if (!is_numeric($data[$field])) {
                            $errors[$field] = $field . ' should be numeric.';
                        }
                        break;
                    case 'integer':
                        if (!is_int($data[$field])) {
                            $errors[$field] = $field . ' should be integer.';
                        }
                        break;
                    case 'float':
                        if (!is_float($data[$field])) {
                            $errors[$field] = $field . ' should be float.';
                        }
                        break;
                    case 'string':
                        if (!is_string($data[$field]) && !is_numeric($data[$field])) {
                            $errors[$field] = $field . ' should be string.';
                        }
                        break;
                    case 'email':
                        if (!filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                            $errors[$field] = $field . ' is invalid email address';
                        }
                        break;
                    default:
                        break;
                }
            }
        }
        $_SESSION['errors'] = $errors;
        return empty($errors);
    }
}
