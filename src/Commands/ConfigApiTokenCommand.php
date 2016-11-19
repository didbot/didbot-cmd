<?php
namespace DidbotCmd\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class ConfigApiTokenCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName("config:token")
                ->addArgument('API_TOKEN', InputArgument::REQUIRED, 'What is your API TOKEN?');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $token = $input->getArgument('API_TOKEN');
        $this->setEnv('API_TOKEN', $token);
    }
}