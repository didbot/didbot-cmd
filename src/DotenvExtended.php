<?php
namespace DidbotCmd;

class DotenvExtended extends \Dotenv\Dotenv
{
    /**
     * @param string $key
     * @param string $value
     * @param string $env_path
     */
    public function setEnv($key, $value)
    {
        // Read .env-file
        $env = file_get_contents($this->filePath);

        // If file isn't empty split string on every " "
        $env = ($env) ? preg_split('/\s+/', $env) : [];

        // Loop through .env-data
        foreach ($env as $env_key => $env_value) {

            // Turn the value into an array and stop after the first split
            // So it's not possible to split e.g. the App-Key by accident
            $entry = explode("=", $env_value, 2);

            // Check, if new key fits the actual .env-key
            if ($entry[0] == $key) {
                // If yes, overwrite it with the new one and clear the key
                $env[$env_key] = $key . "=" . $value;
                $key = FALSE;
            }
        }

        // if $key is still set we know it's new so add it to the array
        if ($key) array_push($env, $key . "=" . $value);

        // Turn the array back to an String
        $env = implode("\n", $env);

        // And overwrite the .env with the new data
        file_put_contents($this->filePath, $env);
    }
}