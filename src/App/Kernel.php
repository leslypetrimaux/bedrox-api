<?php

namespace App;

use App\Cli\Console;
use Bedrox\Core\Interfaces\iKernel;
use Bedrox\Core\Request;
use Bedrox\Core\Response;
use Bedrox\Skeleton;

class Kernel extends Skeleton implements iKernel
{
    /** Format de secours */
    public const DEFAULT_FORMAT = 'json';
    /** Encodage de secours */
    public const DEFAULT_ENCODE = 'utf-8';

    protected $env;
    protected $debug;

    /**
     * Kernel constructor.
     * 
     * @param string $env
     * @param bool $debug
     */
    public function __construct(string $env, bool $debug)
    {
        parent::__construct();
        $this->env = $env;
        $this->debug = $debug;
    }

    /**
     * Retrieve the Request and handle it to send a Response
     *
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request): Response
    {
        return $request->handle($request);
    }

    /**
     * Execute the Controller and display the result
     *
     * @param Response $response
     */
    public function terminate(Response $response): void
    {
        $response->terminate($response);
    }

    /**
     * Add custom commands to the Bedrox CLI
     *
     * @return array
     */
    public static function getCustomCmd(): array
    {
        return Console::addCommands();
    }
}
