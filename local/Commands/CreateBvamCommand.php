<?php

namespace App\Commands;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class CreateBvamCommand extends BvamCommand {

    protected $name        = 'b:create-bvam';
    protected $description = 'Creates a new BVAM entry';

    protected function configure() {
        parent::configure();

        $this
            ->addArgument(
                'json-filepath',
                InputArgument::REQUIRED,
                'Filepath of a JSON BVAM file'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $json_filepath = $input->getArgument('json-filepath');
        $json_string = file_get_contents($json_filepath);
        if (!$json_string) { throw new Exception("Unabled to decode JSON at this location", 1); }

        // init the client
        $client = $this->getClient($input);

        $output->writeln("<comment>calling addBvamJson(".json_encode(substr($json_string, 0, 20)).")</comment>");
        $result = $client->addBvamJson($json_string);
        $output->writeln("<info>Result\n".json_encode($result, 192)."</info>");
    }

}
