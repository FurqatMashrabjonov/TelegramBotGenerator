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
    public string $actionsTemplate = '';

    public function __construct(string $command, array $actions, string $lang = 'php')
    {
        $this->actions = $actions;
        $this->command = $command;
        $this->lang = $lang;

        $this->makeActions();
        $this->template = $this->fill();
    }
    public function fill(): string
    {

        $args = [
            'command' => $this->command,
//            'actions' => ,
            'body' => $this->actionsTemplate
        ];

        return Filler::fill(getTemplate('command', $this->lang), $args);
    }

    public function makeActions(): void{
        foreach ($this->actions as $action){
            $className = 'App\\Core\\Telegram\\Templates\\' . ucfirst($action->name).'Template';
            $this->actionsTemplate .= (new $className((array)$action->arguments, 'command'))->template . PHP_EOL . '      ';
        }
    }

}
