<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Helper\HelperSet;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

$configFile = __DIR__ . '/../vendor/bedrox/bedrox/doctrine/cli-config.php';

if ( ! file_exists($configFile)) {
    ConsoleRunner::printCliConfigTemplate();
    exit(1);
}

if ( ! is_readable($configFile)) {
    echo 'Configuration file [' . $configFile . '] does not have read permission.' . "\n";
    exit(1);
}

$commands = [];

/** @var HelperSet $configFile */
$helperSet = require $configFile;

if ( ! ($helperSet instanceof HelperSet)) {
    foreach ($GLOBALS as $helperSetCandidate) {
        if ($helperSetCandidate instanceof HelperSet) {
            $helperSet = $helperSetCandidate;
            break;
        }
    }
}

ConsoleRunner::run($helperSet, $commands);
