<?php

/**
 * Bedrox v0.6
 *
 * Author: Leslie Petrimaux
 * Create: 08/12/2018
 * Bêta: 08/12/2019
 */

require_once __DIR__ . '/../vendor/autoload.php';

use App\Kernel;
use Bedrox\Core\Env;
use Bedrox\Core\Exceptions\BedroxException;
use Bedrox\Core\Request;

/**
 * Environment
 */
if (!isset($_SERVER[Env::APP][Env::ENV])) {
    (new Env)->load(__DIR__ . Env::FILE_ENV);
} else {
    BedroxException::render(
      'BEDROX_LOADER',
      'Unable to load the Application environment. Project not valid. Please, check the documentation.'
    );
}

/**
 * App
 */
$kernel = new Kernel($_SERVER[Env::APP][Env::ENV] ?? 'dev', $_SERVER[Env::APP][Env::DEBUG] ?? ('prod' !== ($_SERVER[Env::APP][Env::ENV] ?? 'dev')));
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$kernel->terminate($response);
