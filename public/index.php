<?php

/**
 * Bedrox v0.6
 *
 * Author: Leslie Petrimaux
 * Create: 08/12/2018
 * Stable: 23/11/2019
 */

require_once __DIR__ . '/../vendor/autoload.php';

use App\Kernel;
use Bedrox\Core\Env;
use Bedrox\Core\Exceptions\BedroxException;
use Bedrox\Core\Request;

/**
 * Environment
 */
if (!isset($_SERVER['APP']['ENV'])) {
    (new Env())->load(__DIR__ . Env::FILE_ENV);
} else {
    BedroxException::render(
      'BEDROX_LOADER',
      'Impossible de charger correctement l\'environnement de l\'Application. Le projet n\'est pas valide. Rendez-vous sur la documentation.'
    );
}

/**
 * App
 */
$kernel = new Kernel($_SERVER['APP']['ENV'] ?? 'dev', $_SERVER['APP']['DEBUG'] ?? ('prod' !== ($_SERVER['APP']['ENV'] ?? 'dev')));
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$kernel->terminate($response);
