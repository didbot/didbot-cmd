<?php
namespace DidbotCmd\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ConfigApiTokenCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName("config:token")
                ->addArgument('API_TOKEN', InputArgument::REQUIRED, 'What is your API TOKEN?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->setEnv('API_TOKEN', $input->getArgument('API_TOKEN'));
    }
}