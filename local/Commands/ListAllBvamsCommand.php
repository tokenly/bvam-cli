<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class ListAllBvamsCommand extends BvamCommand {

    protected $name        = 'b:list-bvams';
    protected $description = 'Retrieves a list of BVAM resources';

    protected function configure() {
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        // init the client
        $client = $this->getClient($input);

        $output->writeln("<comment>calling getBvamList()</comment>");
        $result = $client->getBvamList();
        $output->writeln("<info>Result\n".json_encode($result, 192)."</info>");
    }

}
