<?php

namespace App\Core\Telegram\Templates;

use App\Core\Telegram\Helpers\Filler;
use App\Core\Telegram\Interfaces\Template;

class CommandTemplate implements Template
{
    public string $command;
    public array $actions;
    public string $lang;
    public string $template;

    public function __construct(string $command, array $actions, string $lang = 'php')
    {
        $this->actions = $actions;
        $this->command = $command;
        $this->lang = $lang;

        $this->template = $this->fill();
    }
    public function fill(): string
    {

        $args = [
            'command' => $this->command,
//            'actions' => ,
            'body' => 'dasdasdssa'
        ];

        return Filler::fill(getTemplate('command', $this->lang), $args);
    }

}
