<?php

declare(strict_types=1);

class Logger
{
    public static function log(string|array $message): void
    {
        if (!is_dir('logs')) {
            mkdir('logs');
        }
        if(is_array($message)) {
            $message = json_encode($message);
        }
        $message = date('Y-m-d h:i:sa') . " - " . $message . "\n";
        fwrite(fopen('logs/app.log', 'a+'), $message);
    }

    public static function info(string $message): void
    {
        if (!is_dir('logs')) {
            mkdir('logs');
        }
        $message = date('Y-m-d h:i:sa') . " - " . $message . "\n";
        fwrite(fopen('logs/app.log', 'a+'), $message);
    }
}
