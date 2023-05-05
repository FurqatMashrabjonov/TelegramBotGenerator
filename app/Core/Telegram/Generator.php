<?php

namespace App\Core\Telegram;

use App\Core\Telegram\Generators\FunctionGenerator;

class Generator
{

    public function command(): string{

    }

    public function function($functions): string{
        return (new FunctionGenerator($functions))->generate();
    }

}
