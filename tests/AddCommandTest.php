<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Mockery as m;

class AddCommandTest extends PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $client = m::mock('GuzzleHttp\Client');
        $client->shouldReceive('request')->times(1)->andReturn($client);

        $app = new Application();
        $cmd = new DidbotCmd\Commands\AddCommand($client);
        $cmd->setApplication($app);

        $helper = $cmd->getHelper('question');
        $helper->setInputStream($this->getInputStream("Test\nTest\n"));

        $tester = new CommandTester($cmd);
        $tester->execute([
            'command' => $cmd->getName()
        ]);

        $output = $tester->getDisplay();
        $this->assertContains('Success!', $output);
    }

    protected function getInputStream($input)
    {
        $stream = fopen('php://memory', 'r+', FALSE);
        fputs($stream, $input);
        rewind($stream);

        return $stream;
    }
}