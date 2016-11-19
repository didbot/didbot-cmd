<?php
namespace DidbotCmd\Commands;

use DidbotCmd\DotenvExtended;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Command\Command;

/**
 * Class ConfigBaseUrlCommand
 * @package DidbotCmd\Commands
 */
class ConfigBaseUrlCommand extends Command
{
    /**
     * @var DotenvExtended
     */
    protected $env;

    /**
     * ConfigBaseUrlCommand constructor.
     * @param DotenvExtended $env
     */
    public function __construct(DotenvExtended $env)
    {
        parent::__construct();
        $this->env = $env;
    }

    /**
     *
     */
    protected function configure()
    {
        $this->setName("config:url")
                ->addArgument('BASE_URL', InputArgument::REQUIRED, 'What is your didbot application base_url?');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->env->setEnv('BASE_URL', $input->getArgument('BASE_URL'));
    }
}