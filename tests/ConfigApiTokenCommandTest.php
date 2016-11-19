<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Mockery as m;

class ConfigApiTokenCommandTest extends PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $env = m::mock('DidbotCmd\DotenvExtended');
        $env->shouldReceive('setEnv')->times(1)->andReturn($env);
        $cmd = new DidbotCmd\Commands\ConfigApiTokenCommand($env);

        $app = new Application();
        $cmd->setApplication($app);

        $commandTester = new CommandTester($cmd);
        $commandTester->execute(['command' => $cmd->getName(), 'API_TOKEN' => 123]);
    }
}