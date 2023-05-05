<?php

namespace App\Core\Telegram;

use App\Core\Telegram\Parsers\CommandParser;
use App\Core\Telegram\Parsers\FunctionParser;
use App\Core\Telegram\Templates\CommandTemplate;

class Parser
{

    protected object $parsedJson;

    /**
     * @param object $parsedJson
     * @return void
     */
    public function __construct(object $parsedJson){
        $this->parsedJson = $parsedJson;
    }
    public function parse(): array
    {
        $functions = (new FunctionParser($this->parsedJson->functions))->build();
        $commands = (new CommandParser($this->parsedJson->commands))->build();
        return [$functions, $commands];
    }

}
