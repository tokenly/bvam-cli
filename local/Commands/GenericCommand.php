<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;


class GenericCommand extends Command {

    protected $name        = null;
    protected $description = null;

    protected function configure() {
        $this
            ->setName($this->name)
            ->setDescription($this->description)
        ;
    }

    protected function formatBoolean($raw_input) {
        if ($raw_input === true) { return true; }
        switch (strtolower(substr($raw_input, 0, 1))) {
            case 'y':
            case 't':
            case '1':
                return true;
        }

        return false;
    }


}
