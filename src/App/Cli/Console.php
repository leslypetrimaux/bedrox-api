<?php

namespace App\Cli;

use App\Cli\Commands\CustomExample;

class Console extends \Bedrox\Cmd\Console
{
    public static function addCommands(): array
    {
        // List of all classes to import to Bedrox CLI
        return array(
            new CustomExample()
        );
    }
}
