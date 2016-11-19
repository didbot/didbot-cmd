<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Mockery as m;

class ConfigBaseUrlCommandTest extends PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $env = m::mock('DidbotCmd\DotenvExtended');
        $env->shouldReceive('setEnv')->times(1)->andReturn($env);
        $cmd = new DidbotCmd\Commands\ConfigBaseUrlCommand($env);

        $app = new Application();
        $cmd->setApplication($app);

        $commandTester = new CommandTester($cmd);
        $commandTester->execute(['command' => $cmd->getName(), 'BASE_URL' => 'http://example.com']);
    }
}