<?php

class EnvLoader
{
    public static function load()
    {
        // Load environment variables from.env file and make accessible from $_ENV and getenv() method.
        $envFile = fopen('.env', 'r');
        while (($line = fgets($envFile)) !== false) {
            if (trim($line) !== '' && strpos(trim($line), '#') !== 0) {
                list($key, $value) = explode('=', trim($line), 2);
                putenv("$key=$value");
                $_ENV[$key] = $value;
            }
        }
        fclose($envFile);
    }
}