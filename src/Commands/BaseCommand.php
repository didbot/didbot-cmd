<?php
namespace DidbotCmd\Commands;
use Symfony\Component\Console\Command\Command;
use Dotenv\Dotenv;

/**
 * Class BaseCommand
 * @package DidbotCmd\Commands
 */
class BaseCommand extends Command
{
    /**
     * @var \Dotenv\Dotenv
     */
    protected $env;

    /**
     * @var string
     */
    protected $env_path;

    /**
     * BaseCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();

        // Create our .env file if it doesn't exist
        $this->env_path = __DIR__ . '/../../.env';
        if(!file_exists($this->env_path)){
            $fh = fopen($this->env_path, 'w') or die("Can't create .env file");
            fclose($fh);
        }

        // Load our .env file
        $this->env = new Dotenv(dirname($this->env_path));
        $this->env->load();
    }

    /**
     * @param string $key
     * @param string $value
     * @return bool
     */
    protected function setEnv($key, $value)
    {
        // Read .env-file
        $env = file_get_contents($this->env_path);

        // If file isn't empty split string on every " "
        $env = ($env) ? preg_split('/\s+/', $env) : [];

        // Loop through .env-data
        foreach($env as $env_key => $env_value){

            // Turn the value into an array and stop after the first split
            // So it's not possible to split e.g. the App-Key by accident
            $entry = explode("=", $env_value, 2);

            // Check, if new key fits the actual .env-key
            if($entry[0] == $key){
                // If yes, overwrite it with the new one and clear the key
                $env[$env_key] = $key . "=" . $value;
                $key = false;
            }
        }

        // if $key is still set we know it's new so add it to the array
        if($key) array_push($env, $key . "=" . $value);

        // Turn the array back to an String
        $env = implode("\n", $env);

        // And overwrite the .env with the new data
        file_put_contents($this->env_path, $env);

        return true;
    }
}
?>