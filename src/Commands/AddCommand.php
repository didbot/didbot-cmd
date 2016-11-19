<?php

namespace DidbotCmd\Commands;

use Mockery\CountValidator\Exception;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Command\Command;

class AddCommand extends Command
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * AddCommand constructor.
     * @param \GuzzleHttp\Client
     */
    public function __construct(\GuzzleHttp\Client $client)
    {
        parent::__construct();
        $this->client = $client;
    }

    /**
     *
     */
    protected function configure()
    {
        $this->setName("add")
                ->setDescription("Add a new did to didbot")
                ->setDefinition([
                        new InputOption('tag', 't', InputOption::VALUE_OPTIONAL, 'Optionally add a tag')
                ]);
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        // Clear
        //$output->write(sprintf("\033\143"));

        // Capture Did
        $question = new Question('<fg=green>What did you do?</>' . PHP_EOL);
        $did = $helper->ask($input, $output, $question);

        // Capture Tags
        $question = new Question('<fg=green>Set tags</>' . PHP_EOL);

        // TODO: get list of users tags for autocomplete
        //$tags = ['tag1', 'tag2', 'tag3'];
        //$question->setAutocompleterValues($tags);

        $tags = $helper->ask($input, $output, $question);

        try{
            $this->createDid($did);
        }catch(Exception $e){
            $output->writeln($e);
        }

        $output->writeln('Success!');
    }


    /**
     * @param string $did
     */
    private function createDid($did)
    {
        $response = $this->client->request('POST', '/dids',
            [
                'json' => [
                    'text' => $did,
                    'geo' => ''
                ]
            ]);
    }
}