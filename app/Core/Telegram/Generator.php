<?php

namespace App\Core\Telegram;

use App\Core\Telegram\Generators\CommandGenerator;
use App\Core\Telegram\Generators\FunctionGenerator;

class Generator
{

    public function command($commands): string{
        return (new CommandGenerator($commands))->generate();
    }

    public function function($functions): string{
        return (new FunctionGenerator($functions))->generate();
    }

}
