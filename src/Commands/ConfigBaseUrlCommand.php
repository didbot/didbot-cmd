<?php
namespace DidbotCmd\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class ConfigBaseUrlCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName("config:url")
                ->addArgument('BASE_URL', InputArgument::REQUIRED, 'What is your didbot application base_url?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->setEnv('BASE_URL', $input->getArgument('BASE_URL'));
    }
}