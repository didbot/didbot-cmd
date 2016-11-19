<?php
namespace DidbotCmd\Commands;

use DidbotCmd\DotenvExtended;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Command\Command;

class ConfigApiTokenCommand extends Command
{
    /**
     * @var DotenvExtended
     */
    protected $env;

    /**
     * ConfigApiTokenCommand constructor.
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
        $this->setName("config:token")
                ->addArgument('API_TOKEN', InputArgument::REQUIRED, 'What is your API TOKEN?');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->env->setEnv('API_TOKEN', $input->getArgument('API_TOKEN'));
    }
}