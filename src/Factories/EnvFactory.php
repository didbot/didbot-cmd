<?php

namespace DidbotCmd\Factories;
use DidbotCmd\DotenvExtended;

class EnvFactory
{
    public static function getEnv($env_path)
    {
        // Create our .env file if it doesn't exist
        if (!file_exists($env_path)) {
            $fh = fopen($env_path, 'w') or die("Can't create .env file");
            fclose($fh);
        }

        // Load our .env file
        $env = new DotenvExtended(dirname($env_path));
        $env->load();

        return $env;
    }
}