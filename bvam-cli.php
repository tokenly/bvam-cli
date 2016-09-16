#!/usr/bin/env php
<?php

use App\Commands\CreateBvamCategoryCommand;
use App\Commands\CreateBvamCommand;
use App\Commands\GetAssetInfoCommand;
use App\Commands\ListAllBvamsCommand;
use Symfony\Component\Console\Application;

require __DIR__.'/vendor/autoload.php';

$app = new Application();
$app->add(new ListAllBvamsCommand());
$app->add(new CreateBvamCommand());
$app->add(new CreateBvamCategoryCommand());
$app->add(new GetAssetInfoCommand());

try {
    $app->run();
} catch (Exception $e) {
    echo "ERROR: ".$e->getMessage()."\n";
    echo $e->getTraceAsString()."\n";
}
