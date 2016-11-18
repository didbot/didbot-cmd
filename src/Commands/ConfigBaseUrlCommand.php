<?php
namespace DidbotCmd\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class ConfigBaseUrlCommand extends Command
{
    protected function configure()
    {
        $this->setName("config:url")
                ->addArgument('BASE_URL', InputArgument::REQUIRED, 'What is your didbot application base_url?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //
    }
}