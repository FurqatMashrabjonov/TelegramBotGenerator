<?php

namespace App\Core\Telegram\Parsers;

use App\Core\Telegram\Templates\CommandTemplate;
use App\Core\Telegram\Templates\FunctionTemplate;

class CommandParser
{

    protected array $commands;

    public function __construct(array $commands)
    {
        $this->commands = $commands;
    }

    public function build(): array
    {
        $arr = [];
        foreach ($this->commands as $command) {
            $arr[] = $this->makeTemplate($command);

        }
        return $arr;
    }

    public function makeTemplate(object $command): CommandTemplate
    {
        return new CommandTemplate($command->command, $command->actions);
    }



}
