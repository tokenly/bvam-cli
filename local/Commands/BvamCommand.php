<?php

namespace App\Commands;

use App\Commands\GenericCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Tokenly\BvamApiClient\BVAMClient;


class BvamCommand extends GenericCommand {

    protected $name        = null;
    protected $description = null;

    protected function configure() {
        parent::configure();

        $this
            ->addArgument(
                'bvam-url',
                InputArgument::REQUIRED,
                'BVAM Client URL'
            )

            // ->addArgument(
            //     'bvam-api-token',
            //     InputArgument::REQUIRED,
            //     'A BVAM API token'
            // )

            // ->addArgument(
            //     'bvam-api-secret-key',
            //     InputArgument::REQUIRED,
            //     'A BVAM API secret key'
            // )
        ;
    }

    protected function getClient(InputInterface $input) {
        $bvam_url = $input->getArgument('bvam-url');
        // $api_token = $input->getArgument('bvam-api-token');
        // $api_secret_key = $input->getArgument('bvam-api-secret-key');

        // init the client
        // $client = new BVAMClient($bvam_url, $api_token, $api_secret_key);
        $client = new BVAMClient($bvam_url);

        return $client;
    }

}
