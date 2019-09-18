<?php

/**
 * Bedrox v0.4
 *
 * Author: Leslie Petrimaux
 * Create: 08/12/2018
 * Stable: xx/xx/2019
 */

require_once __DIR__ . '/../vendor/autoload.php';

use App\Kernel;
use Bedrox\Core\Env;
use Bedrox\Core\Request;

if (!isset($_SERVER['APP']['ENV'])) {
    (new Env())->load(__DIR__ . Env::FILE_ENV);
}

/**
 * App
 */
$kernel = new Kernel($_SERVER['APP']['ENV'] ?? 'dev', $_SERVER['APP']['DEBUG'] ?? ('prod' !== ($_SERVER['APP']['ENV'] ?? 'dev')));
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$kernel->terminate($response);
