<?php

namespace App\Commands;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class GetAssetInfoCommand extends BvamCommand {

    protected $name        = 'b:asset-info';
    protected $description = 'Gets asset info';

    protected function configure() {
        parent::configure();

        $this
            ->addArgument(
                'asset-name-or-names',
                InputArgument::REQUIRED,
                'One or more asset names separated by a comma'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $asset_name_string = $input->getArgument('asset-name-or-names');
        $asset_names = explode(',', $asset_name_string);

        // init the client
        $client = $this->getClient($input);

        if (count($asset_names) == 1) {
            $output->writeln("<comment>calling getAssetInfo(".json_encode($asset_names[0]).")</comment>");
            $result = $client->getAssetInfo($asset_names[0]);
            $output->writeln("<info>Result\n".json_encode($result, 192)."</info>");
        } else {
            $output->writeln("<comment>calling getMultipleAssetsInfo(".json_encode($asset_names).")</comment>");
            $result = $client->getMultipleAssetsInfo($asset_names);
            $output->writeln("<info>Result\n".json_encode($result, 192)."</info>");
        }
    }

}
