<?php


namespace App\Services;

use Dotenv\Dotenv;

class EnvService
{
    public static function init()
    {
        $dotenv = Dotenv::createImmutable(__DIR__, './../../.env');
        $dotenv->load();
    }
}